
@extends('plantilla')

@section('contenido')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        Dar de alta Trabajador
    </div>
    <form class="py-4 px-6" action="{{ route('trabajadores.update',$trabajador->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nombre">
                Nombre
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nombre" type="text" name="nombre" value="{{ old('nombre',$trabajador->nombre) }}">

            @error('nombre')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
    <label class="block text-gray-700 font-bold mb-2" for="apellidos">
        Apellidos
    </label>
    <input
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        id="apellidos" type="text" name="apellidos" value="{{ old('apellidos',$trabajador->apellidos) }}">
    @error('apellidos')
        <p class="text-red-500">  {{ $message }}</p>
    @enderror
</div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" type="email" name="email" value="{{ old('email',$trabajador->email) }}">

            @error('email')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="telefono">
                 Número de  telefono
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="telefono" type="text" name="telefono" value="{{ old('telefono',$trabajador->telefono) }}">

            @error('telefono')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="foto">
                Foto
            </label>
            <input
                id="foto" type="file" name="foto">

                @if ($trabajador->foto)
            <p class="mt-2 text-sm text-gray-500">Escudo actual:</p>
            <img src="{{ asset(  $trabajador->foto) }}" alt="foto de {{ $trabajador->id }}" class="h-16 mt-2">
        @endif
            @error('foto')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="fecha_nacimiento">
                Fecha de nacimiento
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento',$trabajador->fecha_nacimiento) }}">
            @error('fecha_nacimiento')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="departamento">
                Departamento
            </label>
            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="departamento" name="departamento">
                        <option value="">Selecciona un Departamento</option>
                        <option value="compras" @selected($trabajador->departamento == 'compras')>Compras</option>
                        <option value="ventas" @selected($trabajador->departamento == 'ventas')>Ventas</option>
                        <option value="rrhh" @selected($trabajador->departamento == 'rrhh')>RRHH</option>
                          <option value="i+d" @selected($trabajador->departamento == 'i+d')>I+D</option>
            </select>
            @error('departamento')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>

         <div class="mb-4">
             <label class="block text-gray-700 font-bold mb-2" for="cargos">
        Cargos
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="cargos" type="text" name="cargos"
                value="{{ old('cargos', is_array($trabajador->cargos) ? implode(',', $trabajador->cargos) : $trabajador->cargos) }}"
                placeholder="Introduces cargos separandolos por ,">

                @error('cargos')
                     <p class="text-red-500">  {{ $message }}</p>
                 @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="sustituto">
                 ¿Es sustito?
            </label>
            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="sustituto" name="sustituto">
                <option value="0" @selected($trabajador->sustituto == '0')>No</option>
                <option value="1" @selected($trabajador->sustituto == '1')>Si</option>
            </select>
            @error('sustituto')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-center mb-4">
            <button
                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                type="submit">
                  Editar trabajador
            </button>
        </div>

    </form>
</div>
@endsection
