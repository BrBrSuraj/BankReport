<?php

namespace App\Actions;

use App\Models\Loan;
use App\Models\Installment;
use App\Traits\DateTrait;

class ForthQuats
{
    use DateTrait;
    public function forthQuats($fiscalYear)
    {
        $yr = substr($fiscalYear, 0, strpos($fiscalYear, "-"));
        $years = intval($yr); //convert to integer
        $newYear = $years + 1;
        $year = strval($newYear);
        $forthquatLoan = Loan::where('fiscalyear', $fiscalYear)->select('amount', 'sector')->whereBetween('loanDate', [$year . '-01-01', $year . '-03-30'])->get();

        //   number of loan provided in 7 different sector
        $numberOfLoanOnAgriBusinessForthQuatrial       = $forthquatLoan->where('sector', 'Agri Business')->count();
        $numberOfLoanOnIndustrialBusinessForthQuatrial = $forthquatLoan->where('sector', 'Industrial Business')->count();
        $numberOfLoanOnBusinessForthQuatrial           = $forthquatLoan->where('sector', 'Business')->count();
        $numberOfLoanOnForestEnvironmentForthdQuatrial = $forthquatLoan->where('sector', 'Forest & environment')->count();
        $numberOfLoanOnWDCDForthQuatrial               = $forthquatLoan->where('sector', 'Women and Dalit community development')->count();
        $numberOfLoanOnTourismIndustryForthQuatrial    = $forthquatLoan->where('sector', 'Tourism ')->count();
        $numberOfLoanOnGarbageBusinessForthQuatrial    = $forthquatLoan->where('sector', 'Garbage Business')->count();

        $numberofloanOfForthQuatrial = [
            $numberOfLoanOnAgriBusinessForthQuatrial,
            $numberOfLoanOnIndustrialBusinessForthQuatrial,
            $numberOfLoanOnBusinessForthQuatrial,
            $numberOfLoanOnForestEnvironmentForthdQuatrial,
            $numberOfLoanOnWDCDForthQuatrial,
            $numberOfLoanOnTourismIndustryForthQuatrial,
            $numberOfLoanOnGarbageBusinessForthQuatrial,
        ];

        // provided  loan amount on different sector

        $totalLoanAmountOnAgriBusinessForthQuatrial       = $forthquatLoan->where('sector', 'Agri Business')->sum('amount');
        $totalLoanAmountOnIndustrialBusinessForthQuatrial = $forthquatLoan->where('sector', 'Industrial Business')->sum('amount');
        $totalLoanAmountOnBusinessForthQuatrial           = $forthquatLoan->where('sector', 'Business')->sum('amount');
        $totalLoanAmountOnForestEnvironmentForthdQuatrial = $forthquatLoan->where('sector', 'Forest & environment')->sum('amount');
        $totalLoanAmountOnWDCDForthQuatrial               = $forthquatLoan->where('sector', 'Women and Dalit community development')->sum('amount');
        $totalLoanAmountOnTourismIndustryForthQuatrial    = $forthquatLoan->where('sector', 'Tourism ')->sum('amount');
        $totalLoanAmountOnGarbageBusinessForthQuatrial    = $forthquatLoan->where('sector', 'Garbage Business')->sum('amount');

        $loanAmountOfForthQuatrial = [
            $totalLoanAmountOnAgriBusinessForthQuatrial,
            $totalLoanAmountOnIndustrialBusinessForthQuatrial,
            $totalLoanAmountOnBusinessForthQuatrial,
            $totalLoanAmountOnForestEnvironmentForthdQuatrial,
            $totalLoanAmountOnWDCDForthQuatrial,
            $totalLoanAmountOnTourismIndustryForthQuatrial,
            $totalLoanAmountOnGarbageBusinessForthQuatrial,
        ];
        $installment = Installment::where('FiscalYear', $fiscalYear)->whereBetween('installmentDate', [$yr . '-01-01', $yr . '-03-30'])->select('paidIntrest', 'sector')->get();

        $intrestAmountOfForthQuatOnAgriBusinessThirdQuatrial       = $installment->where('sector', 'Agri Business')->sum('paidIntrest');
        $intrestAmountOfForthQuatOnIndustrialBusinessThirdQuatrial = $installment->where('sector', 'Industrial Business')->sum('paidIntrest');
        $intrestAmountOfForthQuatOnBusinessThirdQuatrial           = $installment->where('sector', 'Business')->sum('paidIntrest');
        $intrestAmountOfForthQuatOnnForestEnvironmentThirdQuatrial = $installment->where('sector', 'Forest & environment')->sum('paidIntrest');
        $intrestAmountOfForthQuatOnWDCDThirdQuatrial               = $installment->where('sector', 'Women and Dalit community development')->sum('paidIntrest');
        $intrestAmountOfForthQuatOnTourismIndustryThirdQuatrial    = $installment->where('sector', 'Tourism')->sum('paidIntrest');
        $intrestAmountOfForthQuatOnGarbageBusinessThirdQuatrial    = $installment->where('sector', 'Garbage Business')->sum('paidIntrest');


        $intrestAmountOfForthQuatrial = [
            $intrestAmountOfForthQuatOnAgriBusinessThirdQuatrial,
            $intrestAmountOfForthQuatOnIndustrialBusinessThirdQuatrial,
            $intrestAmountOfForthQuatOnBusinessThirdQuatrial,
            $intrestAmountOfForthQuatOnnForestEnvironmentThirdQuatrial,
            $intrestAmountOfForthQuatOnWDCDThirdQuatrial,
            $intrestAmountOfForthQuatOnTourismIndustryThirdQuatrial,
            $intrestAmountOfForthQuatOnGarbageBusinessThirdQuatrial,
        ];

        return [$numberofloanOfForthQuatrial, $loanAmountOfForthQuatrial, $intrestAmountOfForthQuatrial];
    }
}