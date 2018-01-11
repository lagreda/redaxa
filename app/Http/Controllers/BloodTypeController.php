<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodType;
use Illuminate\Support\Facades\DB;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');

        $blood_types = BloodType::where('name', 'LIKE', '%'.$name.'%')
                        ->paginate(20);

        return view('blood_types.index', compact(
            'name',
            'blood_types'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blood_types.create');
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
            $blood_type = new BloodType;
            $blood_type->name = $request->name;
            $blood_type->save();
        });

        return redirect('blood-type')->with('ok', 'ok');
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
        $blood_type = BloodType::findOrFail($id);

        return view('blood_types.edit', compact('blood_type'));
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
            $blood_type = BloodType::findOrFail($id);
            $blood_type->name = $request->name;
            $blood_type->save();
        });

        return redirect('blood-type')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blood_type = BloodType::findOrFail($id);
        if($blood_type->students->count() > 0)
            return redirect('blood-type')->with('error', 'error');

        DB::transaction(function() use($blood_type) {
            $blood_type->delete();            
        });

        return redirect('blood-type')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $blood_type = BloodType::findOrFail($id);
            $blood_type->status = $status;
            $blood_type->save();
        });

        return "STATUS UPDATED OK";
    }


    public function indexAPI()
    {
        return BloodType::all();
    }

    public function showAPI($id)
    {
        return BloodType::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $blood_type = new BloodType;
            $blood_type->name = $request->name;
            $blood_type->save();
            $object = $blood_type;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $blood_type = BloodType::findOrFail($id);
            $blood_type->name = $request->name;
            $blood_type->save();
            $object = $blood_type;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $blood_type = BloodType::findOrFail($id);
            $blood_type->delete();
        });

        return response()->json(null, 204);
    }
}
