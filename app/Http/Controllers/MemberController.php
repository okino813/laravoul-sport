<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $relations = Member::with(['group', 'user'])->get();
        return view('members.index', compact('relations'));
    }

    public function create()
    {
        $groups = Group::all();
        $users = User::all();
        return view('members.create', compact('groups', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'group_id' => 'required|exists:groups,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Member::create($validated);
        return redirect()->route('members.index')->with('success', 'Relation ajoutée');
    }

    public function destroy($id)
    {
        $relation = Member::findOrFail($id);
        $relation->delete();
        return redirect()->route('members.index')->with('success', 'Relation supprimée');
    }
}
