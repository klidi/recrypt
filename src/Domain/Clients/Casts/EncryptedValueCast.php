<?php

declare(strict_types=1);

namespace Domain\Clients\Casts;

use Domain\Clients\ValueObjects\EncryptedValue;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class EncryptedValueCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return new EncryptedValue(base64_decode($value));
    }

    public function set($model, string $key, $value, array $attributes)
    {
        if (! $value instanceof EncryptedValue) {
            throw new \InvalidArgumentException('The given value is not an EncryptedValue instance.');
        }

        return base64_encode($value->encrypt());
    }
}
