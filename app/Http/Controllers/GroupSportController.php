<?php

namespace App\Http\Controllers;

use App\Models\GroupSport;
use App\Models\Group;
use App\Models\Member;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        $group = Group::findOrFail($request->group_id);
        if($user->id = $group->user_id) {

            $validated = $request->validate([
                'group_id' => 'required|exists:groups,id',
                'sport_id' => 'required|exists:sports,id',
            ]);

            GroupSport::create($validated);
            return redirect()->back()->with('success', 'Relation ajoutée');
        }
        else{
            return view('auth.login');
        }
    }

    public function destroy($groupid, $sportid)
    {

         $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }
        $group = Group::findOrFail($groupid);
        if($user->id = $group->user_id) {

            $groupsport = GroupSport::where('sport_id', $sportid)
                ->where('group_id', $groupid)
                ->first();


            $groupsport->delete();
            return redirect()->back()->with('success', 'Relation supprimée');
        }
        else{
            return view('auth.login');
        }

    }
}
