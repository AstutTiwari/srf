<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use File;
use Carbon\Carbon;
use Cache;

use App\ManagingGenral;
use App\ManagingAccordian;

use App\Rules\ValidateIsimage;

use Illuminate\Http\Request; 

use Yajra\Datatables\Datatables;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManagingController extends Controller
{
    public function index()
    {
        return view('admin.cms.managing.index');
    }

    public function genral(Request $request)
    {
        $manage_genral = ManagingGenral::first();
        return view('admin.cms.managing.genral.index',compact('manage_genral'));
    }
    
    public function genralUpdate(Request $request)
    {
      if($request->ajax())
      {
        $attributes = $request->all(); 
        $validateArray = [
            'title' => 'required',
            'text' => 'required',
            'image' => ['nullable',new ValidateIsimage()],
        ];

        $validator = Validator::make($attributes, $validateArray);
        if ($validator->fails())
        {
            return response()->json(["success" => false,'type' => 'validation-error','error' => $validator->errors()]);
        }
        $manage_genral = ManagingGenral::first();
        $previous_poster = $manage_genral->poster;
        $managing_data =
        [
            'title' => $attributes['title'],
            'text' => $attributes['text'],
        ];
        
        if(isset($attributes['image']) && !empty($attributes['image']))
        {
            $file = $attributes['image'];
            @list($type, $file) = explode(';', $file);
            @list(, $file) = explode(',', $file);
            @list(, $extension) = explode('/', $type);
            $unique_name = rand().'.'. $extension;
            $filePath = 'managing_genral/'. $unique_name;
            Storage::disk('public')->put($filePath, base64_decode($file));
            if($previous_poster)
            {
                Storage::disk('public')->delete($previous_poster); 
            }
            $poster_data = [
                'poster' =>  $filePath,
            ];
            $managing_data = array_merge($managing_data,$poster_data);
        }
        $manage_genral->update($managing_data);
        Cache::forget('manage_genral');
        Cache::rememberForever('manage_genral', function (){
            return ManagingGenral::where('status','1')->first();
        });
        return response()->json(["success" => true,'message'=>'Manage general has been updated successfully!' ]);
      }
      return response()->json(['success' => false, "error" => 'Un authorised request']);
    }
    
    // Accordian manage section
    public function accordian(Request $request)
    {
        return view('admin.cms.managing.accordian.index');
    }
    public function accordianList(Request $request)
    {
        $query = ManagingAccordian::all();
        return DataTables::of($query)
          ->addColumn('title',function($query){
               return $query->title;
          })
          ->addColumn('text',function($query){
              return '<p>'.limitString($query->text, 40).'</p>';
          }) 
          ->addColumn('order',function($query){
              return $query->order;
          })
          ->addColumn('updated_at',function($query){
              return getDateTimeFormatWithHtml($query->updated_at);
          })
          ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Accodian" class="dropdown-item" href="'.route('admin.manage.accordian.update',$query->id).'"><i class="fas fa-landmark mr-1 text-muted font-18 vertical-middle"></i>Update Accordion</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['title','text','order','updated_at','action'])
        ->make(true);
    }
    public function accordianUpdate(Request $request)
    {
        $manage_accordian = ManagingAccordian::find($request->id);
        if(empty($manage_accordian))
        {
            return view('error_404');
        }
        return view('admin.cms.managing.accordian.update',compact('manage_accordian'));
    }
    public function accordianStore(Request $request)
    {
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
                'title' => 'required',
                'text' => 'required',
                'order' => 'required',
                'accordian_id' => 'required'
            ];

            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'type' => 'validation-error', 'error' => $validator->errors()]);
            }
            $manage_accordian = ManagingAccordian::find($request->accordian_id); 
            $previous_order = $manage_accordian->order;
            $data =[
                'title' => $attributes['title'],
                'text' => $attributes['text'],
                'order' => $attributes['order'],
            ];
            $manage_accordian->update($data);
            $accordian_order = ManagingAccordian::where('id','!=',$request->accordian_id)->where('order',$attributes['order'])->first();
            if(!empty($accordian_order))
            {
               $accordian_order->update(['order'=>$previous_order]);
            }
            Cache::forget('managing_accordians');
            Cache::rememberForever('managing_accordians', function (){
                return ManagingAccordian::where('status','1')->orderBy('order')->get();
            });
            return response()->json(["success" => true,'message'=>'Accordion has been updated successfully!' ]);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']);        
    }
}
