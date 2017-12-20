<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EcProvince;
use Illuminate\Support\Facades\DB;

class EcProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');

        $provinces = EcProvince::where('name', 'LIKE', '%'.$name.'%')
                    ->paginate(20);

        return view('ec_provinces.index', compact(
            'name',
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
        return view('ec_provinces.create');
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
        ]);

        DB::transaction(function() use($request) {
            $province = new EcProvince;
            $province->name = $request->name;            
            $province->save();
        });

        return redirect('ec-province')->with('ok', 'ok');
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
        $province = EcProvince::findOrFail($id);

        return view('ec_provinces.edit', compact(            
            'province'
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
        ]);

        DB::transaction(function() use($request, $id) {
            $province = EcProvince::findOrFail($id);
            $province->name = $request->name;            
            $province->save();
        });

        return redirect('ec-province')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = EcProvince::findOrFail($id);
        if($province->cities()->count() > 0)
            return redirect('ec-province')->with('error', 'error');

        DB::transaction(function() use($province) {            
            $province->delete();
        });

        return redirect('ec-province')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $province = EcProvince::findOrFail($id);
            $province->status = $status;
            $province->save();
        });

        return "STATUS UPDATED OK";
    }
}
