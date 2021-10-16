<?php

namespace App\Clients\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreDataRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'min:1'],
            'encryption_key' => ['required', 'string', 'min:32', 'max:32'],
            'value' => ['required', 'json'],
        ];
    }
}
