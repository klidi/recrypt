<?php

declare(strict_types=1);

namespace Domain\Clients\ValueObjects;

abstract class StringValueObject
{
    protected string $exceptionMessage = 'Invalid argument';

    public function __construct(protected string $value)
    {
        if (!$this->validate()) {
            throw new \InvalidArgumentException($this->exceptionMessage);
        }
    }

    protected abstract function validate() : bool;

    public function value() : string
    {
        return $this->value;
    }
}
