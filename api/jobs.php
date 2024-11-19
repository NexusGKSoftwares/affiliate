<?php
include '../config/database.php';
include '../controllers/JobController.php';

$jobController = new JobController($pdo);
$activeJobs = $jobController->getActiveJobs();
echo json_encode($activeJobs);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch available jobs
    $stmt = $pdo->query("SELECT id, title, description, salary, location FROM jobs WHERE status = 'active'");
    $jobs = $stmt->fetchAll();
    echo json_encode($jobs);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Submit a job application
    $job_id = $_POST['job_id'];
    $user_id = $_POST['user_id'];
    $cover_letter = $_POST['cover_letter'];

    // Insert the job application into the database
    $stmt = $pdo->prepare("INSERT INTO job_applications (job_id, user_id, cover_letter) VALUES (?, ?, ?)");
    if ($stmt->execute([$job_id, $user_id, $cover_letter])) {
        echo json_encode(['status' => 'success', 'message' => 'Application submitted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to submit application.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
