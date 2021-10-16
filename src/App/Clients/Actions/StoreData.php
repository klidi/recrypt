<?php

declare(strict_types=1);

namespace App\Clients\Actions;

use App\Clients\DataTransferObjects\Clients\ClientData;
use Domain\Clients\Models\Data;
use Domain\Clients\ValueObjects\EncryptionKey;
use Domain\Clients\ValueObjects\EncryptedValue;

final class StoreData
{
    public function __invoke(ClientData $data) : Data
    {
        return Data::updateOrCreate(
            ['id' => $data->id],
            ['value' => new EncryptedValue($data->value, new EncryptionKey($data->encryptionKey))]
        );
    }
}
