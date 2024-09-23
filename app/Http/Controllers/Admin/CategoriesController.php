<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    private $category;
    private $post;

    public function __construct(Category $category, Post $post)
    {
        $this->category = $category;
        $this->post     = $post;
    }


    // index() - view the Admin: Categories Page
    public function index()
    {
          // Retrieve all the categories
        $all_categories = $this->category->orderBy('updated_at', 'desc')->paginate(10);

        $uncategorized_count = 0;                   // this holds the number of posts that are not categorized
        $all_posts           = $this->post->all();  // retrieves all posts from the DB
        foreach ($all_posts as $post) {
            if ($post->categoryPost->count() == 0) {
                $uncategorized_count++;
            }
        }

        return view('admin.categories.index')
            ->with('all_categories', $all_categories)
            ->with('uncategorized_count', $uncategorized_count);
    }

      // store() - save the category to DB
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:50'
        ]);

        $this->category->name = $request->name;
        $this->category->save();

        return redirect()->back();
    }


      // update() - save the changes of the category name
    public function update(Request $request, $id)
    {
        $request->validate([
            'new_name' => 'required|min:1|max:50|unique:categories,name,' . $id
        ]);

        $category = $this->category->findOrFail($id);
        $category->name = ucwords(strtolower($request->new_name));
        $category->save();

        return redirect()->back();
    }


          // destroy() - destroy/delete the category from DB (permanently delete, no soft delete)
        public function destroy($id)
        {
            $this->category->destroy($id);

            return redirect()->back();
        }
}
