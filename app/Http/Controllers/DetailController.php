<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(Property $property)
    {
        return view('detail', compact('property'));
    }
}
