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
     * UPDATE DATA PROFILE (BREEZE)
     * ⚠️ JANGAN PAKAI INI BUAT FOTO
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * ✅ UPDATE FOTO PROFILE (SUPABASE)
     * INI YANG DIPAKAI FORM FOTO
     */
    public function updatePhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $user = $request->user();

        $file = $request->file('photo');
        $filename = uniqid().'_'.$file->getClientOriginalName();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('SUPABASE_KEY'),
            'apikey' => env('SUPABASE_KEY'),
            'Content-Type' => $file->getMimeType(),
        ])->post(
            env('SUPABASE_URL')
            .'/storage/v1/object/'
            .env('SUPABASE_BUCKET')
            .'/'.$filename,
            file_get_contents($file)
        );

        if ($response->successful()) {
            $user->photo =
                env('SUPABASE_URL')
                .'/storage/v1/object/public/'
                .env('SUPABASE_BUCKET')
                .'/'.$filename;

            $user->save();
        }

        return Redirect::route('profile.edit')->with('status', 'photo-updated');
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
