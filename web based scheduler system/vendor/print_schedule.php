<?php
session_start();
include 'database.php';

$schedule_id = $_GET['schedule_id'];
$stmt = $conn->prepare("SELECT * FROM schedules WHERE id = ?");
$stmt->bind_param('i', $schedule_id);
$stmt->execute();
$schedule = $stmt->get_result()->fetch_assoc();

// Print logic (HTML structure for printing)
echo "<h1>Schedule: {$schedule['class_name']}</h1>";
echo "<p>Room: {$schedule['room']}</p>";
echo "<p>Teacher: {$schedule['teacher_name']}</p>";
