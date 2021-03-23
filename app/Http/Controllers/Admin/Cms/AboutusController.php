<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use File;

use Cache;

use App\Aboutus;

use App\Rules\ValidateIsimage; 
use App\Rules\ValidateIsvideo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutusController extends Controller
{
    public function index()
    {
        $about_us = Aboutus::first();
        return view('admin.cms.about_us.index', compact('about_us'));
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $attributes = $request->all();
            $validateArray = [
                'text' => 'required',
                'total_experiance'=>'required|numeric|gt:0',
                'total_happy_customer'=>'required|numeric|gt:0',
                'total_real_estate_agent'=>'required|numeric|gt:0',
                'poster_content'=>['nullable',new ValidateIsimage()],
                'video_content' => ['nullable',new ValidateIsvideo()],
            ];
            
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails()) {
                return response()->json(["success" => false,'type' => 'validation-error', 'error' => $validator->errors()]);
            } 
            $about_us = Aboutus::first();
            $previous_video = $about_us->video_url;
            $previous_poster =  $about_us->poster_url;
            $about_data =
            [
                'text' => $attributes['text'],
                'total_experiance' => $attributes['total_experiance'],
                'total_happy_customer' => $attributes['total_happy_customer'],
                'total_real_estate_agent' => $attributes['total_real_estate_agent'],
                
            ]; 
            if(isset($attributes['poster_content']) && !empty($attributes['poster_content']))
            {
                $file = $attributes['poster_content'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'about_us_poster/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($about_us->poster_url)
                {
                    Storage::disk('public')->delete($previous_poster); 
                }
                $poster_data = [
                    'poster_url' => $filePath,
                    'poster_name' =>  $unique_name,
                ];
                $about_data = array_merge($about_data,$poster_data);
            }
            if(isset($attributes['video_content']) && !empty($attributes['video_content']))
            {
                $file = $attributes['video_content'];
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                @list(, $extension) = explode('/', $type);
                $unique_name = rand().'.'. $extension;
                $filePath = 'about_us_video/'. $unique_name;
                Storage::disk('public')->put($filePath, base64_decode($file));
                if($about_us->video_url)
                {
                    Storage::disk('public')->delete($previous_video);
                }
                $video_data = [
                    'video_url' => $filePath,
                    'video_name' =>  $unique_name,
                ];
                $about_data = array_merge($about_data,$video_data);
            }
            $about_us->update($about_data);
            Cache::forget('about_us');
            Cache::rememberForever('about_us', function (){
                return Aboutus::where('status','1')->first();
            });
            return response()->json(['success'=>true,'message'=>'About us has been updated successfully!']);
        }
        return response()->json(['success' => false, "error" => 'Un authorised request']);
    }
}
