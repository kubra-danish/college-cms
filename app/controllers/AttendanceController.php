<?php

require_once __DIR__ . '/../models/AttendanceModel.php';

class AttendanceController
{
    private $attendanceModel;

    public function __construct($db)
    {
        $this->attendanceModel = new AttendanceModel($db);
    }

    public function index()
    {
        $records = $this->attendanceModel->getAll();
        require __DIR__ . '/../views/faculty/attendance/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->attendanceModel->insert(
                $_POST['attendance_date'],
                $_POST['total_classes'],
                $_POST['attended_classes']
            );

            redirectTo('attendance');
        }

        require __DIR__ . '/../views/faculty/attendance/add.php';
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->attendanceModel->update(
                $id,
                $_POST['attendance_date'],
                $_POST['total_classes'],
                $_POST['attended_classes']
            );

            redirectTo('attendance');
        }

        $record = $this->attendanceModel->getById($id);
        require __DIR__ . '/../views/faculty/attendance/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $this->attendanceModel->delete($id);
        redirectTo('attendance');
    }
}