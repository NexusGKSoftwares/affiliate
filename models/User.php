<?php
class User {
    public static function findById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function findAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users");
        return $stmt->fetchAll();
    }
}
?>
