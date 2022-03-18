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
use App\Actions\AnualReports;
use App\Exports\CustomerExport;
use App\Exports\LoanExport;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{

    use DateTrait;
    public function exportpdf($fiscalYear)
    {
        $customPaper=array(0, 0, 720, 1440);
        $fiscalyear = Fiscal::select('fiscalYear')->get();
        $sector = Sector::select('sector')->get();

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
            $data = array(
                'fiscalYear' => $fiscalYear,
                'sector' => $sector,
                'previousNumberOfLoan' => $previousNumberOfLoan,
                'previousLoanAmount' => $previousLoanAmount,
                'previousIntrestAmount' => $previousIntrestAmount,
                'currentNumberOfLoan' => $currentNumberOfLoan,
                'currentLoanAmount' => $currentLoanAmount,
                'currentIntrestAmount' => $currentIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'numberOfDueLoan' => $dueLoanAmount,
                'anualNumberOfLoan' => $anualNumberOfLoan,
                'anualLoanAmount' => $anualLoanAmount,
                'anualIntrestAmount' => $anualIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'dueLoanAmount' => $dueLoanAmount
            );
            $pdf = App::make('dompdf.wrapper');
            $dpdf = $pdf->loadView('exportpdf', $data);
            return $dpdf->setPaper('a4', 'landscape')->stream('report.pdf');
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $previousNumberOfLoan  = $firstQuatData[0];
            $previousLoanAmount    = $firstQuatData[1];
            $previousIntrestAmount = $firstQuatData[2];
            $currentNumberOfLoan  = $secondQuatData[0];
            $currentLoanAmount    = $secondQuatData[1];
            $currentIntrestAmount = $secondQuatData[2];

            $data = array(
                'fiscalYear' => $fiscalYear,
                'sector' => $sector,
                'previousNumberOfLoan' => $previousNumberOfLoan,
                'previousLoanAmount' => $previousLoanAmount,
                'previousIntrestAmount' => $previousIntrestAmount,
                'currentNumberOfLoan' => $currentNumberOfLoan,
                'currentLoanAmount' => $currentLoanAmount,
                'currentIntrestAmount' => $currentIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'numberOfDueLoan' => $dueLoanAmount,
                'anualNumberOfLoan' => $anualNumberOfLoan,
                'anualLoanAmount' => $anualLoanAmount,
                'anualIntrestAmount' => $anualIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'dueLoanAmount' => $dueLoanAmount
            );
            $pdf = App::make('dompdf.wrapper');
            $dpdf = $pdf->loadView('exportpdf', $data);
            return $dpdf->setPaper('a4', 'landscape')->stream('report.pdf');
        } elseif ($month == 10 || $month == 11 || $month == 12) {
            $previousNumberOfLoan  = $secondQuatData[0];
            $previousLoanAmount    = $secondQuatData[1];
            $previousIntrestAmount = $secondQuatData[2];

            $currentNumberOfLoan  = $thirdQuatData[0];
            $currentLoanAmount    = $thirdQuatData[1];
            $currentIntrestAmount = $thirdQuatData[2];

            $data = array(
                'fiscalYear' => $fiscalYear,
                'sector' => $sector,
                'previousNumberOfLoan' => $previousNumberOfLoan,
                'previousLoanAmount' => $previousLoanAmount,
                'previousIntrestAmount' => $previousIntrestAmount,
                'currentNumberOfLoan' => $currentNumberOfLoan,
                'currentLoanAmount' => $currentLoanAmount,
                'currentIntrestAmount' => $currentIntrestAmount,
                'anualNumberOfLoan' => $anualNumberOfLoan,
                'anualLoanAmount' => $anualLoanAmount,
                'anualIntrestAmount' => $anualIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'dueLoanAmount' => $dueLoanAmount
            );


               $pdf = App::make('dompdf.wrapper');
             $dpdf = $pdf->loadView('exportpdf', $data);
             return $dpdf->setPaper('a4', 'landscape')->stream('report.pdf');
        } elseif ($month == 1 || $month == 2 || $month == 3) {
            $previousNumberOfLoan  = $thirdQuatData[0];
            $previousLoanAmount    = $thirdQuatData[1];
            $previousIntrestAmount = $thirdQuatData[2];
            $currentIntrestAmount  = $forthQuatData[2];
            $currentNumberOfLoan   = $forthQuatData[0];
            $currentLoanAmount     = $forthQuatData[1];
            $data = array(
                'fiscalYear' => $fiscalYear,
                'sector' => $sector,
                'previousNumberOfLoan' => $previousNumberOfLoan,
                'previousLoanAmount' => $previousLoanAmount,
                'previousIntrestAmount' => $previousIntrestAmount,
                'currentNumberOfLoan' => $currentNumberOfLoan,
                'currentLoanAmount' => $currentLoanAmount,
                'currentIntrestAmount' => $currentIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'numberOfDueLoan' => $dueLoanAmount,
                'anualNumberOfLoan' => $anualNumberOfLoan,
                'anualLoanAmount' => $anualLoanAmount,
                'anualIntrestAmount' => $anualIntrestAmount,
                'numberOfDueLoan' => $numberOfDueLoan,
                'dueLoanAmount' => $dueLoanAmount
            );
            $pdf = App::make('dompdf.wrapper');
            $dpdf = $pdf->loadView('exportpdf', $data);
            return $dpdf->setPaper('a4', 'landscape')->stream('report.pdf');
        } else {
            \abort(403);
        }
    }


    public function CdemoExport(){
        return Excel::download(new CustomerExport,'customer.xlsx');
    }


    public function LdemoExport(){
        return Excel::download(new LoanExport,'loan.xlsx');
    }
}
