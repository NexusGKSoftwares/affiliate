<?php
include 'layout/header.php';
include 'layout/sidebar.php';

$jobModel = new Job();
$jobs = $jobModel->getAllJobs();
?>

<div class="container">
    <h1>Job Postings</h1>
    <div class="job-list">
        <?php foreach ($jobs as $job): ?>
            <div class="job">
                <h2><?= $job['title'] ?></h2>
                <p><?= $job['description'] ?></p>
                <small>Posted on: <?= $job['date_posted'] ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'layout/footer.php'; ?>
