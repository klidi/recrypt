<?php

namespace App\Clients\DataTransferObjects\Clients;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class ClientData extends DataTransferObject
{
    public string $id;
    public string $encryptionKey;
    public string $value;

    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(Request $request): self
    {
        return new self([
            'id' => $request->input('id'),
            'encryptionKey' => $request->input('encryption_key'),
            'value' => $request->input('value'),
        ]);
    }
}
