<?php


namespace AnimalQuiz\Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class QuestionsController
{
    private $model;
    private $view;

    /**
     * QuestionsController constructor.
     * @param $model
     * @param $view
     */
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $questions = $this->model->getQuestions();
        $_SESSION['questions'] = $questions;
        $formattedQuestions = $this->model->formatQuestions($questions);
        $this->view->render($response, 'index.phtml', ['questions' => $formattedQuestions]);
    }
}