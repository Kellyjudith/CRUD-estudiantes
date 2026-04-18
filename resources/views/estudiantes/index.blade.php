@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-stone-800">👩‍🎓 Estudiantes</h1>
        <a href="{{ route('estudiantes.create') }}" 
           class="inline-flex items-center gap-2 bg-white border border-amber-300 text-amber-700 px-5 py-2 rounded-full shadow-sm hover:bg-amber-50 hover:border-amber-400 transition duration-200 font-medium">
             Nuevo Estudiante
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-stone-200">
                <thead class="bg-stone-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase tracking-wider">Correo</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase tracking-wider">Carrera</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase tracking-wider">Semestre</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-stone-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @forelse($estudiantes as $estudiante)
                        <tr class="hover:bg-stone-50 transition">
                            <td class="px-6 py-4 text-sm text-stone-500">{{ $estudiante->id }}</td>
                            <td class="px-6 py-4 font-medium text-stone-800">{{ $estudiante->nombre }}</td>
                            <td class="px-6 py-4 text-stone-600">{{ $estudiante->correo }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    {{ $estudiante->carrera->nombre ?? 'Sin asignar' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-stone-600">{{ $estudiante->semestre }}º</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('estudiantes.edit', $estudiante) }}" 
                                   class="text-amber-600 hover:text-amber-800 border border-amber-200 hover:border-amber-300 bg-white rounded-full px-3 py-1 text-sm font-medium transition">
                                    Editar
                                </a>
                                <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" onsubmit="return confirm('¿Eliminar este estudiante?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:text-rose-700 border border-rose-200 hover:border-rose-300 bg-white rounded-full px-3 py-1 text-sm font-medium transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-stone-400">
                                 No hay estudiantes registrados. ¡Crea uno nuevo!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection