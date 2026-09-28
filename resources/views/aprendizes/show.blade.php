<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Aprendiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-4">
                <div class="border-b pb-4 flex justify-between items-center">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $aprendiz->nombre }} {{ $aprendiz->apellido }}</h3>
                        <p class="text-sm text-gray-500">Documento: {{ $aprendiz->documento }}</p>
                    </div>
                    <span class="px-3 py-1 text-sm rounded-full font-semibold
                        {{ $aprendiz->estado === 'en_formacion' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $aprendiz->estado === 'retirado' ? 'bg-red-100 text-red-800' : '' }}
                        {{ $aprendiz->estado === 'graduado' ? 'bg-blue-100 text-blue-800' : '' }}">
                        {{ str_replace('_', ' ', ucfirst($aprendiz->estado)) }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="block text-gray-500 font-bold">Correo Electrónico:</span>
                        <span class="text-gray-800">{{ $aprendiz->email }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-500 font-bold">Teléfono:</span>
                        <span class="text-gray-800">{{ $aprendiz->telefono ?? 'No registrado' }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-500 font-bold">Ficha SENA:</span>
                        <span class="text-gray-800">{{ $aprendiz->ficha }}</span>
                    </div>
                    <div>
                        <span class="block text-gray-500 font-bold">Fecha de Registro:</span>
                        <span class="text-gray-800">{{ $aprendiz->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>

                <div class="flex justify-end space-x-2 pt-6 border-t">
                    <a href="{{ route('aprendizes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Volver</a>
                    <a href="{{ route('aprendizes.edit', $aprendiz) }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>