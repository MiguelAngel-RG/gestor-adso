<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Aprendiz') }}: {{ $aprendiz->nombre }} {{ $aprendiz->apellido }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('aprendizes.update', $aprendiz->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Aquí incluyes el parcial que contiene todos los campos --}}
                    @include('aprendizes.partials.form')

                    <!-- Botones de Acción -->
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('aprendizes.index') }}" class="mr-3 text-sm text-gray-600 hover:text-gray-900 underline">
                            Cancelar
                        </a>
                        <x-primary-button>
                            {{ __('Actualizar Aprendiz') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>