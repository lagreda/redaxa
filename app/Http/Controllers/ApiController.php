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
}
