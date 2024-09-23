<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    // index() - view the Admin: Categories Page
    public function index()
    {
          // Retrieve all the categories
        $all_categories = $this->category->latest()->get();

        return view('admin.categories.index')
            ->with('all_categories', $all_categories);
    }
}
