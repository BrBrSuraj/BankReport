<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable=['user_id','customer_id','amount','sector','firm','institute','loanDate','clearDate','fiscalYear'];

 public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

  


    public function financial(){
        return $this->hasOne(Financial::class);
    }

    public function installment(){
        return $this->hasMany(Installment::class);
    }
}