<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories($parentId)
    {
        return Category::where('parent_id', $parentId)->get();
    }
}
