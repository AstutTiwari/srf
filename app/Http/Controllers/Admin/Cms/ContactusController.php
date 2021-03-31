<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use Cache;

use App\Models\AdminContactus;

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
            'contact_number' =>'required',
            'text' => 'required',
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
            'contact_number'=>$attributes['contact_number'],
            'text' => $attributes['text'],
        ];
        $contact_us->update($data);
        Cache::forget('admin_contact_us');
        Cache::rememberForever('admin_contact_us', function (){
            return  AdminContactus::find('1');
        });
        return response()->json(["success" => true,'message'=>'Contact us has been updated successfully!' ]);
      }
      return response()->json(['success' => false, "error" => 'Un authorised request']);  
    }

}
