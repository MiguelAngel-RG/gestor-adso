<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin() || $this->user()->isInstructor();
    }

    public function rules(): array
    {
        $aprendizId = $this->route('aprendiz')->id ?? $this->route('aprendiz');

        return [
            'documento' => 'required|string|max:20|unique:aprendizes,documento,' . $aprendizId,
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:aprendizes,email,' . $aprendizId,
            'ficha'     => 'required|string|max:20',
            'estado'    => 'required|string|in:activo,inactivo,condicionado',
        ];
    }

    public function messages(): array
    {
        return [
            'documento.required' => 'El número de documento es obligatorio.',
            'documento.unique'   => 'Este número de documento ya pertenece a otro aprendiz.',
            'nombres.required'   => 'Los nombres son obligatorios.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'Debe ingresar un correo electrónico válido.',
            'email.unique'       => 'Este correo electrónico ya pertenece a otro aprendiz.',
            'ficha.required'     => 'El número de ficha es obligatorio.',
            'estado.required'    => 'Debe seleccionar un estado.',
        ];
    }
}