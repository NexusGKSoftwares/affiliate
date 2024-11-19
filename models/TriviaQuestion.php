<?php

class TriviaQuestion
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    // Fetch all trivia questions
    public function getAllQuestions()
    {
        $stmt = $this->db->query("SELECT * FROM trivia_questions");
        return $stmt->fetchAll();
    }

    // Add a new trivia question
    public function create($question, $options, $correctAnswer)
    {
        $stmt = $this->db->prepare("INSERT INTO trivia_questions (question, options, correct_answer) VALUES (?, ?, ?)");
        return $stmt->execute([$question, json_encode($options), $correctAnswer]);
    }

    // Get a trivia question by ID
    public function getQuestionById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM trivia_questions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
