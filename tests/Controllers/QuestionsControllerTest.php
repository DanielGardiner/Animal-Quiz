<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use AnimalQuiz\Controllers\QuestionsController;
use AnimalQuiz\Models\QuestionsModel;
use Slim\Views\PhpRenderer;

class QuestionsControllerTest extends TestCase
{
    public function testConstruct()
    {
        $model = $this->createMock(QuestionsModel::class);
        $view = $this->createMock(PhpRenderer::class);
        $case = new QuestionsController($model, $view);
        $expected = QuestionsController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
