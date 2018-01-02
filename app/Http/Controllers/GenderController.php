<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use Illuminate\Support\Facades\DB;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $genders = Gender::where('name', 'LIKE', '%'.$name.'%')
                        ->paginate(20);

        return view('genders.index', compact(
            'name',
            'genders'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genders.create');
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
            $gender = new Gender;
            $gender->name = $request->name;
            $gender->save();
        });

        return redirect('gender')->with('ok', 'ok');
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
        $gender = Gender::findOrFail($id);

        return view('genders.edit', compact('gender'));
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
            $gender = Gender::findOrFail($id);
            $gender->name = $request->name;
            $gender->save();
        });

        return redirect('gender')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gender = Gender::findOrFail($id);
        if($gender->students->count() > 0)
            return redirect('gender')->with('error', 'error');

        DB::transaction(function() use($gender) {
            $gender->delete();            
        });

        return redirect('gender')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $gender = Gender::findOrFail($id);
            $gender->status = $status;
            $gender->save();
        });

        return "STATUS UPDATED OK";
    }

    public function indexAPI()
    {
        return Gender::all();
    }

    public function showAPI($id)
    {
        return Gender::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $gender = new Gender;
            $gender->name = $request->name;
            $gender->save();
            $object = $gender;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $gender = Gender::findOrFail($id);
            $gender->name = $request->name;
            $gender->save();
            $object = $gender;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $gender = Gender::findOrFail($id);
            $gender->delete();
        });

        return response()->json(null, 204);
    }
}
