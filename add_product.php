<?php

require('connection.php'); // Ensure this connects to the database using $conn

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Category</title>
</head>
<body>
    <?php
    // Check if form data is submitted
    if (isset($_GET['category_name']) && isset($_GET['category_entrydate'])) {
        // Get the form data
        $category_name = $conn->real_escape_string($_GET['category_name']); // Escape input to prevent SQL injection
        $category_entrydate = $conn->real_escape_string($_GET['category_entrydate']);

        // Construct the SQL query
        $sql = "INSERT INTO categ (category_name, category_entrydate) VALUES ('$category_name', '$category_entrydate')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully.";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    }
    ?>

    <!-- Form for adding a category -->
    <form action="add_category.php" method="GET">
        <label for="category_name">Category:</label><br>
        <input type="text" name="category_name" id="category_name" required><br><br>

        <label for="category_entrydate">Category Entry Date:</label><br>
        <input type="date" name="category_entrydate" id="category_entrydate" required><br><br>

        <input type="submit" value="Submit">
    </form>


     <!-- Navigation Buttons -->
     <br>
    <button onclick="window.location.href='list_of_category.php'">View Categories</button>
    
</body>
</html>
