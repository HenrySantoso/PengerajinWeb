<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }
    public function about()
    {
        return view('guest.about');
    }
    public function contact()
    {
        return view('guest.contact');
    }
    public function products()
    {
        return view('guest.products');
    }
    public function singleProduct()
    {
        return view('guest.single-product');
    }
}
