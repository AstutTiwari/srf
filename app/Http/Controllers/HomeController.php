<?php

namespace App\Http\Controllers;


use App\Models\Banner;
use App\Models\ProductBanner;
use App\Models\Product;
use App\Models\PopularProduct;
use App\Models\AdminContactus;
use App\Models\Social;

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
        $products = Product::where('parent_id','!=','0')->where('status','1')->orderBy('id', 'desc')->take(8)->get();
        $popular_products = PopularProduct::orderBy('id', 'desc')->where('status','1')->take(3)->get();
        $contact = AdminContactus::find('1');
        $socials = Social::where('status','1')->get();
        $rings = Product::where(['parent_id'=>'0','status'=>'1','category_id'=>'6'])->get();
        $erings = Product::where(['parent_id'=>'0','status'=>'1','category_id'=>'2'])->get();
        return view('home',compact('banners','product_banners','products','popular_products','contact','socials','rings','erings'));
    }
}
