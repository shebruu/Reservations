<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalitiesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'postal_code' => 'required|string|max:6',
            'locality' => 'required|string|max:60',
        ];
    }
}
