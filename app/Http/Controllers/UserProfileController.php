<?php

namespace App\Http\Controllers;

use App\Models\User;


use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUserPasswordRequest;

class UserProfileController extends Controller
{
    //
    public function userprofile($id)
    {
        $user = User::with('role')->find($id);
        return view('profile', compact('user'));
    }

    public function updatePassword(UpdateUserPasswordRequest $request, User $user)
    {
        $this->authorize('is_admin');

     User::where('id',$user->id)->update(['password'=>bcrypt($request->input('password'))]);
        return redirect()->route('user.index')->with('success', 'Password Changed successfully!');

    }
}