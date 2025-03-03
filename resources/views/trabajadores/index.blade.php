@extends('plantilla')

@section('contenido')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-white text-center mb-6">Lista de Trabajadores</h1>


<form action="{{ route('trabajadores.filtrar') }}" method="POST" class="bg-indigo-400 p-6 rounded-lg shadow-md mb-6">
    @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

            <div>
                <label for="apellidos" class="block text-white font-semibold mb-1">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="{{ request('apellidos') }}" class="w-full px-4 py-2 rounded-md border-gray-300">
            </div>


            <div>
                <label for="sustituto" class="block text-white font-semibold mb-1">Sustituto:</label>
                <select id="sustituto" name="sustituto" class="w-full px-4 py-2 rounded-md border-gray-300">
                    <option value="">Todos</option>
                    <option value="1" {{ request('sustituto') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ request('sustituto') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>


            <div>
                <label for="mayor_55" class="block text-white font-semibold mb-1">Mayor de 55:</label>
                <select id="mayor_55" name="mayor_55" class="w-full px-4 py-2 rounded-md border-gray-300">
                    <option value="">Todos</option>
                    <option value="1" {{ request('mayor_55') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ request('mayor_55') == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>


            <div>
                <label for="departamento" class="block text-white font-semibold mb-1">Departamento:</label>
                <select id="departamento" name="departamento" class="w-full px-4 py-2 rounded-md border-gray-300">
                    <option value="">Todos</option>
                    <option value="compras" {{ request('departamento') == 'compras' ? 'selected' : '' }}>Compras</option>
                    <option value="ventas" {{ request('departamento') == 'ventas' ? 'selected' : '' }}>Ventas</option>
                    <option value="rrhh" {{ request('departamento') == 'rrhh' ? 'selected' : '' }}>RRHH</option>
                    <option value="i+d" {{ request('departamento') == 'i+d' ? 'selected' : '' }}>I+D</option>
                </select>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded-md text-lg font-medium hover:bg-blue-600">Filtrar</button>

        </div>
    </form>




    @if($trabajadores->isEmpty())
        <div class="text-center mt-10">
            <a href="{{ route('trabajadores.create') }}" class="text-lg text-purple-300 hover:text-purple-500 font-semibold">
                No hay trabajadores registrados. ¡Crea uno aquí!
            </a>
        </div>
    @else



        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($trabajadores as $trabajador)
                <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
                    <img src="{{ asset(  $trabajador->foto) }}" alt="{{ $trabajador->nombre }}" class="w-full h-40 object-cover rounded-md">

                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $trabajador->nombre }} {{ $trabajador->apellidos }}</h2>
                        <p class="text-gray-600">Departamento: <span class="font-semibold">{{ ucfirst($trabajador->departamento) }}</span></p>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="{{ route('trabajadores.show', $trabajador->id) }}" class="bg-blue-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-600">Más información</a>
                            <a href="{{ route('trabajadores.edit', $trabajador->id) }}" class="bg-yellow-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-yellow-600">Editar</a>

                            <form action="{{ route('trabajadores.delete', $trabajador->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-red-600">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
