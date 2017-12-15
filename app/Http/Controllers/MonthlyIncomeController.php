<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonthlyIncome;
use Illuminate\Support\Facades\DB;

class MonthlyIncomeController extends Controller
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
        $income = $request->input('income', '');
        
        $monthly_incomes = MonthlyIncome::where('income', 'LIKE', '%'.$income.'%')                        
                        ->paginate(20);

        return view('monthly_incomes.index', compact(
            'income',
            'monthly_incomes'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthly_incomes.create');
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
            'income' => 'required'
        ]);

        DB::transaction(function() use($request) {
            $monthly_income = new MonthlyIncome;
            $monthly_income->income = $request->income;
            $monthly_income->save();
        });

        return redirect('monthly-income')->with('ok', 'ok');
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
        $monthly_income = MonthlyIncome::findOrFail($id);

        return view('monthly_incomes.edit', compact('monthly_income'));
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
            'income' => 'required'
        ]);

        DB::transaction(function() use($request, $id) {
            $monthly_income = MonthlyIncome::findOrFail($id);
            $monthly_income->income = $request->income;
            $monthly_income->save();
        });

        return redirect('monthly-income')->with('ok', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monthly_income = MonthlyIncome::findOrFail($id);
        if($monthly_income->workHistories->count() > 0)
            return redirect('monthly-income')->with('error', 'error');
        
        DB::transaction(function() use($monthly_income) {
            $monthly_income->delete();            
        });

        return redirect('monthly-income')->with('ok', 'ok');
    }

    public function updateStatus($id, $status)
    {
        DB::transaction(function() use($id, $status) {
            $monthly_income = MonthlyIncome::findOrFail($id);
            $monthly_income->status = $status;
            $monthly_income->save();
        });

        return "STATUS UPDATED OK";
    }
}
