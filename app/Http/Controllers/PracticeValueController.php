<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Practice;
use App\Models\PracticeValue;
use App\Models\Field;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;

class PracticeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practicevalues = PracticeValue::all();
        return view('practicevalues.index',  compact('practicevalues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::all();
        $practices = Practice::all();
        return view('practicevalues.create', compact('practices', 'fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'practice_id' => 'required|integer|exists:practices,id',
            'field_id' => 'required|integer|exists:fields,id',
        ]);

        PracticeValue::create([
            'value' => $request->input('value'),
            'practice_id' => $request->input('practice_id'),
            'field_id' => $request->input('field_id'),
        ]);

        return redirect()->route('practicevalues.index')->with('success', 'Entrainement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PracticeValue $practicevalue)
    {
        $practicevalue->load('practice');
        $practicevalue->load('field');
        return view('practicevalues.show', compact('practicevalue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PracticeValue $practicevalue)
    {
        $fields = Field::all();
        $practices = Practice::all();
        $practicevalue->load('field');
        $practicevalue->load('practice');
        return view('practicevalues.edit', compact('practicevalue', 'fields', 'practices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PracticeValue $practicevalue)
    {

        $validated = $request->validate([
            'value' => 'required|integer',
            'practice_id' => 'required|integer|exists:practices,id',
            'field_id' => 'required|integer|exists:fields,id',
        ]);

        $practicevalue->update($validated);
        return redirect()->route('practicevalues.index')->with('success', 'Practice mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PracticeValue $practiceValue)
    {
        $practiceValue->delete();
        return redirect()->route('practicevalues.index')->with('success', 'PracticeValue mis à jour avec succès.');
    }
}
