<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use App\TrustedBy;
// use App\TrustedByLogo;
use Cache;
use App\Rules\ValidateIsimage;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class TrustedbyController extends Controller
{
    public function index()
    {
        return view('admin.cms.trusted_by.index');
    }
    public function list(Request $request)
    {
        $status = $request->input('status');
        $name = $request->input('name');
        // echo "<pre>";
        // print_r($name);
        // exit;
        $query = TrustedBy::where('id','!=',0);
        if(isset($status) && $status!=="")
        {
            $query->where('status',$status);
        }
        if(isset($name) && $name!=="") 
        {
            $query->where('name','like','%'.$name.'%');
        }
        return DataTables::of($query)
        ->addColumn('logo',function($query){
            if(!empty($query->path))
            {
                $url= asset('storage/'.$query->path);
            }
            $str = '<div class="col-md-6">
                        <img src="'.$url.'" alt="image" class="img-fluid img-thumbnail" width="200">
                    </div>';
            return $str;
        })
        ->addColumn('name',function($query){
             return $query->name;
        })
        ->addColumn('status',function($query){
            return getStatus($query->status);
        })
        ->addColumn('created_at',function($query){
            return getDateTimeFormatWithHtml($query->created_at);
        })
        ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Testimonial Detail" class="dropdown-item" href="'.route('admin.cms.trustedBy.action',$query->id).'" ><i class="fas fa-edit mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            <a data-toggle="tooltip" data-placement="top" title="Delete Testimonial" class="dropdown-item" href="javascript::void(0)" onclick="trustedbyDelete(this,'.$query->id.')"><i class="fas fa-trash-alt mr-1 text-muted font-18 vertical-middle"></i>Delete</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['logo','name','status','created_at','action'])
        ->make(true);
    }

    public function action(Request $request)
    {
        if($request->id)
        {
            $trusted_by = TrustedBy::find($request->id);
             if(empty($trusted_by))
            {
                return view('error_404');
            }
            return view('admin.cms.trusted_by.action',compact('trusted_by'));
        }
        return view('admin.cms.trusted_by.action');
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        if($request->ajax())
        {
            $validateArray = [
                'trusted_by_id' => 'required',
                'name' => 'required',
                'image' => 'required_if:trusted_by_id,==,0',new ValidateIsimage(),
            ];

            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'type' => 'validation-error', 'error' => $validator->errors()]);
            }
            $trusted_by = TrustedBy::firstOrNew(['id' => $attributes['trusted_by_id']]);
            $trusted_by_update = $trusted_by;
            $trusted_by->name = $attributes['name'];
            $trusted_by->status = isset($attributes['status'])?'1':'0';
            if(isset($attributes['image']) && !empty($attributes['image']))
            {
                $validateArray = [
                    'image' => ['required',new ValidateIsimage()],
                ];
                
                $validator = Validator::make($attributes, $validateArray);
                if ($validator->fails()) {
                    return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
                }
                  
                $file = $attributes['image'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'trusted_by/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($trusted_by->path)
                {
                    Storage::disk('public')->delete($trusted_by->path);
                }
                $trusted_by->path = $filePath;
            }
            $trusted_by->save();
            Cache::forget('trusted_bys');
            Cache::rememberForever('trusted_bys', function (){
                return TrustedBy::where('status','1')->get();
            });
            if($trusted_by_update)
            {
                return response()->json(['success'=>true,'message'=>'Trusted By has been updated Successfully!']);
            }
            return response()->json(['success'=>true,'message'=>'Trusted By has been added Successfully!']);
        }
        return response()->json(['success'=>false,'error'=>'Un authorised request']);
    }

    public function delete(Request $request)
    {
        $attributes = $request->all();
        $validateArray = [
            'id' => 'required',
        ];
        $validator = Validator::make($attributes, $validateArray);

        if ($validator->fails())
        {
            return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
        }

        $trusted_by = TrustedBy::find($request->id);
        if(!$trusted_by)
        {
            return response()->json(["success" => false, 'error' => 'Record does not exist.']);
        }
        if ($trusted_by->path)
        {
            Storage::disk('public')->delete($trusted_by->path);
        }
        $trusted_by->delete();
        Cache::forget('trusted_bys');
        Cache::rememberForever('trusted_bys', function (){
            return TrustedBy::where('status','1')->get();
        });
        return response()->json(['success'=>true,'message'=>'Record has been deleted successfully!']);
    }
}
