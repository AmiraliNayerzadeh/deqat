<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\gym;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function cities()
    {
        return view('home.city.index');
    }

    public function city(City $city)
    {
        return view('home.city.single' , compact('city'));
    }
}
