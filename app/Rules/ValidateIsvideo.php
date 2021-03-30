<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
class ValidateIsvideo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    //create custom video rule to verify the size and type of video
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
        //custom 
        $validate = validate_base64($value, ['mp4'],100040);
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
        return 'Video should be only in .mp4 format and less then 10 mb';
    }
}
