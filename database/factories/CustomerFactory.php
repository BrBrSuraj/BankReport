<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->numberBetween(1, 3),
            'cname' => $this->faker->name(),
            'cemail' => $this->faker->unique()->safeEmail(),
            'cphone' =>  $this->faker->phoneNumber,
            'state'=>'बागमती',
            'district'=>'मकवानपुर',
            'localLevel'=>'हेटौडा',
            'status'=>1
        ];
    }
}