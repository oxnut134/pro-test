<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function showMyList()
    {
        return view('index');
    }
    public function getItemDetail()
    {
        //dd('1');
        return view('detail');
    }
    public function exhibitItems()
    {
        return view('exhibit');
    }

}
