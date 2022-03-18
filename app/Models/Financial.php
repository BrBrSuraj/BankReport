<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;
    protected $fillable = ['loan_id', 'user_id','dueAmount','startDate','sector','days','intrest','total','fiscalYear', 'paidIntrestAmount'];

public function loan(){
    return $this->belongsTo(Loan::class);
}

}
