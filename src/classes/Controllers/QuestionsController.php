<?php


namespace AnimalQuiz\Controllers;


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

    public function __invoke()
    {
        $questions = $this->model->getQuestions();
        $formattedQuestions = $this->model->formatQuestions($questions);
        $this->view->render($request, 'index.phtml', $formattedQuestions);

    }
}