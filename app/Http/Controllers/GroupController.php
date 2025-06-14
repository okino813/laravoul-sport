<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::All();
        return view('groups.index', compact('groups'));
    }

     public function mygroups()
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }
        $groups = Group::where('user_id', $user->id)->get();
        return view('groups.myindex', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if($user == null){
            return view('auth.login');
        }

        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $group = Group::create([
            'name' => $request->input('name'),
            'user_id' => $user->id
        ]);

        return redirect()->route('dashboard.group.show', $group)->with('success', 'Group créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        if($group->user_id == $user->id)
        {
            return view('dashboard.index');
        }
        else{
            return view('groups.edit', compact('group'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group->update($validated);
        return redirect()->route('groups.index')->with('success', 'Group mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('dashboard.groups.index')->with('success', 'Group mis à jour avec succès.');
    }
}
