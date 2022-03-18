<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Imports\LoanImport;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Catch_;

class ImportController extends Controller
{
    public function cimport(Request $request)
    {
        try{
            Excel::import(new CustomerImport, request()->file('customerimport'));
            return \redirect()->route('costumer.index')->withMessage('Customer records imported Successfully.');
        }catch(\Exception $ex){
            return \redirect()->route('costumer.index')->withMessage('Something went Wrong. unable to import');
        }
       
    }

    public function loanimport(Request $request)
    {
        try {
            Excel::import(new LoanImport, request()->file('loanimport'));
            return \redirect()->route('loan.index')->withMessage('Loan records imported Successfully.');
        } catch (\Exception $ex) {
            return \redirect()->route('loan.index')->withMessage('Something went Wrong. unable to import');
        }
    }
}