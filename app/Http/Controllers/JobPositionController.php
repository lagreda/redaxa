<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPosition;
use Illuminate\Support\Facades\DB;

class JobPositionController extends Controller
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
        
        $job_positions = JobPosition::where('name', 'LIKE', '%'.$name.'%')                        
                        ->paginate(20);

        return view('job_positions.index', compact(
            'name',
            'job_positions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_positions.create');
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
            $job_position = new JobPosition;
            $job_position->name = $request->name;
            $job_position->save();
        });

        return redirect('job-position')->with('ok', 'ok');
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
        $job_position = JobPosition::findOrFail($id);

        return view('job_positions.edit', compact('job_position'));
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
            $job_position = JobPosition::findOrFail($id);
            $job_position->name = $request->name;
            $job_position->save();
        });

        return redirect('job-position')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job_position = JobPosition::findOrFail($id);
        if($job_position->workHistories->count() > 0)
            return redirect('job-position')->with('error', 'error');
        
        DB::transaction(function() use($job_position) {
            $job_position->delete();            
        });

        return redirect('job-position')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $job_position = JobPosition::findOrFail($id);
            $job_position->status = $status;
            $job_position->save();
        });

        return "STATUS UPDATED OK";
    }
}
