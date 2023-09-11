<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Model\Calculator;

final class CalculatorTest extends TestCase
{
    private int $first_int = 5;
    private int $second_int = 5;


    public function testInvalidInput()
    {
        $repository = new Calculator();

        $this->expectException(\TypeError::class);
        $repository->add('string', 5);
    }

    public function testCalculator_adding(): void
    {
        $repository = new Calculator();

        self::assertSame(10, $repository->add($this->first_int, $this->second_int));
    }
}