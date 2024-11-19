<?php
require_once '../models/Transaction.php';

class DashboardController {
    public function index() {
        // Fetch data for the dashboard
        $user = $_SESSION['user_id'];
        $transactions = Transaction::getTransactionsByUser($user);
        require_once 'views/dashboard.php';
    }
    public function getDashboardData($userId) {
        $transactionModel = new Transaction();
        $deposits = $transactionModel->getTotalDeposits($userId);
        $withdrawals = $transactionModel->getTotalWithdrawals($userId);
        $balance = $deposits - $withdrawals;

        return [
            'deposits' => $deposits,
            'withdrawals' => $withdrawals,
            'balance' => $balance
        ];
    }
}
?>
