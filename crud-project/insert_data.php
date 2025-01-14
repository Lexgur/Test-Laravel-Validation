<?php

global $connection;
include('dbcon.php');

if (isset($_POST['add_students'])) {

    $fname = trim($_POST['f_name']); // Sanitize input
    $lname = trim($_POST['l_name']);
    $age = intval($_POST['age']); // Convert age to an integer

    // Validate inputs
    if (empty($fname)) {
        header('location:index.php?message=Oh come on... Really?');
        exit;
    }

    try {
        // Prepare the SQL query
        $query = "INSERT INTO `students` (student_first_name, student_last_name, student_age)
                  VALUES (:fname, :lname, :age)";
        $stmt = $connection->prepare($query);

        // Bind parameters
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);

        // Execute the query
        if ($stmt->execute()) {
            header('location:index.php?msg=Student has been added');
        } else {
            $errorInfo = $stmt->errorInfo();
            die("Query Failed: " . $errorInfo[2]);
        }
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>
