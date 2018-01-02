<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ProgramType;

class ProgramTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');

        $program_types = ProgramType::where('name', 'LIKE', '%'.$name.'%')
        ->paginate(20);

        return view('program_types.index', compact(
            'name',
            'program_types'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program_types.create');
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
        ]);

        DB::transaction(function() use($request) {
            $program_type = new ProgramType;
            $program_type->name = $request->name;            
            $program_type->save();
        });

        return redirect('program-type')->with('ok', 'ok');
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
        $program_type = ProgramType::findOrFail($id);

        return view('program_types.edit', compact(            
            'program_type'
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
        ]);

        DB::transaction(function() use($request, $id) {
            $program_type = ProgramType::findOrFail($id);
            $program_type->name = $request->name;            
            $program_type->save();
        });

        return redirect('program-type')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program_type = ProgramType::findOrFail($id);
        if($program_type->programs()->count() > 0)
            return redirect('program-type')->with('error', 'error');

        DB::transaction(function() use($program_type) {
            $program_type->delete();
        });

        return redirect('program-type')->with('ok', 'ok');    
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $program_type = ProgramType::findOrFail($id);
            $program_type->status = $status;
            $program_type->save();
        });

        return "STATUS UPDATED OK";
    }


    public function indexAPI()
    {
        return ProgramType::all();
    }

    public function showAPI($id)
    {
        return ProgramType::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $program_type = new ProgramType;
            $program_type->name = $request->name;
            $program_type->save();
            $object = $program_type;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $program_type = ProgramType::findOrFail($id);
            $program_type->name = $request->name;
            $program_type->save();
            $object = $program_type;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $program_type = ProgramType::findOrFail($id);
            $program_type->delete();
        });

        return response()->json(null, 204);
    }
}
