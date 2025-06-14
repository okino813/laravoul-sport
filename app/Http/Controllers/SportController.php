<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
   public function index()
    {
        $sports = Sport::All();
        return view('sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Sport::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('sports.index')->with('success', 'Sport créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        return view('sports.show', compact('sport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $sport->update($validated);
        return redirect()->route('sports.index')->with('success', 'Sport mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();
        return redirect()->route('sports.index')->with('success', 'Sport mis à jour avec succès.');
    }
}
