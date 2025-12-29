<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ProfileController extends Controller
{
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
     * Update profile (NAME + EMAIL + FOTO SUPABASE)
     * SATU FORM, SATU ROUTE
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // ===============================
        // UPDATE DATA PROFILE (BREEZE)
        // ===============================
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // ===============================
        // UPLOAD FOTO KE SUPABASE
        // ===============================
        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ]);

            $file = $request->file('photo');
            $filename = 'avatars/'.uniqid().'_'.$file->getClientOriginalName();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('services.supabase.key'),
                'apikey' => config('services.supabase.key'),
                'Content-Type' => $file->getMimeType(),
            ])->post(
                config('services.supabase.url')
                .'/storage/v1/object/'
                .config('services.supabase.bucket')
                .'/'.$filename,
                file_get_contents($file)
            );

            if ($response->successful()) {
                $user->photo =
                    config('services.supabase.url')
                    .'/storage/v1/object/public/'
                    .config('services.supabase.bucket')
                    .'/'.$filename;
            }
        }

        $user->save();

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
