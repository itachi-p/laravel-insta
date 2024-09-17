<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // show() - view the profile page of a user
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        return view('users.profile.show')
            ->with('user', $user);
    }

    // edit() - view Edit Profile Page
    public function edit()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.profile.edit')
            ->with('user', $user);
    }
}
