<?php


namespace AnimalQuiz\Factories;


use AnimalQuiz\Controllers\QuestionsController;

class QuestionsControllerFactory
{
    public function __invoke($container)
    {
        $model = $container->get('QuestionsModel');
        $view = $container->get('renderer');

        return new QuestionsController($model, $view);
    }


}