<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ShortenUrl;

/**
 * Class ShortenUrlTransformer.
 *
 * @package namespace App\Transformers;
 */
class ShortenUrlTransformer extends TransformerAbstract
{
    /**
     * Transform the ShortenUrl entity.
     *
     * @param \App\Entities\ShortenUrl $model
     *
     * @return array
     */
    public function transform(ShortenUrl $model)
    {
        return [
            'id' => (int) $model->id,
            'url' => $model->url,
            'code' => $model->code,
            'expired_at' => $model->expired_at,
            'hit' => (int) $model->hit
        ];
    }
}
