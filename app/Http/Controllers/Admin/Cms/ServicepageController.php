<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use App\ServicePage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ServicepageController extends Controller
{
    public function index(Request $request)
    {
        $service_page = ServicePage::where('slug',$request->slug)->first();
        return view('admin.cms.service_page.index',compact('service_page'));
    }
    public function update(Request $request)
    {
        if($request->ajax())
        {
            $attributes = $request->all(); 
            $validateArray = [
              'slug' => 'required', 
              'title'=>'required',
              'text' => 'required',
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
            }
            $service_page =  ServicePage::where('slug',$request->slug)->first();
            if(empty($service_page))
            {
                return view('error_404');
            }
            $service_page->update(['title'=>$attributes['title'],'text'=> $attributes['text']]);
            return response()->json(["success" => true,'message'=>'Page has been updated successfully!']); 
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']); 
    }
}
