<form method="POST" action="add_schedule.php">
    <div class="form-group">
        <label>Class Name:</label>
        <input type="text" name="class_name" required>
    </div>
    <div class="form-group">
        <label>Teacher Name:</label>
        <input type="text" name="teacher_name" required>
    </div>
    <div class="form-group">
        <label>Room:</label>
        <input type="text" name="room" required>
    </div>
    <div class="form-group">
        <label>Start Time:</label>
        <input type="datetime-local" name="start_time" required>
    </div>
    <div class="form-group">
        <label>End Time:</label>
        <input type="datetime-local" name="end_time" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Schedule</button>
</form>
