<?php include __DIR__ . '/header.php'; ?>

<h1>Users and Courses</h1>

<!-- Buttons to go to create user, create course and assign users to courses -->
<div class="container">
    <div style="margin-bottom: 20px;">
        <a href="/../../index.php?action=create_user" class="btn">Create User</a>
        <a href="/../../index.php?action=create_course" class="btn">Create Course</a>
        <a href="/../../index.php?action=assign_course" class="btn">Assign User to Course</a>
    </div>

    <?php if (empty($usersCourses)): ?>
        <p class="alert alert-warning">No users found or no course progress available.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>User</th>
                <th>Email</th>
                <th>Course</th>
                <th>Progress</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usersCourses as $userCourse): ?>
                <tr>
                    <td><?= htmlspecialchars($userCourse['username']) ?></td>
                    <td><?= htmlspecialchars($userCourse['email']) ?></td>
                    <td><?= htmlspecialchars($userCourse['course_name']) ?></td>
                    <td><?= htmlspecialchars($userCourse['progress']) ?>%</td>
                    <td><?= htmlspecialchars($userCourse['status']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/footer.php'; ?>
