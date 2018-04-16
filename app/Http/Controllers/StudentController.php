<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Program;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $definition = $request->input('definition', '');
        $program_id = $request->input('program_id', '');
        if($program_id == "")
            $program_id = "%%";
        $program_group = $request->input('program_group', '');

        $students = Student::where('program_id', 'LIKE', $program_id)
            ->where('program_group', 'LIKE', '%'.$program_group.'%')
            ->where(function($query) use($definition) {
                $query->where('legal_id', 'LIKE', '%'.$definition.'%')
                    ->orWhere('name', 'LIKE', '%'.$definition.'%')
                    ->orWhere('surname', 'LIKE', '%'.$definition.'%');
            })
            ->paginate(20);

        $programs = Program::where('status', '=', '1')->get();

        return view('students.index', compact(
            'definition',
            'students',
            'programs',
            'program_id',
            'program_group'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
