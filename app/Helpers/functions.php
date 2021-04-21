<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getDateTimeFormatWithHtml')) {
    function getDateTimeFormatWithHtml($date,$withbr = false) 
    {
        $dateOnly = \Carbon\Carbon::parse($date)->format('m/d/Y');
        $timeOnly = \Carbon\Carbon::parse($date)->format('g:i A');
        $timestamp = \Carbon\Carbon::parse($date)->timestamp;
        if($withbr)
        {
            $date = '<span class="d-none">'.$timestamp.'</span>'.$dateOnly.' <small class="text-muted"><br/>'.$timeOnly.'</small>';
        } 
        else 
        {
           $date = '<span class="d-none">'.$timestamp.'</span>'.$dateOnly.' <small class="text-muted">'.$timeOnly.'</small>';
        }
        return $date;
    }
}

if (!function_exists('getDateTimeFormat')) {
    function getDateTimeFormat($date) 
    {
        $dateOnly = \Carbon\Carbon::parse($date)->format('m/d/Y');
        $timeOnly = \Carbon\Carbon::parse($date)->format('g:i A');
        $timestamp = \Carbon\Carbon::parse($date)->timestamp;
        $date = $dateOnly.' '.$timeOnly;
        return $date;
    }
}

if (!function_exists('getDateOnly')) {
    function getDateOnly($date) 
    {
        if($date)
        {
            $dateOnly = \Carbon\Carbon::parse($date)->format('m/d/Y');
            return $dateOnly;
        }
        return "";
    }
}

if (!function_exists('generateRandomStringUpperCase')) {
    function generateRandomStringUpperCase($length = 16) {
        $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 16) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('generateRandomNumber')) {
    function generateRandomNumber($length = 16) {
        $characters = '123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('serviceType')) {
    function serviceType($string) {
        $string = str_replace("_"," ",$string);
        return ucwords($string);
    }
}

if (!function_exists('leadStatus')) {
    function leadStatus($status) {

        switch ($status) {
            case "0": {
                $class = "badge bg-soft-warning text-warning p-1";
                $text = "Pending";
                break;
            }
            case "1": {
                $class = "badge bg-soft-info text-info p-1";
                $text = "Invitation Sent";
                break;
            }
            case "2": {
                $class = "badge bg-soft-success text-success p-1";
                $text = "Converted into Applicant";
                break;
            }
            default: {
                $class = "badge badge-primary";
                break;
            }
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('paymentStatus')) {
    function paymentStatus($status) {

        switch ($status) {
            case "created": {
                $class = "badge bg-soft-info text-info p-1";
                break;
            }
            case "completed": {
                $class = "badge bg-soft-success text-success p-1";
                break;
            }
            default: {
                $class = "badge badge-primary";
                break;
            }
        }
        $text = ucfirst($status);
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('rentStatus')) {
    function rentStatus($status) {

        switch ($status) {
            case "0": {
                $class = "badge bg-soft-warning text-warning p-1";
                $text = "Pending";
                break;
            }
            case "1": {
                $class = "badge bg-soft-success text-success p-1";
                $text = "Paid";
                break;
            }
            default: {
                $class = "badge badge-primary";
                $text = "";
                break;
            }
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('applicationCompleteStatus')) {
    function applicationCompleteStatus($status) {
        switch ($status) {
            case "0": {
                $class = "badge bg-soft-warning text-warning p-1";
                $text = "Incomplete";
                break;
            }
            case "1": {
                $class = "badge bg-soft-info text-info p-1";
                $text = "Complete";
                break;
            }
            default: {
                $class = "badge badge-primary";
                break;
            }
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('applicationStatus')) {
    function applicationStatus($status) {

        switch ($status) {
            case "pending": {
                $class = "badge bg-soft-warning text-warning p-1";
                $text = "Pending";
                break;
            }
            case "approved": {
                $class = "badge bg-soft-success text-success p-1";
                $text = "Approved";
                break;
            }
            case "rejected": {
                $class = "badge bg-soft-danger text-danger p-1";
                $text = "Rejected";
                break;
            }
            case "screening_completed": {
                $class = "badge bg-soft-primary text-primary p-1";
                $text = "Screening Completed";
                break;
            }
            default: {
                $class = "badge badge-primary";
                break;
            }
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('logoText')) {
    function logoText($name) {
        return substr($name,0,1);
    }
}

if (!function_exists('getFirstLetterString')) {
    function getFirstLetterString($name) {
        return ucfirst($name[0]);
    }
}

if(!function_exists('limitString'))
{
    function limitString($string, $length)
    {
      if(strlen($string)<=$length)
      {
        return $string;
      }
      else
      {
        $sub_string = substr($string,0,$length) . '...';
        return $sub_string;
      }
    }
}

if(!function_exists('setChatDate'))
{
    function setChatDate($date = Null)
    {
        $date_formet = \Carbon\Carbon::parse($date);
        if($date_formet->isToday())
        {
            return \Carbon\Carbon::parse($date)->format('g:i A');
        }
        else if($date_formet->isYesterday())
        {
            return  'yesterday'.' '.\Carbon\Carbon::parse($date)->format('g:i A');
        }
        else
        {
            return \Carbon\Carbon::parse($date)->format('d/m g:i A');
            // $timeOnly = \Carbon\Carbon::parse($date)->format('g:i A');
            // return  $dateOnly.' '.$timeOnly;
        }
    }
}

if(!function_exists('getUnreadMessageCount'))
{
    function getUnreadMessageCount($from_id=null)
    {
        if($from_id)
        {
            return \App\NotificationUser::where(['to_id' => \Auth::user()->id, 'from_id' => $from_id, 'is_read' => '0'])->count();
        }
        return \App\NotificationUser::where(['to_id' => \Auth::user()->id, 'is_read' => '0'])->count();
    }
}

if(!function_exists('getInvoiceProcessCount'))
{
    function getInvoiceProcessCount()
    {
       return \App\Invoice::where(['user_id' => \Auth::user()->id,'status' => '2'])->count();
    }
}
if(!function_exists('getPaymentType'))
{
    function getPaymentType($type=null)
    {
        if($type=="fixed")
        {
            $class = "badge bg-soft-warning text-warning p-1";
            $text = "Fixed";
        }
        elseif($type=="percentage")
        {
            $class = "badge bg-soft-success text-success p-1";
            $text = "Percentage";
        }
        return $html = '<span>' . $text . '</span>';
    }
    
}
if(!function_exists('getRecurring'))
{
    function getRecurring($recurring=null)
    {
        if($recurring=="daily")
        {
            $class = "badge bg-soft-warning text-warning p-1";
            $text = "Daily";
        }
        elseif($recurring=="one_time")
        {
            $class = "badge bg-soft-success text-success p-1";
            $text = "One time";
        }
        return $html = '<span>' . $text . '</span>';
    }
}
if(!function_exists('getStatus'))
{
    function getStatus($status=null)
    {
        
        if($status=='1')
        {
            $class = "badge bg-soft-success text-success p-1";
            $text = "Active";
        }
        else
        {
            $class = "badge bg-soft-danger text-danger p-1"; 
            $text = "Inactive";
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}
if(!function_exists('sendUserMail'))
{
    function sendUserMail($data=NULL)
    {
        Mail::send($data['template'],['user_info'=>$data['user_info'],'password'=>$data['password']], function($message) use ($data)
       {
           $message->to($data['to'])->subject($data['subject']);
       });
       if(count(Mail::failures()) > 0 )
       {
           return ['status'=>false,'message'=>'Mail has been not sended'];
       }
       return ['status'=>true,'message'=>'Mail has been sent.'];
    }
}

if (!function_exists('leaseStatus')) {
    function leaseStatus($leaseInfo, $showDate=true) {

        $status = '';
        if(!empty($leaseInfo->end_date) && ($leaseInfo->end_date < \Carbon\Carbon::today()->toDateString()))
        {
            $status .= '<span class="badge bg-soft-danger text-danger pl-0">Expired</span><br/>';
        }
        else if($leaseInfo->start_date > \Carbon\Carbon::today()->toDateString())
        {
            $status .= '<span class="badge bg-soft-warning text-warning pl-0">Upcoming</span><br/>';
        }
        else if($leaseInfo->month_to_month == "1" || ($leaseInfo->start_date <= \Carbon\Carbon::today()->toDateString() && $leaseInfo->end_date >= \Carbon\Carbon::today()->toDateString()))
        {
            $status .= '<span class="badge bg-soft-success text-success pl-0">Current</span><br/>';
        }
        if($showDate)
        {
            if($leaseInfo->month_to_month == "1")
            {
                $status .= getDateOnly($leaseInfo->start_date)." (Month-to-Month)";
            }
            else {
                $status .= getDateOnly($leaseInfo->start_date)." - ".getDateOnly($leaseInfo->end_date);
            }
        }
        
        return $status;
    }
    
}
if (!function_exists('getStatus'))
{
    function getStatus($data=null)
    {
        
        if($data)
        {
            $status = '<span class="badge bg-soft-success text-success pl-0">Active</span><br/>';
        }
        else{
            $status = '<span class="badge bg-soft-success text-danger pl-0">Inactive</span><br/>';
        }
        return $status;
    }
}
if (!function_exists('getFaqType'))
{
    function getFaqType($data=null)
    {
        
        switch ($data) {
            case '1': {
                $class = "badge bg-soft-success text-success p-1";
                $text = "General";
                break;
            }
            case '2': {
                $class = "badge bg-soft-warning text-warning p-1";
                $text = "Pricing";
                break;
            }
            case '3': {
                $class = "badge bg-soft-danger text-danger p-1";
                $text = "Marketing";
                break;
            }
            case '4': {
                $class = "badge bg-soft-primary text-primary p-1";
                $text = "Rental";
                break;
            }
            default: {
                $class = "badge badge-primary";
                break;
            }
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}

if (!function_exists('getPrivacyPolicyType'))
{
    function getPrivacyPolicyType($data=null)
    {
        
        switch ($data) {
            case '1': {
                $class = "badge bg-soft-success text-success p-1";
                $text = "Security";
                break;
            }
            case '2': {
                $class = "badge bg-soft-warning text-warning p-1";
                $text = "Privacy";
                break;
            }
            case '3': {
                $class = "badge bg-soft-danger text-danger p-1";
                $text = "Trust";
                break;
            }
            default: {
                $class = "badge badge-primary";
                break;
            }
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
}
if (!function_exists('validate_base64')) {

/**
 * Validate a base64 content.
 *
 * @param string $base64data
 * @param array $allowedMime example ['png', 'jpg', 'jpeg']
 * @return bool
 */
function validate_base64($base64data, array $allowedMime,$size)
{
    // strip out data uri scheme information (see RFC 2397)
    if (strpos($base64data, ';base64') !== false) {
        list(, $base64data) = explode(';', $base64data);
        list(, $base64data) = explode(',', $base64data);
    }

    // strict mode filters for non-base64 alphabet characters
    if (base64_decode($base64data, true) === false) {
        return false;
    }

    // decoding and then reeconding should not change the data
    if (base64_encode(base64_decode($base64data)) !== $base64data) {
        return false;
    }

    $binaryData = base64_decode($base64data);

    // temporarily store the decoded data on the filesystem to be able to pass it to the fileAdder
    $tmpFile = tempnam(sys_get_temp_dir(), 'medialibrary');
    file_put_contents($tmpFile, $binaryData);

    // guard Against Invalid MimeType
    $allowedMime = Arr::flatten($allowedMime);

    // no allowedMimeTypes, then any type would be ok
    if (empty($allowedMime)) {
        return true;
    }

    // Check the MimeTypes
        $validation = Illuminate\Support\Facades\Validator::make(
            ['file' => new Illuminate\Http\File($tmpFile)],
            ['file' => 'required|max:'.$size.'|mimes:' . implode(',', $allowedMime)]
        );
        if(!$validation->fails())
        {
            return true;
        }
        return false;
    }
}

if (!function_exists('routePrefix')) {
    function routePrefix($role)
    {
        if($role == 'Admin')
        {
            return 'admin';
        }
        return 'admin';  
    }
}
if (!function_exists('getAccess'))
{
    function getAccess($data=null)
    {
        if($data)
        {
            $status = '<span class="badge bg-soft-success text-success pl-0">Public</span><br/>';
        }
        else{
            $status = '<span class="badge bg-soft-success text-danger pl-0">Private</span><br/>';
        }
        return $status;
    }
}
if(!function_exists('getContract'))
{
    function getContract($type = Null)
    {
        if($type=='1')
        {
            $status = '<span class="badge bg-soft-success text-success pl-0">Yes(With Mutual)</span><br/>';
        }
        else if($type=='0'){
            $status = '<span class="badge bg-soft-success text-warning pl-0">Yes(With Contract)</span><br/>';
        }
        else if($type=='2'){
            $status = '<span class="badge bg-soft-success text-danger pl-0">No</span><br/>';
        }
        return $status;
    }
}
if(!function_exists('getAccountType'))
{
    function getAccountType($type)
    {
        if($type=='1')
        {
            $status = '<span class="badge bg-soft-success text-success pl-0">Paid</span><br/>';
        }
        else if($type=='0'){
            $status = '<span class="badge bg-soft-success text-danger pl-0">Process</span><br/>';
        }
        else{
            $status = '<span class="badge bg-soft-success text-warning pl-0">Free</span><br/>';
        }
        return $status;
    }
}
if(!function_exists('getInvoice'))
{
    function getInvoice($type = Null)
    {
        if($type=='0')
        {
            $status = '<span class="badge bg-soft-success text-success pl-0">Accepted</span><br/>';
        }
        else if($type=='2'){
            if(\Auth::user()->hasRole('Vendor'))
            {
                $status = '<span class="badge bg-soft-success text-warning pl-0">Invoice Sent</span><br/>';
            }
            else{
                $status = '<span class="badge bg-soft-success text-warning pl-0">Pending</span><br/>';
            }
        }
        else if($type=='1'){
            $status = '<span class="badge bg-soft-success text-danger pl-0">Rejected</span><br/>';
        }
        return $status;
    }
}
if(!function_exists('getPaymentMode'))
{
    function getPaymentMode($type=null)
    {
        if($type=="offline")
        {
            $class = "badge bg-soft-danger text-danger p-1";
            $text = "Offline";
        }
        elseif($type=="online")
        {
            $class = "badge bg-soft-success text-success p-1";
            $text = "Online";
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
    
}
if(!function_exists('getPaymentAction'))
{
    function getPaymentAction($type=null)
    {
        if($type=="debit")
        {
            $class = "badge bg-soft-danger text-danger p-1";
            $text = "Debit";
        }
        elseif($type=="credit")
        {
            $class = "badge bg-soft-success text-success p-1";
            $text = "Credit";
        }
        return $html = '<span class="' . $class . '">' . $text . '</span>';
    }
    
}
if(!function_exists('getNotification'))
{
    function getNotification($from_id = Null)
    {
        return \App\Notification::where(['to_id' => \Auth::user()->id, 'status' => '0'])->orderBy('id', 'desc')->get();
    }
}
if(!function_exists('getParseString'))
{
    function getParseString($string = Null)
    {
        return str_replace(' ', '_', strtolower($string));
    }
}
if(!function_exists('getHomePageCache'))
{
    function getHomePageCache($type=Null)
    {
        if($type=='banners')
        {
            $banners = Cache::get('banners'); 
            if(!Cache::has('banners'))
            {
                $banners = \App\Banner::where('status','1')->orderBy('order')->get();
                Cache::rememberForever('banners', function () use ($banners){
                    return $banners;
                });
            }
            return $banners;
        }
        else if($type=='socails')
        {
            $socails = Cache::get('socails');
            if(!Cache::has('socails'))
            {
                $socails = \App\Social::where('status','1')->orderBy('order')->get();
                Cache::rememberForever('socails', function () use ($socails){
                    return $socails;
                });
            }
            return $socails;
        }
        else if($type=='about_us')
        {
            $about_us = Cache::get('about_us');
            if(!Cache::has('about_us'))
            {
                $about_us = \App\Aboutus::where('status','1')->first();
                Cache::rememberForever('about_us', function () use ($about_us){
                    return $about_us;
                });
            }
            return $about_us;
        }
        else if($type=='manage_genral')
        {
            $manage_genral = Cache::get('manage_genral');
            if(!Cache::has('manage_genral'))
            {
                $manage_genral = \App\ManagingGenral::where('status','1')->first();
                Cache::rememberForever('manage_genral', function () use ($manage_genral){
                    return $manage_genral;
                });
            }
            return $manage_genral;
        }
        else if($type=='managing_accordians')
        {
            $managing_accordians = Cache::get('managing_accordians');
            if(!Cache::has('managing_accordians'))
            {
                $managing_accordians = \App\ManagingAccordian::where('status','1')->orderBy('order')->get();
                Cache::rememberForever('managing_accordians', function () use ($managing_accordians){
                    return $managing_accordians;
                });
            }
            return $managing_accordians;
        }
        else if($type=='genral_service')
        {
            $genral_service = Cache::get('genral_service');
            if(!Cache::has('genral_service'))
            {
                $genral_service = \App\GenralService::where('status','1')->first();
                Cache::rememberForever('genral_service', function () use ($genral_service){
                    return $genral_service;
                });
            }
            return $genral_service; 
        }
        else if($type=='card_services')
        {
            $card_services = Cache::get('card_services');
            if(!Cache::has('card_services'))
            {
                $card_services = \App\CardService::where('status','1')->orderBy('created_at','desc')->get();
                Cache::rememberForever('card_services', function () use ($card_services){
                    return $card_services;
                });
            }
            return $card_services; 
        }
        else if($type=='admin_contact_us')
        {
            $admin_contact_us = Cache::get('admin_contact_us');
            if(!Cache::has('admin_contact_us'))
            {
                $admin_contact_us = \App\AdminContactus::where('status','1')->first();
                Cache::rememberForever('admin_contact_us', function () use ($admin_contact_us){
                    return $admin_contact_us;
                });
            }
            return $admin_contact_us; 
        }
        else if($type=='testimonials')
        {
            $testimonials = Cache::get('testimonials');
            if(!Cache::has('testimonials'))
            {
                $testimonials = \App\Testimonial::where('status','1')->get();
                Cache::rememberForever('testimonials', function () use ($testimonials){
                    return $testimonials;
                });
            }
            return $testimonials; 
        }
        else if($type=='trusted_bys')
        {
            $trusted_bys = Cache::get('trusted_bys');
            if(!Cache::has('trusted_bys'))
            {
                $trusted_bys = \App\TrustedBy::where('status','1')->get();
                Cache::rememberForever('trusted_bys', function () use ($trusted_bys){
                    return $trusted_bys;
                });
            }
            return $trusted_bys; 
        }
    } 
} 
if(!function_exists('checkMail'))
{
    function checkMail($mails)
    {
        if($mails)
        {
            if(is_array($mails))
            {
                $data = [];
                foreach($mails as $key=>$value)
                {
                    $trim_mail = trim($value);
                    $array = explode('@',$trim_mail);
                    if($array[1]=='tenantden.com')
                    {
                        $trim_mail = $trim_mail.'.test-google-a.com';
                    }
                    $data[$key] = $trim_mail;
                }
                return $data;
            }
            else
            {
                $trim_mail = trim($mails);
                $array = explode('@',$trim_mail);
                if($array[1]=='tenantden.com')
                {
                    return $trim_mail.'.test-google-a.com';
                }
                return $trim_mail;
            }
            
        }
    }
}
if(!function_exists('getRouteName'))
{
    function getRouteName()
    {
        $role = 'tenentde';
        if(\Auth::user()->hasRole('Admin'))
        {
            $role = 'admin';
        }
        else
        {
            $role = 'property';
        }
        return $role;
    }
}
if(!function_exists('getNextMonthDate'))
{
    function getNextmonthDate($start = Null)
    {
       $parse_start = \Carbon\Carbon::parse($start);
       //return $parse_start;
      // $parse_last = \Carbon\Carbon::parse($last);
       $next_month = \Carbon\Carbon::parse($start)->addMonth();
       $parse_start_day = $parse_start->format('d');
       $parse_start_month =$parse_start->format('m');
    //    $parse_last_day = $parse_last->format('d');
    //    $parse_last_month  = $parse_last->format('m');
       $next_month_d = $next_month->format('d');
       $next_month_m = $next_month->format('m');
       if($parse_start_day == $next_month_d)
        {
            return $next_month->format('Y-m-d');
        }
        else if($parse_start_day<$next_month_d)
        {
            return $next_month->addDay()->format('Y-m-d');
        }
    }
}
if(!function_exists('setDefaultIoCategory'))
{
    function setDefaultIeCategory($user_id = null)
    {
        $ie_data[0] = [
            'expense_id'=>'32',
            'slug'=>'rental_units_subscrition_fee',
            'description' =>'Rental Units Subscription Fee',
        ];
        $ie_data[1] =[
            'expense_id'=>'32',
            'slug'=>'rental_units_application_subscrition_fee',
            'description' =>"Rental Units Application's Subscription Fee", 
        ];
        $ie_data[2] =[
            'expense_id'=>'13',
            'slug'=>'rental_units_rent_received',
            'description' =>'Rental Units Rent Received', 
        ];
        $ie_data[3] =[
            'expense_id'=>'14',
            'slug'=>'rental_units_late_security_fee_received',
            'description' =>'Rental Units Late & Security Fee Received', 
        ];
        for($i=0;$i<count($ie_data);$i++)
        {
            $ie_array[] = [
                'user_id' =>  $user_id,
                'expense_id' =>$ie_data[$i]['expense_id'],
                'slug'=>$ie_data[$i]['slug'],
                'description'=>$ie_data[$i]['description'],
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' =>  \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }
        \App\UserDefaultIncomeExpense::insert($ie_array);
        return true;
    }
}
if(!function_exists('getAdminId'))
{
    function getAdminId()
    {
        return 1;
    }
}

