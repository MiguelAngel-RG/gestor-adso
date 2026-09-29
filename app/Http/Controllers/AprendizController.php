<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAprendizRequest;
use App\Http\Requests\UpdateAprendizRequest;
use App\Models\Aprendiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AprendizController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $aprendizes = Aprendiz::query()
            ->when($search, function ($query, $search) {
                return $query->where('nombre', 'like', "%{$search}%")
                    ->orWhere('apellido', 'like', "%{$search}%")
                    ->orWhere('documento', 'like', "%{$search}%")
                    ->orWhere('ficha', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('aprendizes.index', compact('aprendizes', 'search'));
    }

    public function create()
    {
        Gate::authorize('create', Aprendiz::class);

        return view('aprendizes.create');
    }

    public function store(StoreAprendizRequest $request)
    {
        // La validación y autorización ocurren automáticamente en StoreAprendizRequest
        Aprendiz::create($request->validated());

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz registrado correctamente.');
    }

    public function show(Aprendiz $aprendiz)
    {
        Gate::authorize('view', $aprendiz);

        return view('aprendizes.show', compact('aprendiz'));
    }

    public function edit(Aprendiz $aprendiz)
    {
        Gate::authorize('update', $aprendiz);

        return view('aprendizes.edit', compact('aprendiz'));
    }

    public function update(UpdateAprendizRequest $request, Aprendiz $aprendiz)
    {
        // La validación y autorización ocurren automáticamente en UpdateAprendizRequest
        $aprendiz->update($request->validated());

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz actualizado correctamente.');
    }

    public function destroy(Aprendiz $aprendiz)
    {
        Gate::authorize('delete', $aprendiz);

        $aprendiz->delete();

        return redirect()->route('aprendizes.index')
            ->with('success', 'Aprendiz eliminado correctamente.');
    }
}