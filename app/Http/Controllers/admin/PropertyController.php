<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::latest()->paginate(24);
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.properties.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);

        Property::create($validate);
        return redirect(route('properties.index'))->with('msg', 'ویژگی مورد نظر با موفّقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $validate = $request->validate([
            'title' => 'required',
            'icon' => 'required',
        ]);

        $property->updateOrFail($validate) ;
        return redirect(route('properties.index'))->with('msg', 'ویژگی مورد نظر با موفّقیت بروز شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->deleteOrFail() ;
        return redirect(route('properties.index'))->with('msg', 'ویژگی مورد نظر با موفّقیت حدف شد');

    }
}
