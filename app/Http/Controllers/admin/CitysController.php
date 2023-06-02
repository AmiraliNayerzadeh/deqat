<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citys= City::latest()->paginate(12);
        return view('admin.citys.index' , compact('citys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.citys.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => ['required'],
                'nameEnglish' => ['required'],
                'image' => ['nullable'],
                'description' => ['nullable'] ,

            ]
        );

        if ($request->file('image')) {
            $file = $request->file('image');
            $file->move(public_path('/main/image/city/'), $file->getClientOriginalName());
            $validate['image']= '/main/image/city/' . $file->getClientOriginalName();
//            User::create(['image' => $validate['images']]);
        }

        City::create($validate);

        return redirect(route('citys.index'))->with('msg' , 'شهر مورد نظر با موفّقیت ایجاد شد');

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
    public function edit(City $city)
    {
        return view('admin.citys.edit' , compact('city') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $validate = $request->validate(
            [
                'name' => ['required'],
                'nameEnglish' => ['required'],
                'image' => ['nullable'],
                'description' => ['nullable'] ,

            ]
        );

        if ($request->file('image')) {
            $file = $request->file('image');
            $file->move(public_path('/main/image/city/'), $file->getClientOriginalName());
            $validate['image']= '/main/image/city/' . $file->getClientOriginalName();
//            User::create(['image' => $validate['images']]);
        }

        $city->updateOrFail($validate);

        return redirect(route('citys.index'))->with('msg' , 'شهر مورد نظر با موفّقیت ایجاد شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
            $city->deleteOrFail() ;
        return redirect(route('citys.index'))->with('msg' , 'شهر مورد نظر با موفّقیت حدف شد');

    }
}
