@extends('plantilla')

@section('contenido')
<div class="max-w-sm mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
    <img class="w-full h-64 object-cover" src="{{ asset( 'storage/' .$trabajador->foto) }}" alt="Foto de {{ $trabajador->nombre }} {{ $trabajador->apellidos }}">
    <div class="p-4">
        <h2 class="text-2xl font-semibold text-purple-700">{{ $trabajador->nombre }} {{ $trabajador->apellidos }}</h2>
        <p class="text-gray-500">{{ $trabajador->departamento }}</p>
        <p class="mt-2 text-sm text-gray-600"><strong>Email:</strong> {{ $trabajador->email }}</p>
        <p class="text-sm text-gray-600"><strong>Teléfono:</strong> {{ $trabajador->telefono }}</p>
        <p class="text-sm text-gray-600"><strong>Fecha de Nacimiento:</strong> {{ $trabajador->fecha_nacimiento}}</p>
        <p class="text-sm text-gray-600"><strong>Sustituto:</strong> {{ $trabajador->sustituto ? 'Sí' : 'No' }}</p>
        <p class="text-sm text-gray-600"><strong>Mayor de 55:</strong> {{ $trabajador->mayor55 ? 'Sí' : 'No' }}</p>

        <div class="mt-4">
            <h3 class="font-semibold text-purple-700">Cargos:</h3>
            @if ($trabajador->cargos && is_array($trabajador->cargos))
                <ul>
                    @foreach ($trabajador->cargos as $cargo)
                        <li>{{ $cargo }}</li>
                    @endforeach
                </ul>
            @else
                <p>No tiene cargos asignados.</p>
            @endif
        </div>
    </div>
</div>
@endsection
