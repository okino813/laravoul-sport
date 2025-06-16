<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\PracticeValue;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $fields = Field::with('unit')->get();
        return view('fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return view('fields.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($groupid, $practiceid,Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'unit' => 'required|integer|exists:units,id',
        ]);

        $field = Field::create([
            'name' => $request->input('name'),
            'unit_id' => $request->input('unit'),
        ]);
        PracticeValue::create([
            'value' => $request->input('value'),
            'practice_id' => $practiceid,
            'field_id' => $field->id,

        ]);

        return redirect()->back()->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        $field->load('unit');
        return view('fields.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        $units = Unit::all();
        $field->load('unit');
        return view('fields.edit', compact('field', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'unit_id' => 'required|exists:units,id',
        ]);

        $field->update($validated);
        return redirect()->route('fields.index')->with('success', 'Field mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        $field->delete();
        return redirect()->route('fields.index')->with('success', 'Field mis à jour avec succès.');
    }
}
