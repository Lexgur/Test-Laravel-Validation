<?php include __DIR__ . '/header.php'; ?>

<h1>Create User</h1>

<form method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="email">Email address:</label>
        <input type="email" id="email" name="email" required pattern=".+@gmail\.com">
    </div>
    <div>
        <input type="submit" value="Create User" class="btn">
    </div>
</form>

<?php include __DIR__ . '/footer.php'; ?>
