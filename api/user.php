<?php
include '../config/database.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT id, username, email FROM users");
    echo json_encode($stmt->fetchAll());
}
?>
