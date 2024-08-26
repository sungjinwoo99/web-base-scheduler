<?php
session_start();
include 'database.php';

if ($_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

$conflicts = $conn->query("SELECT * FROM conflict_logs WHERE resolution IS NULL");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conflict_id = $_POST['conflict_id'];
    $resolution = $_POST['resolution'];
    $resolved_by = $_SESSION['user_id'];

    $stmt = $conn->prepare("UPDATE conflict_logs SET resolution = ?, resolved_by = ? WHERE id = ?");
    $stmt->bind_param('sii', $resolution, $resolved_by, $conflict_id);
    $stmt->execute();

    echo "Conflict resolved!";
}

include 'views/conflict_list.php';
?>
