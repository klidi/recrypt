<?php

namespace Tests\Unit;

use Domain\Clients\ValueObjects\EncryptionKey;
use Tests\TestCase;

class EncryptionKeyTest extends TestCase
{
    public function testEncryptionKeyValidArgument() : void
    {
        $key = 'asdfgasdfgasdfgasdfgasdfgasdfgas';
        $encryptionKey = new EncryptionKey($key);
        $this->assertSame($key, $encryptionKey->value());
    }


    public function testEncryptionKeyNullArgument() : void
    {
        $this->expectException(\TypeError::class);
        new EncryptionKey(null);
    }

    /**
     * @dataProvider provideWrongType
     */
    public function testEncryptionKeyInvalidArgument($data) : void
    {
        $this->expectException(\InvalidArgumentException::class);
        new EncryptionKey($data);
    }

    public function provideWrongType() : array
    {
        return [
            'integer key' => [1],
            'short key' => ['aaa'],
            'to long key' => ['asdfgasdfgasdfgasdfgasdfgasdfgasaaaaa']
        ];
    }
}
