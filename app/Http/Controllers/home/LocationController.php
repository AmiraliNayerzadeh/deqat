<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Comment;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::query();

        if ($name = \request('name')) {
            $location->where('name' , 'LIKE' , "%{$name}%") ;
        }

        if ($city = \request('city')) {
            $location->where('city_id' , 'LIKE' , "%{$city}%") ;
        }

        if ($name || $city ) {
            $location = $location->latest()->get() ;
        } else {
            $location = $location->latest()->paginate(24) ;
        }



        return view('home.locations.index' , compact('location'));
    }

    public function single(Location $location)
    {
        return view('home.locations.single', compact('location'));
    }

    public function claim(Request $request)
    {
        $validate = $request->validate([
            'user_id'=> 'required' ,
            'location_id'=> 'required' ,
            'name'=> 'required' ,
            'phone'=> 'required' ,
            'email'=> 'required' ,
            'description'=> 'required' ,
        ]);

        Claim::create($validate);
        return back()->with('mag' , 'درخواست ادعای مالکیت شما با موفّقیت ثبت شد. کارشناسان ما به زودی با شما تماس خواهند گرفت');
    }

    public function comment(Request $request)
    {
        $validate = $request->validate([
            'comment' => 'required' ,
            'star' => 'required' ,
            'commentable_type' => 'required' ,
            'commentable_id' => 'required' ,
            'user_id' => 'required' ,
        ]) ;

        Comment::create($validate);
        return back()->with('mag' , 'نظر شما با موفّقیت ثبت شد و بعد از تایید در سایت نمایش داده خواهد شد.');
    }

    public function search(Request $request)
    {
        $name= $request->input('name');
        $city= $request->input('city');
        $location = Location::where('name' , 'LIKE' , $name)->orWhere('city_id' , $city)->get();
        return view('home.locations.search') ;
    }


}
