<?php
require_once 'layout/header.php';
require_once 'layout/sidebar.php';
?>

<main class="main-content">
    <h1>Dashboard</h1>
    <div class="stats">
        <div class="stat">
            <h3>Total Deposited</h3>
            <p>$<?php echo number_format(1000, 2); ?></p>
        </div>
        <div class="stat">
            <h3>Total Withdrawn</h3>
            <p>$<?php echo number_format(400, 2); ?></p>
        </div>
        <div class="stat">
            <h3>Balance</h3>
            <p>$<?php echo number_format(600, 2); ?></p>
        </div>
    </div>
    <h2>Transaction History</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through transactions -->
            <tr>
                <td>2024-11-18</td>
                <td>Deposit</td>
                <td>$500</td>
                <td>Completed</td>
            </tr>
        </tbody>
    </table>
</main>

<?php
require_once 'layout/footer.php';
?>
