<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ValidateRole implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $role;
    public function __construct($role)
    {
        $this->role = $role;
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
        $userInfo = User::where($attribute,$value)->first();
        if(!$userInfo)
        {
            return true;
        }
        else if($userInfo->hasRole($this->role))
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
        return 'This email address already exist as a property manager or property owner.';
    }
}
