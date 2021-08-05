<?php

namespace App\Fillers;

use Illuminate\Support\{
    Arr,
    Str
};

class ShortenUrlFiller {
    public static function forCreate(array $data): array {
        $attrs = Arr::only($data, ['url', 'expired_at']);

        /**
         * Simple logic for generating code
         * More complex unique validation could be added later
         */
        $attrs['code'] = Str::random(8);

        return $attrs;
    }
}
