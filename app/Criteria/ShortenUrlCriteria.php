<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortenUrlCriteria.
 *
 * @package namespace App\Criteria;
 */
class ShortenUrlCriteria implements CriteriaInterface
{
    protected $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }
    /**
     * Apply criteria in query repository
     *
     * @param Model              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if ($search = Arr::get($this->params, 'search')) {
            $model = $model->where(function ($q) use ($search) {
                $q->where('url', 'LIKE', "%" . $search . "%")
                ->orWhere('code', 'LIKE', "%" . $search . "%");
            });
        }

        return $model;
    }
}
