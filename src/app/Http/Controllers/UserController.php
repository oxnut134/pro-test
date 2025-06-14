<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getProfile()
    {
        //dd('on getProfile');
        return view('mypage');
    }
    public function updateProfile()
    {
        return view('profile');
    }
    public function getPurchasedItems()
    {
        return view('mypage');
    }
    public function getExhibitedItems()
    {
        return view('mypage');
    }

}
