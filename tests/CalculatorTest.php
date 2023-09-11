<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Calculator;

final class CalculatorTest extends TestCase
{
    private string $first_int = '15,99';
    private string $second_int = '5,99';

    public function testCalculator_adding_simple(): void
    {
        $repository = new Calculator();

        $array = array('first number' => 1599,
                    'second number' => 599,
                    'result' => 21.98,
                    'error' => '');
        self::assertSame($array, $repository->add($this->first_int, $this->second_int));
    }

    public function testCalculator_substracting_simple(): void
    {
        $repository = new Calculator();

        $array = array('first number' => 1599,
                    'second number' => 599,
                    'result' => 10.0,
                    'error' => '');
        self::assertSame($array, $repository->substract($this->first_int, $this->second_int));
    }

    public function testCalculator_multiplying_simple(): void
    {
        $repository = new Calculator();

        $array = array('first number' => 1599,
                    'second number' => 599,
                    'result' => 95.78,
                    'error' => '');
        self::assertSame($array, $repository->multiply($this->first_int, $this->second_int));
    }

    public function testCalculator_divide_simple(): void
    {
        $repository = new Calculator();

        $array = array('first number' => 1599,
                    'second number' => 599,
                    'result' => 2.66,
                    'error' => '');
        self::assertSame($array, $repository->divide($this->first_int, $this->second_int));
    }

    public function testCalculator_divide_by_zero(): void
    {
        $repository = new Calculator();

        $array = array('first number' => 1599,
                    'second number' => 0,
                    'result' => 0,
                    'error' => 'Nie można dzielić przez 0.');
        self::assertSame($array, $repository->divide($this->first_int, '0'));
    }
}