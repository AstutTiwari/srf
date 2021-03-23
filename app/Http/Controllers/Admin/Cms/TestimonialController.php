<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use Cache;

use App\Testimonial;

use App\Rules\ValidateIsimage;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.cms.testimonial.index');
    }

    public function list(Request $request)
    {
        $status = $request->input('status');
        $name = $request->input('name');
        $query = Testimonial::where('id','!=',0);
        if(isset($status) && $status!=="")
        {
            $query->where('status',$status);
        }
        if(isset($name) && $name!=="")
        {
            $query->where('name','like','%'.$name.'%');
        }
        return DataTables::of($query)
        ->addColumn('name',function($data){
            return $data->name;
        })
        ->addColumn('text',function($query){
             return '<p>'.limitString($query->text, 40).'</p>';
        })
        ->addColumn('rating',function($query){
             return $query->rating;
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
            <a data-toggle="tooltip" data-placement="top" title="Testimonial Detail" class="dropdown-item" href="'.route('admin.cms.testimonial.action',$query->id).'" ><i class="fas fa-edit mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            <a data-toggle="tooltip" data-placement="top" title="Delete Testimonial" class="dropdown-item" href="javascript::void(0)" onclick="testimonialDelete(this,'.$query->id.')"><i class="fas fa-trash-alt mr-1 text-muted font-18 vertical-middle"></i>Delete</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['name','text','rating','status','created_at','action'])
        ->make(true);
    }

    public function action(Request $request)
    {
        if($request->id)
        {
            $testimonial = Testimonial::find($request->id);
            return view('admin.cms.testimonial.action',compact('testimonial'));
        }
        return view('admin.cms.testimonial.action');
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        if($request->ajax())
        {
            $validateArray = [
                'testimonial_id' => 'required',
                'name' => 'required',
                'text' => 'required',
                'image' => ['nullable',new ValidateIsimage()],
                'rating' => 'required|integer|min:1|digits_between: 1,5',
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'type' => 'validation-error', 'error' => $validator->errors()]);
            }
            $testimonial = Testimonial::firstOrNew(['id' => $attributes['testimonial_id']]);
            $testimonial->name = $attributes['name'];
            $testimonial->status = isset($attributes['status'])?'1':'0';
            $testimonial->text = $attributes['text'];
            $testimonial->rating = $attributes['rating'];
            if(isset($attributes['image']) && !empty($attributes['image']))
            {
                $file = $attributes['image'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'testimonial_logo/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($testimonial->path)
                {
                    Storage::disk('public')->delete($testimonial->path);
                }
                $testimonial->path = $filePath;
            }
            $testimonial->save();
            Cache::forget('testimonials');
            Cache::rememberForever('testimonials', function (){
                return Testimonial::where('status','1')->get();
            });
            return response()->json(['success'=>true,'message'=>'Testimonial has been changed Successfully!']);
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
        $testimonial = Testimonial::find($request->id);
        if(!$testimonial)
        {
            return response()->json(["success" => false, 'error' => 'Testimonial information not found.']);
        }
        if($testimonial->path)
        {
            Storage::disk('public')->delete($testimonial->path);
        }
        $testimonial->delete();
        Cache::forget('testimonials');
        Cache::rememberForever('testimonials', function (){
            return Testimonial::where('status','1')->get();
        });
        return response()->json(['success'=>true,'message'=>'Testimonail has been deleted successfully!']);
    }
}
