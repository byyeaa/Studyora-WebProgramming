<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = session('user');

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $sessionUser = session('user');

        if (!$sessionUser) {
            return back()->with('error', 'User belum login');
        }

        $user = User::find($sessionUser->id);

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        $user->name = $request->name;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();

            $path = public_path('profiles');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true);
            }

            $file->move($path, $filename);

            if ($user->photo && File::exists(public_path('profiles/'.$user->photo))) {
                File::delete(public_path('profiles/'.$user->photo));
            }

            $user->photo = $filename;
        }

        $user->save();

        session(['user' => $user]);

        return back()->with('success', 'Profile berhasil diperbarui');
    }
}
