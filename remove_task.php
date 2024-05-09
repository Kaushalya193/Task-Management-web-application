<?php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    require_once 'db_connection.php';

    // Check if the task ID is set
    if (isset($_POST['id'])) {
        // Sanitize the task ID
        $task_id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        // Prepare and bind the DELETE statement
        $stmt = $conn->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->bindParam(':id', $task_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Send a success response
            echo 'success';
        } else {
            // Send an error response
            echo 'error';
        }
    } else {
        // Send an error response if the task ID is not set
        echo 'error';
    }
} else {
    // Send an error response if accessed directly
    echo 'error';
}
