<?php

namespace App\Services;

use Illuminate\Http\Response;

use App\Entities\ShortenUrl;

interface ShortenUrlService {
    public function create(array $attrs): ShortenUrl;

    public function read(string $code): ShortenUrl;

    public function list(array $params): array;

    public function delete(int $id);
}