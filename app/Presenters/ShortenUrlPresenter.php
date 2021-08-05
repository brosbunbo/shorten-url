<?php

namespace App\Presenters;

use App\Transformers\ShortenUrlTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ShortenUrlPresenter.
 *
 * @package namespace App\Presenters;
 */
class ShortenUrlPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ShortenUrlTransformer();
    }
}
