<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneValidator implements Rule
{
    public static string $pattern = "/((\+88)|(01)|(1))+[0-9]{9}/m";

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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return self::validate($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The Phone Number is Invalid!!';
    }

    public static function validate($attribute, $phone): bool|int
    {
        return preg_match(self::$pattern, $phone);
    }
}
