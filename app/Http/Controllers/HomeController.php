<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('properties')->get();
        $properties = Property::with('category', 'galleries')->get();

        return view('homepage', compact('categories', 'properties'));
    }
}
