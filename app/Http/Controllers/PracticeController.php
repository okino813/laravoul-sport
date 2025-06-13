<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\User;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practices = Practice::All();
        return view('practices.index', compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('practices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Practice::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('practices.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Practice $practice)
    {
        return view('practices.show', compact('practice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Practice $practice)
    {
        return view('practices.edit', compact('practice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Practice $practice)
    {
        $practice->update($request->all());
        return redirect()->route('practices.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Practice $practice)
    {
        $practice->delete();
        return redirect()->route('practices.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
}
