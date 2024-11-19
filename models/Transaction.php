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
}
?>
