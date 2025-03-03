@extends('plantilla')

@section('contenido')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        Dar de alta Trabajador
    </div>
    <form class="py-4 px-6" action="{{ route('trabajadores.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nombre">
                Nombre
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nombre" type="text" name="nombre" value="{{ old('nombre') }}">

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
        id="apellidos" type="text" name="apellidos" value="{{ old('apellidos') }}">
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
                id="email" type="email" name="email" value="{{ old('email') }}">

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
                id="telefono" type="text" name="telefono" value="{{ old('telefono') }}">

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
                id="fecha_nacimiento" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
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
                <option value="compras">Compras</option>
                <option value="ventas">Ventas</option>
                <option value="rrhh">RRHH</option>
                <option value="i+d">I+D</option>
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
                id="cargos" type="text" name="cargos" value="{{ old('cargos') }}" placeholder="Introduces cargos separandolos por ,">

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
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
            @error('sustituto')
                <p class="text-red-500">  {{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-center mb-4">
            <button
                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                type="submit">
                  Añadir trabajador
            </button>
        </div>

    </form>
</div>
@endsection
