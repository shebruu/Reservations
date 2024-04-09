<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
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
            'slug' => 'required|unique:shows|alpha_dash',
            'title' => 'required|max:255',
            'description' => 'required',
            'poster_url' => 'sometimes|nullable|url',
            'location_id' => 'required|exists:locations,id',
            'bookable' => 'required|boolean',
            'price' => 'required|numeric|min:0'
        ];
    }
}
