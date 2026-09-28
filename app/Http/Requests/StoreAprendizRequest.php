<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAprendizRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'documento' => 'required|string|max:20|unique:aprendizes,documento',
            'nombre'    => 'required|string|max:100',
            'apellido'  => 'required|string|max:100',
            'email'     => 'required|email|max:150|unique:aprendizes,email',
            'telefono'  => 'nullable|string|max:20',
            'ficha'     => 'required|string|max:20',
            'estado'    => 'required|in:en_formacion,retirado,graduado',
        ];
    }
}
