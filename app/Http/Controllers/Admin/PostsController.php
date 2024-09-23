<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        // withTrashed() - Include the soft deleted records in a query's results
        $all_posts = $this->post->latest()->paginate(5);

        return view('admin.posts.index')
        ->with('all_posts', $all_posts);
    }
}
