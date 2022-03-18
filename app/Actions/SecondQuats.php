<?php

namespace App\Actions;

use App\Models\Installment;
use App\Models\Loan;
use App\Traits\DateTrait;

class SecondQuats
{
    use DateTrait;
    public function secondQuats($fiscalYear)
    {

        $years = substr($fiscalYear, 0, strpos($fiscalYear, "-"));


        $secondquatLoan = Loan::select('amount', 'sector')->where('fiscalYear', $fiscalYear)->whereBetween('loanDate', [$years . '-07-01', $years . '-09-30'])->get();
        //   number of loan provided in 7 different sector
        $numberOfLoanOnAgriBusinessSecondQuatrial       = $secondquatLoan->where('sector', 'Agri Business')->count();
        $numberOfLoanOnIndustrialBusinessSecondQuatrial = $secondquatLoan->where('sector', 'Industrial Business')->count();
        $numberOfLoanOnBusinessSecondQuatrial           = $secondquatLoan->where('sector', 'Business')->count();
        $numberOfLoanOnnForestEnvironmentSecondQuatrial = $secondquatLoan->where('sector', 'Forest & environment')->count();
        $numberOfLoanOnWDCDSecondQuatrial               = $secondquatLoan->where('sector', 'Women and Dalit community development')->count();
        $numberOfLoanOnTourismIndustrySecondQuatrial    = $secondquatLoan->where('sector', 'Tourism')->count();
        $numberOfLoanOnGarbageBusinessSecondQuatrial    = $secondquatLoan->where('sector', 'Garbage Business')->count();

        $numberofloanOfSecondQuatrial = [
            $numberOfLoanOnAgriBusinessSecondQuatrial,
            $numberOfLoanOnIndustrialBusinessSecondQuatrial,
            $numberOfLoanOnBusinessSecondQuatrial,
            $numberOfLoanOnnForestEnvironmentSecondQuatrial,
            $numberOfLoanOnWDCDSecondQuatrial,
            $numberOfLoanOnTourismIndustrySecondQuatrial,
            $numberOfLoanOnGarbageBusinessSecondQuatrial,
        ];

        // provided  loan amount on different sector

        $totalLoanAmountOnAgriBusinessSecondQuatrial       = $secondquatLoan->where('sector', 'Agri Business')->sum('amount');
        $totalLoanAmountOnIndustrialBusinessSecondQuatrial = $secondquatLoan->where('sector', 'Industrial Business')->sum('amount');
        $totalLoanAmountOnBusinessSecondQuatrial           = $secondquatLoan->where('sector', 'Business')->sum('amount');
        $totalLoanAmountOnnForestEnvironmentSecondQuatrial = $secondquatLoan->where('sector', 'Forest & environment')->sum('amount');
        $totalLoanAmountOnWDCDSecondQuatrial               = $secondquatLoan->where('sector', 'Women and Dalit community development')->sum('amount');
        $totalLoanAmountOnTourismIndustrySecondQuatrial    = $secondquatLoan->where('sector', 'Tourism')->sum('amount');
        $totalLoanAmountOnGarbageBusinessSecondQuatrial    = $secondquatLoan->where('sector', 'Garbage Business')->sum('amount');

        $loanAmountOfsecondQuatrial = [
            $totalLoanAmountOnAgriBusinessSecondQuatrial,
            $totalLoanAmountOnIndustrialBusinessSecondQuatrial,
            $totalLoanAmountOnBusinessSecondQuatrial,
            $totalLoanAmountOnnForestEnvironmentSecondQuatrial,
            $totalLoanAmountOnWDCDSecondQuatrial,
            $totalLoanAmountOnTourismIndustrySecondQuatrial,
            $totalLoanAmountOnGarbageBusinessSecondQuatrial,
        ];

        $installment = Installment::where('FiscalYear', $fiscalYear)->whereBetween('installmentDate', [$years . '-07-01', $years . '-09-30'])->select('paidIntrest', 'sector')->get();

        $intrestOfSecondQuatOnAgriBusinessSecondQuatrial        = $installment->where('sector', 'Agri Business')->sum('paidIntrest');
        $intrestOfSecondQuatOnIndustrialBusinessSecondQuatrial  = $installment->where('sector', 'Industrial Business')->sum('ampaidIntrestount');
        $intrestOfSecondQuatOnBusinessSecondQuatrial            = $installment->where('sector', 'Business')->sum('paidIntrest');
        $intrestOfSecondQuatOnnForestEnvironmentSecondQuatrial  = $installment->where('sector', 'Forest & environment')->sum('paidIntrest');
        $intrestOfSecondQuatOnWDCDSecondQuatrial                = $installment->where('sector', 'Women and Dalit community development')->sum('paidIntrest');
        $intrestOfSecondQuatOnTourismIndustrySecondQuatrial     = $installment->where('sector', 'Tourism')->sum('paidIntrest');
        $intrestOfSecondQuatOnGarbageBusinessSecondQuatrial     = $installment->where('sector', 'Garbage Business')->sum('paidIntrest');


        $intrestAmountOfSecondQuatrial = [
            $intrestOfSecondQuatOnAgriBusinessSecondQuatrial,
            $intrestOfSecondQuatOnIndustrialBusinessSecondQuatrial,
            $intrestOfSecondQuatOnBusinessSecondQuatrial,
            $intrestOfSecondQuatOnnForestEnvironmentSecondQuatrial,
            $intrestOfSecondQuatOnWDCDSecondQuatrial,
            $intrestOfSecondQuatOnTourismIndustrySecondQuatrial,
            $intrestOfSecondQuatOnGarbageBusinessSecondQuatrial,
        ];
        return [$numberofloanOfSecondQuatrial, $loanAmountOfsecondQuatrial, $intrestAmountOfSecondQuatrial];

    }
}