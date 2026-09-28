<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b text-xs text-gray-500 uppercase">
                            <th class="py-3 px-2">ID</th>
                            <th class="py-3 px-2">Nombre</th>
                            <th class="py-3 px-2">Email</th>
                            <th class="py-3 px-2">Rol</th>
                            <th class="py-3 px-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @foreach ($users as $u)
                            <tr>
                                <td class="py-3 px-2 font-mono">{{ $u->id }}</td>
                                <td class="py-3 px-2 font-medium">{{ $u->name }}</td>
                                <td class="py-3 px-2 text-gray-600">{{ $u->email }}</td>
                                <td class="py-3 px-2">
                                    <span class="px-2 py-1 text-xs rounded-full font-semibold
                                        {{ $u->role === 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                                        {{ $u->role === 'instructor' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $u->role === 'aprendiz' ? 'bg-gray-100 text-gray-800' : '' }}">
                                        {{ ucfirst($u->role) }}
                                    </span>
                                </td>
                                <td class="py-3 px-2 space-x-2">
                                    <a href="{{ route('users.edit', $u) }}" class="text-amber-600 hover:text-amber-900 font-semibold">Editar / Rol</a>
                                    @if(auth()->id() !== $u->id)
                                        <form action="{{ route('users.destroy', $u) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">Eliminar</button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 italic">(Tu usuario)</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>