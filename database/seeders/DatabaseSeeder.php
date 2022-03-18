<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    $this->call(RoleSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(StateSeeder::class);
    $this->call(DistrictSeeder::class);
    $this->call(LocalSeeder::class);
    $this->call(SectorSeeder::class);
    $this->call(FiscalSeeder::class);
   // $this->call(CustomerSeeder::class);
  }
}
