<?php

class TransactionController
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    // Fetch all transactions for a specific user
    public function getUserTransactions($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM transactions WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    // Add a new transaction (deposit or withdrawal)
    public function addTransaction($userId, $amount, $type)
    {
        $stmt = $this->db->prepare("INSERT INTO transactions (user_id, amount, type, created_at) VALUES (?, ?, ?, NOW())");
        return $stmt->execute([$userId, $amount, $type]);
    }

    // Calculate the user's account balance
    public function getAccountBalance($userId)
    {
        $stmt = $this->db->prepare("SELECT 
            SUM(CASE WHEN type = 'deposit' THEN amount ELSE 0 END) AS total_deposit,
            SUM(CASE WHEN type = 'withdrawal' THEN amount ELSE 0 END) AS total_withdrawal
            FROM transactions WHERE user_id = ?");
        $stmt->execute([$userId]);
        $result = $stmt->fetch();

        $totalDeposit = $result['total_deposit'] ?? 0;
        $totalWithdrawal = $result['total_withdrawal'] ?? 0;

        return $totalDeposit - $totalWithdrawal;
    }
}
