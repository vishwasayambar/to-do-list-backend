<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'workspace' => ['string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
