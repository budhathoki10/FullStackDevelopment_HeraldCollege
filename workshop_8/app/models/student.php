<?php
// app/models/Student.php
require_once __DIR__ . '/../../db.php';

class Student {
    public static function all() {
        global $conn;
        $stmt = $conn->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($name, $email, $course) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO students (name, email, course) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $course]);
    }

    public static function update($id, $name, $email, $course) {
        global $conn;
        $stmt = $conn->prepare("UPDATE students SET name=?, email=?, course=? WHERE id=?");
        return $stmt->execute([$name, $email, $course, $id]);
    }

    public static function delete($id) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>