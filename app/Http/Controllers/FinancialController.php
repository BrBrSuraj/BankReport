<?php

namespace App\Http\Controllers;


use App\Models\Loan;
use App\Models\Customer;
use App\Models\Financial;

use Illuminate\Http\Request;


class FinancialController extends Controller
{
    // use DateTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan = Loan::select('id', 'user_id', 'amount', 'loanDate', 'sector', 'fiscalYear')->get();
        foreach ($loan as $loans) {
            Financial::firstOrCreate(['loan_id' => $loans->id], [
                'user_id' => $loans->user_id,
                'fiscalYear' => $loans->fiscalYear,
                'dueAmount' => $loans->amount,
                'startDate' => $loans->loanDate,
                'sector' => $loans->sector,
            ]);
        }
        if(auth()->user()->role_id!=2){
            $customer = Customer::with(['financial' => function ($query) {
                $query->orderByDesc('created_at');
            }])->where('user_id', auth()->user()->id)->paginate(10);
            return view('financial', compact('customer'));
        }else{
            $customer = Customer::with(['financial' => function ($query) {
                $query->orderByDesc('created_at');
            }])->paginate(10);

            return view('financial', compact('customer'));
        }


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
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financial $financial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial)
    {
        //
    }
}