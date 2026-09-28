<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AprendizController extends Controller
{
    public function index()
    {
        $aprendizes = Aprendiz::paginate(10);
        return view('aprendizes.index', compact('aprendizes'));
    }

    public function create()
    {
        // Solo Admin e Instructor pueden acceder al formulario de creación
        Gate::authorize('manage-aprendizes');

        return view('aprendizes.create');
    }

    public function store(Request $request)
    {
        // Solo Admin e Instructor pueden guardar nuevos aprendices
        Gate::authorize('manage-aprendizes');

        $request->validate([
            'documento' => 'required|unique:aprendizes,documento',
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email'     => 'required|email|unique:aprendizes,email',
            'ficha'     => 'required|string|max:20',
            'estado'    => 'required|string',
        ]);

        Aprendiz::create($request->all());

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz registrado correctamente.');
    }

    public function show(Aprendiz $aprendiz)
    {
        return view('aprendizes.show', compact('aprendiz'));
    }

    public function edit(Aprendiz $aprendiz)
    {
        // Solo Admin e Instructor pueden acceder a la vista de edición
        Gate::authorize('manage-aprendizes');

        return view('aprendizes.edit', compact('aprendiz'));
    }

    public function update(Request $request, Aprendiz $aprendiz)
    {
        // Solo Admin e Instructor pueden actualizar registros
        Gate::authorize('manage-aprendizes');

        $request->validate([
            'documento' => 'required|unique:aprendizes,documento,' . $aprendiz->id,
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email'     => 'required|email|unique:aprendizes,email,' . $aprendiz->id,
            'ficha'     => 'required|string|max:20',
            'estado'    => 'required|string',
        ]);

        $aprendiz->update($request->all());

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Aprendiz $aprendiz)
    {
        // Solo Admin e Instructor pueden eliminar registros
        Gate::authorize('manage-aprendizes');

        $aprendiz->delete();

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz eliminado correctamente.');
    }
}