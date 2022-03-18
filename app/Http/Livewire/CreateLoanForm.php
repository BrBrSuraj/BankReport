<?php

namespace App\Http\Livewire;

use App\Models\Loan;
use App\Models\Sector;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Fiscal;

class CreateLoanForm extends Component
{
    public $customer;
    public $amount;
    public $sector;
    public $sectors;
    public $institute;
    public $firm;
    public $loanDate;
    public $clearDate;
    public $fyear;
    public $fiscalyear;
    public $selectedCustomer    = null;


    public function mount()
    {
        $this->customer = Customer::where('user_id', auth()->user()->id)->where('status', 0)->select('id', 'cname')->get();
        $this->sectors = Sector::all();
        $this->fyear = Fiscal::all();
    }

    protected $rules =
    [
        'selectedCustomer' => 'required',
        'amount' => 'required|numeric',
        'sector' => 'required',
        'institute' => 'required',
        'firm' => 'required|max:50',
        'loanDate' => 'required|date_format:Y-m-d|after_or_equal:2077',
        'clearDate' => 'required|date_format:Y-m-d|after_or_equal:2080',
        'fiscalyear' => 'required'
    ];
    public function submit()
    {
        $this->validate();
        $this->loan = Loan::firstOrCreate(
            ['customer_id' => $this->selectedCustomer],
            [
                'user_id' => auth()->user()->id,
                'amount' => $this->amount,
                'sector' => $this->sector,
                'institute' => $this->institute,
                'firm' => $this->firm,
                'loanDate' => $this->loanDate,
                'clearDate' => $this->clearDate,
                'fiscalYear'=>$this->fiscalyear
            ]
        );
        if ($this->loan != null) {
            Customer::where('id', $this->loan->customer_id)->update([
                'status' => 1
            ]);
        }
        session()->flash('message', 'Loan Created SuccessFully.');
    }
    public function render()
    {
        return view('livewire.create-loan-form');
    }
}
