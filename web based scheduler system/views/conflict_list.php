<h2>Unresolved Conflicts</h2>
<ul>
    <?php while ($conflict = $conflicts->fetch_assoc()): ?>
        <li>
            <?php echo $conflict['conflict_desc']; ?>
            <form method="POST">
                <input type="hidden" name="conflict_id" value="<?php echo $conflict['id']; ?>">
                <textarea name="resolution" placeholder="Resolution details"></textarea>
                <button type="submit" class="btn btn-success">Resolve</button>
            </form>
        </li>
    <?php endwhile; ?>
</ul>
