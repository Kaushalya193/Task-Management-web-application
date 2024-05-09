<?php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    require_once 'db_connection.php';

    // Check if the title field is set and not empty
    if (isset($_POST['title']) && !empty(trim($_POST['title']))) {
        // Prepare and bind the INSERT statement
        $stmt = $conn->prepare("INSERT INTO todos (title) VALUES (:title)");
        $stmt->bindParam(':title', $title);

        // Set parameters and execute
        $title = trim($_POST['title']);
        $stmt->execute();

        // Redirect back to the main page with success message
        header("Location: index.php?mess=success");
        exit();
    } else {
        // Redirect back to the main page with error message
        header("Location: index.php?mess=error");
        exit();
    }
} else {
    // Redirect back to the main page if accessed directly
    header("Location: index.php");
    exit();
}
