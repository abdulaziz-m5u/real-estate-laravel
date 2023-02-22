<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request, Property $property)
    {
        if($request->validated()) {
            $photo = $request->file('photo')->store(
                'assets/properties/gallery', 'public'
            );
            Gallery::create(['photo' => $photo, 'property_id' => $property->id]);
        }

        return redirect()->back()->with([
            'message' => 'success upload !',
            'alert' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property, Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('property', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, Property $property,Gallery $gallery)
    {
        if($request->validated()) {
            if($request->photo) {
                File::delete('storage/' . $gallery->photo);
                $photo = $request->file('photo')->store(
                    'assets/properties/gallery', 'public'
                );
                $gallery->update(['photo' => $photo, 'property_id' => $property->id]);
            }
        }

        return redirect()->route('admin.properties.edit', $property)->with([
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
    public function destroy(Property $property,Gallery $gallery)
    {
        if($gallery->photo) {
            File::delete('storage/'. $gallery->photo);
        }

        $gallery->delete();

        return redirect()->back()->with([
            'message' => 'success deleted !',
            'alert' => 'danger'
        ]);
    }
}
