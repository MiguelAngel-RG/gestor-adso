<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return in_array($this->user()->role, ['admin', 'instructor']);
    }

    public function rules(): array
    {
        return [
            'documento' => 'required|string|max:20|unique:aprendizes,documento',
            'nombre'    => 'required|string|max:255', // <-- Cambiado de 'nombres' a 'nombre'
            'apellido'  => 'required|string|max:255', // <-- Cambiado de 'apellidos' a 'apellido'
            'email'     => 'required|email|max:255|unique:aprendizes,email',
            'ficha'     => 'required|string|max:20',
            'estado'    => 'required|string|in:en_formacion,retirado,graduado',
        ];
    }

    public function messages(): array
    {
        return [
            'documento.required' => 'El número de documento es obligatorio.',
            'documento.unique'   => 'Este número de documento ya está registrado.',
            'nombre.required'   => 'Los nombres son obligatorios.',
            'apellido.required' => 'Los apellidos son obligatorios.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'Debe ingresar un correo electrónico válido.',
            'email.unique'       => 'Este correo electrónico ya se encuentra registrado.',
            'ficha.required'     => 'El número de ficha es obligatorio.',
            'estado.required'    => 'Debe seleccionar un estado.',
            'estado.in'          => 'El estado seleccionado no es válido.',
        ];
    }
}