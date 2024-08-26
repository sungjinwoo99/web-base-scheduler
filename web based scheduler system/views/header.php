<!DOCTYPE html>
<html>
<head>
    <title>Scheduler System</title>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="add_schedule.php">Add Schedule</a>
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <a href="resolve_conflicts.php">Resolve Conflicts</a>
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</nav>
<div class="container">
