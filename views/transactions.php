<?php
include 'layout/header.php';
include 'layout/sidebar.php';

$transactionModel = new Transaction();
$transactions = $transactionModel->getTransactionHistory($userId);
?>

<div class="container">
    <h1>Transaction History</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction['id'] ?></td>
                    <td><?= ucfirst($transaction['type']) ?></td>
                    <td>$<?= $transaction['amount'] ?></td>
                    <td><?= $transaction['date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'layout/footer.php'; ?>
