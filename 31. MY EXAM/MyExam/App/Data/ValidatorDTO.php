<?php

namespace App\Data;


class ValidatorDTO
{
    public static function validate($min, $max, $value, $errorMessage): void
    {
        $length = mb_strlen($value);

        if ($length < $min || $length > $max) {
            throw new \Exception($errorMessage);
        }
    }
}