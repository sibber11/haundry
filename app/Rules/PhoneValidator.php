<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneValidator implements Rule
{
    public static string $pattern = "/^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/m";
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return self::validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The Phone Number is Invalid!';
    }

    public static function validate($phone): bool|int
    {
        return preg_match(self::$pattern, $phone);
    }
}
