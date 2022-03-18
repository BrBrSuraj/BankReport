<?php

namespace App\Exports;

use App\Models\Loan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class LoanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return new Collection([
            ['name','email', 'fiscalyear
', 'amounts', 'sectors', 'firms', 'institutes', 'loandate', 'cleardate'],
        ]);
    }
}
