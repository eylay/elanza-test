<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if parent_category_id is null it means this is a main category
        $mainCats = Category::whereNull('parent_category_id')->get();
        return view('dashboard.cats.index', compact('mainCats'));
    }

    public function getSubs(Category $cat)
    {
        return view('dashboard.cats.card', compact('cat'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $newCat = Category::create($data);
        $cat = $newCat->parent ?? $newCat;
        // it returns a view because it's ajax request and DOM needs to be updated with new HTML code
        return view('dashboard.cats.card', compact('cat'));
    }

    public function update(CategoryRequest $request, Category $cat)
    {
        $data = $request->validated();
        $cat->update($data);
        $cat = $request->mode == 'card' ? $cat : $cat->parent;
        // it returns a view because it's ajax request and DOM needs to be updated with new HTML code
        return view('dashboard.cats.card', compact('cat'));
    }

    public function destroy(Category $cat)
    {
        $cat->delete();
        return true;
    }
}
