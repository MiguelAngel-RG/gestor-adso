@csrf

<!-- Documento -->
<div class="mb-4">
    <x-input-label for="documento" value="Documento de Identidad" />
    <x-text-input id="documento" name="documento" type="text" class="mt-1 block w-full" 
        :value="old('documento', $aprendiz->documento ?? '')" required />
    <x-input-error :messages="$errors->get('documento')" class="mt-2" />
</div>

<!-- Nombres y Apellidos -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <x-input-label for="nombre" value="Nombres" />
        <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" 
            :value="old('nombre', $aprendiz->nombre ?? '')" required />
        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="apellido" value="Apellidos" />
        <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" 
            :value="old('apellido', $aprendiz->apellido ?? '')" required />
        <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
    </div>
</div>

<!-- Email y Ficha -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <x-input-label for="email" value="Correo Electrónico" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" 
            :value="old('email', $aprendiz->email ?? '')" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="ficha" value="Número de Ficha" />
        <x-text-input id="ficha" name="ficha" type="text" class="mt-1 block w-full" 
            :value="old('ficha', $aprendiz->ficha ?? '')" required />
        <x-input-error :messages="$errors->get('ficha')" class="mt-2" />
    </div>
</div>

<!-- Estado -->
<div class="mb-6">
    <x-input-label for="estado" value="Estado del Aprendiz" />
    <select id="estado" name="estado" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        <option value="en_formacion" {{ old('estado', $aprendiz->estado ?? '') === 'en_formacion' ? 'selected' : '' }}>En Formación</option>
        <option value="retirado" {{ old('estado', $aprendiz->estado ?? '') === 'retirado' ? 'selected' : '' }}>Retirado</option>
        <option value="graduado" {{ old('estado', $aprendiz->estado ?? '') === 'graduado' ? 'selected' : '' }}>Graduado</option>
    </select>
    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
</div>