<?php include __DIR__ . '/header.php'; ?>

<h1>Assign User to Course</h1>

<form method="post">
    <div>
        <label for="user_id">Select User:</label>
        <select id="user_id" name="user_id" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="course_id">Select Course:</label>
        <select id="course_id" name="course_id" required>
            <?php foreach ($courses as $course): ?>
                <option value="<?= $course['id'] ?>"><?= $course['course_name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="progress">Progress (%):</label>
        <input type="number" id="progress" name="progress" min="0" max="100" required>
    </div>
    <div>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Not started">Not Started</option>
            <option value="In progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>
    <div>
        <input type="submit" value="Assign User to Course" class="btn">
    </div>
</form>

<?php include __DIR__ . '/footer.php'; ?>
