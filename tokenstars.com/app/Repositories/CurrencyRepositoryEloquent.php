<?php

namespace App\Repositories;

use App\Criteria\IsActiveCriteria;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Accounts\Currency;

/**
 * Class CurrencyRepositoryEloquent.
 */
class CurrencyRepositoryEloquent extends BaseRepository implements CurrencyRepository
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return Currency::class;
    }

    public function getActiveCurrencies()
    {
        $user = Auth::user();
        if ($user && (in_array($user->id, config('app.test_users')) || 'all' == config('app.test_users')) && !in_array('LTCT', config('app.default_wallet_currencies'))) {
            return array_merge(config('app.default_wallet_currencies'), ['LTCT']);
        }

        return config('app.default_wallet_currencies');
    }

    public function getMinAmount($currency) {
        $minValues = [
            'BTC' => config('app.min_btc'),
            'ETH' => config('app.min_eth'),
            'LTCT' => config('app.min_btc'),
            'BCH' => config('app.min_bch'),
        ];
        if (array_key_exists($currency, $minValues)) {
            return $minValues[$currency];
        }
        return 0;
    }

    /**
     * Boot up the repository, pushing criteria.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(app(IsActiveCriteria::class));
    }
}
