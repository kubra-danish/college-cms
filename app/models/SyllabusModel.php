<?php

class SyllabusModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM syllabus ORDER BY syllabus_id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM syllabus WHERE syllabus_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($file_path, $upload_date)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO syllabus (file_path, upload_date)
             VALUES (?, ?)"
        );

        return $stmt->execute([$file_path, $upload_date]);
    }

    public function update($id, $file_path)
    {
        $stmt = $this->conn->prepare(
            "UPDATE syllabus
             SET file_path = ?
             WHERE syllabus_id = ?"
        );

        return $stmt->execute([$file_path, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM syllabus WHERE syllabus_id = ?");
        return $stmt->execute([$id]);
    }
}