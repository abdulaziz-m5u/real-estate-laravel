<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if($request->validated()) {
            $banner = $request->file('banner')->store(
                'assets/categories', 'public'
            );
            $slug = Str::slug($request->name, '-');
            Category::create($request->except('banner') + ['slug' => $slug, 'banner' => $banner]);
        }

        return redirect()->route('admin.categories.index')->with([
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        if($request->validated()) {
            $slug = Str::slug($request->name, '-');
            if($request->banner) {
                File::delete('storage/' . $category->banner);
                $banner = $request->file('banner')->store('assets/categories', 'public');
                $category->update($request->except('banner') + ['slug' => $slug, 'banner' => $banner]);
            }else {
                $category->update($request->validated() + ['slug' => $slug]);
            }
        }

        return redirect()->route('admin.categories.index')->with([
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
    public function destroy(Category $category)
    {
        if($category->banner) {
            File::delete('storage/'. $category->banner);
        }
        $category->delete();

        return redirect()->back()->with([
            'message' => 'success deleted !',
            'alert' => 'danger'
        ]);
    }
}
