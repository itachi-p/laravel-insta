<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;
    private $category;

    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }


    // create() - view the Create Post Page
    public function create(){
        $all_categories = $this->category->all(); //retrieve all the categories

        return view('users.posts.create')
                ->with('all_categories', $all_categories);
    }


    // store() - save the post to DB
    public function store(Request $request)
    {
        $request->validate([
            'category'      => 'required|array|between:1,3',
            'description'   => 'required|min:1|max:1000',
            'image'         => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        # Save the post
        $this->post->user_id     = Auth::user()->id;
        $this->post->image       = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
        $this->post->description = $request->description;
        $this->post->save();

        # Save the categories to the category_post pivot table
        foreach ($request->category as $category_id){
            $category_post[] = ['category_id' => $category_id];
            /*
                $category_post = [
                    ['category_id' => 1],
                    ['category_id' => 2],
                    ['category_id' => 3],
                ];
            */
        }
        $this->post->categoryPost()->createMany($category_post);

        # Go back to homepage
        return redirect()->route('index');
    }


    // show() - view Show Post Page
    public function show($id)
    {
        $post = $this->post->findOrFail($id);

        return view('users.posts.show')
                ->with('post', $post);
    }

}
