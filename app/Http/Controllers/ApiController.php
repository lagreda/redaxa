<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function businessArea()
    {
        return view('api.business_area');
    }

    public function workingArea()
    {
        return view('api.working_area');
    }

    public function ecCity()
    {
        return view('api.ec_city');
    }

    public function civilStatus()
    {
        return view('api.civil_status');
    }

    public function gender()
    {
        return view('api.gender');
    }

    public function ethnicGroup()
    {
        return view('api.ethnic_group');
    }

    public function language()
    {
        return view('api.language');
    }

    public function monthlyIncome()
    {
        return view('api.monthly_income');
    }

    public function academicLevel()
    {
        return view('api.academic_level');
    }

    public function country()
    {
        return view('api.country');
    }

    public function jobPosition()
    {
        return view('api.job_position');
    }

    public function program()
    {
        return view('api.program');
    }

    public function ecProvince()
    {
        return view('api.ec_province');
    }

    public function programType()
    {
        return view('api.program_type');
    }

    public function bloodType()
    {
        return view('api.blood_type');
    }
}
