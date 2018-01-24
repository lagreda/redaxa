<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function mobility()
    {
        return view('reports/mobility');
    }

    public function finalEfficiency()
    {
        return view('reports/final_efficiency');
    }
}
