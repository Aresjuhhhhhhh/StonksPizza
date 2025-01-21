<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function updateWoonplaats(Request $request)
    {
        $request->validate([
            'woonplaats' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->woonplaats = $request->woonplaats;
        $user->save();

        return back()->with('status', 'Woonplaats succesvol bijgewerkt!');
    }
    public function updateAddress(Request $request)
    {
        $request->validate([
            'adres' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->adres = $request->adres;
        $user->save();

        return back()->with('status', 'Adres succesvol bijgewerkt!');
    }

    public function updatePhoneNumber(Request $request)
    {
        $request->validate([
            'telefoonnummer' => 'required|string|max:15',
        ]);

        $user = auth()->user();
        $user->telefoonnummer = $request->telefoonnummer;
        $user->save();

        return back()->with('status', 'Telefoonnummer succesvol bijgewerkt!');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
