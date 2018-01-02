<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $countries = Country::where('name', 'LIKE', '%'.$name.'%')
                        ->orderBy('name', 'ASC')
                        ->paginate(20);

        return view('countries.index', compact(
            'name',
            'countries'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
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
            $country = new Country;
            $country->name = $request->name;
            $country->save();
        });

        return redirect('country')->with('ok', 'ok');
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
        $country = Country::findOrFail($id);

        return view('countries.edit', compact('country'));
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
            $country = Country::findOrFail($id);
            $country->name = $request->name;
            $country->save();
        });

        return redirect('country')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$country = Country::findOrFail($id);
        if($country->students->count() > 0)
            return redirect('country')->with('error', 'error');

        DB::transaction(function() use($country) {
            $country->delete();            
        });

        return redirect('gender')->with('ok', 'ok');*/
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $country = Country::findOrFail($id);
            $country->status = $status;
            $country->save();
        });

        return "STATUS UPDATED OK";
    }

    public function indexAPI()
    {
        return Country::all();
    }

    public function showAPI($id)
    {
        return Country::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $country = new Country;
            $country->name = $request->name;
            $country->save();
            $object = $country;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $country = Country::findOrFail($id);
            $country->name = $request->name;
            $country->save();
            $object = $country;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $country = Country::findOrFail($id);
            $country->delete();
        });

        return response()->json(null, 204);
    }
}
