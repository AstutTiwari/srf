<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\Shape;
use App\Models\Metal;
use App\Models\Color;
use App\Models\ProductBanner;

use App\Rules\ValidateIsimage; 

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SubProductController extends Controller
{
    public function index()
    {
        
        return view('admin.cms.sub_product.index');
    }
    public function list(Request $request)
   {    
        $query = Product::where('parent_id','!=','0');
        return DataTables::of($query)
        ->addColumn('image',function($query){
            if(!empty($query->banner_path))
            {
                $url= asset('storage/'.$query->banner_path);
            }
            else
            {
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
            return $query->category->name;
        })
        ->addColumn('status',function($query){
            return getStatus($query->status);
        })
        ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Product Detail" class="dropdown-item" href="'.route('admin.subproduct.update.view',$query->id).'"><i class="fas fa-landmark mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['image','title','sub_title','name','category','status','action'])
        ->make(true);
   }
   public function createView()
   {
       $product = Product::where('status','1')->where('parent_id','0')->pluck('slug','id')->toArray();
       $color = Color::where('status','1')->pluck('name','id')->toArray();
       $shape = Shape::where('status','1')->pluck('name','id')->toArray();
       $metals = Metal::where('status','1')->pluck('name','id')->toArray();
       
       return view('admin.cms.sub_product.create',compact('product','color','shape','metals'));
   }
   public function createStore(Request $request)
   {
    if($request->ajax())
    {
        $attributes = $request->all();
        $validateArray = [
          'slug' => 'required',
          'parent_id' => 'required',
          'title' => 'required|string',
           'sub_title' => 'required|string',
           'banner_image' => ['required',new ValidateIsimage()],
           'rate'=>'nullable',
            'metal_type'=>'nullable',
            'purity'=>'nullable',
            'seq_no'=>'nullable',
            'design_no'=>'nullable',
            'g_wt'=>'nullable',
            'n_wt'=>'nullable',
            'diamand_wt'=>'nullable',
            'diamand_pics'=>'nullable',
            'color_stone_wt'=>'nullable',
            'clarity'=>'nullable',
            'color_id'=>'nullable',
            'quality'=>'nullable',
            'shape_id'=>'nullable',
            'size'=>'nullable',
            'metal_rate'=>'nullable',
            'polish_charges'=>'nullable',
            'making_charges'=>'nullable',
            'metal_value'=>'nullable',
            'diamond_value'=>'nullable',
            'labour_value'=>'nullable',
            'diamond_handling_charge'=>'nullable',
            'total_value'=>'nullable',
            'discount_value'=>'nullable',
            'final_value'=>'nullable',
            'gst'=>'nullable',
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
        $category = Product::find($attributes['parent_id']);
        $product = Product::create([
            'slug'=>$attributes['slug'],
            'category_id'=>$category->category_id,
            'title' => $attributes['title'],
            'sub_title' => $attributes['sub_title'],
            'banner_name'=>$unique_name,
            'banner_path'=>$filePath,
            'status'=>isset($attributes['status'])?'1':'0',
            'parent_id'=>$attributes['parent_id'],
        ]);
        
        ProductInfo::create([
            'product_id'=>$product->id,
            'rate'=>$attributes['rate'],
            'metal_type'=>$attributes['metal_type'],
            'purity'=>$attributes['purity'],
            'seq_no'=>$attributes['seq_no'],
            'design_no'=>$attributes['design_no'],
            'g_wt'=>$attributes['g_wt'],
            'n_wt'=>$attributes['n_wt'],
            'diamand_wt'=>$attributes['diamand_wt'],
            'diamand_pics'=>$attributes['diamand_pics'],
            'color_stone_wt'=>$attributes['color_stone_wt'],
            'clarity'=>$attributes['clarity'],
            'color_id'=>$attributes['color_id'],
            'quality'=>$attributes['quality'],
            'shape_id'=>$attributes['shape_id'],
            'size'=>$attributes['size'],
            'metal_rate'=>$attributes['metal_rate'],
            'polish_charges'=>$attributes['polish_charges'],
            'making_charges'=>$attributes['making_charges'],
            'metal_value'=>$attributes['metal_value'],
            'diamond_value'=>$attributes['diamond_value'],
            'labour_value'=>$attributes['labour_value'],
            'diamond_handling_charge'=>$attributes['diamond_handling_charge'],
            'total_value'=>$attributes['total_value'],
            'discount_value'=>$attributes['discount_value'],
            'final_value'=>$attributes['final_value'],
            'gst'=>$attributes['gst']
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
                $color = Color::where('status','1')->pluck('name','id')->toArray();
                $shape = Shape::where('status','1')->pluck('name','id')->toArray();
                $metals = Metal::where('status','1')->pluck('name','id')->toArray();
                $parent_category = Product::where('status','1')->where('parent_id','0')->pluck('slug','id')->toArray();
                return view('admin.cms.sub_product.update',compact('product','parent_category','metals','shape','color'));
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
              'product_id' => 'required',
              'slug' => 'required',
              'parent_id' => 'required',
              'title' => 'required|string',
               'sub_title' => 'required|string',
               //'banner_image' => ['required',new ValidateIsimage()],
               'rate'=>'nullable',
                'metal_type'=>'nullable',
                'purity'=>'nullable',
                'seq_no'=>'nullable',
                'design_no'=>'nullable',
                'g_wt'=>'nullable',
                'n_wt'=>'nullable',
                'diamand_wt'=>'nullable',
                'diamand_pics'=>'nullable',
                'color_stone_wt'=>'nullable',
                'clarity'=>'nullable',
                'color_id'=>'nullable',
                'quality'=>'nullable',
                'shape_id'=>'nullable',
                'size'=>'nullable',
                'metal_rate'=>'nullable',
                'polish_charges'=>'nullable',
                'making_charges'=>'nullable',
                'metal_value'=>'nullable',
                'diamond_value'=>'nullable',
                'labour_value'=>'nullable',
                'diamond_handling_charge'=>'nullable',
                'total_value'=>'nullable',
                'discount_value'=>'nullable',
                'final_value'=>'nullable',
                'gst'=>'nullable',
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
                'category_id'=>$product->category_id,
                'title' => $attributes['title'],
                'sub_title' => $attributes['sub_title'],
                'status'=>isset($attributes['status'])?'1':'0',
                'parent_id'=>$attributes['parent_id']
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
                $image_data = [
                    'banner_name' => $unique_name,
                    'banner_path' => $filePath,
                ];
                $product_data = array_merge($product_data,$image_data);
            }
            $product->update($product_data);
           
            $product->info->update([
                'product_id'=>$product->id,
                'rate'=>$attributes['rate'],
                'metal_type'=>$attributes['metal_type'],
                'purity'=>$attributes['purity'],
                'seq_no'=>$attributes['seq_no'],
                'design_no'=>$attributes['design_no'],
                'g_wt'=>$attributes['g_wt'],
                'n_wt'=>$attributes['n_wt'],
                'diamand_wt'=>$attributes['diamand_wt'],
                'diamand_pics'=>$attributes['diamand_pics'],
                'color_stone_wt'=>$attributes['color_stone_wt'],
                'clarity'=>$attributes['clarity'],
                'color_id'=>$attributes['color_id'],
                'quality'=>$attributes['quality'],
                'shape_id'=>$attributes['shape_id'],
                'size'=>$attributes['size'],
                'metal_rate'=>$attributes['metal_rate'],
                'polish_charges'=>$attributes['polish_charges'],
                'making_charges'=>$attributes['making_charges'],
                'metal_value'=>$attributes['metal_value'],
                'diamond_value'=>$attributes['diamond_value'],
                'labour_value'=>$attributes['labour_value'],
                'diamond_handling_charge'=>$attributes['diamond_handling_charge'],
                'total_value'=>$attributes['total_value'],
                'discount_value'=>$attributes['discount_value'],
                'final_value'=>$attributes['final_value'],
                'gst'=>$attributes['gst']
            ]);
          return response()->json(["success" => true,'message'=>'Product has been updated successfully!']);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']);
   }
}
