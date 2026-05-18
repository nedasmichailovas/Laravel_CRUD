<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LithuanianPhone implements Rule
{
    public function passes($attribute, $value)
    {
        if (empty($value)) {
            return false;
        }
        $value = preg_replace('/\s+/', '', (string) $value);
        return (bool) preg_match('/^(\+3706|86)\d{7}$/', $value);
    }

    public function message()
    {
        return 'Telefonas turi būti lietuviškas numeris (pvz. +37061234567 arba 861234567).';
    }
}