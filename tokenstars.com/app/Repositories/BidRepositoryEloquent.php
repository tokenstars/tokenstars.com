<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\bidRepository;
use App\Models\Bid;
use App\Validators\BidValidator;

/**
 * Class BidRepositoryEloquent
 * @package namespace App\Repositories;
 */
class BidRepositoryEloquent extends BaseRepository implements BidRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bid::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
