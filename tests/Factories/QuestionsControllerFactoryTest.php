<?php

namespace Tests\Factories;

use AnimalQuiz\Models\QuestionsModel;
use PHPUnit\Framework\TestCase;
use AnimalQuiz\Factories\QuestionsControllerFactory;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

class QuestionsControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $view = $this->createMock(PhpRenderer::class);
        $model = $this->createMock(QuestionsModel::class);
        $container->method('get')->willReturn($view);
        $container->method('get')->willReturn($model);

        $case = new QuestionsControllerFactory($container);
        $expected = QuestionsControllerFactory::class;
        $this->assertInstanceOf($expected, $case);
    }
}
