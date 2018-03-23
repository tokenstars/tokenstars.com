<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Item;
use App\Models\Bid;
use App\Models\Accounts\Currency;
use App\Models\Accounts\Account;
use App\Models\Accounts\AccountType;

class CharityTest extends TestCase
{

     use RefreshDatabase;


    /**
     * Тест работы ставок
     *
     * @return void
     */
    public function testBid()
    {
        $currency = factory(Currency::class)->make();
        $currency->save();

        $accountType = factory(AccountType::class)->make();
        $accountType->save();

        $account = new Account;
        $account->account_type_id = $accountType->id;
        $account->name = $currency->code;
        $account->currency_id = $currency->id;
        $account->wallet = 'walletid';
        $account->status = 'open';
        $account->save();

        // Создаем пользователя  который ставку ставит
        $user = factory(User::class)->make();
        $user->save();
        // Создаем лот
        $item = factory(Item::class)->make();
        $item->save();
        $this->actingAs($user);

        // Делаем ставку
        $response = $this->json('POST', '/tokens/wallet', ['item_id'=>$item->id, 'currency'=>$currency->code]);
        $response->assertStatus(200);

        $address = $response->content();

        $response = $this->ipnQuery(
            '/ipn/coinpayments/deposit',
            [
                'txn_id'=>'test_transaction',
                'merchant' => 'testing',
                'ipn_type' => 'deposit',
                'status' => 50,
                'currency' => $currency->code,
                'address' => $address,
                'amount' => 1
            ]
        );
        $response->assertStatus(200);

        $response = $this->ipnQuery(
            '/ipn/coinpayments/deposit',
            [
                'txn_id'=>'test_transaction',
                'merchant' => 'testing',
                'ipn_type' => 'deposit',
                'status' => 101,
                'currency' => $currency->code,
                'address' => $address,
                'amount' => 1
            ]
        );
        $response->assertStatus(200);

        // Лот перезагружаем
        $item = Item::first();
        $this->assertTrue($item != null);
        // Ставка
        $bid = Bid::where('state', 'completed')->first();
        $this->assertTrue($bid != null);
        // проверяем что ставка сработала
        $this->assertEquals($item->winner_bid_id, $bid->id);
    }

    private function ipnQuery($url, $data)
    {
        $content = json_encode($data);
        $hmac = hash_hmac("sha512", $content, config('services.coinpayments')['ipn_secret']);
        return $this->withHeaders(['Hmac'=>$hmac])->json(
            'POST',
            $url,
            $data
        );
    }
}
