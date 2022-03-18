<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('states')->insert([
   ['name' => 'Province No. 1','name_en'=> 'Province No. 1','name_nep'=>'प्रदेश न. १'],
   ['name' => 'Madhesh Province','name_en'=> 'Madhesh Province','name_nep'=>'मधेस प्रदेश'],
   ['name' => 'Bagmati Province','name_en'=> 'Bagmati Province','name_nep'=>'बागमती प्रदेश'],
   ['name' => 'Gandaki Province','name_en'=> 'Gandaki Province','name_nep'=>'गण्डकि प्रदेश'],
   ['name' => 'Lumbini Province','name_en'=> 'Lumbini Province','name_nep'=>'लुम्बिनी प्रदेश'],
   ['name' => 'Karnali Province','name_en'=> 'Karnali Province','name_nep'=>'कर्णाली प्रदेश'],
   ['name' =>'Sudurpashchim Province', 'name_en' => 'Sudurpashchim Province', 'name_nep' => 'सुदुरपश्चिम प्रदेश'],
  ]);
    }
}
