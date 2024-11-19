<?php
include '../config/database.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];

    $stmt = $pdo->prepare("INSERT INTO transactions (user_id, amount, type) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_id, $amount, $type])) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
?>
