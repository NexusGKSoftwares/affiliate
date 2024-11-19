<?php
require_once '../config/database.php';

class Transaction {
    private $db;

    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }

    public function getTotalDeposits($userId) {
        $stmt = $this->db->prepare("SELECT SUM(amount) as total FROM transactions WHERE user_id = ? AND type = 'deposit'");
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }

    public function getTotalWithdrawals($userId) {
        $stmt = $this->db->prepare("SELECT SUM(amount) as total FROM transactions WHERE user_id = ? AND type = 'withdrawal'");
        $stmt->execute([$userId]);
        $result = $stmt->fetch();
        return $result['total'] ?? 0;
    }
    public function getTransactionHistory($userId) {
        $stmt = $this->db->prepare("SELECT * FROM transactions WHERE user_id = ? ORDER BY date DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getTransactionsByUser($userId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM transactions WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public static function addTransaction($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO transactions (user_id, amount, type) VALUES (?, ?, ?)");
        $stmt->execute([$data['user_id'], $data['amount'], $data['type']]);
    }
}
?>

