<?php


namespace AnimalQuiz\Factories;


use AnimalQuiz\Controllers\ResultsController;

class ResultsControllerFactory
{
    public function __invoke($container)
    {
        $view = $container->get('renderer');
        return new ResultsController($view);
    }
}