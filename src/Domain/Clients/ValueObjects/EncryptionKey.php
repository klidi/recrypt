<?php

declare(strict_types=1);

namespace Domain\Clients\ValueObjects;

final class EncryptionKey extends StringValueObject
{
    private const KEY_SIZE = 32;

    protected function validate() : bool
    {
        return strlen($this->value()) === self::KEY_SIZE;
    }
}
