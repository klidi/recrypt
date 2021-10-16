<?php

declare(strict_types=1);

namespace App\Clients\Queries\Contracts;

use Illuminate\Http\Request;

interface Query
{
    public function ask(Request $request);
}
