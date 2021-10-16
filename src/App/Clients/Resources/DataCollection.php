<?php

declare(strict_types=1);

namespace App\Clients\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DataCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DataResource::class;

    public function toArray($request) : array
    {
        return [
            'data' => $this->collection,
            'metadata' => [
                // add metadata
            ],
        ];
    }
}
