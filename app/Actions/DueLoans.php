<?php

namespace App\Actions;



use App\Models\Financial;

class DueLoans
{

    public function dueAmounts($fiscalYear)
    {
        $financialdue = Financial::where('fiscalYear', $fiscalYear)->select('sector', 'dueAmount')->get();

        $numberofdueLoanOnAgriBusiness       = $financialdue->where('sector', 'Agri Business')->where('dueAmount', !0)->count();
        $numberofdueLoanOnIndustrialBusiness = $financialdue->where('sector', 'Industrial Business')->where('dueAmount', !0)->count();
        $numberofdueLoanOnBusiness           = $financialdue->where('sector', 'Business')->where('dueAmount', !0)->count();
        $numberofdueLoanOnnForestEnvironment = $financialdue->where('sector', 'Forest & environment')->where('dueAmount', !0)->count();
        $numberofdueLoanOnWDCD               = $financialdue->where('sector', 'Women and Dalit community development')->where('dueAmount', !0)->count();
        $numberofdueLoanOnTourismIndustry    = $financialdue->where('sector', 'Tourism')->where('dueAmount', !0)->count();
        $numberofdueLoanOnGarbageBusiness    = $financialdue->where('sector', 'Garbage Business')->where('dueAmount', !0)->count();

        $numberOfDueAmount = [
            $numberofdueLoanOnAgriBusiness,
            $numberofdueLoanOnIndustrialBusiness,
            $numberofdueLoanOnBusiness,
            $numberofdueLoanOnnForestEnvironment,
            $numberofdueLoanOnWDCD,
            $numberofdueLoanOnTourismIndustry,
            $numberofdueLoanOnGarbageBusiness,
        ];

        $dueLoanOnAgriBusiness       = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Agri Business')->sum('dueAmount');
        $dueLoanOnIndustrialBusiness = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Industrial Business')->sum('dueAmount');
        $dueLoanOnBusiness           = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Business')->sum('dueAmount');
        $dueLoanOnnForestEnvironment = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Forest & environment')->sum('dueAmount');
        $dueLoanOnWDCD               = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Women and Dalit community development')->sum('dueAmount');
        $dueLoanOnTourismIndustry    = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Tourism')->sum('dueAmount');
        $dueLoanOnGarbageBusiness    = Financial::where('FiscalYear', $fiscalYear)->where('sector', 'Garbage Business')->sum('dueAmount');

        $dueLoanAmount = [
            $dueLoanOnAgriBusiness,
            $dueLoanOnIndustrialBusiness,
            $dueLoanOnBusiness,
            $dueLoanOnnForestEnvironment,
            $dueLoanOnWDCD,
            $dueLoanOnTourismIndustry,
            $dueLoanOnGarbageBusiness,
        ];
        return [$dueLoanAmount, $numberOfDueAmount];
    }
}