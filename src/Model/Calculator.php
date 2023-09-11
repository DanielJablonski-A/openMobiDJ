<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\Response;

class Calculator
{
    public function add(string $firstNumber, string $secondNumber): array
    {
        $error = '';
        $result = 0;

        try {
            $firstNumber = $this->parseInput($firstNumber);
            $secondNumber = $this->parseInput($secondNumber);
            $result = $this->parseOutput($firstNumber+$secondNumber);
        } catch (\TypeError $e) {
            $error = 'Nieprawidłowe dane wejściowe przy dodawaniu.';
        }

        return array('first number' => $firstNumber, 
            'second number' => $secondNumber,
            'result' => $result,
            'error' => $error
        );
    }

    public function substract(string $firstNumber, string $secondNumber): array
    {
        $error = '';
        $result = 0;

        try {
            $firstNumber = $this->parseInput($firstNumber);
            $secondNumber = $this->parseInput($secondNumber);
            $result = $this->parseOutput($firstNumber-$secondNumber);
        } catch (\TypeError $e) {
            $error = 'Nieprawidłowe dane wejściowe przy odejmowaniu.';
        }

        return array('first number' => $firstNumber, 
            'second number' => $secondNumber,
            'result' => $result,
            'error' => $error
        );
    }

    public function multiply(string $firstNumber, string $secondNumber): array
    {
        $error = '';
        $result = 0;

        try {
            $firstNumber = $this->parseInput($firstNumber);
            $secondNumber = $this->parseInput($secondNumber);
            $result = $this->parseOutput($firstNumber*$secondNumber, 'multiply');
        } catch (\TypeError $e) {
            $error = 'Nieprawidłowe dane wejściowe przy mnozeniu.';
        }

        return array('first number' => $firstNumber, 
            'second number' => $secondNumber,
            'result' => $result,
            'error' => $error
        );
    }

    public function divide(string $firstNumber, string $secondNumber): array
    {
        $error = '';
        $result = 0;

        try {
            $firstNumber = $this->parseInput($firstNumber);
            $secondNumber = $this->parseInput($secondNumber);
            $result = $this->parseOutput($firstNumber/$secondNumber, 'divide');
        } catch (\TypeError $e) {
            $error = 'Nieprawidłowe dane wejściowe przy dzieleniu.';
        } catch (\DivisionByZeroError $e){
            $error = 'Nie można dzielić przez 0.';
        }

        return array('first number' => $firstNumber, 
            'second number' => $secondNumber,
            'result' => $result,
            'error' => $error
        );
    }

    private function parseInput(string $number):int
    {
        is_numeric($number);
        $number = str_replace(',', '.', $number);
        $number = intval($number * 100) / 100;
        $number = number_format($number, 2, '.', '');
        $number = str_replace('.', '', $number);
        $number = (int)$number;
        //dd($number);
        return $number;
    }

    private function parseOutput(string $number, string $function = ''): float
    {
        switch($function)
        {
            case 'multiply':
                $number = $number / 10000.0;
                break;
            case 'divide':
                break;
            default:
                $number = $number / 100.0;
        }

        $number = number_format($number, 2, '.', '');
        $number = (float)$number;
        //dd($number);
        return $number;
    }
}