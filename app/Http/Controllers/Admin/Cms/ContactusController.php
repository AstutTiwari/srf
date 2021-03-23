<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use Cache;

use App\AdminContactus;

use App\Rules\ValidateIsimage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ContactusController extends Controller
{
    public function index(Request $request)
    {   
        $contact_us = AdminContactus::first();
        return view('admin.cms.contact_us.index',compact('contact_us'));
    }

    public function store(Request $request)
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
        $contact_us = AdminContactus::first();
        $previous_poster = $contact_us->poster_url;

        $data =
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
            $filePath = 'contact_us/'. $unique_name;
            Storage::disk('public')->put($filePath, base64_decode($file));
            if($previous_poster)
            {
                Storage::disk('public')->delete($previous_poster); 
            }
            $poster_data = [
                'poster_url' => $filePath,
                'poster_name' =>  $unique_name,
            ];
            $data = array_merge($data,$poster_data);
        }
        $contact_us->update($data);
        Cache::forget('admin_contact_us');
        Cache::rememberForever('admin_contact_us', function (){
            return  AdminContactus::where('status','1')->first();
        });
        return response()->json(["success" => true,'message'=>'Contact us has been updated successfully!' ]);
      }
      return response()->json(['success' => false, "error" => 'Un authorised request']);  
    }

}
