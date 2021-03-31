<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use Cache;

use App\Models\ProductBanner;

use App\Rules\ValidateIsimage; 

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductbannerController extends Controller
{
   public function index()
   {
     return view('admin.cms.product_banner.index');
   }
   public function list(Request $request)
   {    
        $query = ProductBanner::get();
        return DataTables::of($query) 
        ->addColumn('image',function($query){
            if(!empty($query->url))
            {
                $url= asset('storage/'.$query->url);
            }
            else{
                $url = $query->url;
            }
            $str = '<img src="'.$url.'" alt="image" class="img-fluid img-thumbnail" width="200">';
            return $str;
        })
        ->addColumn('name',function($query){
            return $query->name;
        })
        ->addColumn('order',function($query){
            return $query->order;
        })
        ->addColumn('title',function($query){
            return $query->title;
        })
       ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Banner Detail" class="dropdown-item" href="'.route('admin.cms.product.banner.update',$query->id).'"><i class="fas fa-landmark mr-1 text-muted font-18 vertical-middle"></i>Change Banner</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['image','name','order','title','status','action'])
        ->make(true);
   }
   public function update(Request $request,$id)
   {
       $banner = ProductBanner::find($id);
        if(!empty($banner))
        {
            return view('admin.cms.product_banner.update',compact('banner'));
        }
       return view('error_404');
   }
   public function store(Request $request)
   {
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
                'banner_id' => 'required',
                'slug' => 'required|unique:product_banners,slug,'.$attributes['banner_id'],
                'order' =>'required',
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'image' => ['nullable',new ValidateIsimage()]
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'type' => 'validation-error', 'error' => $validator->errors()]);
            }
            $banner = ProductBanner::find($request->banner_id);
            if(!$banner)
            {
                return response()->json(['success' => false, "error" => 'Banner does not exist!']);
            }
            $previous_order = $banner->order;
            $banner_data = [
                'slug' => $attributes['slug'],
               'order' => $attributes['order'], 
               'title' => $attributes['title'],
               'sub_title' => $attributes['sub_title'],
               'status' => isset($attributes['status'])?'1':'0', 
            ];
            if(isset($attributes['image']) && !empty($attributes['image']))
            {
                $file = $attributes['image'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'product_banners/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($banner->url)
                {
                    Storage::disk('public')->delete($banner->url);
                }
                $image_data = [
                    'name' => $unique_name,
                    'url' =>  $filePath,
                ];
                $banner_data = array_merge($banner_data,$image_data);
            }
            $banner->update($banner_data);
            
            $upate_banner = ProductBanner::where('id','!=',$request->banner_id)->where('order',$attributes['order'])->first();
            if(!empty($upate_banner))
            {
               $upate_banner->update(['order'=>$previous_order]);
            }
            Cache::forget('product_banners');
            Cache::rememberForever('product_banners', function (){
                return ProductBanner::where('status','1')->orderBy('order')->get();
            });
            return response()->json(["success" => true,'message'=>'Banner has been updated successfully!' ]);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']);  
    }
}
