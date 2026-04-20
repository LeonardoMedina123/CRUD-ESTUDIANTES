<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carreras = Carrera::paginate(10);
        return view('carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carreras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El nombre de la carrera es requerido.',
            'nombre.string' => 'El nombre de la carrera debe ser texto.',
            'nombre.max' => 'El número de caracteres permitido es 255.',
        ]);

        $carrera = new Carrera();
        $carrera->nombre = $request->nombre;
        $carrera->save();

        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente.');
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
        $carrera = Carrera::findOrFail($id);
        return view('carreras.edit', compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El nombre de la carrera es requerido.',
            'nombre.string' => 'El nombre de la carrera debe ser texto.',
            'nombre.max' => 'El número de caracteres permitido es 255.',
        ]);

        $carrera = Carrera::findOrFail($id);
        $carrera->nombre = $request->nombre;
        $carrera->save();

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();

        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada exitosamente.');
    }
}
