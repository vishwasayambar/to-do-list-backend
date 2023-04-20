<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'heading' => ['required'],
            'body' => ['nullable'],
            'workspace_id' => ['required', 'integer']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
