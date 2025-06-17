<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::All();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // On test si l'utilisateur est authentifier
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        return view('dashboard.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }


        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }
         $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
        ]);

        $user->update($request->all());
        return redirect()->route('users.edit', compact('user'))->with('success', 'Utilisateur mis à jour avec succès.');
    }


    public function editPassword()
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

        return view('users.password', compact('user'));
    }


    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        if($user == null){
            return view('auth.login');
        }

         $request->validate([
            'password' => 'required|min:6',
            'passwordConfirm' => 'required|same:password'
        ]);
        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect()->route('editPassword')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
}
