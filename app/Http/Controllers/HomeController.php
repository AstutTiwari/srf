<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use App\Models\ProductBanner;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::where('status','1')->get();
        $product_banners = ProductBanner::where('status','1')->get()->toArray();
        

        return view('home',compact('banners','product_banners'));
    }
}
