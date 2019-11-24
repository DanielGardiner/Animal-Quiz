<?php

namespace Tests\ServiceWorkers;

use AnimalQuiz\ServiceWorkers\MarkAnswers;
use PHPUnit\Framework\TestCase;

class MarkAnswersTest extends TestCase
{

    public function testMarkAnswers()
    {
        $userAnswers = array (
            1 => 'Black',
            2 => 'Oregon, United States',
            3 => 'Komodo dragon',
            4 => 'Pufferfish',
            5 => 'Pan paniscus',
            6 => 'Drift', );

        $questionsAndCorrectAnswers = array (
            0 => (object)(array( 'question' => "What color/colour is a polar bear's skin?", 'correct_answer' => 'Black', 'all_answers' => array ( 0 => 'White', 1 => 'Pink', 2 => 'Green', 3 => 'Black', ), 'id' => 1, )),
            1 => (object)(array( 'question' => 'The now extinct species "Thylacine" was native to where?', 'correct_answer' => 'Tasmania, Australia', 'all_answers' => array ( 0 => 'Baluchistan, Pakistan', 1 => 'Wallachia, Romania', 2 => 'Oregon, United States', 3 => 'Tasmania, Australia', ), 'id' => 2, )),
            2 => (object)(array( 'question' => 'Which of these species is not extinct?', 'correct_answer' => 'Komodo dragon', 'all_answers' => array ( 0 => 'Japanese sea lion', 1 => 'Tasmanian tiger', 2 => 'Saudi gazelle', 3 => 'Komodo dragon', ), 'id' => 3, )),
            3 => (object)(array( 'question' => 'The dish Fugu, is made from what family of fish?', 'correct_answer' => 'Pufferfish', 'all_answers' => array ( 0 => 'Bass', 1 => 'Salmon', 2 => 'Mackerel', 3 => 'Pufferfish', ), 'id' => 4, )),
            4 => (object)(array( 'question' => 'What is the scientific name of the Common Chimpanzee?', 'correct_answer' => 'Pan troglodytes', 'all_answers' => array ( 0 => 'Gorilla gorilla', 1 => 'Pan paniscus', 2 => 'Panthera leo', 3 => 'Pan troglodytes', ), 'id' => 5, )),
            5 => (object)(array( 'question' => 'What is the collective noun for rats?', 'correct_answer' => 'Mischief', 'all_answers' => array ( 0 => 'Pack', 1 => 'Race', 2 => 'Drift', 3 => 'Mischief', ), 'id' => 6, )), );

        $case = MarkAnswers::markAnswers($userAnswers, $questionsAndCorrectAnswers);

        $expected = array (
            0 => array ( 'question' => "What color/colour is a polar bear's skin?", 'correctAnswer' => 'Black', 'userAnswer' => 'Black', 'result' => true, ),
            1 => array ( 'question' => 'The now extinct species "Thylacine" was native to where?', 'correctAnswer' => 'Tasmania, Australia', 'userAnswer' => 'Oregon, United States', 'result' => false, ),
            2 => array ( 'question' => 'Which of these species is not extinct?', 'correctAnswer' => 'Komodo dragon', 'userAnswer' => 'Komodo dragon', 'result' => true, ),
            3 => array ( 'question' => 'The dish Fugu, is made from what family of fish?', 'correctAnswer' => 'Pufferfish', 'userAnswer' => 'Pufferfish', 'result' => true, ),
            4 => array ( 'question' => 'What is the scientific name of the Common Chimpanzee?', 'correctAnswer' => 'Pan troglodytes', 'userAnswer' => 'Pan paniscus', 'result' => false, ),
            5 => array ( 'question' => 'What is the collective noun for rats?', 'correctAnswer' => 'Mischief', 'userAnswer' => 'Drift', 'result' => false, ), );

        $this->assertEquals($case, $expected);
    }
}
