<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin() || $this->user()->isInstructor();
    }

    public function rules(): array
    {
        return [
            'documento' => 'required|string|max:20|unique:aprendizes,documento',
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:aprendizes,email',
            'ficha'     => 'required|string|max:20',
            'estado'    => 'required|string|in:activo,inactivo,condicionado',
        ];
    }

    public function messages(): array
    {
        return [
            'documento.required' => 'El número de documento es obligatorio.',
            'documento.unique'   => 'Este número de documento ya está registrado.',
            'nombres.required'   => 'Los nombres son obligatorios.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'Debe ingresar un correo electrónico válido.',
            'email.unique'       => 'Este correo electrónico ya se encuentra registrado.',
            'ficha.required'     => 'El número de ficha es obligatorio.',
            'estado.required'    => 'Debe seleccionar un estado.',
        ];
    }
}