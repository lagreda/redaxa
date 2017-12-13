<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CivilStatus;
use Illuminate\Support\Facades\DB;

class CivilStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $civil_statuses = CivilStatus::where('name', 'LIKE', '%'.$name.'%')                    
                        ->paginate(20);

        return view('civil_status.index', compact(
            'name',
            'civil_statuses'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('civil_status.create');
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
            $civil_status = new CivilStatus;
            $civil_status->name = $request->name;
            $civil_status->save();
        });

        return redirect('civil-status')->with('ok', 'ok');
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
        $civil_status = CivilStatus::findOrFail($id);

        return view('civil_status.edit', compact('civil_status'));
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
            $civil_status = CivilStatus::findOrFail($id);
            $civil_status->name = $request->name;
            $civil_status->save();
        });

        return redirect('civil-status')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $civil_status = CivilStatus::findOrFail($id);
        if($civil_status->students->count() > 0)
            return redirect('civil-status')->with('error', 'error');

        DB::transaction(function() use($country) {
            $civil_status->delete();            
        });

        return redirect('civil-status')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $civil_status = CivilStatus::findOrFail($id);
            $civil_status->status = $status;
            $civil_status->save();
        });

        return "STATUS UPDATED OK";
    }
}
