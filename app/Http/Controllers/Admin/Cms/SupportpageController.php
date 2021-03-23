<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;

use App\SupportPageBox;
use App\SupportPageContact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupportpageController extends Controller
{
    public function index()
    {
        return view('admin.cms.support.index');
    }

    public function contactBoxOne(){
        $support_box = SupportPageBox::where('box_count', 'box_one')->first();
        return view('admin.cms.support.contact-box', compact('support_box'));
    }

    public function contactBoxTwo(){
        $support_box = SupportPageBox::where('box_count', 'box_two')->first();
        return view('admin.cms.support.contact-box', compact('support_box'));
    }

    public function contactBoxUpdate(Request $request){
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
              'box_count' => 'required',
              'title'=>'required',
              'text' => 'required',
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
            }
            $support_box =  SupportPageBox::where('box_count',$request->box_count)->first();
            if(empty($support_box))
            {
                return view('error_404');
            }
            $support_box->update(['title'=>$attributes['title'],'text'=> $attributes['text']]);
            return response()->json(["success" => true,'message'=>'Contact Box has been updated successfully!']);
        }
        return response()->json(['success' => false, "error" => 'Unauthorised request']);
    }

    public function contacts(){
        $support_contacts = SupportPageContact::first();
        return view('admin.cms.support.contacts', compact('support_contacts'));
    }

    public function contactsUpdate(Request $request){
        if($request->ajax())
        {
            $attributes = $request->all();
            $validateArray = [
              'support_email' => 'required|email',
              'support_contact_number'=>'required',
              'subscribe_email' => 'required|email',
            ];
            $validator = Validator::make($attributes, $validateArray);
            if ($validator->fails())
            {
                return response()->json(["success" => false, 'error' => $validator->errors()->first()]);
            }
            $support_contacts = SupportPageContact::first();
            if(empty($support_contacts))
            {
                return view('error_404');
            }
            $support_contacts->update(['support_email' => $attributes['support_email'], 'support_contact_number' => $attributes['support_contact_number'], 'subscribe_email' => $attributes['subscribe_email'] ]);
            return response()->json(["success" => true,'message'=>'Contact information has been updated successfully!']);
        }
        return response()->json(['success' => false, "error" => 'Unauthorised request']);
    }
}
