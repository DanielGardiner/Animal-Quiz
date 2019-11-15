<?php


namespace AnimalQuiz\Validation;


class ValidateAnswers
{
    static function validateAnswers($userAnswers) {

        $validateArray = [];

        foreach ($userAnswers as $userAnswer) {

            $userAnswerClean = htmlentities($userAnswer);

//            var_dump($userAnswer);
//            echo '<br>';
//            var_dump($userAnswerClean);
//            echo '<br>';
//            var_dump(($userAnswers == $userAnswerClean));
//            echo '<br>';

            if (($userAnswers == $userAnswerClean) && (strlen($userAnswers) <= 256)) {
                $validateArray[] = true;
            } else {
                $validateArray[] = false;
            }
        }

        if (!(in_array(false, $validateArray))) {
            return 'true';
        } else {
            return 'false';
        }
    }
}