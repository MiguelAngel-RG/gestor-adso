<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAprendizRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Obtenemos el aprendiz inyectado en la ruta (aprendize)
        $aprendizId = $this->route('aprendize')?->id ?? $this->route('aprendize');

        return [
            'documento' => ['required', 'string', 'max:20', Rule::unique('aprendizs', 'documento')->ignore($aprendizId)],
            'nombre'    => ['required', 'string', 'max:100'],
            'apellido'  => ['required', 'string', 'max:100'],
            'email'     => ['required', 'email', 'max:150', Rule::unique('aprendizs', 'email')->ignore($aprendizId)],
            'ficha'     => ['required', 'string', 'max:20'],
            'estado'    => ['required', 'in:en_formacion,retirado,graduado'],
        ];
    }

    public function messages(): array
    {
        return [
            'documento.unique' => 'El número de documento ya se encuentra registrado.',
            'email.unique'     => 'El correo electrónico ya se encuentra registrado.',
            'estado.in'        => 'El estado seleccionado no es válido.',
        ];
    }
}