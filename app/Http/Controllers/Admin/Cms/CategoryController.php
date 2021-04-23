<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use File;
use Carbon\Carbon;

use Cache;

use App\Models\Category;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   public function index()
   {
     return view('admin.cms.category.index');
   }
   public function list(Request $request)
   {    
       $query = Category::where('status','1');
        return DataTables::of($query) 
        ->addColumn('name',function($query){
            return $query->name;
        })
        ->addColumn('slug',function($query){
            return $query->slug;
        })
        ->addColumn('status',function($query){
            return getStatus($query->status); 
        })
       ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Banner Detail" class="dropdown-item" href="'.route('admin.category.update',$query->id).'"><i class="fas fa-file-alt mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['name','status','slug','action'])
        ->make(true);
   }
   public function update(Request $request,$id)
   {
     
       $category = Category::find($id);
        if(!empty($category))
        {
            return view('admin.cms.category.update',compact('category'));
        }
       return view('error_404');
   }

   public function updateStore(Request $request)
   {
      if($request->ajax())
      {
          $attributes = $request->all();
          $validateArray = [
            'category_id'=>'required',
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',$attributes['category_id'],
            'status' => 'required',
        ];
        $validator = Validator::make($attributes, $validateArray);
        if ($validator->fails())
        {
            return response()->json(["success" => false, 'type' => 'validation-error','error' => $validator->errors()]);
        }
        $category = Category::find($request->category_id);
        if(!$category)
        {
            return response()->json(['success' => false, "error" => 'Category Not Exist']);
        }
        $category_data =[
           'name' => $attributes['name'],
           'slug' => $attributes['slug'],
           'status' => isset($attributes['status'])?'1':'0',
        ];
        $category->update($category_data);
        return response()->json(["success" => true,'message'=>'Category has been updated successfully!']);
      }
      return response()->json(['success' => false, "error" => 'Un authorised request']);  
    }
    public function create(Request $request)
    {
        return view('admin.cms.category.create');
    }
   public function createStore(Request $request)
   {
      if($request->ajax())
      {
          $attributes = $request->all();
          $validateArray = [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'status' => 'required',
        ];
        $validator = Validator::make($attributes, $validateArray);
        if ($validator->fails())
        {
            return response()->json(["success" => false, 'type' => 'validation-error','error' => $validator->errors()]);
        }
        $category = Category::create([
                'name' => $attributes['name'],
                'slug' => $attributes['slug'],
                'status' => isset($attributes['status'])?'1':'0',
            ]);
        return response()->json(["success" => true,'message'=>'Category has been updated successfully!']);
      }
      return response()->json(['success' => false, "error" => 'Un authorised request']);  
  }
}
