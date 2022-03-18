<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([
            [
            'name' => 'Ritu Bhattrai',
            'email'=> 'ito.ritubhattarai@gmail.com',
            'password'=>bcrypt('nepal@321'),
            'role_id'=>2,
            'domain'=>'Administrator'
            ],
        ]);
    }
}
