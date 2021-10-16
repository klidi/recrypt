<?php

declare(strict_types=1);

namespace App\Clients\Controllers;

use App\Clients\Queries\GetData;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

final class GetDataController
{
    public function __invoke(Request $request, GetData $getData)
    {
        $data = [];

        try {
            $data = $getData->ask($request);
        } catch (DecryptException $exception) {
            Log::error("Unable to decrypt: " . $exception->getMessage());
        }

        return new JsonResponse($data);
    }
}
