<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use Cache;

use App\GenralService;
use App\CardService;

use App\Rules\ValidateIsimage;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.cms.service.index');
    }
    public function genral(Request $request)
    {
        $genral_service = GenralService::first();
        return view('admin.cms.service.genral.index',compact('genral_service'));
    }
    public function genralUpdate(Request $request)
    {
        if($request->ajax())
        {  
           $attributes = $request->all();
            $validateArray =[
              'title' => 'required',
              'text' => 'required',
            ];  

            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'type' => 'validation-error', 'error' => $validator->errors()]);
            }
            $data =[
                'title' => $attributes['title'],
                'text' => $attributes['text'],
            ];
            GenralService::first()->update($data);
            Cache::forget('genral_service');
            Cache::rememberForever('genral_service', function (){
                return  GenralService::where('status','1')->first();
            });
          return response()->json(["success" => true,'message'=>'Service has been updated successfully!' ]);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']);
    }
    public function card()
    {
        return view('admin.cms.service.card.index');
    }
    public function cardList(Request $request)
    {
        $query = CardService::get();
        return DataTables::of($query) 
        ->addColumn('hover_logo_url',function($query){
            if(!empty($query->logo_url))
            {
                $url= asset('storage/'.$query->hover_logo_url);
            }
            else{
                $url = $query->hover_logo_url;
            }
            $str = '<div class="col-md-6">
                        <img src="'.$url.'" alt="image" class="img-fluid img-thumbnail" width="200">
                    </div>';
            return $str;
        })
        ->addColumn('title',function($query){
            return $query->title;
        })
        ->addColumn('text',function($query){
              return '<p>'.limitString($query->text, 40).'</p>';
          }) 
        ->addColumn('status',function($query){
            return getStatus($query->status); 
        })
        ->addColumn('action',function($query){
            $str = '<div class="btn-group dropdown">
            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a data-toggle="tooltip" data-placement="top" title="Card update" class="dropdown-item" href="'.route('admin.service.card.update',$query->id).'"><i class="fas fa-edit mr-1 text-muted font-18 vertical-middle"></i>Update</a>
            <a data-toggle="tooltip" data-placement="top" title="Card Delete" class="dropdown-item" href="#" onclick="cardDelete(this,'.$query->id.')"><i class="fas fa-trash-alt mr-1 text-muted font-18 vertical-middle"></i>Delete</a>
            </div></div>';
            return $str;
          })
        ->rawColumns(['hover_logo_url','title','text','status','action'])
        ->make(true);
    }
    public function cardAction(Request $request)
    {
        if($request->id)
        {
            $card_service = CardService::find($request->id);
            if(empty($card_service))
            {
                return view('error_404');
            }
            return view('admin.cms.service.card.action',compact('card_service'));
        }
        return view('admin.cms.service.card.action');
    }
    public function cardStore(Request $request)
    {
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
                'card_id' => 'required',
                'text' => 'required',
                'title' => 'required',
                'logo_content' => 'required_if:card_id,==,0',new ValidateIsimage(),
                'hover_logo_content' => 'required_if:card_id,==,0',new ValidateIsimage(),
            ];
            $validator = Validator::make($attributes, $validateArray); 
            if ($validator->fails())
            {
                return response()->json(["success" => false,'type' => 'validation-error', 'error' => $validator->errors()]);
            }
            $service_card = CardService::firstOrNew(['id' => $attributes['card_id']]);
            $service_card->text = $attributes['text'];
            $service_card->title = $attributes['title'];
            $service_card->status = isset($attributes['status'])?'1':'0';
            if(isset($attributes['logo_content']) && !empty($attributes['logo_content']))
            {
                $validateArray = [
                    'logo_content' => ['required',new ValidateIsimage()],
                ];
                
                $validator = Validator::make($attributes, $validateArray);
                if ($validator->fails()) {
                    return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
                }
                $file = $attributes['logo_content'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'card_service/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($service_card->logo_url)
                {
                    Storage::disk('public')->delete($service_card->logo_url); 
                }
                $service_card->logo_name = $unique_name;
                $service_card->logo_url = $filePath;
            }
            if(isset($attributes['hover_logo_content']) && !empty($attributes['hover_logo_content']))
            {
                $validateArray = [
                    'hover_logo_content' => ['required',new ValidateIsimage()],
                ];
                
                $validator = Validator::make($attributes, $validateArray);
                if ($validator->fails()) {
                    return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
                }
                $file = $attributes['hover_logo_content'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'hover_card_service/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($service_card->hover_logo_url)
                {
                    Storage::disk('public')->delete($service_card->hover_logo_url); 
                }
                $service_card->hover_logo_name = $unique_name;
                $service_card->hover_logo_url = $filePath;
                
            }
            $service_card->save();
            Cache::forget('card_services');
            Cache::rememberForever('card_services', function (){
                return CardService::where('status','1')->orderBy('created_at','desc')->get();
            });
            return response()->json(["success" => true,'message'=>'Service card has been updated successfully!' ]);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']);  
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

        $card_service = CardService::find($request->id);
        if(!$card_service)
        {
            return response()->json(["success" => false, 'error' => 'Record does not exist.']);
        }

        if ($card_service->logo_url)
        {
            Storage::disk('public')->delete($card_service->logo_url);
            Storage::disk('public')->delete($card_service->hover_logo_url);
        }

        $card_service->delete();
        Cache::forget('card_services');
        Cache::rememberForever('card_services', function (){
            return CardService::where('status','1')->orderBy('created_at','desc')->get();
        });
        return response()->json(['success'=>true,'message'=>'Record has been deleted successfully!']);
    }
}
