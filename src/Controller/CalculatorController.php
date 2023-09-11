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
    public function add(int $firstNumber, int $secondNumber): Response
    {
        $result = $this->calculator->add($firstNumber, $secondNumber);

        $return = array('first number' => $firstNumber, 
                        'second number' => $secondNumber,
                        'result' => $result,
                        'error'
                    );

        return new JsonResponse($return);
    }

}
