<?php

namespace App\Helper;

use Illuminate\Support\Carbon;

class DateSolver
{
    public static function solve($input, string $input_name)
    {
        $date = $input_name . "_date";
        $time = $input_name . "_time";
        throw_if(!$input[$date] && !$input[$time], \InvalidArgumentException::class);
        return Carbon::make($input[$date] . $input[$time]);

    }
}
