<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstallmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'loan_id'=>null,
           'installmentDate' => null,
            'amount'=>$this->faker->numberBetween($min = 20000, $max = 50000),
        ];
    }
}