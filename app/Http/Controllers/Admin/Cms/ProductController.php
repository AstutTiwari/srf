<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\Shape;
use App\Models\Metal;
use App\Models\Colors;
use App\Models\ProductBanner;

use App\Rules\ValidateIsimage; 

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.cms.product.index');
    }
    public function list(Request $request)
   {    
        $query = Product::where('parent_id','0');
        return DataTables::of($query)
        ->addColumn('image',function($query){
            if(!empty($query->banner_path))
            {
                $url= asset('storage/'.$query->banner_path);
            }
            else{
                $url = $query->banner_path;
            }
            $str = '<img src="'.$url.'" alt="image" class="img-fluid img-thumbnail" width="200">';
            return $str;
        })
        ->addColumn('name',function($query){
            return @$query->slug;
        })
        ->addColumn('title',function($query){
            return $query->title;
        })
        ->addColumn('sub_title',function($query){
            return $query->sub_title;
        })
        ->addColumn('category',function($query){
            return $query->category->slug;
        })
        ->addColumn('status',function($query){
            return getStatus($query->status);
        })
        ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Product Detail" class="dropdown-item" href="'.route('admin.product.update.view',$query->id).'"><i class="fas fa-landmark mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['image','title','sub_title','name','category','status','action'])
        ->make(true);
   }
   public function createView()
   {
       
       $category = ProductBanner::where('status','1')->pluck('title','id')->toArray();
       return view('admin.cms.product.create',compact('category'));
   }
   public function createStore(Request $request)
   {
    if($request->ajax())
    {
        $attributes = $request->all();
        $validateArray = [
          'slug' => 'required',
          'category_id' => 'required',
          'title' => 'required|string',
           'sub_title' => 'required|string',
           'banner_image' => ['required',new ValidateIsimage()]
        ];
        $validator = Validator::make($attributes, $validateArray);
        if ($validator->fails())
        {
          return response()->json(["success" => false, 'type' => 'validation-error','error' => $validator->errors()]);
        }
        if(isset($attributes['banner_image']) && !empty($attributes['banner_image']))
        {
            $file = $attributes['banner_image'];
            @list($type, $file) = explode(';', $file);
            @list(, $file) = explode(',', $file);
            @list(, $extension) = explode('/', $type);
            $unique_name = rand().'.'. $extension;
            $filePath = 'product/'. $unique_name;
            Storage::disk('public')->put($filePath, base64_decode($file));
            // if($banner->banner_path)
            // {
            //     Storage::disk('public')->delete($banner->banner_path);
            // }
            
            //$banner_data = array_merge($banner_data,$image_data);
        }
        Product::create([
            'slug'=>$attributes['slug'],
            'category_id'=>$attributes['category_id'],
            'title' => $attributes['title'],
            'sub_title' => $attributes['sub_title'],
            'banner_name'=>$unique_name,
            'banner_path'=>$filePath,
            'status'=>isset($attributes['status'])?'1':'0',
            'parent_id'=>'0'
        ]);
        return response()->json(["success" => true,'message'=>'Product has been created successfully!']);
    }
    return response()->json(['success' => false, "error" => 'Un authorised request']); 
   }
   public function updateView(Request $request)
   {
        if($request->id)
        {
            $product = Product::find($request->id);
            if($product)
            {
                $category = ProductBanner::where('status','1')->pluck('title','id')->toArray();
                return view('admin.cms.product.update',compact('product','category'));
            }
            return response()->json(['success' => false, "error" => 'Product does not exist']);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']); 
   }
    public function updateStore(Request $request)
    {
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
                'product_id'=>'required',
                'slug' => 'required',
                'category_id' => 'required',
                'title' => 'required|string',
                'sub_title' => 'required|string',
                'banner_image' => ['nullable',new ValidateIsimage()]
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'type' => 'validation-error','error' => $validator->errors()]);
            }
            $product = Product::find($request->product_id);
            if(!$product)
            {
                return response()->json(['success' => false, "error" => 'Product does not exist']);
            }
            $product_data = [
                'slug'=>$attributes['slug'],
                'category_id'=>$attributes['category_id'],
                'title' => $attributes['title'],
                'sub_title' => $attributes['sub_title'],
                'status'=>isset($attributes['status'])?'1':'0',
                'parent_id'=>'0'
            ];
            if(isset($attributes['banner_image']) && !empty($attributes['banner_image']))
            {

                $validateArray = [
                    'banner_image' => ['required',new ValidateIsimage()],
                ];
                $validator = Validator::make($attributes, $validateArray);
                if ($validator->fails())
                {
                    return response()->json(["success" => false,'type' => 'validation-error','error' => $validator->errors()]);
                }
                $file = $attributes['banner_image'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'product/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($product->banner_path)
                {
                    Storage::disk('public')->delete($product->banner_path);
                }
                $image_data = [
                    'banner_name' => $unique_name,
                    'banner_path' => $filePath,
                ];
                $product_data = array_merge($product_data,$image_data);
            }
            $product->update($product_data);
            return response()->json(["success" => true,'message'=>'Product has been updated successfully!']);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']); 
   }
}
