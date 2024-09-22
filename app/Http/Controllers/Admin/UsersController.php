<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    # index() - view the Admin: Users Page
    public function index()
    {
        $all_users = $this->user->latest()->paginate(5);

        return view('admin.users.index')
        ->with('all_users', $all_users);
    }


    # deactivate() - to soft delete the user
    public function deactivate($id)
    {
        $this->user->destroy($id);

        return redirect()->back();
    }
}
