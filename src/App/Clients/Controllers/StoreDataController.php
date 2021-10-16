<?php

declare(strict_types=1);

namespace App\Clients\Controllers;

use App\Clients\Actions\StoreData;
use App\Clients\DataTransferObjects\Clients\ClientData;
use App\Clients\Requests\StoreDataRequest;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class StoreDataController
{
    /**
     * @throws UnknownProperties
     */
    public function __invoke(StoreDataRequest $request, StoreData $action)
    {
        $action(ClientData::fromRequest($request));

        return new JsonResponse('', 200);
    }
}
