<?php

namespace Tests\Factories;

use PHPUnit\Framework\TestCase;
use AnimalQuiz\Factories\ResultsControllerFactory;
use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

class ResultsControllerFactoryTest extends TestCase
{
    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $view = $this->createMock(PhpRenderer::class);
        $container->method('get')->willReturn($view);

        $case = new ResultsControllerFactory($container);
        $expected = ResultsControllerFactory::class;
        $this->assertInstanceOf($expected, $case);
    }

}
