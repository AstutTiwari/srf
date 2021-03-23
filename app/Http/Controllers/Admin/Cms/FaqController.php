<?php

namespace App\Http\Controllers\Admin\Cms;
use App\Http\Controllers\Controller;

use File;
use Carbon\Carbon;

use App\Faq;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class FaqController extends Controller
{
   public function index()
   {
       return view('admin.cms.faq.index'); 
   }
   public function list(Request $request)
   {
        $status = $request->input('status');
        $type = $request->input('type');
        $query = Faq::get();
        if(isset($status) && $status!=="")
        {
            $query->where('status',$status);
        }
        if(isset($type) && $type!=="")
        {
            $query->where('type',$type);
        }  
        return DataTables::of($query)
          ->addColumn('title',function($query){
              return '<p>'.limitString($query->title, 40).'</p>';
          })
          ->addColumn('type',function($query){
              return getFaqType($query->type);
          }) 
          ->addColumn('status',function($query){
              return getStatus($query->status);
          })
          ->addColumn('updated_at',function($query){
              return getDateTimeFormatWithHtml($query->updated_at);
          })
          ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Faq Update" class="dropdown-item" href="'.route('admin.cms.faq.action',$query->id).'"><i class="fas fa-edit mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            <a data-toggle="tooltip" data-placement="top" title="Delete Faq" class="dropdown-item" href="javascript::void(0)" onclick="faqDelete(this,'.$query->id.')"><i class="fas fa-trash-alt mr-1 text-muted font-18 vertical-middle"></i>Delete</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['title','type','status','updated_at','action'])
        ->make(true);  
   }
   public function action(Request $request)
   {
        if($request->id)
        {
            $faq = Faq::find($request->id);
            return view('admin.cms.faq.action',compact('faq'));
        }
        return view('admin.cms.faq.action');
   }
   public function store(Request $request)
   {
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
                'faq_id' => 'required',
                'title' => 'required',
                'text' => 'required',
                //'status' => 'required',
                'type' => 'required'
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false,'type' => 'validation-error', 'error' => $validator->errors()]);
            } 

            $faq = Faq::updateOrCreate(['id'=>$attributes['faq_id']],
            [
                'title' => $attributes['title'],
                'text' => $attributes['text'],
                'status' => isset($attributes['status'])?'1':'0', 
                'type'  => $attributes['type']
            ]);
            return response()->json(['success'=>true,'message'=>'Faq Successfully Changed']);
        }
        return response()->json(['success'=>false,'error'=>'Un authorised request']);
    }
    public function delete(Request $request)
    {
        if($request->has('id'))
        {
            $faq = Faq::find($request->id);
            if(!empty($faq))
            {
               $faq->delete();
               return response()->json(['success'=>true,'message'=>'Record has been deleted successfullt!']);
            }
        }
        return response()->json(['success'=>false,'error'=>'record does not find']);
    }
}
