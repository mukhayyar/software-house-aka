<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PhotoProfileController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'photo' => ['nullable', 'image', 'max:2048'], // max 2MB
        ]);

        $user = User::find(Auth::id());

        if ($request->hasFile('photo')) {
            $file = request('photo');
            $filename = $file->getClientOriginalName();

            $file->storeAs('avatars/'. Auth::id(), $filename, 's3');
            
            $user->profile_photo = $filename;
        }
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }
}
