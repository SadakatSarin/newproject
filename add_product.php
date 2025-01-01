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
