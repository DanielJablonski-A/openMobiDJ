<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Model\Calculator;

class CalculatorController extends AbstractController
{
    private $calculator;

    public function __construct(Calculator $calculator){
        $this->calculator = $calculator;
    }

    #[Route('/api/add/{firstNumber}/{secondNumber}', name: 'api_calculator_add')]
    public function add(string $firstNumber, string $secondNumber): Response
    {
        $return = $this->calculator->add($firstNumber, $secondNumber);
        return new JsonResponse($return);
    }

    #[Route('/api/substract/{firstNumber}/{secondNumber}', name: 'api_calculator_substract')]
    public function substract(string $firstNumber, string $secondNumber): Response
    {
        $return = $this->calculator->substract($firstNumber, $secondNumber);
        return new JsonResponse($return);
    }

    #[Route('/api/multiply/{firstNumber}/{secondNumber}', name: 'api_calculator_multiply')]
    public function multiply(string $firstNumber, string $secondNumber): Response
    {
        $return = $this->calculator->multiply($firstNumber, $secondNumber);
        return new JsonResponse($return);
    }

    #[Route('/api/divide/{firstNumber}/{secondNumber}', name: 'api_calculator_divide')]
    public function divide(string $firstNumber, string $secondNumber): Response
    {
        $return = $this->calculator->divide($firstNumber, $secondNumber);
        return new JsonResponse($return);
    }

}
