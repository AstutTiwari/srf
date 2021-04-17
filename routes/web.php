<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

 Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/cms',[App\Http\Controllers\Admin\Cms\HomepageController::class,'index'])->name('admin.cms.index');

    Route::get('/admin/cms/social/icons',[App\Http\Controllers\Admin\Cms\SocialController::class,'index'])->name('admin.cms.social');
    Route::post('/admin/cms/social/icon/list',[App\Http\Controllers\Admin\Cms\SocialController::class,'list'])->name('admin.cms.social.list');
    Route::get('/admin/cms/social/icon/update/{id}',[App\Http\Controllers\Admin\Cms\SocialController::class,'update'])->name('admin.cms.social.update');
    Route::post('/admin/cms/social/icon/store',[App\Http\Controllers\Admin\Cms\SocialController::class,'store'])->name('admin.cms.social.store');
    
    Route::get('/admin/cms/banners',[App\Http\Controllers\Admin\Cms\BannerController::class,'index'])->name('admin.cms.banner');
    Route::post('/admin/cms/banner/list',[App\Http\Controllers\Admin\Cms\BannerController::class,'list'])->name('admin.cms.banner.list');

    Route::get('/admin/cms/banner/update/{id}',[App\Http\Controllers\Admin\Cms\BannerController::class,'update'])->name('admin.cms.banner.update');
    // Route::post('/cms/banner/update','Cms\BannerController@uploadImage')->name('admin.banner.uploadImage');
    Route::post('/admin/cms/banner/store',[App\Http\Controllers\Admin\Cms\BannerController::class,'store'])->name('admin.banner.store');

    Route::get('/admin/cms/product/banners',[App\Http\Controllers\Admin\Cms\ProductbannerController::class,'index'])->name('admin.cms.product.banner');
    Route::post('/admin/cms/product/banner/list',[App\Http\Controllers\Admin\Cms\ProductbannerController::class,'list'])->name('admin.cms.product.banner.list');

    Route::get('/admin/cms/product/banner/update/{id}',[App\Http\Controllers\Admin\Cms\ProductbannerController::class,'update'])->name('admin.cms.product.banner.update');
    // Route::post('/cms/banner/update','Cms\BannerController@uploadImage')->name('admin.banner.uploadImage');
    Route::post('/admin/cms/product/banner/store',[App\Http\Controllers\Admin\Cms\ProductbannerController::class,'store'])->name('admin.cms.product.banner.store');

    
    Route::get('/admin/cms/contactus',[App\Http\Controllers\Admin\Cms\ContactusController::class,'index'])->name('admin.contact');
    // Route::post('/cms/banner/update','Cms\BannerController@uploadImage')->name('admin.banner.uploadImage');
    Route::post('/admin/cms/contactus/update',[App\Http\Controllers\Admin\Cms\ContactusController::class,'store'])->name('admin.contactus.update');

    Route::get('/admin/cms/products',[App\Http\Controllers\Admin\Cms\ProductController::class,'index'])->name('admin.product');
    // Route::post('/cms/banner/update','Cms\BannerController@uploadImage')->name('admin.banner.uploadImage');
    Route::post('/admin/cms/product/list',[App\Http\Controllers\Admin\Cms\ProductController::class,'list'])->name('admin.product.list');

    
    Route::get('/admin/cms/product/create',[App\Http\Controllers\Admin\Cms\ProductController::class,'createView'])->name('admin.product.create.view');
    Route::post('/admin/cms/product/create/store',[App\Http\Controllers\Admin\Cms\ProductController::class,'createStore'])->name('admin.product.create.store');

    Route::get('/admin/cms/product/update/{id}',[App\Http\Controllers\Admin\Cms\ProductController::class,'updateView'])->name('admin.product.update.view');
    Route::post('/admin/cms/product/update/store',[App\Http\Controllers\Admin\Cms\ProductController::class,'updateStore'])->name('admin.product.update.store');

    Route::get('/admin/cms/subproducts',[App\Http\Controllers\Admin\Cms\SubproductController::class,'index'])->name('admin.subproduct');
    // Route::post('/cms/banner/update','Cms\BannerController@uploadImage')->name('admin.banner.uploadImage');
    Route::post('/admin/cms/subproduct/list',[App\Http\Controllers\Admin\Cms\SubproductController::class,'list'])->name('admin.subproduct.list');
    
    Route::get('/admin/cms/sub/product/create',[App\Http\Controllers\Admin\Cms\SubproductController::class,'createView'])->name('admin.subproduct.create.view');
    Route::post('/admin/cms/sub/product/create/store',[App\Http\Controllers\Admin\Cms\SubproductController::class,'createStore'])->name('admin.subproduct.create.store');

    Route::get('/admin/cms/sub/product/update/{id}',[App\Http\Controllers\Admin\Cms\SubproductController::class,'updateView'])->name('admin.subproduct.update.view');
    Route::post('/admin/cms/sub/product/update/store',[App\Http\Controllers\Admin\Cms\SubproductController::class,'updateStore'])->name('admin.subproduct.update.store');
});



