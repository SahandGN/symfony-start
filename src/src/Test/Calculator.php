<?php

namespace App\Test;


class Calculator
{
    public function power ($a, $b)
    {
        return pow($a, $b);
    }

    public function root ($a)
    {
        return sqrt($a);
    }
}