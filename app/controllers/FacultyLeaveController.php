<?php

require_once __DIR__ . '/../models/FacultyLeaveModel.php';

class FacultyLeaveController
{
    private $leaveModel;

    public function __construct($db)
    {
        $this->leaveModel = new FacultyLeaveModel($db);
    }

    public function index()
    {
        $records = $this->leaveModel->getAll();
        require __DIR__ . '/../views/faculty/faculty_leave/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->leaveModel->insert(
                $_POST['leave_type'],
                $_POST['from_date'],
                $_POST['to_date'],
                $_POST['reason']
            );

            redirectTo('faculty-leave');
        }

        require __DIR__ . '/../views/faculty/faculty_leave/add.php';
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->leaveModel->update(
                $id,
                $_POST['leave_type'],
                $_POST['from_date'],
                $_POST['to_date'],
                $_POST['reason'],
                $_POST['status']
            );

            redirectTo('faculty-leave');
        }

        $record = $this->leaveModel->getById($id);
        require __DIR__ . '/../views/faculty/faculty_leave/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $this->leaveModel->delete($id);
        redirectTo('faculty-leave');
    }
}