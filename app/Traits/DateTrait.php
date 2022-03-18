<?php

namespace App\Traits;

use Carbon\Carbon;
use Nilambar\NepaliDate\NepaliDate;



trait DateTrait
{
 public function getEnglishDate($date)
 {
$nepaliDate          = new NepaliDate();
$dates = Carbon::create($date); //create carbon type data coming from parameterm $date as $dates
$beforeConvertYear    = Carbon::parse($dates)->year; //extreact the year from date
$beforeConvertMonth   = Carbon::parse($dates)->month; //extreact the month from date
$beforeConvertDay = Carbon::parse($dates)->day; //extreact the day from date

$convertedDate = $nepaliDate->convertBsToAd($beforeConvertYear, $beforeConvertMonth, $beforeConvertDay); //convert BS to AD

//  getting converted year month day seperatly
$year    = $convertedDate['year'];
$month  = $convertedDate['month'];
$day      = $convertedDate['day'];

// getting carbon type year month day
$newyear  = Carbon::parse($year . '-' . $month . '-' . $day)->year;
$newmonth = Carbon::parse($year . '-' . $month . '-' . $day)->month;
$newday   = Carbon::parse($year . '-' . $month . '-' . $day)->day;

// complete carbon type english date
$englishDate = Carbon::createFromDate($newyear, $newmonth, $newday);
return $englishDate;
 }

// ___________________________________________________________________________

 public function getNepalihDate($date)
 {
$englishDate          = new NepaliDate();
//$dates = Carbon::create($date); //create carbon type data coming from parameterm $date as $dates
$beforeConvertYear    = Carbon::parse($date)->year; //extreact the year from date
$beforeConvertMonth   = Carbon::parse($date)->month; //extreact the month from date
$beforeConvertDay = Carbon::parse($date)->day; //extreact the day from date

$convertedDate = $englishDate->convertAdToBs($beforeConvertYear, $beforeConvertMonth, $beforeConvertDay); //convert Ad to Bs

//  getting converted year month day seperatly
$year  = $date->year  = $convertedDate['year'];
$month = $date->year = $convertedDate['month'];
$day   = $date->year   = $convertedDate['day'];

// getting carbon type year month day
$newyear  = Carbon::parse($year . '-' . $month . '-' . $day)->year;
$newmonth = Carbon::parse($year . '-' . $month . '-' . $day)->month;
$newday   = Carbon::parse($year . '-' . $month . '-' . $day)->day;

// complete carbon type english date
$NepaliDate = Carbon::createFromDate($newyear, $newmonth, $newday);
return $NepaliDate;
 }

 public function getTodayInNepali(){
$today=Carbon::today();
return $this->getNepalihDate($today);
 }

 public function yearPart(){
$today  = Carbon::today();
$todays = $this->getNepalihDate($today);
$years=strval(Carbon::parse($todays)->year);
return $years;

 }

  function nepNumToEnglishNum($number){
     $nepaliNumber = array(
            '०', '१', '२', '३', '४', '५', '६', '७', '८', '९'
        );

         $englishNumber = array(
            '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        );
       
        return str_replace($nepaliNumber, $englishNumber, $number);
    }


}