<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->storeAs(
                'avatars',
                'user_' . $user->id . '.' . $request->file('avatar')->extension(),
                'public'
            );

            $user->avatar = $path;
            $user->save();

            return response()->json([
                'success' => true,
                'path' => asset('storage/' . $path)
            ]);
        }

        return response()->json([
            'success' => false
        ], 400);
    }
}
