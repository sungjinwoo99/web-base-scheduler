<form method="POST" action="login.php">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
