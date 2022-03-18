<?php

namespace App\Actions;

use App\Models\Installment;
use App\Models\Loan;
use App\Traits\DateTrait;

class ThirdQuats
{
    use DateTrait;
    public function thirdQuats($fiscalYear)
    {
        $years = substr($fiscalYear, 0, strpos($fiscalYear, "-"));

        $thirdquatLoan = Loan::select('amount', 'sector')->where('fiscalYear', $fiscalYear)->whereBetween('loanDate', [$years . '-10-01', $years . '-12-30'])->get();
        //   number of loan provided in 7 different sector
        $numberOfLoanOnAgriBusinessThirdQuatrial       = $thirdquatLoan->where('sector', 'Agri Business')->count();
        $numberOfLoanOnIndustrialBusinessThirdQuatrial = $thirdquatLoan->where('sector', 'Industrial Business')->count();
        $numberOfLoanOnBusinessThirdQuatrial           = $thirdquatLoan->where('sector', 'Business')->count();
        $numberOfLoanOnForestEnvironmentThirdQuatrial  = $thirdquatLoan->where('sector', 'Forest & environment')->count();
        $numberOfLoanOnWDCDThirdQuatrial               = $thirdquatLoan->where('sector', 'Women and Dalit community development')->count();
        $numberOfLoanOnTourismIndustryThirdQuatrial    = $thirdquatLoan->where('sector', 'Tourism')->count();
        $numberOfLoanOnGarbageBusinessThirdQuatrial    = $thirdquatLoan->where('sector', 'Garbage Business')->count();

        $numberofloanOfThirdQuatrial = [
            $numberOfLoanOnAgriBusinessThirdQuatrial,
            $numberOfLoanOnIndustrialBusinessThirdQuatrial,
            $numberOfLoanOnBusinessThirdQuatrial,
            $numberOfLoanOnForestEnvironmentThirdQuatrial,
            $numberOfLoanOnWDCDThirdQuatrial,
            $numberOfLoanOnTourismIndustryThirdQuatrial,
            $numberOfLoanOnGarbageBusinessThirdQuatrial,
        ];

        // provided  loan amount on different sector

        $totalLoanAmountOnAgriBusinessThirdQuatrial       = $thirdquatLoan->where('sector', 'Agri Business')->sum('amount');
        $totalLoanAmountOnIndustrialBusinessThirdQuatrial = $thirdquatLoan->where('sector', 'Industrial Business')->sum('amount');
        $totalLoanAmountOnBusinessThirdQuatrial           = $thirdquatLoan->where('sector', 'Business')->sum('amount');
        $totalLoanAmountOnnForestEnvironmentThirdQuatrial = $thirdquatLoan->where('sector', 'Forest & environment')->sum('amount');
        $totalLoanAmountOnWDCDThirdQuatrial               = $thirdquatLoan->where('sector', 'Women and Dalit community development')->sum('amount');
        $totalLoanAmountOnTourismIndustryThirdQuatrial    = $thirdquatLoan->where('sector', 'Tourism')->sum('amount');
        $totalLoanAmountOnGarbageBusinessThirdQuatrial    = $thirdquatLoan->where('sector', 'Garbage Business')->sum('amount');

        $loanAmountOfThirdQuatrial = [
            $totalLoanAmountOnAgriBusinessThirdQuatrial,
            $totalLoanAmountOnIndustrialBusinessThirdQuatrial,
            $totalLoanAmountOnBusinessThirdQuatrial,
            $totalLoanAmountOnnForestEnvironmentThirdQuatrial,
            $totalLoanAmountOnWDCDThirdQuatrial,
            $totalLoanAmountOnTourismIndustryThirdQuatrial,
            $totalLoanAmountOnGarbageBusinessThirdQuatrial,
        ];

        $installment = Installment::where('FiscalYear', $fiscalYear)->whereBetween('installmentDate', [$years . '-10-01', $years . '-12-30'])->select('paidIntrest','sector')->get();

        $intrestAmountOfThirdQuatOnAgriBusinessThirdQuatrial       = $installment->where('sector', 'Agri Business')->sum('paidIntrest');
        $intrestAmountOfThirdQuatOnIndustrialBusinessThirdQuatrial = $installment->where('sector', 'Industrial Business')->sum('paidIntrest');
        $intrestAmountOfThirdQuatOnBusinessThirdQuatrial           = $installment->where('sector', 'Business')->sum('paidIntrest');
        $intrestAmountOfThirdQuatOnnForestEnvironmentThirdQuatrial = $installment->where('sector', 'Forest & environment')->sum('paidIntrest');
        $intrestAmountOfThirdQuatOnWDCDThirdQuatrial               = $installment->where('sector', 'Women and Dalit community development')->sum('paidIntrest');
        $intrestAmountOfThirdQuatOnTourismIndustryThirdQuatrial    = $installment->where('sector', 'Tourism')->sum('paidIntrest');
        $intrestAmountOfThirdQuatOnGarbageBusinessThirdQuatrial    = $installment->where('sector', 'Garbage Business')->sum('paidIntrest');

        $intrestAmountOfThirdQuatrial = [
            $intrestAmountOfThirdQuatOnAgriBusinessThirdQuatrial,
            $intrestAmountOfThirdQuatOnIndustrialBusinessThirdQuatrial,
            $intrestAmountOfThirdQuatOnBusinessThirdQuatrial,
            $intrestAmountOfThirdQuatOnnForestEnvironmentThirdQuatrial,
            $intrestAmountOfThirdQuatOnWDCDThirdQuatrial,
            $intrestAmountOfThirdQuatOnTourismIndustryThirdQuatrial,
            $intrestAmountOfThirdQuatOnGarbageBusinessThirdQuatrial,
        ];

        return [$numberofloanOfThirdQuatrial, $loanAmountOfThirdQuatrial, $intrestAmountOfThirdQuatrial];
    }
}