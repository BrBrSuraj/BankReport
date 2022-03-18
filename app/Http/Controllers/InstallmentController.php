<?php

namespace App\Http\Controllers;


use App\Models\Fiscal;
use App\Models\Financial;


class InstallmentController extends Controller
{
    public function installmentCreate($id)
    {
        $fiscalYear = Fiscal::all();
        $financialDetails = Financial::where('id', $id)->select('sector', 'dueAmount', 'startDate')->first();
        return view('installmentcreate', \compact('id', 'fiscalYear', 'financialDetails'));
    }

}
