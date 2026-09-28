<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Mensaje de bienvenida -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-1">
                    ¡Bienvenido al Sistema de Gestión ADSO, {{ Auth::user()->name }}!
                </h3>
                <p class="text-sm text-gray-600">
                    Has iniciado sesión correctamente. Desde este panel puedes administrar los accesos del sistema y los registros académicos.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Módulo de Usuarios / Accesos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-indigo-500">
                    <h4 class="font-bold text-gray-800 text-md mb-2">Gestión de Usuarios y Roles</h4>
                    <p class="text-sm text-gray-600 mb-4">
                        Crea, edita y gestiona las cuentas de acceso al sistema (Administradores, Instructores y Aprendices).
                    </p>
                    <div class="flex space-x-3">
                        <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Ver Usuarios
                        </a>
                        <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            + Crear Usuario / Admin
                        </a>
                    </div>
                </div>

                <!-- Módulo de Aprendices -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <h4 class="font-bold text-gray-800 text-md mb-2">Módulo de Aprendices</h4>
                    <p class="text-sm text-gray-600 mb-4">
                        Consulta y administra la información académica, fichas y ficheros de aprendices.
                    </p>
                    <div class="flex space-x-3">
                        <a href="{{ route('aprendizes.index') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                            Ver Aprendices
                        </a>
                        <a href="{{ route('aprendizes.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            + Registrar Aprendiz
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>