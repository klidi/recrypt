<?php

declare(strict_types=1);

namespace Domain\Clients\Casts;

use Domain\Clients\ValueObjects\DataId as Id;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

final class DataIdCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): Id
    {
        return new Id($value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if (! $value instanceof Id) {
            throw new \InvalidArgumentException('The given value is not an DataId instance.');
        }

        return $value->value();
    }
}
