<?php

namespace App\Actions;

use App\Models\Financial;
use App\Models\Loan;

class AnualReports
{

  public function anuals()
  {

        $loan = Loan::select('amount', 'sector')->get();
        $financial = Financial::select('sector', 'paidIntrestAmount')->get();

        //   number of loan provided in 7 different sector

        $numberOfLoanOnAgriBusiness       = $loan->where('sector', 'Agri Business')->count();
        $numberOfLoanOnIndustrialBusiness = $loan->where('sector', 'Industrial Business')->count();
        $numberOfLoanOnBusiness           = $loan->where('sector', 'Business')->count();
        $numberOfLoanOnForestEnvironment  = $loan->where('sector', 'Forest & environment')->count();
        $numberOfLoanOnWDCD               = $loan->where('sector', 'Women and Dalit community development')->count();
        $numberOfLoanOnTourismIndustry    = $loan->where('sector', 'Tourism')->count();
        $numberOfLoanOnGarbageBusiness    = $loan->where('sector', 'Garbage Business')->count();

        $numberofloan = [
            $numberOfLoanOnAgriBusiness,
            $numberOfLoanOnIndustrialBusiness,
            $numberOfLoanOnBusiness,
            $numberOfLoanOnForestEnvironment,
            $numberOfLoanOnWDCD,
            $numberOfLoanOnTourismIndustry,
            $numberOfLoanOnGarbageBusiness,
        ];

        // provided  loan amount on different sector
        $totalLoanAmountOnAgriBusiness       = $loan->where('sector', 'Agri Business')->sum('amount');
        $totalLoanAmountOnIndustrialBusiness = $loan->where('sector', 'Industrial Business')->sum('amount');
        $totalLoanAmountOnBusiness           = $loan->where('sector', 'Business')->sum('amount');
        $totalLoanAmountOnnForestEnvironment = $loan->where('sector', 'Forest & environment')->sum('amount');
        $totalLoanAmountOnWDCD               = $loan->where('sector', 'Women and Dalit community development')->sum('amount');
        $totalLoanAmountOnTourismIndustry    = $loan->where('sector', 'Tourism')->sum('amount');
        $totalLoanAmountOnGarbageBusiness    = $loan->where('sector', 'Garbage Business')->sum('amount');

        $loanAmount = [
            $totalLoanAmountOnAgriBusiness,
            $totalLoanAmountOnIndustrialBusiness,
            $totalLoanAmountOnBusiness,
            $totalLoanAmountOnnForestEnvironment,
            $totalLoanAmountOnWDCD,
            $totalLoanAmountOnTourismIndustry,
            $totalLoanAmountOnGarbageBusiness,
        ];

        // total intrest  provided in 7 different sector


        $totalIntrestOnAgriBusiness       = $financial->where('sector', 'Agri Business')->sum('paidIntrestAmount');
        $totalIntrestOnIndustrialBusiness = $financial->where('sector', 'Industrial Business')->sum('paidIntrestAmount');
        $totalIntrestOnBusiness           = $financial->where('sector', 'Business')->sum('paidIntrestAmount');
        $totalIntrestOnnForestEnvironment = $financial->where('sector', 'Forest & environment')->sum('paidIntrestAmount');
        $totalIntrestOnWDCD               = $financial->where('sector', 'Women and Dalit community development')->sum('paidIntrestAmount');
        $totalIntrestOnTourismIndustry    = $financial->where('sector', 'Tourism')->sum('paidIntrestAmount');
        $totalIntrestOnGarbageBusiness    = $financial->where('sector', 'Garbage Business')->sum('paidIntrestAmount');

        $intrest = [
            $totalIntrestOnAgriBusiness,
            $totalIntrestOnIndustrialBusiness,
            $totalIntrestOnBusiness,
            $totalIntrestOnnForestEnvironment,
            $totalIntrestOnWDCD,
            $totalIntrestOnTourismIndustry,
            $totalIntrestOnGarbageBusiness,
        ];


        return [$numberofloan, $loanAmount, $intrest];
  }
}