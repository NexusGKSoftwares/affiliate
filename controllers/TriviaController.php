<?php
require_once '../models/TriviaQuestion.php';

class TriviaController {
    public function fetchTriviaQuestions() {
        $triviaModel = new TriviaQuestion();
        return $triviaModel->getRandomQuestions();
    }
}
?>
