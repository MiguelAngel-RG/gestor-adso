<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Aprendices') }}
            </h2>
            @can('create', App\Models\Aprendiz::class)
                <a href="{{ route('aprendizes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    + Nuevo Aprendiz
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Formulario de Búsqueda --}}
                <div class="mb-6">
                    <form method="GET" action="{{ route('aprendizes.index') }}" class="flex gap-2">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ $search ?? '' }}" 
                            placeholder="Buscar por nombre, documento, email o ficha..." 
                            class="w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                        >
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md text-xs uppercase font-semibold hover:bg-gray-700">
                            Buscar
                        </button>
                        @if(!empty($search))
                            <a href="{{ route('aprendizes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-xs uppercase font-semibold hover:bg-gray-300">
                                Limpiar
                            </a>
                        @endif
                    </form>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b text-xs text-gray-500 uppercase tracking-wider">
                            <th class="py-3 px-2">Documento</th>
                            <th class="py-3 px-2">Nombre</th>
                            <th class="py-3 px-2">Email</th>
                            <th class="py-3 px-2">Ficha</th>
                            <th class="py-3 px-2">Estado</th>
                            <th class="py-3 px-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse ($aprendizes as $aprendiz)
                            <tr>
                                <td class="py-3 px-2 font-mono">{{ $aprendiz->documento }}</td>
                                <td class="py-3 px-2 font-medium">{{ $aprendiz->nombre }} {{ $aprendiz->apellido }}</td>
                                <td class="py-3 px-2 text-gray-600">{{ $aprendiz->email }}</td>
                                <td class="py-3 px-2 font-mono">{{ $aprendiz->ficha }}</td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-1 text-xs rounded-full font-semibold
                                        {{ $aprendiz->estado === 'en_formacion' || $aprendiz->estado === 'activo' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $aprendiz->estado === 'retirado' || $aprendiz->estado === 'inactivo' ? 'bg-red-100 text-red-800' : '' }}
                                        {{ $aprendiz->estado === 'graduado' || $aprendiz->estado === 'condicionado' ? 'bg-blue-100 text-blue-800' : '' }}">
                                        {{ str_replace('_', ' ', ucfirst($aprendiz->estado)) }}
                                    </span>
                                </td>
                                <td class="py-3 px-2 space-x-3">
                                    <a href="{{ route('aprendizes.show', $aprendiz) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Ver</a>
                                    
                                    @can('update', $aprendiz)
                                        <a href="{{ route('aprendizes.edit', $aprendiz) }}" class="text-amber-600 hover:text-amber-900 font-semibold">Editar</a>
                                    @endcan

                                    @can('delete', $aprendiz)
                                        <form action="{{ route('aprendizes.destroy', $aprendiz) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este aprendiz?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Eliminar</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500">
                                    No se encontraron aprendices registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $aprendizes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>