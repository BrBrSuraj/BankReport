<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table = 'customers';
    protected $fillable = ['user_id','cname','cemail','cphone','state','district','localLevel','status'];


    public function loan()
    {
        return $this->hasOne(Loan::class);
    }

    public function installment()
    {
        return $this->hasManyThrough(Installment::class,Loan::class);
    }

    public function financial(){
        return $this->hasOneThrough(Financial::class,Loan::class);
    }

    public function state(){
        return $this->hasOne(State::class);
    }




}
