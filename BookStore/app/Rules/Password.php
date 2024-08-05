<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Password implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //Check if password contains at least 8 characters, one uppercase letter, a number and a special character
//        if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/', $value)) {
//            $fail("The $attribute must contain at least 8 characters, one uppercase letter, a number and a special character.");
//        }
    }
}
