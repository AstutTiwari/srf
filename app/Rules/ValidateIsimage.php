<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class ValidateIsimage implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    //create custom image rule to verify the size and type of image
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $validate = false;
        $validate = validate_base64($value, ['png', 'jpg', 'jpeg',''],5000);
        if($validate)
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
        return 'Image should be .jpeg,.jpg,.png format and less then 5MB';
    }
}
