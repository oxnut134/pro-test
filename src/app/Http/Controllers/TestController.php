<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function update()
    {
        return view('index-test');
    }
    public function register()
    {
        return view('index-test');
    }
    public function header()
    {
        return view('layouts.header');
    }

}
