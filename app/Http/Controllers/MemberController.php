<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->back()->with('success', 'Relation ajoutée');
    }

    public function destroy($groupid, $membreid)
    {

        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }
        $group = Group::findOrFail($groupid);
        if($user->id = $group->user_id) {

            $member = Member::where('user_id', $membreid)
                ->where('group_id', $groupid)
                ->first();


            $member->delete();
            return redirect()->back()->with('success', 'Relation supprimée');
        }
        else{
            return view('auth.login');
        }
    }
}
