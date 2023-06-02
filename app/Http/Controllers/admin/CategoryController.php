<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::latest()->paginate(21);
        return view('admin.categories.index' , compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required' ,
            'parent' => 'required' ,
            'icon' => 'nullable',
            'description' => 'nullable',
            'cover' => 'nullable',
        ]);

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $file->move(public_path('/main/image/categories/cover/'), $file->getClientOriginalName());
            $validate['cover'] = '/main/image/categories/cover/' . $file->getClientOriginalName();
        }


        Category::create($validate);
        return redirect(route('categories.index'))->with('msg' , 'دسته بندی جدید با موفقیت ایجاد شد.') ;
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name' => 'required' ,
            'parent' => 'required' ,
            'icon' => 'nullable',
            'description' => 'nullable',
            'cover' => 'nullable',
        ]);

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $file->move(public_path('/main/image/categories/cover/'), $file->getClientOriginalName());
            $validate['cover'] = '/main/image/categories/cover/' . $file->getClientOriginalName();
        }

        $category->updateOrFail($validate);
        return redirect(route('categories.index'))->with('msg' , 'دسته بندی  با موفقیت بروز شد.') ;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
