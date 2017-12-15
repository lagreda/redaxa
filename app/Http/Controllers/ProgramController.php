<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgramType;
use App\Program;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $program_type_id = $request->input('program_type_id', '');
        if($program_type_id == "")
            $program_type_id = "%%";
        
        $program_types = ProgramType::where('status', '=', '1')
                        ->get();

        $programs = Program::with('programType')
                    ->where('name', 'LIKE', '%'.$name.'%')
                    ->where('program_type_id', 'LIKE', $program_type_id)
                    ->paginate(20);

        return view('programs.index', compact(
            'name',
            'program_type_id',
            'program_types',
            'programs'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_types = ProgramType::where('status', '=', '1')
                ->get();

        return view('programs.create', compact(            
            'program_types'            
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'program_type_id' => 'required|exists:program_types,id',
        ]);

        DB::transaction(function() use($request) {
            $program_type = ProgramType::findOrFail($request->program_type_id);
            $program = new Program;
            $program->name = $request->name;            
            $program->program_type_id = $program_type->id;
            $program->save();
        });

        return redirect('program')->with('ok', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program_types = ProgramType::where('status', '=', '1')
        ->get();

        $program = Program::findOrFail($id);

        return view('programs.edit', compact(            
            'program_types',
            'program'            
));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'program_type_id' => 'required|exists:program_types,id',
        ]);

        DB::transaction(function() use($request, $id) {
            $program_type = ProgramType::findOrFail($request->program_type_id);
            $program = Program::findOrFail($id);
            $program->name = $request->name;            
            $program->program_type_id = $program_type->id;
            $program->save();
        });

        return redirect('program')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        if($program->students()->count() > 0)
            return redirect('program')->with('error', 'error');

        DB::transaction(function() use($program) {            
            $program->delete();
        });

        return redirect('program')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $program = Program::findOrFail($id);
            $program->status = $status;
            $program->save();
        });

        return "STATUS UPDATED OK";
    }
}
