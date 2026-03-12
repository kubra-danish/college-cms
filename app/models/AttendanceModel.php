<?php

class AttendanceModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM attendance ORDER BY attendance_id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM attendance WHERE attendance_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($attendance_date, $total_classes, $attended_classes)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO attendance (attendance_date, total_classes, attended_classes)
             VALUES (?, ?, ?)"
        );

        return $stmt->execute([$attendance_date, $total_classes, $attended_classes]);
    }

    public function update($id, $attendance_date, $total_classes, $attended_classes)
    {
        $stmt = $this->conn->prepare(
            "UPDATE attendance
             SET attendance_date = ?, total_classes = ?, attended_classes = ?
             WHERE attendance_id = ?"
        );

        return $stmt->execute([$attendance_date, $total_classes, $attended_classes, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM attendance WHERE attendance_id = ?");
        return $stmt->execute([$id]);
    }
}