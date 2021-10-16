<?php

declare(strict_types=1);

namespace App\Clients\Queries;

use App\Clients\Queries\Contracts\Query;
use App\Clients\Resources\DataCollection;
use Domain\Clients\Models\Data;
use Domain\Clients\ValueObjects\DataId;
use Illuminate\Http\Request;

final class GetData implements Query
{
    public function ask(Request $request) : DataCollection
    {
        $id = new DataId($request->get('id'));

        $data = $id->isWildcard() ? Data::findFromWildcard($id->value())->get() : Data::byId($id->value())->get();

        return new DataCollection($data);
    }
}
