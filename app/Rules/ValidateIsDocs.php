<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class ValidateIsDocs implements Rule
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
        $validate = validate_base64($value, ['jpeg','jpg','png','doc','pdf','docx','txt',''],5000);
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
        return 'The Document extension should be png,jpg,jpeg,pdf,doc,docx,txt with size less than 5 MB!!';
    }
}
