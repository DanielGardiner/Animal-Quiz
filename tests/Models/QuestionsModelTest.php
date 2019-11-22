<?php

namespace Tests\Models;

use PHPUnit\Framework\TestCase;
use AnimalQuiz\Models\QuestionsModel;

class QuestionsModelTest extends TestCase
{
    public function testConstruct()
    {
        $db = $this->createMock(\PDO::class);
        $case = new QuestionsModel($db);
        $expected = QuestionsModel::class;
        $this->assertInstanceOf($expected, $case);
    }
}
