<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EcCity;
use App\EcProvince;
use Illuminate\Support\Facades\DB;

class EcCityController extends Controller
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
        $ec_province_id = $request->input('ec_province_id', '');
        if($ec_province_id == "")
            $ec_province_id = "%%";

        $cities = EcCity::with('province')
                ->where('name', 'LIKE', '%'.$name.'%')
                ->where('ec_province_id', 'LIKE', $ec_province_id)
                ->paginate(20);

        $provinces = EcProvince::where('status', '1')->get();

        return view('ec_cities.index', compact(
            'name',
            'ec_province_id',
            'cities',
            'provinces'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = EcProvince::where('status', '1')->get();

        return view('ec_cities.create', compact('provinces'));
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
            'ec_province_id' => 'required|exists:ec_provinces,id',
        ]);

        DB::transaction(function() use($request) {
            $province = EcProvince::findOrFail($request->ec_province_id);

            $city = new EcCity;
            $city->name = $request->name;
            $city->ec_province_id = $province->id;
            $city->save();
        });

        return redirect('ec-city')->with('ok', 'ok');
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
        $city = EcCity::findOrFail($id);

        $provinces = EcProvince::where('status', '1')->get();
        
        return view('ec_cities.edit', compact(
            'city',
            'provinces'
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
            'ec_province_id' => 'required|exists:ec_provinces,id',
        ]);

        DB::transaction(function() use($request, $id) {
            $province = EcProvince::findOrFail($request->ec_province_id);

            $city = EcCity::findOrFail($id);
            $city->name = $request->name;
            $city->ec_province_id = $province->id;
            $city->save();
        });

        return redirect('ec-city')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $city = EcCity::findOrFail($id);
            $city->status = $status;
            $city->save();
        });

        return "STATUS UPDATED OK";
    }
}
