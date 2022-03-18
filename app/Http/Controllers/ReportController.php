<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fiscal;
use App\Models\Sector;
use App\Actions\DueLoans;
use App\Traits\DateTrait;
use App\Actions\FirstQuats;
use App\Actions\ForthQuats;
use App\Actions\ThirdQuats;
use App\Actions\SecondQuats;
use Illuminate\Http\Request;
use App\Actions\AnualReports;

class ReportController extends Controller
{
    use DateTrait;
    public function report()
    {
        $fiscalyear = Fiscal::select('fiscalYear')->get();
        $sector = Sector::select('sector')->get();
        return view('report', compact('fiscalyear', 'sector'));
    }

    public function loanreport(Request $request)
    {
        $fiscalYear = $request->input('fiscal');
        $fiscalyear = Fiscal::select('fiscalYear')->get();
        $sector = Sector::select('sector','sector_'.app()->getLocale())->get();

        $previousQuater = [
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 0],
        ];

        $anualReport  = new AnualReports;
        $firstQuat    = new FirstQuats;
        $secondQuat   = new SecondQuats;
        $thirdQuat    = new ThirdQuats;
        $forthQuat    = new ForthQuats;
        $dueLoan      = new DueLoans;

        $anualReportData    = $anualReport->anuals();

        $anualNumberOfLoan  = $anualReportData[0];
        $anualLoanAmount    = $anualReportData[1];
        $anualIntrestAmount = $anualReportData[2];

        $dueAmountData   = $dueLoan->dueAmounts($fiscalYear);
        $numberOfDueLoan = $dueAmountData[1];
        $dueLoanAmount   = $dueAmountData[0];

        $firstQuatData  = $firstQuat->firstQuats($fiscalYear);
        $secondQuatData = $secondQuat->secondQuats($fiscalYear);
        $thirdQuatData  = $thirdQuat->thirdQuats($fiscalYear);
        $forthQuatData  = $forthQuat->forthQuats($fiscalYear);
        $today       = Carbon::today();
        $nepaliToday = $this->getNepalihDate($today);
        $month       = Carbon::parse($nepaliToday)->month;

        if ($month == 4 || $month == 5 || $month == 6) {
            $previousNumberOfLoan  = $previousQuater[0];
            $previousLoanAmount    = $previousQuater[1];
            $previousIntrestAmount = $previousQuater[2];
            $currentNumberOfLoan  = $firstQuatData[0];
            $currentLoanAmount    = $firstQuatData[1];
            $currentIntrestAmount = $firstQuatData[2];

            return view(
                'loanreport',
                compact(
                    'fiscalYear',
                    'fiscalyear',
                    'sector',
                    'previousNumberOfLoan',
                    'previousLoanAmount',
                    'previousIntrestAmount',
                    'currentNumberOfLoan',
                    'currentLoanAmount',
                    'currentIntrestAmount',
                    'numberOfDueLoan',
                    'dueLoanAmount',
                    'anualNumberOfLoan',
                    'anualLoanAmount',
                    'anualIntrestAmount',
                )
            );
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $previousNumberOfLoan  = $firstQuatData[0];
            $previousLoanAmount    = $firstQuatData[1];
            $previousIntrestAmount = $firstQuatData[2];
            $currentNumberOfLoan  = $secondQuatData[0];
            $currentLoanAmount    = $secondQuatData[1];
            $currentIntrestAmount = $secondQuatData[2];

            return view(
                'loanreport',
                compact(
                    'fiscalYear',
                    'fiscalyear',
                    'sector',
                    'reportbyyear',
                    'previousNumberOfLoan',
                    'previousLoanAmount',
                    'previousIntrestAmount',
                    'currentNumberOfLoan',
                    'currentLoanAmount',
                    'currentIntrestAmount',
                    'numberOfDueLoan',
                    'dueLoanAmount',
                    'anualNumberOfLoan',
                    'anualLoanAmount',
                    'anualIntrestAmount',
                )
            );
        } elseif ($month == 10 || $month == 11 || $month == 12) {
            $previousNumberOfLoan  = $secondQuatData[0];
            $previousLoanAmount    = $secondQuatData[1];
            $previousIntrestAmount = $secondQuatData[2];

            $currentNumberOfLoan  = $thirdQuatData[0];
            $currentLoanAmount    = $thirdQuatData[1];
            $currentIntrestAmount = $thirdQuatData[2];

            return view(
                'loanreport',
                compact(
                    'fiscalYear',
                    'fiscalyear',
                    'sector',
                    'previousNumberOfLoan',
                    'previousLoanAmount',
                    'previousIntrestAmount',
                    'currentNumberOfLoan',
                    'currentLoanAmount',
                    'currentIntrestAmount',
                    'numberOfDueLoan',
                    'dueLoanAmount',
                    'anualNumberOfLoan',
                    'anualLoanAmount',
                    'anualIntrestAmount',
                )
            );
        } elseif ($month == 1 || $month == 2 || $month == 3) {
            $previousNumberOfLoan  = $thirdQuatData[0];
            $previousLoanAmount    = $thirdQuatData[1];
            $previousIntrestAmount = $thirdQuatData[2];
            $currentIntrestAmount  = $forthQuatData[2];
            $currentNumberOfLoan   = $forthQuatData[0];
            $currentLoanAmount     = $forthQuatData[1];
            return view(
                'loanreport',
                compact(
                    'fiscalYear',
                    'fiscalyear',
                    'sector',
                    'previousNumberOfLoan',
                    'previousLoanAmount',
                    'previousIntrestAmount',
                    'currentNumberOfLoan',
                    'currentLoanAmount',
                    'currentIntrestAmount',
                    'numberOfDueLoan',
                    'dueLoanAmount',
                    'anualNumberOfLoan',
                    'anualLoanAmount',
                    'anualIntrestAmount',
                )
            );
        } else {
            return null;
        }
    }
}
