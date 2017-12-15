<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function businessArea()
    {
        return view('api.business_area');
    }
}
