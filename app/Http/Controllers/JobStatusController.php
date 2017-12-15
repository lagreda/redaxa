<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobStatus;
use Illuminate\Support\Facades\DB;

class JobStatusController extends Controller
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
        
        $job_statuses = JobStatus::where('name', 'LIKE', '%'.$name.'%')                        
                        ->paginate(20);

        return view('job_status.index', compact(
            'name',
            'job_statuses'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('job_status.create');
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
            $job_status = new JobStatus;
            $job_status->name = $request->name;
            $job_status->save();
        });

        return redirect('job-status')->with('ok', 'ok');
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
        $job_status = JobStatus::findOrFail($id);

        return view('job_status.edit', compact('job_status'));
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
            $job_status = JobStatus::findOrFail($id);
            $job_status->name = $request->name;
            $job_status->save();
        });

        return redirect('job-status')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job_status = JobStatus::findOrFail($id);
        if($job_status->students->count() > 0)
            return redirect('job-status')->with('error', 'error');

        DB::transaction(function() use($job_status) {
            $job_status->delete();            
        });

        return redirect('job-status')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $job_status = JobStatus::findOrFail($id);
            $job_status->status = $status;
            $job_status->save();
        });

        return "STATUS UPDATED OK";
    }
}
