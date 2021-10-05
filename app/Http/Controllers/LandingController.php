<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class LandingController extends Controller
{
    public function welcome()
    {
        // if parent_category_id is null it means this is a main category
        $mainCats = Category::whereNull('parent_category_id')->get();
        return view('welcome', compact('mainCats'));
    }
}
