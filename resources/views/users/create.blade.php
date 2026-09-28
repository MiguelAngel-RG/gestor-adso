<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <x-input-label for="name" value="Nombre Completo" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mb-4">
                        <x-input-label for="email" value="Correo Electrónico" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Rol del Usuario -->
                    <div class="mb-4">
                        <x-input-label for="role" value="Rol de Usuario" />
                        <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Selecciona un rol...</option>
                            <option value="aprendiz" {{ old('role') == 'aprendiz' ? 'selected' : '' }}>Aprendiz (Solo Lectura)</option>
                            <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }}>Instructor (Crear y Editar)</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador (Control Total)</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-4">
                        <x-input-label for="password" value="Contraseña" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirmar Contraseña -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" value="Confirmar Contraseña" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex items-center justify-end mt-6 space-x-3">
                        <a href="{{ route('users.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                            Cancelar
                        </a>
                        <x-primary-button>
                            {{ __('Guardar Usuario') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>