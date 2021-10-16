<?php

declare(strict_types=1);

namespace App\Clients\Resources;

use Domain\Clients\ValueObjects\EncryptionKey;
use Illuminate\Http\Resources\Json\JsonResource;

final class DataResource extends JsonResource
{
    public function toArray($request) : array
    {
        return [
            'id' => $this->id->value(),
            'value' => $this->value->decrypt(new EncryptionKey($request->get('encryption_key')))
        ];
    }
}
