<?php

namespace App\Tests\Test;

use App\Test\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    public function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    public function numberProvider()
    {
        $num = [];

        for ($i = 1; $i < 10; $i++) {
            for ($j = 1; $j < 10; $j++) {
                $num [] = [$i, $j];
            }
        }
        return $num;
    }

    /**
     * @dataProvider numberProvider
     */
    public function testPower($a, $b)
    {
        $this->assertEquals(pow($a, $b), $this->calculator->power($a, $a));
    }

    /**
     * @dataProvider numberProvider
     */
    public function testRoot($a)
    {
        $this->assertEquals(sqrt($a),$this->calculator->root($a));
    }
}
