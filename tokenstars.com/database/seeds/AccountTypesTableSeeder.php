<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Accounts\AccountType;

class AccountTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_types')->insert([
            'name' => AccountType::TOKENS_SOURCE_ACCOUNT_NAME,
        ]);
        DB::table('account_types')->insert([
            'name' => AccountType::BANK_ACCOUNT_NAME,
        ]);
    }
}
