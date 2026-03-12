<?php

require_once __DIR__ . '/../models/NotesModel.php';

class NotesController
{
    private $notesModel;

    public function __construct($db)
    {
        $this->notesModel = new NotesModel($db);
    }

    public function index()
    {
        $records = $this->notesModel->getAll();
        require __DIR__ . '/../views/faculty/notes/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $targetDir = __DIR__ . '/../../public/uploads/notes/';

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            $fileName = '';

            if (!empty($_FILES['file']['name'])) {
                $fileName = time() . '_' . basename($_FILES['file']['name']);
                $targetFile = $targetDir . $fileName;
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
            }

            $this->notesModel->insert(
                $_POST['title'],
                $fileName,
                date('Y-m-d')
            );

            redirectTo('notes');
        }

        require __DIR__ . '/../views/faculty/notes/add.php';
    }

    public function edit()
    {
        $id = $_GET['id'] ?? 0;
        $record = $this->notesModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $fileName = $record['file_path'] ?? '';

            if (!empty($_FILES['file']['name'])) {
                $targetDir = __DIR__ . '/../../public/uploads/notes/';

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $fileName = time() . '_' . basename($_FILES['file']['name']);
                $targetFile = $targetDir . $fileName;
                move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
            }

            $this->notesModel->update(
                $id,
                $_POST['title'],
                $fileName
            );

            redirectTo('notes');
        }

        require __DIR__ . '/../views/faculty/notes/edit.php';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? 0;
        $this->notesModel->delete($id);
        redirectTo('notes');
    }
}