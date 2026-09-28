<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAprendizRequest;
use App\Http\Requests\UpdateAprendizRequest;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendizes = Aprendiz::latest()->paginate(10);
        return view('aprendizes.index', compact('aprendizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aprendizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAprendizRequest $request)
    {
        Aprendiz::create($request->validated());

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aprendiz $aprendize)
    {
        return view('aprendizes.show', ['aprendiz' => $aprendize]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aprendiz $aprendize)
    {
        return view('aprendizes.edit', ['aprendiz' => $aprendize]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAprendizRequest $request, Aprendiz $aprendize)
    {
        // 1. Ejecutamos la actualización de datos validados
        $aprendize->update($request->validated());

        // 2. Redireccionamos con mensaje de éxito
        return redirect()->route('aprendizes.index')
            ->with('success', 'Información del aprendiz actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aprendiz $aprendize)
    {
        $aprendize->delete();

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz eliminado correctamente.');
    }
}