<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
   ['state_id' => 3,
    'name'  => 'Sindhuli',
    'name_en'=> 'Sindhuli',
    'name_nep' => 'सिन्धुली',
   ],
   ['state_id' => 3,
    'name'  => 'Ramechhap',
                'name_en' => 'Ramechhap',
                'name_nep' => 'रामेछाप',
   ],
   ['state_id' => 3,
    'name'  => 'Dolakha',
                'name_en' => 'Dolakha',
                'name_nep' => 'दोलखा',
   ],
   ['state_id' => 3,
    'name'  => 'Sindhupalchok',
                'name_en' => 'Sindhupalchok',
                'name_nep' => 'सिन्धुपाल्चोक',
   ],
   ['state_id' => 3,
    'name'  => 'Rasuwa',
                'name_en' => 'Rasuwa',
                'name_nep' => 'रसुवा',
   ],
   ['state_id' => 3,
    'name'  => 'Dhading',
                'name_en' => 'Dhading',
                'name_nep' => 'धादिङ',
   ],
   ['state_id' => 3,
    'name'  => 'Nuwakot',
                'name_en' => 'Nuwakot',
                'name_nep' => 'नुवाकोट',
   ],
   ['state_id' => 3,
    'name'  => 'Kathmandu',
                'name_en' => 'Kathmandu',
                'name_nep' => 'काठमाण्डौ',
   ],
   ['state_id' => 3,
    'name'  => 'Lalitpur',
                'name_en' => 'Lalitpur',
                'name_nep' => 'ललितपुर',
   ],
   ['state_id' => 3,
    'name'  => 'Bhaktapur',
                'name_en' => 'Bhaktapur',
                'name_nep' => 'भक्तपुर',
   ],
   ['state_id' => 3,
    'name'  => 'Kavrepalanchok',
                'name_en' => 'Kavrepalanchok',
                'name_nep' => 'काभ्रेप्लान्चोक',
   ],
   ['state_id' => 3,
    'name'  => 'Makwanpur',
                'name_en' => 'Makwanpur',
                'name_nep' => 'मकवानपुर',
   ],
   ['state_id' => 3,
    'name'  => 'Chitwan',
                'name_en' => 'Chitwan',
                'name_nep' => 'चितवन',
   ],
  ]);

    }
}
