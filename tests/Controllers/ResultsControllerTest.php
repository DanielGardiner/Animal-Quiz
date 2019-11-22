<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use AnimalQuiz\Controllers\ResultsController;
use Slim\Views\PhpRenderer;

class ResultsControllerTest extends TestCase
{
    public function testConstruct()
    {
        $view = $this->createMock(PhpRenderer::class);
        $case = new ResultsController($view);
        $expected = ResultsController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
