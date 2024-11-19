<?php

class JobController
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    // Fetch all active jobs
    public function getActiveJobs()
    {
        $stmt = $this->db->query("SELECT * FROM jobs WHERE status = 'active'");
        return $stmt->fetchAll();
    }

    // Fetch a specific job by ID
    public function getJobById($jobId)
    {
        $stmt = $this->db->prepare("SELECT * FROM jobs WHERE id = ?");
        $stmt->execute([$jobId]);
        return $stmt->fetch();
    }

    // Add a new job
    public function addJob($title, $description, $salary, $location)
    {
        $stmt = $this->db->prepare("INSERT INTO jobs (title, description, salary, location, status) VALUES (?, ?, ?, ?, 'active')");
        return $stmt->execute([$title, $description, $salary, $location]);
    }

    // Process a job application
    public function applyForJob($jobId, $userId, $coverLetter)
    {
        $stmt = $this->db->prepare("INSERT INTO job_applications (job_id, user_id, cover_letter) VALUES (?, ?, ?)");
        return $stmt->execute([$jobId, $userId, $coverLetter]);
    }
}
