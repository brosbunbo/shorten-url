<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Carbon\Carbon;

/**
 * Class ShortenUrl.
 *
 * @package namespace App\Entities;
 */
class ShortenUrl extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'code',
        'expired_at'
    ];

    protected $dates = [
        'expired_at'
    ];

    public function isExpired(): bool {
        $now = Carbon::now();

        return (
            null === $this->expired_at
            || $now->isBefore($this->expired_at)
        ) ? false : true;
    }
}
