<?php

namespace App\Http\Controllers;

use App\Models\GroupSport;
use App\Models\Group;
use App\Models\Sport;
use Illuminate\Http\Request;

class GroupSportController extends Controller
{
    public function index()
    {
        $relations = GroupSport::with(['group', 'sport'])->get();
        return view('groups_sport.index', compact('relations'));
    }

    public function create()
    {
        $groups = Group::all();
        $sports = Sport::all();
        return view('groups_sport.create', compact('groups', 'sports'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'sport_id' => 'required|exists:sports,id',
        ]);

        GroupSport::create($validated);
        return redirect()->route('groups-sport.index')->with('success', 'Relation ajoutée');
    }

    public function destroy($id)
    {
        $relation = GroupSport::findOrFail($id);
        $relation->delete();
        return redirect()->route('groups-sport.index')->with('success', 'Relation supprimée');
    }
}
