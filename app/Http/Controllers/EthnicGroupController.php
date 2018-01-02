<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EthnicGroup;
use Illuminate\Support\Facades\DB;

class EthnicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $ethnic_groups = EthnicGroup::where('name', 'LIKE', '%'.$name.'%')
                        ->paginate(20);

        return view('ethnic_groups.index', compact(
            'name',
            'ethnic_groups'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ethnic_groups.create');
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
            $ethnic_group = new EthnicGroup;
            $ethnic_group->name = $request->name;
            $ethnic_group->save();
        });

        return redirect('ethnic-group')->with('ok', 'ok');
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
        $ethnic_group = EthnicGroup::findOrFail($id);

        return view('ethnic_groups.edit', compact('ethnic_group'));
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
            $ethnic_group = EthnicGroup::findOrFail($id);
            $ethnic_group->name = $request->name;
            $ethnic_group->save();
        });

        return redirect('ethnic-group')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ethnic_group = EthnicGroup::findOrFail($id);
        if($ethnic_group->students->count() > 0)
            return redirect('ethnic-group')->with('error', 'error');

        DB::transaction(function() use($ethnic_group) {
            $ethnic_group->delete();            
        });

        return redirect('ethnic-group')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $ethnic_group = EthnicGroup::findOrFail($id);
            $ethnic_group->status = $status;
            $ethnic_group->save();
        });

        return "STATUS UPDATED OK";
    }


    public function indexAPI()
    {
        return EthnicGroup::all();
    }

    public function showAPI($id)
    {
        return EthnicGroup::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $ethnic_group = new EthnicGroup;
            $ethnic_group->name = $request->name;
            $ethnic_group->save();
            $object = $ethnic_group;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $ethnic_group = EthnicGroup::findOrFail($id);
            $ethnic_group->name = $request->name;
            $ethnic_group->save();
            $object = $ethnic_group;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $ethnic_group = EthnicGroup::findOrFail($id);
            $ethnic_group->delete();
        });

        return response()->json(null, 204);
    }
}
