@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('estudiantes.index') }}" class="text-stone-400 hover:text-stone-600 transition">
            ← Volver
        </a>
        <h1 class="text-3xl font-bold text-stone-800">✏️ Editar Estudiante</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-8 max-w-2xl">
        <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-stone-700 font-medium mb-2">Nombre completo</label>
                <input type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" 
                       class="w-full border border-stone-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
            </div>

            <div>
                <label class="block text-stone-700 font-medium mb-2">Correo electrónico</label>
                <input type="email" name="correo" value="{{ old('correo', $estudiante->correo) }}" 
                       class="w-full border border-stone-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
            </div>

            <div>
                <label class="block text-stone-700 font-medium mb-2">Carrera</label>
                <select name="carrera_id" 
                        class="w-full border border-stone-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
                    <option value="">-- Selecciona una carrera --</option>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ old('carrera_id', $estudiante->carrera_id) == $carrera->id ? 'selected' : '' }}>
                            {{ $carrera->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-stone-700 font-medium mb-2">Semestre</label>
                <input type="number" name="semestre" value="{{ old('semestre', $estudiante->semestre) }}" 
                       min="1" max="12" class="w-full border border-stone-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-amber-300">
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="bg-amber-600 hover:bg-amber-700 text-white font-medium px-6 py-3 rounded-xl shadow-sm transition">
                     Actualizar Estudiante
                </button>
            </div>
        </form>
    </div>
@endsection