<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class ValidateTenant implements Rule
{
    protected $email;
    protected $code;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($email, $code)
    {
        $this->email = $email;
        $this->code = $code;
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
        // if($this->email == null){
        return User::with('roles')->where('email', '=', $this->email)
            ->where('roles.name', '!=', 'Tenant')->exists();
        // } else {
        // return Membership::where('code', '=', $this->code)
        //     ->where('email', '=', $this->email)
        //     ->where('email', '=', $this->email)
        //     ->where('user_id', '=', null)->exists();
        // }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Already registred as some other user.';
    }
}
