<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;



class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'       =>1,
            'customer_id'=>rand(1,30),
            'fiscalYear'=>'२०७८-०७९',
            'amount'=>500000,
            'sector'=>null,
            'institute'=>$this->faker->text(10),
            'firm'=>$this->faker->text(10),
            'loanDate'=>$this->faker->dateTimeBetween('2078-04-01','2078-10-15'),
            'clearDate'=>$this->faker->dateTimeBetween('2080-04-01', '2085-12-30'),
        ];
    }
}