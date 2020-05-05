<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with(['children' => function ($query) {
            $query->orderBy('sort');
        }, 'sites'])
            ->withCount('children')
            ->orderBy('sort')
            ->get();
        return view('index')->with('categories', $categories);
    }

    public function about()
    {
        return view('about');
    }
}
