<?php

namespace Database\Seeders;

use App\Models\Fiscal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiscalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fiscals')->insert([
            ['fiscalYear' => '2077-078'],
            ['fiscalYear' => '2078-079'],
            ['fiscalYear' => '2079-080'],
            ['fiscalYear' => '2080-081'],
            ['fiscalYear' => '2081-082'],
            ['fiscalYear' => '2082-083'],
            ['fiscalYear' => '2083-084'],
            ['fiscalYear' => '2084-085'],

        ]);
    }
}
