<?php

class Job
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

    // Fetch job by ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM jobs WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Add a new job
    public function create($title, $description, $salary, $location)
    {
        $stmt = $this->db->prepare("INSERT INTO jobs (title, description, salary, location, status) VALUES (?, ?, ?, ?, 'active')");
        return $stmt->execute([$title, $description, $salary, $location]);
    }

    // Mark a job as closed
    public function closeJob($id)
    {
        $stmt = $this->db->prepare("UPDATE jobs SET status = 'closed' WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
