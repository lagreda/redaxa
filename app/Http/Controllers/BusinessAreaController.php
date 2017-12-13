<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessArea;
use Illuminate\Support\Facades\DB;

class BusinessAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $business_areas = BusinessArea::where('name', 'LIKE', '%'.$name.'%')                        
                        ->paginate(20);

        return view('business_areas.index', compact(
            'name',
            'business_areas'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business_areas.create');
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
            $business_area = new BusinessArea;
            $business_area->name = $request->name;
            $business_area->save();
        });

        return redirect('business-area')->with('ok', 'ok');
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
        $business_area = BusinessArea::findOrFail($id);

        return view('business_areas.edit', compact('business_area'));
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
            $business_area = BusinessArea::findOrFail($id);
            $business_area->name = $request->name;
            $business_area->save();
        });

        return redirect('business-area')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business_area = BusinessArea::findOrFail($id);
        if($business_area->workHistories->count() > 0)
            return redirect('business-area')->with('error', 'error');
        
        DB::transaction(function() use($business_area) {
            $business_area->delete();            
        });

        return redirect('business-area')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $business_area = BusinessArea::findOrFail($id);
            $business_area->status = $status;
            $business_area->save();
        });

        return "STATUS UPDATED OK";
    }    
}
