<?php

namespace App\Rules;

use Session;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ValidateCoupon implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $coupon;
    public function __construct($coupon)
    {
        $this->coupon = $coupon;
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(Session::get('coupon_code') == $value)
        {
            return true;
        }    
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please verify the coupon first.';
    }
}
