<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user= User::latest()->paginate(12);
        return view('admin.users.index' , compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create' );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['nullable', 'unique:users'],
                'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
                'address' => 'nullable',
                'about' => 'nullable',
                'age' => ['nullable', 'int'],
                'city' => ['nullable'],
                'is_superuser' => ['required'],
                'is_owner' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $file->move(public_path('/main/image/Avatars'), $file->getClientOriginalName());
            $validate['avatar'] = '/main/image/Avatars' . $file->getClientOriginalName();
//            User::create(['avatar' => $validate['avatar']]);
        }



        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'address' => $validate['address'],
            'about' => $validate['about'],
            'age' => $validate['age'],
            'avatar' => $validate['avatar'],
            'city' => $validate['city'],
            'is_superuser' => $validate['is_superuser'],
            'is_owner' => $validate['is_owner'],
            'password' => Hash::make($validate['password']),
        ]);

        return redirect(route('users.index'))->with('msg' , 'کاربر مورد نظر با موفّقیت ایجاد شد');
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
    public function edit(User $user)
    {
        return view('admin.users.edit' , compact('user') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone' => ['nullable'],
                'avatar' => ['nullable', 'mimes:jpg,jpeg,png'] ,
                'address' => 'nullable',
                'about' => 'nullable',
                'age' => ['nullable', 'int'],
                'city' => ['nullable'],
                'is_superuser' => ['required'],
                'is_owner' => ['required'],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]
        );

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $file->move(public_path('/main/image/Avatars/'), $file->getClientOriginalName());
            $validate['avatar'] = '/main/image/Avatars/' . $file->getClientOriginalName();

            $user->update(['avatar' => $validate['avatar']]);
        }

        if ($request['password'] != null) {
            $user->update([
                'password' => Hash::make($validate['password']),
            ]);
        }

        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'address' => $validate['address'],
            'about' => $validate['about'],
            'age' => $validate['age'],
            'city' => $validate['city'],
            'is_superuser' => $validate['is_superuser'],
            'is_owner' => $validate['is_owner'],
        ]);

        return redirect(route('users.index'))->with('msg' , 'کاربر مورد نظر با موفّقیت بروز شد');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete() ;
        return redirect(route('users.index'))->with('msg' , 'کاربر مورد نظر با موفّقیت حذف شد');
    }
}
