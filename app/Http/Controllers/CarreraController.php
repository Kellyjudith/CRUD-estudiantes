<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Mostrar listado de carreras
     */
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Mostrar formulario para crear carrera
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Guardar nueva carrera en la base de datos
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo' => 'required|string|max:20|unique:carreras,codigo',
        ], [
            'nombre.required' => 'El nombre de la carrera es obligatorio.',
            'codigo.required' => 'El código de la carrera es obligatorio.',
            'codigo.unique'   => 'Ya existe una carrera con ese código.',
        ]);

        Carrera::create($request->only('nombre', 'codigo'));

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera registrada correctamente.');
    }

    /**
     * Mostrar formulario para editar carrera
     */
    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    /**
     * Actualizar carrera en la base de datos
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo' => 'required|string|max:20|unique:carreras,codigo,' . $carrera->id,
        ], [
            'nombre.required' => 'El nombre de la carrera es obligatorio.',
            'codigo.required' => 'El código de la carrera es obligatorio.',
            'codigo.unique'   => 'Ya existe una carrera con ese código.',
        ]);

        $carrera->update($request->only('nombre', 'codigo'));

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera actualizada correctamente.');
    }

    /**
     * Eliminar carrera de la base de datos
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return redirect()->route('carreras.index')
                         ->with('success', 'Carrera eliminada correctamente.');
    }
}