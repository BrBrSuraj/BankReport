<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([
            ['sector' => 'Agri Business', 'sector_en' => 'Agri Business','sector_nep'=>'कृषी व्यवसाय'],
            ['sector' => 'Industrial Business', 'sector_en' => 'Industrial Business', 'sector_nep' => 'औधोगिक व्यवसाय'],
            ['sector' => 'Business', 'sector_en' => 'Business', 'sector_nep' => 'व्यापार'],
            ['sector' => 'Forest & environment', 'sector_en' => 'Forest & environment', 'sector_nep' => 'वन तथा वातावरण'],
            ['sector' => 'Women and Dalit community development', 'sector_en' => 'Women and Dalit community development', 'sector_nep' => 'महिला तथा दलित समुदाय विकास'],
            ['sector' => 'Tourism', 'sector_en' => 'Tourism', 'sector_nep' => 'पर्यटन'],
            ['sector' => 'Garbage Business', 'sector_en' => 'Garbage Business', 'sector_nep' => 'फोहोरमैला व्यवसाय']
        ]);
    }
}
