<?php


namespace AnimalQuiz\Validation;


class ValidateAnswers
{
    static function validateAnswers($userAnswers) {

        $validateArray = [];

        foreach ($userAnswers as $userAnswer) {
            if (strlen($userAnswer) <= 256) {
                $validateArray[] = true;
            } else {
                $validateArray[] = false;
            }
        }

        if (!(in_array(false, $validateArray))) {
            return true;
        } else {
            return false;
        }
    }
}