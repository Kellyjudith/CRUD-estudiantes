@extends('layouts.app')

@section('title', 'Carreras')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-stone-800">📚 Carreras</h1>
        <a href="{{ route('carreras.create') }}" 
           class="inline-flex items-center gap-2 bg-white border border-amber-300 text-amber-700 px-5 py-2 rounded-full shadow-sm hover:bg-amber-50 transition">
             Nueva Carrera
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase">Nombre</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase">Código</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($carreras as $carrera)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 text-stone-500">{{ $carrera->id }}</td>
                            <td class="px-6 py-4 font-medium text-stone-800">{{ $carrera->nombre }}</td>
                            <td class="px-6 py-4">
                                <span class="font-mono text-sm bg-stone-100 px-2 py-1 rounded">{{ $carrera->codigo }}</span>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('carreras.edit', $carrera) }}" 
                                   class="text-amber-600 hover:text-amber-800 border border-amber-200 rounded-full px-3 py-1 text-sm">Editar</a>
                                <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" onsubmit="return confirm('¿Eliminar carrera?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-700 border border-rose-200 rounded-full px-3 py-1 text-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-stone-400">📭 No hay carreras registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection