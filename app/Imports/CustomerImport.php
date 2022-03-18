<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CustomerImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        return new Customer([
            'user_id' => auth()->user()->id,
            'cname' => $row['cname'],
            'cemail' => $row['cemail'],
            'cphone' => $row['cphone'],
            'state' => $row['state'],
            'district' => $row['district'],
            'localLevel' => $row['locals'],
            'status' => 0,
        ]);
    }

    public function headingRow():int{
        return 1;
    }
     public function rules(): array
    {
        return [

            '*.cemail' => ['email', 'unique:customers,cemail'],
            '*.cphone' => ['max:10', 'unique:customers,cphone'],

        ];
    }
}