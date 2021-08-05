<?php

namespace App\Services;

interface ShortenUrlService {
    public function create(array $attrs): array;

    public function read(string $code): array;

    public function list(array $params): array;

    public function delete(int $id);
}