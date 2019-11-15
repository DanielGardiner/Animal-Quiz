<?php


namespace AnimalQuiz\Controllers;


use AnimalQuiz\ServiceWorkers\MarkAnswers;
use Slim\Http\Request;
use Slim\Http\Response;

class ResultsController
{
    private $view;

    /**
     * ResultsController constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $userAnswers = $request->getQueryParams();

        $questionsAndCorrectAnswers = $_SESSION['questions']->results;

        $markedAnswers = MarkAnswers::markAnswers($userAnswers, $questionsAndCorrectAnswers);

        $this->view->render($response, 'results.phtml', ['markedAnswers' => $markedAnswers]);
    }
}