<?php
// Schedule Controller
require_once __DIR__ . '/../index.php';

class ScheduleController {
    private $schedule;

    public function __construct() {
        $this->schedule = new Schedule($GLOBALS['db']);
    }

    public function createSchedule() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_SESSION['user_id'] ?? null;
            $course_name = $_POST['course_name'] ?? '';
            $day = $_POST['day'] ?? '';
            $time = $_POST['time'] ?? '';
            $location = $_POST['location'] ?? '';

            if (!$user_id) {
                return ['success' => false, 'message' => 'User not logged in'];
            }

            return $this->schedule->createSchedule($user_id, $course_name, $day, $time, $location);
        }
        return null;
    }

    public function getSchedules() {
        $user_id = $_SESSION['user_id'] ?? null;
        if (!$user_id) {
            return [];
        }
        return $this->schedule->getSchedulesByUser($user_id);
    }

    public function updateSchedule() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $schedule_id = $_POST['schedule_id'] ?? null;
            $course_name = $_POST['course_name'] ?? '';
            $day = $_POST['day'] ?? '';
            $time = $_POST['time'] ?? '';
            $location = $_POST['location'] ?? '';

            return $this->schedule->updateSchedule($schedule_id, $course_name, $day, $time, $location);
        }
        return null;
    }

    public function deleteSchedule($schedule_id) {
        return $this->schedule->deleteSchedule($schedule_id);
    }
}
