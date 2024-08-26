<?php
include '../database.php';

$events = array();
$query = $conn->query("SELECT * FROM schedules");

while($row = $query->fetch_assoc()) {
    $events[] = array(
        'title' => $row['class_name'],
        'start' => $row['start_time'],
        'end' => $row['end_time'],
    );
}

echo json_encode($events);
?>
