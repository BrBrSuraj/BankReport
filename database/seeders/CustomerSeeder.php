<?php

namespace Database\Seeders;
use App\Models\Loan;
use App\Models\Customer;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // Fake data create for testing
    // public function run()
    // {
    //     $this->faker = Faker::create();
    //     Customer::factory(100)->create()->each(function ($customer) {
    //         Loan::factory(1)->create([
    //             'user_id'       => $customer->user_id,
    //             'customer_id' => $customer->id,
    //             'sector'=> function(){
    //                 $sector=Sector::select('sector')->where('id', $this->faker->numberBetween($min = 1, $max = 7))->get();
    //                 foreach ($sector as $sectors){
    //                     return $sectors->sector;
    //                 }
    //             }
    //         ]);
    //     });
    // }
}
