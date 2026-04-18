@extends('layouts.app')

@section('title', 'Editar Carrera')

@section('content')
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('carreras.index') }}" class="text-stone-400 hover:text-stone-600">← Volver</a>
        <h1 class="text-3xl font-bold text-stone-800">✏️ Editar Carrera</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-8 max-w-2xl">
        <form action="{{ route('carreras.update', $carrera) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-stone-700 font-medium mb-2">Nombre de la Carrera</label>
                <input type="text" name="nombre" value="{{ old('nombre', $carrera->nombre) }}" 
                       class="w-full border border-stone-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-amber-300">
            </div>
            <div>
                <label class="block text-stone-700 font-medium mb-2">Código</label>
                <input type="text" name="codigo" value="{{ old('codigo', $carrera->codigo) }}" 
                       class="w-full border border-stone-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-amber-300">
            </div>
            <div class="pt-4">
                <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-xl">Actualizar Carrera</button>
            </div>
        </form>
    </div>
@endsection