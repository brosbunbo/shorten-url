<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;

use App\Repositories\ShortenUrlRepository;
use App\Entities\ShortenUrl;

/**
 * Class ShortenUrlRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ShortenUrlRepositoryEloquent extends BaseRepository implements ShortenUrlRepository, CacheableInterface
{
    use CacheableRepository;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ShortenUrl::class;
    }
}
