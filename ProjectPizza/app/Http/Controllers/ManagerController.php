<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();
        if ($user->Rol === 'klant' || $user->Rol === 'medewerker') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }


        $Werkers = User::all()->where('Rol', 'Medewerker');

        $bezorgers = User::all()->where('Rol', 'bezorger');



        return view('manager.index', compact('Werkers', 'bezorgers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('manager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant' || $user->Rol === 'medewerker') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'woonplaats' => 'required|string|max:255',
            'adres' => 'required|string|max:255',
            'telefoonnummer' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:manager,werker,bezorger',
        ]);

        // Create a new user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'woonplaats' => $request->input('woonplaats'),
            'adres' => $request->input('adres'),
            'telefoonnummer' => $request->input('telefoonnummer'),
            'password' => Hash::make($request->input('password')),
            'Rol' => $request->input('role'),
        ]);

        // Redirect back with a success message
        return redirect()->route('manager.index')->with('success', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant' || $user->Rol === 'medewerker') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        $werker = User::find($id);

        return view('manager.show', compact('werker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant' || $user->Rol === 'medewerker') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }
        $werker = User::findOrFail($id);

        return view('manager.edit', compact('werker'));
    }

    public function destroy(string $id)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant' || $user->Rol === 'medewerker') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }
        $werker = User::findOrFail($id);
        $werker->delete();

        return redirect()->route('manager.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if ($user->Rol === 'klant' || $user->Rol === 'medewerker') {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'woonplaats' => 'required|string|max:255',
            'adres' => 'required|string|max:255',
            'telefoonnummer' => 'required|string|max:15',
            'role' => 'required|string|in:manager,werker,bezorger',

        ]);

        // Find the user by ID and update their details
        $werker = User::findOrFail($id);
        $werker->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'woonplaats' => $request->input('woonplaats'),
            'adres' => $request->input('adres'),
            'telefoonnummer' => $request->input('telefoonnummer'),
            'Rol' => $request->input('role'),
        ]);

        // Redirect back with a success message
        return redirect()->route('manager.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */

}
