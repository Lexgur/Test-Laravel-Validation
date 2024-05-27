<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ContainLetter implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function  passes($attribute, $value)
    {
        return preg_match('/[a-zA-Z]/', $value);
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
    }
    public function message()
    {
        return 'The :attribute must contain at least one  character';
    }
}
