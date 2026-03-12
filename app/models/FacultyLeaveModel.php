<?php

class FacultyLeaveModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM faculty_leave ORDER BY leave_id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM faculty_leave WHERE leave_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($leave_type, $from_date, $to_date, $reason)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO faculty_leave (leave_type, from_date, to_date, reason, status)
             VALUES (?, ?, ?, ?, 'Pending')"
        );

        return $stmt->execute([$leave_type, $from_date, $to_date, $reason]);
    }

    public function update($id, $leave_type, $from_date, $to_date, $reason, $status)
    {
        $stmt = $this->conn->prepare(
            "UPDATE faculty_leave
             SET leave_type = ?, from_date = ?, to_date = ?, reason = ?, status = ?
             WHERE leave_id = ?"
        );

        return $stmt->execute([$leave_type, $from_date, $to_date, $reason, $status, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM faculty_leave WHERE leave_id = ?");
        return $stmt->execute([$id]);
    }
}