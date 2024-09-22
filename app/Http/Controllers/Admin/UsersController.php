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
        // withTrashed() - Include the soft deleted records in a query's results
        $all_users = $this->user->withTrashed()->latest()->paginate(5);

        return view('admin.users.index')
        ->with('all_users', $all_users);
    }


    # deactivate() - to soft delete the user
    public function deactivate($id)
    {
        $this->user->destroy($id);

        return redirect()->back();
    }


    # activate() - undelete SoftDeletes column (deleted_at) back to NULL
    public function activate($id)
    {
          // onlyTrashed() - retrieves soft deleted records only.
          // restore() - This will "un-delete" a soft deleted model instance. This will set the "deleted_at" column to NULL.
        $this->user->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }
}
