<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $location = Location::latest()->paginate(22);
        return view('admin.locations.index', compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => ['required'],
                'logo' => ['required'],
                'cover' => ['nullable'],
                'description' => ['nullable'],
                'phone' => ['required'],
                'address' => ['required'],
                'phoneSec' => ['nullable'],
                'email' => ['nullable'],
                'instagram' => ['nullable'],
                'linkedin' => ['nullable'],
                'twitter' => ['nullable'],
                'web' => ['nullable'],
                'video' => ['nullable'],
                'user_id' => ['nullable'],
                'city_id' => ['required'],
                'properties' => ['required'],
                'categories' => ['required'],
                'map' => ['required'],
                'images' => 'nullable'

            ]
        );

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $file->move(public_path('/main/image/location/logo/'), $file->getClientOriginalName());
            $validate['logo'] = '/main/image/location/logo/' . $file->getClientOriginalName();
//            User::create(['image' => $validate['images']]);
        }

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $file->move(public_path('/main/image/location/cover/'), $file->getClientOriginalName());
            $validate['cover'] = '/main/image/location/cover/' . $file->getClientOriginalName();
        }

        if ($request->file('video')) {
            $file = $request->file('video');
            $file->move(public_path('/main/image/location/video/'), $file->getClientOriginalName());
            $validate['video'] = '/main/image/location/video/' . $file->getClientOriginalName();
        }



        $locations = Location::create($validate);
        $locations->properties()->sync($validate['properties']);
        $locations->categories()->sync($validate['categories']);


        /*galleries*/
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            $uploadPath = '/main/image/location/gallery/';
            foreach ($request->file('images') as $imageFile) {
                $extection = $imageFile->getClientOriginalName();
                $imageFile->move(public_path('/main/image/location/gallery/'), $imageFile->getClientOriginalName());
                $finalImagePathName = $uploadPath . $extection;

                $locations->gallery()->create([
                    'location_id' => $locations->id,
                    'path' => $finalImagePathName
                ]);

            }

        }


        return redirect(route('locations.index'))->with('msg', 'موقعیت مورد نظر با موفّقیت ایجاد شد');
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
    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $validate = $request->validate(
            [
                'name' => ['required'],
                'logo' => ['nullable'],
                'cover' => ['nullable'],
                'description' => ['nullable'],
                'phone' => ['required'],
                'address' => ['required'],
                'phoneSec' => ['nullable'],
                'email' => ['nullable'],
                'instagram' => ['nullable'],
                'linkedin' => ['nullable'],
                'twitter' => ['nullable'],
                'web' => ['nullable'],
                'video' => ['nullable'],
                'user_id' => ['nullable'],
                'city_id' => ['required'],
                'properties' => ['required'],
                'categories' => ['required'],
                'map' => ['required'],
                'images' => ['nullable'],

            ]
        );

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $file->move(public_path('/main/image/location/logo/'), $file->getClientOriginalName());
            $validate['logo'] = '/main/image/location/logo/' . $file->getClientOriginalName();
//            User::create(['image' => $validate['images']]);
        }

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $file->move(public_path('/main/image/location/cover/'), $file->getClientOriginalName());
            $validate['cover'] = '/main/image/location/cover/' . $file->getClientOriginalName();
        }

        if ($request->file('video')) {
            $file = $request->file('video');
            $file->move(public_path('/main/image/location/video/'), $file->getClientOriginalName());
            $validate['video'] = '/main/image/location/video/' . $file->getClientOriginalName();
        }





        $location->updateOrFail($validate);
        $location->properties()->sync($validate['properties']);
        $location->categories()->sync($validate['categories']);

        /*galleries*/
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            $uploadPath = '/main/image/location/gallery/';
            foreach ($request->file('images') as $imageFile) {
                $extection = $imageFile->getClientOriginalName();
                $imageFile->move(public_path('/main/image/location/gallery/'), $imageFile->getClientOriginalName());
                $finalImagePathName = $uploadPath . $extection;

                $location->gallery()->create([
                    'location_id' => $location->id,
                    'path' => $finalImagePathName
                ]);

            }

        }


        return redirect(route('locations.index'))->with('msg', 'موقعیت مورد نظر با موفّقیت ایجاد شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->deleteOrFail();
        return redirect(route('locations.index'))->with('msg', 'موقعیت مورد نظر با موفّقیت حذف شد');
    }
}
