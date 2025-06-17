<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\PracticeValue;
use App\Models\Unit;
use App\Models\Group;
use App\Models\Practice;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

      $practiceRelation = Practice::with([
        'user',
        'group',
        'sport',
        'values.field.unit'
    ])->where('user_id', $user->id)->get();

        return view('practices.index',  compact('practiceRelation'));
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

         $groups = $user->groups()->with('sports')->get();




        return view('practices.create', compact('groups', 'user'));
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
            'champs' => ['required', 'regex:/^\d+-\d+$/'],
            'name' => 'required|string|max:255',
        ]);

        list($group_id, $sport_id) = explode('-', $request->input('champs'));

        // Vérifier que le groupe existe
        $group = Group::find($group_id);
        if (!$group) {
            return back()->withErrors(['champs' => 'Groupe invalide'])->withInput();
        }

        // Vérifier que l'utilisateur appartient bien au groupe
        $isMember = $group->users()->where('users.id', $user->id)->exists();
        if (!$isMember) {
            return back()->withErrors(['champs' => 'Vous n\'appartenez pas à ce groupe'])->withInput();
        }

        // Vérifier que le sport est bien lié au groupe
        $sportExistsInGroup = $group->sports()->where('sport_id', $sport_id)->exists();
        if (!$sportExistsInGroup) {
            return back()->withErrors(['champs' => 'Sport non lié à ce groupe'])->withInput();
        }

        $result = Practice::create([
            'name' => $request->input('name'),
            'group_id' => $group_id,
            'sport_id' => $sport_id,
            'user_id' => $user->id,
        ]);

        return redirect()->route('practices.edit', $result->id)->with('success', 'Entrainement créé avec succès.');
    }


    public function edit(Practice $practice)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

         $practiceRelation = Practice::with([
        'user',
        'group',
        'sport',
        'values.field.unit'
        ])->findOrFail($practice->id);

        if($practiceRelation->user_id == $user->id){
           $units = Unit::all();
            return view('practices.edit', compact('practiceRelation', 'practice', 'units'));
        }
        return back();


    }

    public function update(Request $request, Practice $practice)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }
        if($user->id = $request->input("user_id")) {


            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'group_id' => 'required|integer|exists:groups,id',
                'sport_id' => 'required|integer|exists:sports,id',
                'user_id' => 'required|integer|exists:users,id',
            ]);

            $practice->update($validated);

            // Mise à jour des champs dynamiques
            $fields = $request->input('fields', []);

            foreach ($fields as $fieldId => $fieldValue) {
                $practiceValue = PracticeValue::where("field_id", $fieldId)->first();
                if ($practiceValue) {
                    $practiceValue->value = $fieldValue;
                    $practiceValue->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Field mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Practice $practice)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }
        if($user->id == $practice->user_id) {
            $practice->delete();
            return redirect()->route('dashboard.practices.index')->with('success', 'Field mis à jour avec succès.');
        }
        else{
            return back();
        }
    }
}
