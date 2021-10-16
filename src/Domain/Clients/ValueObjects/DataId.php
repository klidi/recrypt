<?php

declare(strict_types=1);

namespace Domain\Clients\ValueObjects;

final class DataId extends StringValueObject
{
    private const MIN_LENGTH = 1;

    private bool $isWildcard;

    protected function validate(): bool
    {
        $this->isWildcard = substr($this->value(), -1) === '*';

        return strlen($this->value()) >= self::MIN_LENGTH;
    }

    public function isWildcard() : bool
    {
        return $this->isWildcard;
    }
}
