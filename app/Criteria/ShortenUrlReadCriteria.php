<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShortenUrlReadCriteria.
 *
 * @package namespace App\Criteria;
 */
class ShortenUrlReadCriteria implements CriteriaInterface
{
    protected $code;

    public function __construct(string $code)
    {
        $this->code = $code;
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
        $model = $model->where('code', $this->code)
        ->withTrashed();

        return $model;
    }
}
