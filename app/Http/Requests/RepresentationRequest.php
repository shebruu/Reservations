<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RepresentationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Accès autorisé uniquement pour les utilisateurs connectés avec les rôles 'membre' ou 'affiliate
        return Auth::check() && (Auth::user()->role === 'admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location_id' => 'required|exists:locations,id',
            'show_id' => 'required|exists:shows,id',
            'when' => 'required|date',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'location_id.required' => 'Une location est obligatoire.',
            'location_id.exists' => 'La location sélectionnée est invalide.',
            'show_id.required' => 'Un spectacle est obligatoire.',
            'show_id.exists' => 'Le spectacle sélectionné est invalide.',
            'when.required' => 'La date et heure sont obligatoires.',
            'when.date' => 'La date fournie n est pas valide.',
        ];
    }
}
