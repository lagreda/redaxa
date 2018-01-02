<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Illuminate\Support\Facades\DB;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        
        $languages = Language::where('name', 'LIKE', '%'.$name.'%')
                        ->paginate(20);

        return view('languages.index', compact(
            'name',
            'languages'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
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
            $language = new Language;
            $language->name = $request->name;
            $language->save();
        });

        return redirect('language')->with('ok', 'ok');
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
        $language = Language::findOrFail($id);

        return view('languages.edit', compact('language'));
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
            $language = Language::findOrFail($id);
            $language->name = $request->name;
            $language->save();
        });

        return redirect('language')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $language = Language::findOrFail($id);
        if($language->studentLanguages->count() > 0)
            return redirect('language')->with('error', 'error');

        DB::transaction(function() use($language) {
            $language->delete();            
        });

        return redirect('language')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $language = Language::findOrFail($id);
            $language->status = $status;
            $language->save();
        });

        return "STATUS UPDATED OK";
    }


    public function indexAPI()
    {
        return Language::all();
    }

    public function showAPI($id)
    {
        return Language::findOrFail($id);
    }

    public function storeAPI(Request $request)
    {
        $object = null;

        DB::transaction(function() use($request, &$object) {
            $language = new Language;
            $language->name = $request->name;
            $language->save();
            $object = $language;
        });

        if($object != null)
            return response()->json($object, 201);
    }

    public function updateAPI($id, Request $request)
    {
        $object = null;

        DB::transaction(function() use($id, $request, &$object) {
            $language = Language::findOrFail($id);
            $language->name = $request->name;
            $language->save();
            $object = $language;
        });

        if($object != null)
            return response()->json($object, 200);
    }

    public function deleteAPI($id)
    {
        DB::transaction(function() use($id) {
            $language = Language::findOrFail($id);
            $language->delete();
        });

        return response()->json(null, 204);
    }
}
