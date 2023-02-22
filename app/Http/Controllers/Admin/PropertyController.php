<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;
use App\Models\Gallery;
use App\Http\Requests\Admin\PropertyRequest;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::with(['galleries', 'category'])->get();

        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['name', 'id']);

        return view('admin.properties.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyRequest $request)
    {
        $slug = Str::slug($request->name, '-');
        $property =  Property::create($request->validated() + ['slug' => $slug]);

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'success created !',
            'alert' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $categories = Category::get(['name', 'id']);

        return view('admin.properties.edit', compact('property','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PropertyRequest $request,Property $property)
    {
        $slug = Str::slug($request->name, '-');
        $property->update($request->validated() + ['slug' => $slug]);

        return redirect()->route('admin.properties.index')->with([
            'message' => 'success updated !',
            'alert' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->back()->with([
            'message' => 'success deleted !',
            'alert' => 'danger'
        ]);
    }
}
