<?php
require_once '../config/database.php';

class TriviaQuestion {
    private $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function getRandomQuestions($limit = 5) {
        $stmt = $this->db->query("SELECT * FROM trivia_questions ORDER BY RAND() LIMIT $limit");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
