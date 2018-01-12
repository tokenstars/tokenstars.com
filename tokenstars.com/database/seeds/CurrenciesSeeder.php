<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tokenCurrencyId = DB::table('currencies')->insertGetId(['name' => 'Tokens', 'code' => config('app.name') . '.TKN']);
        $bitcoinId = DB::table('currencies')->insertGetId(['name' => 'Bitcoin', 'code' => 'BTC']);
        DB::table('prices')->insert([
            'commodity_id' => $tokenCurrencyId,
            'currency_id' => $bitcoinId,
            'date' => Carbon::now(),
            'value' => 0.0001,
        ]);
    }
}
