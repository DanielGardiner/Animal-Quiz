<?php


namespace AnimalQuiz\Models;


class QuestionsModel
{
    public function getQuestions(): \stdClass
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://opentdb.com/api.php?amount=6&category=27&difficulty=medium&type=multiple ');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        $questions = curl_exec($ch);
        if (curl_error($ch)) {
            $questions = '{}';
        }
        curl_close($ch);
        $questionsObject = json_decode($questions);
//        echo '<pre>';
//        var_dump($questionsObject);
//        echo '</pre>';
        return $questionsObject;
    }

    public function formatQuestions(\stdClass $questions): array {
        $questions = $questions->results;
        foreach ($questions as $question) {
            $question->all_answers = array_merge($question->incorrect_answers, [$question->correct_answer]);
            shuffle($question->incorrect_answers);
            unset($question->category);
            unset($question->type);
            unset($question->difficulty);
            unset($question->incorrect_answers);
        }
//        var_dump($questions);
        return $questions;
    }
}