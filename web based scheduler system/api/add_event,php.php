<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_name = $_POST['class_name'];
    $teacher_name = $_POST['teacher_name'];
    $room = $_POST['room'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Basic conflict check before inserting
    $stmt = $conn->prepare("INSERT INTO schedules (class_name, teacher_name, room, start_time, end_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $class_name, $teacher_name, $room, $start_time, $end_time);
    $stmt->execute();
}
?>
