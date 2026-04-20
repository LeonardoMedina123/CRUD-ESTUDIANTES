<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes',
            'carrera_id' => 'required|exists:carreras,id',
            'semestre' => 'required|integer|min:1|max:12',
        ], [
            'nombre.required' => 'El nombre del estudiante es obligatorio.',
            'nombre.string' => 'El nombre del estudiante debe ser texto.',
            'nombre.max' => 'El número de caracteres permitido es 255.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El correo debe tener un formato válido.',
            'correo.unique' => 'Ya existe un estudiante con ese correo.',
            'carrera_id.required' => 'La carrera es obligatoria.',
            'carrera_id.exists' => 'La carrera seleccionada no es válida.',
            'semestre.required' => 'El semestre es obligatorio.',
            'semestre.integer' => 'El semestre debe ser un número entero.',
            'semestre.min' => 'El semestre mínimo es 1.',
            'semestre.max' => 'El semestre máximo es 12.',
        ]);

        $estudiante = new Estudiante();
        $estudiante->nombre = $request->nombre;
        $estudiante->correo = $request->correo;
        $estudiante->carrera_id = $request->carrera_id;
        $estudiante->semestre = $request->semestre;
        $estudiante->save();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:estudiantes,correo,' . $id,
            'carrera_id' => 'required|exists:carreras,id',
            'semestre' => 'required|integer|min:1|max:12',
        ], [
            'nombre.required' => 'El nombre del estudiante es obligatorio.',
            'nombre.string' => 'El nombre del estudiante debe ser texto.',
            'nombre.max' => 'El número de caracteres permitido es 255.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'El correo debe tener un formato válido.',
            'correo.unique' => 'Ya existe un estudiante con ese correo.',
            'carrera_id.required' => 'La carrera es obligatoria.',
            'carrera_id.exists' => 'La carrera seleccionada no es válida.',
            'semestre.required' => 'El semestre es obligatorio.',
            'semestre.integer' => 'El semestre debe ser un número entero.',
            'semestre.min' => 'El semestre mínimo es 1.',
            'semestre.max' => 'El semestre máximo es 12.',
        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->nombre = $request->nombre;
        $estudiante->correo = $request->correo;
        $estudiante->carrera_id = $request->carrera_id;
        $estudiante->semestre = $request->semestre;
        $estudiante->save();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
