<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Group;
use App\Models\Practice;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practices = Practice::all();
        return view('practices.index',  compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sports = Sport::all();
        $groups = Group::all();
        $users = User::all();
        return view('practices.create', compact('groups', 'sports', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required|integer|exists:groups,id',
            'sport_id' => 'required|integer|exists:sports,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        Practice::create([
            'name' => $request->input('name'),
            'group_id' => $request->input('group_id'),
            'sport_id' => $request->input('sport_id'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->route('practices.index')->with('success', 'Entrainement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Practice $practice)
    {
        $practice->load('sport');
        $practice->load('user');
        $practice->load('group');
        return view('practices.show', compact('practice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Practice $practice)
    {
        $sports = Sport::all();
        $users = User::all();
        $groups = Group::all();
        $practice->load('sport');
        $practice->load('group');
        $practice->load('user');
        return view('practices.edit', compact('practice', 'sports', 'groups', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Practice $practice)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required|integer|exists:groups,id',
            'sport_id' => 'required|integer|exists:sports,id',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $practice->update($validated);
        return redirect()->route('practices.index')->with('success', 'Field mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Practice $practice)
    {
        $practice->delete();
        return redirect()->route('practices.index')->with('success', 'Field mis à jour avec succès.');
    }
}
