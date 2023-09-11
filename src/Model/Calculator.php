<?php

namespace App\Model;

class Calculator
{
    public function add(int $firstNumber, int $secondNumber): int
    {
        return $firstNumber+$secondNumber;
    }

    public function substract(int $firstNumber, int $secondNumber): int
    {
        return $firstNumber-$secondNumber;
    }

    public function multiply(int $firstNumber, int $secondNumber): int
    {
        return $firstNumber*$secondNumber;
    }

    public function divide(int $firstNumber, int $secondNumber): int
    {
        return $firstNumber/$secondNumber;
    }

}