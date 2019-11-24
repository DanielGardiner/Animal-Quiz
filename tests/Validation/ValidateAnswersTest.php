<?php

namespace Tests\Validation;

use AnimalQuiz\Validation\ValidateAnswers;
use PHPUnit\Framework\TestCase;

class ValidateAnswersTest extends TestCase
{
    public function testValidateAnswers()
    {
        $userAnswers = array (
            1 => 'Black',
            2 => 'Oregon, United States',
            3 => 'Komodo dragon',
            4 => 'Pufferfish',
            5 => 'Pan paniscus',
            6 => 'Drift', );

        $case = ValidateAnswers::validateAnswers($userAnswers);

        $expected = true;

        $this->assertEquals($case, $expected);
    }
}
