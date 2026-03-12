<?php

class NotesModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM notes ORDER BY note_id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM notes WHERE note_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($title, $file_path, $upload_date)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO notes (title, file_path, upload_date)
             VALUES (?, ?, ?)"
        );

        return $stmt->execute([$title, $file_path, $upload_date]);
    }

    public function update($id, $title, $file_path)
    {
        $stmt = $this->conn->prepare(
            "UPDATE notes
             SET title = ?, file_path = ?
             WHERE note_id = ?"
        );

        return $stmt->execute([$title, $file_path, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM notes WHERE note_id = ?");
        return $stmt->execute([$id]);
    }
}