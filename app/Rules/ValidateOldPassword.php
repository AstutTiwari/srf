<?php

namespace App\Rules;

use Auth;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class ValidateOldPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
       $user = User::find(Auth::user()->id);
        if(Hash::check($value,$user->password)) {
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
        return 'Old password is not correct.';
    }
}
