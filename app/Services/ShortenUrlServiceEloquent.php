<?php

namespace App\Services;

use App\Criteria\ShortenUrlCriteria;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Repositories\ShortenUrlRepository;
use App\Fillers\ShortenUrlFiller;
use App\Presenters\ShortenUrlPresenter;
use App\Transformers\ShortenUrlTransformer;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\GoneHttpException;

class ShortenUrlServiceEloquent implements ShortenUrlService {
    protected $repository;

    public function __construct(ShortenUrlRepository $repository) {
        $this->repository = $repository;
    }

    public function create(array $data): array {
        $attrs = ShortenUrlFiller::forCreate($data);

        $shortenUrl = $this->repository
        ->setPresenter(ShortenUrlPresenter::class)
        ->create($attrs);

        return $shortenUrl;
    }

    public function read(string $code): array {
        $shortenUrl = $this->repository
        ->scopeQuery(function ($q) {
            return $q->withTrashed();
        })
        ->findWhere(['code' => $code])
        ->first();

        if (null === $shortenUrl) {
            throw new NotFoundHttpException('Shorten url not found');
        }

        if ($shortenUrl->isExpired() || $shortenUrl->deleted_at) {
            throw new GoneHttpException('Shorten url is expired or deleted');
        }

        // Update hit count
        DB::table('shorten_urls')
        ->where('id', $shortenUrl->id)
        ->increment('hit', 1);

        return with(new ShortenUrlTransformer)->transform($shortenUrl);
    }

    public function list(array $params): array {
        return $this->repository
        ->pushCriteria(new ShortenUrlCriteria($params))
        ->setPresenter(ShortenUrlPresenter::class)
        ->all();
    }

    public function delete(int $id) {
        $this->repository->delete($id);
    }
}