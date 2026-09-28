<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Mensaje de bienvenida sencillo -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">
                    ¡Bienvenido al Sistema de Gestión ADSO, {{ Auth::user()->name }}!
                </h3>
                <p class="mt-1 text-sm text-gray-600">
                    Has iniciado sesión correctamente. Desde este panel puedes administrar los registros de aprendices y la información del sistema.
                </p>
            </div>

            <!-- Accesos rápidos limpios -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-800 text-md">Módulo de Aprendices</h4>
                        <p class="text-sm text-gray-500 mt-1">Consulta el listado general de aprendices registrados en la plataforma.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('aprendizes.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Ver Aprendices
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between">
                    <div>
                        <h4 class="font-semibold text-gray-800 text-md">Registro Nuevo</h4>
                        <p class="text-sm text-gray-500 mt-1">Agrega de forma rápida un nuevo aprendiz al sistema de formación.</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('aprendizes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            + Registrar Aprendiz
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>