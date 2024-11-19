<?php
class Job {
    public function getAllJobs() {
        $stmt = $this->db->query("SELECT * FROM jobs ORDER BY date_posted DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
