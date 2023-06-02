<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\gym;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('home.profile.index');
    }


    public function updateProfile(Request $request , User $user)
    {
        $validate = $request->validate([
            'name' => ['required'],
            'email' => ['required' ,'email'],
            'phone' => ['required'],
            'age' => ['nullable'],
            'city' => ['nullable'],
            'address' => ['nullable'],
            'avatar' => ['nullable'],
        ]);

        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $file->move(public_path('/main/image/Avatars/'), $file->getClientOriginalName());
            $validate['avatar'] = '/main/image/Avatars/' . $file->getClientOriginalName();
        }

        $user->update($validate);
        return back()->with('msg' , 'اطالاعت شما با موفقیت بروز شد');

    }

    public function createGym(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'logo' => ['nullable'],
            'instagram' => ['nullable'],
            'address' => ['required'],
            'user_id' => ['required'],
            'about' => ['nullable'],
        ]);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $file->move(public_path('/main/image/Gyms/logo/'), $file->getClientOriginalName());
            $validate['logo'] = '/main/image/Gyms/logo/' . $file->getClientOriginalName();
        }

        gym::create($validate) ;
        return back()->with('msg' , 'باشگاه شما با موفقیت ایجاد شد');
    }

    public function updateGym(Request $request , gym $gym)
    {
        $validate = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'logo' => ['nullable'],
            'instagram' => ['nullable'],
            'address' => ['required'],
            'about' => ['nullable'],
        ]);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $file->move(public_path('/main/image/Gyms/logo/'), $file->getClientOriginalName());
            $validate['logo'] = '/main/image/Gyms/logo/' . $file->getClientOriginalName();
        }

        $gym->update($validate);
        return back()->with('msg' , 'اطّلاعات باشگاه شما با موفّقیت بروز شد');

    }

}
