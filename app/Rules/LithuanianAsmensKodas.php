<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LithuanianAsmensKodas implements Rule
{
    public function passes($attribute, $value)
    {
        $value = preg_replace('/\D+/', '', (string) $value);

        if (!preg_match('/^[1-6]\d{10}$/', $value)) {
            return false;
        }

        $digits = str_split($value);
        $checkDigit = (int) array_pop($digits);

        $weights1 = [1,2,3,4,5,6,7,8,9,1];
        $sum1 = 0;
        foreach ($digits as $i => $d) {
            $sum1 += (int)$d * $weights1[$i];
        }
        $r1 = $sum1 % 11;
        if ($r1 < 10) return $checkDigit === $r1;

        $weights2 = [3,4,5,6,7,8,9,1,2,3];
        $sum2 = 0;
        foreach ($digits as $i => $d) {
            $sum2 += (int)$d * $weights2[$i];
        }
        $r2 = $sum2 % 11;
        if ($r2 < 10) return $checkDigit === $r2;

        return $checkDigit === 0;
    }

    public function message()
    {
        return 'Asmens kodas yra neteisingas.';
    }
}