<?php
include 'layout/header.php';
include 'layout/sidebar.php';

$dashboardController = new DashboardController();
$data = $dashboardController->getDashboardData($userId);
?>
<div class="container">
    <h1>Dashboard</h1>
    <div class="stats">
        <p>Total Deposits: $<?= $data['deposits'] ?></p>
        <p>Total Withdrawals: $<?= $data['withdrawals'] ?></p>
        <p>Balance: $<?= $data['balance'] ?></p>
    </div>
    <div class="history">
        <h2>Transaction History</h2>
        <!-- Transaction table goes here -->
    </div>
</div>
<?php include 'layout/footer.php'; ?>
