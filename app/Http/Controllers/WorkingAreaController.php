<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkingArea;
use Illuminate\Support\Facades\DB;

class WorkingAreaController extends Controller
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
        
        $working_areas = WorkingArea::where('name', 'LIKE', '%'.$name.'%')
                        ->paginate(20);

        return view('working_areas.index', compact(
            'name',
            'working_areas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('working_areas.create');
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
            'name' => 'required'
        ]);

        DB::transaction(function() use($request) {
            $working_area = new WorkingArea;
            $working_area->name = $request->name;
            $working_area->save();
        });

        return redirect('working-area')->with('ok', 'ok');
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
        $working_area = WorkingArea::findOrFail($id);

        return view('working_areas.edit', compact('working_area'));
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
            'name' => 'required'
        ]);

        DB::transaction(function() use($request, $id) {
            $working_area = WorkingArea::findOrFail($id);
            $working_area->name = $request->name;
            $working_area->save();
        });

        return redirect('working-area')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $working_area = WorkingArea::findOrFail($id);
        if($working_area->workHistories->count() > 0)
            return redirect('working-area')->with('error', 'error');

        DB::transaction(function() use($working_area) {
            $working_area->delete();            
        });

        return redirect('working-area')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $working_area = WorkingArea::findOrFail($id);
            $working_area->status = $status;
            $working_area->save();
        });

        return "STATUS UPDATED OK";
    }
}
