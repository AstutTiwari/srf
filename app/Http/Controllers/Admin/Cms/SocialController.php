<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use File;
use Carbon\Carbon;

use Cache;

use App\Models\Social;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
   public function index()
   {
     return view('admin.cms.social.index');
   }
   public function list(Request $request)
   {    
       $query = Social::all();
        return DataTables::of($query) 
        ->addColumn('icon',function($query){
            return '<a href="#"><i class="'.$query->icon_name.'"></i></a>';
        })
        ->addColumn('name',function($query){
            return $query->name;
        })
        ->addColumn('order',function($query){
            return $query->order;
        })
        ->addColumn('redirect_url',function($query){
            if($query->redirect_url)
            {
              return $query->redirect_url;
            }
            return 'Not Set';
        })
        ->addColumn('status',function($query){
            return getStatus($query->status); 
        })
       ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Banner Detail" class="dropdown-item" href="'.route('admin.cms.social.update',$query->id).'"><i class="fas fa-file-alt mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['icon','name','order','redirect_url','status','action'])
        ->make(true);
   }
   public function update(Request $request,$id)
   {
     
       $social = Social::find($id);
        if(!empty($social))
        {
            return view('admin.cms.social.update',compact('social'));
        }
       return view('error_404');
   }
   public function store(Request $request)
   {
      if($request->ajax())
      {
          $attributes = $request->all();
          $validateArray = [
            'social_id' => 'required',
            'icon_name' => 'required',
            'name' => 'required',
            'redirect_url' => 'required',
            'order' => 'required',
        ];
        $validator = Validator::make($attributes, $validateArray);
        if ($validator->fails())
        {
            return response()->json(["success" => false, 'type' => 'validation-error','error' => $validator->errors()]);
        }
        $social = Social::find($request->social_id);
        $previous_order = $social->order;
        $social_data =[
           'icon_name' => $attributes['icon_name'], 
           'name' => $attributes['name'],
           'redirect_url' => $attributes['redirect_url'],
           'status' => isset($attributes['status'])?'1':'0',
           'order' => $attributes['order'],
        ];
        $social->update($social_data);
        $upate_order = Social::where('id','!=',$request->social_id)->where('order',$attributes['order'])->first();
        if(!empty($upate_order))
        {
            $upate_order->update(['order'=> $previous_order]);
        }
        Cache::forget('socails');
        Cache::rememberForever('socails', function (){
            return Social::where('status','1')->orderBy('order')->get();
        });
        return response()->json(["success" => true,'message'=>'Social icon has been updated successfully!']);
      }
      return response()->json(['success' => false, "error" => 'Un authorised request']);  
  }
}
