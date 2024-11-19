<?php
include '../config/database.php';
header('Content-Type: application/json');

// Determine the type of request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch trivia questions
    $stmt = $pdo->query("SELECT id, question, option_a, option_b, option_c, option_d FROM trivia_questions");
    $questions = $stmt->fetchAll();
    echo json_encode($questions);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle trivia answer submission
    $question_id = $_POST['question_id'];
    $selected_option = $_POST['selected_option'];

    // Fetch the correct answer
    $stmt = $pdo->prepare("SELECT correct_option FROM trivia_questions WHERE id = ?");
    $stmt->execute([$question_id]);
    $result = $stmt->fetch();

    if ($result) {
        $is_correct = $result['correct_option'] === $selected_option;
        echo json_encode([
            'status' => 'success',
            'correct' => $is_correct,
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Question not found.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
