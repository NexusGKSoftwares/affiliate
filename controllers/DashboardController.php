<?php
require_once '../models/Transaction.php';

class DashboardController {
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
