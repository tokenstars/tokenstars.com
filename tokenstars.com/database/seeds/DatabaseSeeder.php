<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  $this->call(AccountTypesTableSeeder::class);
     //   $this->call(CurrenciesSeeder::class);
     //   $this->call(UsersTableSeeder::class);
        //Seed the countries
        $this->call('CountriesSeeder');
        $this->command->info('Seeded the countries!');
    }
}
