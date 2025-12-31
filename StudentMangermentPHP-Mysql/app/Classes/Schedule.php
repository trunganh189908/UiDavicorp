<?php

class Schedule {
    private $conn;
    private $table = 'schedules';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createSchedule($user_id, $course_name, $day, $time, $location) {
        $query = "INSERT INTO " . $this->table . " (user_id, course_name, day, time, location, created_at) 
                  VALUES (?, ?, ?, ?, ?, NOW())";
        
        $stmt = $this->conn->prepare($query);
        
        if (!$stmt) {
            return ['success' => false, 'message' => 'Query preparation failed'];
        }

        $stmt->bind_param('issss', $user_id, $course_name, $day, $time, $location);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Schedule created successfully'];
        }

        return ['success' => false, 'message' => 'Failed to create schedule'];
    }

    public function getSchedulesByUser($user_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? ORDER BY day, time ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateSchedule($schedule_id, $course_name, $day, $time, $location) {
        $query = "UPDATE " . $this->table . " SET course_name = ?, day = ?, time = ?, location = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssi', $course_name, $day, $time, $location, $schedule_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Schedule updated successfully'];
        }

        return ['success' => false, 'message' => 'Failed to update schedule'];
    }

    public function deleteSchedule($schedule_id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $schedule_id);

        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Schedule deleted successfully'];
        }

        return ['success' => false, 'message' => 'Failed to delete schedule'];
    }

    public function getScheduleById($schedule_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $schedule_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}
