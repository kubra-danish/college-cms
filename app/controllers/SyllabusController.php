<?php

require_once __DIR__ . '/../models/SyllabusModel.php';

class SyllabusController
{
    private $syllabusModel;

    public function __construct($db)
    {
        $this->syllabusModel = new SyllabusModel($db);
    }

    public function index()
    {
        $records = $this->syllabusModel->getAll();
        require __DIR__ . '/../views/faculty/syllabus/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $targetDir = __DIR__ . '/../../public/uploads/syllabus/';

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $fileName = '';

            if (!empty($_FILES['file']['name'])) {
                $fileName = time() . '_' . basename($_FILES['file']['name']);
                $targetFile = $targetDir . $fileName;
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
            }

            $this->syllabusModel->insert(
                $fileName,
                date('Y-m-d')
            );

            redirectTo('syllabus');
        }

        require __DIR__ . '/../views/faculty/syllabus/add.php';
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $record = $this->syllabusModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fileName = $record['file_path'] ?? '';

            if (!empty($_FILES['file']['name'])) {
                $targetDir = __DIR__ . '/../../public/uploads/syllabus/';

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $fileName = time() . '_' . basename($_FILES['file']['name']);
                $targetFile = $targetDir . $fileName;
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
            }

            $this->syllabusModel->update(
                $id,
                $fileName
            );

            redirectTo('syllabus');
        }

        require __DIR__ . '/../views/faculty/syllabus/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $this->syllabusModel->delete($id);
        redirectTo('syllabus');
    }
}