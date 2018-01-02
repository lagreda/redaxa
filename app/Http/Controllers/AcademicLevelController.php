<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicLevel;
use Illuminate\Support\Facades\DB;

class AcademicLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $academic_levels = AcademicLevel::where('name', 'LIKE', '%'.$name.'%')
                        ->orderBy('grade', 'ASC')
                        ->paginate(20);

        return view('academic_levels.index', compact(
            'name',
            'academic_levels'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academic_levels.create');
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
            'grade' => 'required|numeric'
        ]);

        DB::transaction(function() use($request) {
            $academic_level = new AcademicLevel;
            $academic_level->name = $request->name;
            $academic_level->grade = $request->grade;
            $academic_level->save();
        });

        return redirect('academic-level')->with('ok', 'ok');
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
        $academic_level = AcademicLevel::findOrFail($id);

        return view('academic_levels.edit', compact('academic_level'));
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
            'grade' => 'required|numeric'
        ]);

        DB::transaction(function() use($request, $id) {
            $academic_level = AcademicLevel::findOrFail($id);
            $academic_level->name = $request->name;
            $academic_level->grade = $request->grade;
            $academic_level->save();
        });

        return redirect('academic-level')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academic_level = AcademicLevel::findOrFail($id);
        if($academic_level->academicHistories->count() > 0)
            return redirect('academic-level')->with('error', 'error');
        
        DB::transaction(function() use($academic_level) {            
            $academic_level->delete();
        });

        return redirect('academic-level')->with('ok', 'ok');   
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $academic_level = AcademicLevel::findOrFail($id);
            $academic_level->status = $status;
            $academic_level->save();
        });

        return "STATUS UPDATED OK";
    }

    public function indexAPI()
    {
        return AcademicLevel::all();
    }

    public function showAPI($id)
    {
        return AcademicLevel::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $academic_level = new AcademicLevel;
            $academic_level->name = $request->name;
            $academic_level->save();
            $object = $academic_level;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $academic_level = AcademicLevel::findOrFail($id);
            $academic_level->name = $request->name;
            $academic_level->save();
            $object = $academic_level;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $academic_level = AcademicLevel::findOrFail($id);
            $academic_level->delete();
        });

        return response()->json(null, 204);
    }
}
