<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
      protected $fillable=['financial_id','amount','installmentDate','fiscalYear', 'sector', 'paidIntrest','fiscalYear'];

      public function loan(){
          return $this->belongsTo(Loan::class);
      }

      

}