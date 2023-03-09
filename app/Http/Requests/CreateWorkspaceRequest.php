<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkspaceRequest extends FormRequest
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
