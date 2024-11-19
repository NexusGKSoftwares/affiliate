<?php
include 'layout/header.php';
include 'layout/sidebar.php';

$jobModel = new Job();
$jobs = $jobModel->getActiveJobs();
?>


<main class="main-content">
    <h1>Available Jobs</h1>
    <ul class="job-list">
        <li>
            <h3>Freelance Graphic Designer</h3>
            <p>Location: Remote</p>
            <p>Pay: $300</p>
            <button>Apply</button>
        </li>
        <li>
            <h3>Social Media Manager</h3>
            <p>Location: Remote</p>
            <p>Pay: $500</p>
            <button>Apply</button>
        </li>
    </ul>
</main>

<?php
require_once 'layout/footer.php';
?>
