<?php


namespace AnimalQuiz\ServiceWorkers;


class MarkAnswers
{

    /**
     * Run private methods from within the MarkAnswers class
     * @param array $userAnswers
     * @param array $questionsAndCorrectAnswers
     * @return array
     */
    public static function markAnswers(array $userAnswers, array $questionsAndCorrectAnswers): array {

        $formattedUserAnswers = self::formatUserAnswers($userAnswers);

        $formattedCorrectAnswers = self::formatCorrectAnswers($questionsAndCorrectAnswers);

        $questions = self::grabQuestions($questionsAndCorrectAnswers);

        return self::checkAnswers($questions, $formattedUserAnswers, $formattedCorrectAnswers);
    }

    /**
     * format correct answers as supplied from API
     *
     * @param array $questionsAndCorrectAnswers
     * @return array
     */
    private function formatCorrectAnswers(array $questionsAndCorrectAnswers): array {

        $formattedCorrectAnswers = [];

        foreach ($questionsAndCorrectAnswers as $correctAnswer) {
            $formattedCorrectAnswers[] = $correctAnswer->correct_answer;
        }

        return $formattedCorrectAnswers;
    }

    private function formatUserAnswers(array $userAnswers): array {

        $formattedUserAnswers = [];

        foreach ($userAnswers as $key => $value) {
            $newKey = --$key;
            $formattedUserAnswers[$newKey] = $value;
        }

        return $formattedUserAnswers;
    }

    private function grabQuestions(array $questionsAndCorrectAnswers): array {

        $questions = [];

        foreach ($questionsAndCorrectAnswers as $question) {
            $questions[] = $question->question;
        }

        return $questions;
    }

    private function checkAnswers(array $questions, array $userAnswers, array $correctAnswers): array {

        $checkedAnswers = [];

        for ($i = 0; $i < count($questions); $i++) {
            $checkedAnswers[] = ['question' => $questions[$i],
                'correctAnswer' => $correctAnswers[$i],
                'userAnswer' => $userAnswers[$i],
                'result' => $correctAnswers[$i] == $userAnswers[$i]];
        }

        return $checkedAnswers;
    }
}