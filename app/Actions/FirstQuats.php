<?php

namespace App\Actions;

use App\Models\Installment;
use App\Models\Loan;
use App\Traits\DateTrait;


class FirstQuats
{
    use DateTrait;

    public function firstQuats($fiscalYear)
    {
        $years = substr($fiscalYear, 0, strpos($fiscalYear, "-"));

        $firstquatLoan = Loan::select('amount', 'sector')->where('fiscalYear', $fiscalYear)->whereBetween('loanDate', [$years . '-04-01', $years . '-06-30'])->get();

        //   number of loan provided in 7 different sector
        $numberOfLoanOnAgriBusinessFirstQuatrial        = $firstquatLoan->where('sector', 'Agri Business')->count();
        $numberOfLoanOnIndustrialBusinessFirstQuatrial = $firstquatLoan->where('sector', 'Industrial Business')->count();
        $numberOfLoanOnBusinessFirstQuatrial           = $firstquatLoan->where('sector', 'Business')->count();
        $numberOfLoanOnForestEnvironmentFirstQuatrial  = $firstquatLoan->where('sector', 'Forest & environment')->count();
        $numberOfLoanOnWDCDThirdQuatrial               = $firstquatLoan->where('sector', 'Women and Dalit community development')->count();
        $numberOfLoanOnTourismIndustryFirstQuatrial    = $firstquatLoan->where('sector', 'Tourism')->count();
        $numberOfLoanOnGarbageBusinessFirstQuatrial    = $firstquatLoan->where('sector', 'Garbage Business')->count();

        $numberofloanOfFirstQuatrial = [
            $numberOfLoanOnAgriBusinessFirstQuatrial,
            $numberOfLoanOnIndustrialBusinessFirstQuatrial,
            $numberOfLoanOnBusinessFirstQuatrial,
            $numberOfLoanOnForestEnvironmentFirstQuatrial,
            $numberOfLoanOnWDCDThirdQuatrial,
            $numberOfLoanOnTourismIndustryFirstQuatrial,
            $numberOfLoanOnGarbageBusinessFirstQuatrial,
        ];

        // provided  loan amount on different sector

        $totalLoanAmountOnAgriBusinessFirstQuatrial       = $firstquatLoan->where('sector', 'Agri Business')->sum('amount');
        $totalLoanAmountOnIndustrialBusinessFirstQuatrial = $firstquatLoan->where('sector', 'Industrial Business')->sum('amount');
        $totalLoanAmountOnBusinessFirstQuatrial           = $firstquatLoan->where('sector', 'Business')->sum('amount');
        $totalLoanAmountOnnForestEnvironmentFirstQuatrial = $firstquatLoan->where('sector', 'Forest & environment')->sum('amount');
        $totalLoanAmountOnWDCDFirstQuatrial               = $firstquatLoan->where('sector', 'Women and Dalit community development')->sum('amount');
        $totalLoanAmountOnTourismIndustryFirstQuatrial    = $firstquatLoan->where('sector', 'Tourism')->sum('amount');
        $totalLoanAmountOnGarbageBusinessFirstQuatrial    = $firstquatLoan->where('sector', 'Garbage Business')->sum('amount');

        $loanAmountOfFirstQuatrial = [
            $totalLoanAmountOnAgriBusinessFirstQuatrial,
            $totalLoanAmountOnIndustrialBusinessFirstQuatrial,
            $totalLoanAmountOnBusinessFirstQuatrial,
            $totalLoanAmountOnnForestEnvironmentFirstQuatrial,
            $totalLoanAmountOnWDCDFirstQuatrial,
            $totalLoanAmountOnTourismIndustryFirstQuatrial,
            $totalLoanAmountOnGarbageBusinessFirstQuatrial,
        ];

        $installment = Installment::where('FiscalYear', $fiscalYear)->whereBetween('installmentDate', [$years . '-04-01', $years . '-06-30'])->select('paidIntrest', 'sector')->get();

        $intrestOfFirstQuatOnAgriBusinessSecondQuatrial       = $installment->where('sector', 'Agri Business')->sum('paidIntrest');
        $intrestOfFirstQuatOnIndustrialBusinessSecondQuatrial = $installment->where('sector', 'Industrial Business')->sum('paidIntrest');
        $intrestOfFirstQuatOnBusinessSecondQuatrial           = $installment->where('sector', 'Business')->sum('paidIntrest');
        $intrestOfFirstQuatOnnForestEnvironmentSecondQuatrial = $installment->where('sector', 'Forest & environment')->sum('paidIntrest');
        $intrestOfFirstQuatOnWDCDSecondQuatrial               = $installment->where('sector', 'Women and Dalit community development')->sum('paidIntrest');
        $intrestOfFirstQuatOnTourismIndustrySecondQuatrial    = $installment->where('sector', 'Tourism')->sum('paidIntrest');
        $intrestOfFirstQuatOnGarbageBusinessSecondQuatrial    = $installment->where('sector', 'Garbage Business')->sum('paidIntrest');

        $intrestAmountOfFirstQuatrial = [
            $intrestOfFirstQuatOnAgriBusinessSecondQuatrial,
            $intrestOfFirstQuatOnIndustrialBusinessSecondQuatrial,
            $intrestOfFirstQuatOnBusinessSecondQuatrial,
            $intrestOfFirstQuatOnnForestEnvironmentSecondQuatrial,
            $intrestOfFirstQuatOnWDCDSecondQuatrial,
            $intrestOfFirstQuatOnTourismIndustrySecondQuatrial,
            $intrestOfFirstQuatOnGarbageBusinessSecondQuatrial,
        ];

        return [$numberofloanOfFirstQuatrial, $loanAmountOfFirstQuatrial, $intrestAmountOfFirstQuatrial];
    }
}