<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CurrencyRepository
 * @package namespace App\Repositories;
 */
interface CurrencyRepository extends RepositoryInterface
{
    public function getActiveCurrencies();
    public function getMinAmount($currency);
}
