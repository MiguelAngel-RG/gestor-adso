<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Aprendiz') }}: {{ $aprendiz->nombre }} {{ $aprendiz->apellido }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('aprendizes.update', $aprendiz) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="documento" value="Documento de Identidad" />
                        <x-text-input id="documento" name="documento" type="text" class="mt-1 block w-full" :value="old('documento', $aprendiz->documento)" required />
                        <x-input-error :messages="$errors->get('documento')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="nombre" value="Nombres" />
                            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $aprendiz->nombre)" required />
                            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="apellido" value="Apellidos" />
                            <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" :value="old('apellido', $aprendiz->apellido)" required />
                            <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="email" value="Correo Electrónico" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $aprendiz->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="telefono" value="Teléfono" />
                            <x-text-input id="telefono" name="telefono" type="text" class="mt-1 block w-full" :value="old('telefono', $aprendiz->telefono)" />
                            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="ficha" value="Número de Ficha SENA" />
                            <x-text-input id="ficha" name="ficha" type="text" class="mt-1 block w-full" :value="old('ficha', $aprendiz->ficha)" required />
                            <x-input-error :messages="$errors->get('ficha')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="estado" value="Estado" />
                            <select id="estado" name="estado" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="en_formacion" {{ old('estado', $aprendiz->estado) == 'en_formacion' ? 'selected' : '' }}>En Formación</option>
                                <option value="retirado" {{ old('estado', $aprendiz->estado) == 'retirado' ? 'selected' : '' }}>Retirado</option>
                                <option value="graduado" {{ old('estado', $aprendiz->estado) == 'graduado' ? 'selected' : '' }}>Graduado</option>
                            </select>
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-4">
                        <a href="{{ route('aprendizes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Cancelar</a>
                        <x-primary-button>Actualizar Aprendiz</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>