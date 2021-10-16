<?php

declare(strict_types=1);

namespace Domain\Clients\ValueObjects;

use Illuminate\Encryption\Encrypter;

final class EncryptedValue
{
    public function __construct(
        private string $value,
        private ?EncryptionKey $key = null,
    ) {}

    public function value() : string
    {
        return $this->value;
    }

    public function encrypt() : string
    {
        /**
         * this encryption is not ideal. gcm is better but i need more context about the application
         * in order to make the extra effort and use gcm
         */
        $encrypter = new Encrypter($this->key->value(), 'aes-256-cbc');

        return $encrypter->encrypt($this->value);
    }

    public function decrypt(EncryptionKey $key) : string
    {
        $encrypter = new Encrypter($key->value(), 'aes-256-cbc');

        return $encrypter->decrypt($this->value);
    }
}
