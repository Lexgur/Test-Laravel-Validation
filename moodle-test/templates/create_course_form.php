<?php include __DIR__ . '/header.php'; ?>

<h1>Create Course</h1>

<form method="post">
    <div>
        <label for="course_name">Course name:</label>
        <input type="text" id="course_name" name="course_name" required>
    </div>
    <div>
        <label for="course_desc">Description:</label>
        <input type="text" id="course_desc" name="course_desc" required>
    </div>
    <div>
        <input type="submit" value="Create course" class="btn">
    </div>
</form>

<?php include __DIR__ . '/footer.php'; ?>
