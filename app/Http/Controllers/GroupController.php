<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupSport;
use App\Models\Sport;
use App\Models\User;
use App\Models\Member;
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
        if ($user == null) {
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

    public function showview(Group $group)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        $members = Member::with(['user', 'group'])
                ->where('group_id', $group->id)  // Filtrer par l'ID du groupe
                ->get();


        $coach = User::find($group->user_id);

        $sportsGroup = $group->sports;


        return view('groups.showview', compact('group', 'members', 'coach', 'sportsGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $user = Auth::user();
        if ($user == null) {
            return view('auth.login');
        }

        if ($user->id = $group->user_id) {

            // On récupère les membres
            $members = Member::with(['user', 'group'])
                ->where('group_id', $group->id)  // Filtrer par l'ID du groupe
                ->get();

            // Récupérer les utilisateurs qui ne sont pas membres de ce groupe
            $membersIds = Member::where('group_id', $group->id)
                ->pluck('user_id');  // On récupère tous les user_id des membres du groupe

            // Récupérer tous les utilisateurs sauf ceux qui sont déjà membres
            $usersNotInGroup = User::whereNotIn('id', $membersIds)->get();

            $coach = User::find($group->user_id);

            // On récupère tous les sports associés au groupe via la relation 'sports' (correspond à 'group_sport')
            $sportsGroup = $group->sports;  // Utilisation de la relation 'sports' définie dans le modèle 'Group'

            // Récupérer les sports qui ne sont pas encore liés à ce groupe
            $sportIds = $sportsGroup->pluck('id');  // On récupère tous les sport_id déjà associés au groupe

            // Récupérer tous les sports sauf ceux qui sont déjà liés au groupe
            $sportsNotInGroup = Sport::whereNotIn('id', $sportIds)->get();

            return view('groups.edit', compact('group', 'members', 'usersNotInGroup', 'coach', 'sportsGroup', 'sportsNotInGroup'));
        }
        else{
            return view('auth.login');
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
