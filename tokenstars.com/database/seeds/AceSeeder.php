<?php

use App\Models\Accounts\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tokenCurrencyId = Currency::firstOrCreate(['name' => 'ACE Token', 'code' => 'ACE'])->id;
        $bitcoinId = Currency::where(['code' => 'BTC'])->first()->id;
        DB::table('prices')->insert([
            'commodity_id' => $tokenCurrencyId,
            'currency_id' => $bitcoinId,
            'date' => Carbon::now(),
            'value' => 0.0001,
        ]);
    }
}
