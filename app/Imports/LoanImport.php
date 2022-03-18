<?php

namespace App\Imports;

use App\Models\Loan;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;


class LoanImport implements ToModel, WithHeadingRow, WithValidation
{

    private $customers;
    public function __construct()
    {
        $this->customers = Customer::select('id', 'cname', 'cemail')->get();
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $customer = $this->customers->where('cname', $row['name'])->where('cemail', $row['email'])->first();
        $loan=Loan::where('customer_id',  $customer->id)->first();
       if($loan==null){
           Customer::where('id', $customer->id)->update(['status' => 1]);
            return new Loan([
                'user_id' => auth()->user()->id,
                'customer_id' => $customer->id ?? null,
                'fiscalYear' => $row['fiscalyear'],
                'amount' => $row['amounts'],
                'sector' => $row['sectors'],
                'firm' => $row['firms'],
                'institute' => $row['institutes'],
                'loanDate' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['loandate']),
                'clearDate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['cleardate']),
            ]);
      }
        
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            'customer_id' => 'unique:loans,customer_id',
            '*.customer_id'=> 'unique:loans,customer_id',
            // // 'name' => 'required',
            // '*.name' => 'required',
            // // 'email' => 'required',
            // '*.email' => 'required|unique:customers,cemail',
            // // 'amount'=>'required|numeric|max:1000000',
            // '*.amount' => 'required|numeric|max:1000000',
            // // 'loanDate' => 'required|date_format:Y-m-d',
            // '*.loanDate' => 'required|date_format:Y-m-d'
        ];
    }
}