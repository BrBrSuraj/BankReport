<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Fiscal;
use Livewire\Component;
use App\Models\Financial;
use App\Models\Installment;

class InstallmentCreate extends Component
{
    public $fiscalYear;
    public $fiscalyear;
    public $amount;
    public $date;
    public $financial_id;
    public $financialdata;
    public $dateforcalculation;
    public $installmentAmount;
    public $installmentFiscalyear;
    public $installmentDate;
    public $perdayIntrest;
    public $startDate;
    public $dueLoan;
    public $maxAmountToBePay;
    public $intrestToBePay;
    public $newDueAmount;


    public function mount()
    {
        $this->fiscalYear = Fiscal::all();
        $this->financialdata = Financial::select('dueAmount', 'sector', 'startDate')->find($this->financial_id);

    }
    protected $rules = [
        'fiscalyear' => 'required',
        'amount' => 'required',
        'date' => 'required|date_format:Y-m-d|after_or_equal:2077',
    ];
    public function submit()
    {
        $this->validate();
        // data after validation
        $this->installmentFiscalyear = $this->fiscalyear;
        $this->installmentAmount = $this->amount;
        $this->installmentDate = $this->date;

        //data from Financial model with respected id for calculation
        $this->financialdata = Financial::select('dueAmount', 'sector', 'startDate', 'paidIntrestAmount', 'paidLoanAmount', 'totalPaid')->find($this->financial_id);
        // $previousDueAmount= $this->financialdata->dueAmount;
        // $previousStartDate = $this->financialdata->startDate;
        // $previousPaidIntrestAmount = $this->financialdata->paidIntrestAmount;
        // $previousPaidLoanAmount = $this->financialdata->paidLoanAmount;
        // $previousTotalPaid = $this->financialdata->totalPaid;

        if ($this->financialdata->dueAmount != 0)
        {
            // if due amount is not zero
            $this->startDate = $this->financialdata->startDate;
            $this->perdayIntrest = (($this->financialdata->dueAmount) * 0.03)/ 365;
            $start = Carbon::create($this->startDate);
            $end = Carbon::create($this->installmentDate);
            $days = $start->diffInDays($end);
            $this->intrestToBePay = $this->perdayIntrest * $days;
            $this->maxAmountToBePay = $this->financialdata->dueAmount + $this->intrestToBePay;

            if ($this->installmentAmount <= $this->maxAmountToBePay && $this->installmentAmount >= $this->intrestToBePay) {
                $newamount = $this->installmentAmount - $this->intrestToBePay;
                $newDueAmount = $this->financialdata->dueAmount - $newamount;

                $installment = Installment::create([
                    'financial_id' => $this->financial_id,
                    'amount' =>  $this->installmentAmount,
                    'installmentDate' => $this->installmentDate,
                    'sector' =>  $this->financialdata->sector,
                    'fiscalYear' => $this->fiscalyear,
                    'paidIntrest' => $this->intrestToBePay,
                ]);
                if($installment != null){
                    $updatedfinancial = Financial::where('id', $this->financial_id)->update([
                        'dueAmount' => $newDueAmount,
                        'startDate' =>  $end,
                        'paidIntrestAmount' => $this->financialdata->paidIntrestAmount + $this->intrestToBePay,
                        'paidLoanAmount' => $newamount,
                        'totalPaid' => $this->financialdata->totalPaid +  $this->installmentAmount,
                    ]);
                }

                if($installment!=null && $updatedfinancial!=null){
                    session()->flash('message', 'Installment Payment Successfull.');
                    $this->reset(['fiscalyear', 'amount','date']);
                }else{
                    session()->flash('message', 'Transaction Failed !');
                }

            } else {
                session()->flash('message', 'Check Amount:shound be less then or equal maximum payable amount OR Amount must be greater or equal to current intrest.');
            }
        } else {
            session()->flash('message', 'No Loan Found.');
        }
    }

    public function render()
    {

        return view('livewire.installment-create');
    }
}
