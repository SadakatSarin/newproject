<?php

require('connection.php');

// Fetch the category details if `id` is provided
if (isset($_GET['id'])) {
    $getid = $_GET['id'];
    $query = $conn->query("SELECT * FROM categ WHERE category_id = $getid");
    $data = $query->fetch_assoc();

    $category_id = $data['category_id'];
    $category_name = $data['category_name'];
    $category_entrydate = $data['category_entrydate'];
}

// Update the category if the form is submitted
if (isset($_GET['category_name'])) {
    $new_name = $_GET['category_name'];
    $new_date = $_GET['category_entrydate'];
    $new_id = $_GET['category_id'];

    $update_sql = "UPDATE categ SET category_name = '$new_name', category_entrydate = '$new_date' WHERE category_id = $new_id";
    echo $conn->query($update_sql) ? "Update successful" : "Update failed: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Category</h1>
    <form action="edit.php" method="GET">
        <label for="category_name">Category Name:</label><br>
        <input type="text" name="category_name" id="category_name" value="<?php echo $category_name ?? ''; ?>" required><br><br>

        <label for="category_entrydate">Category Entry Date:</label><br>
        <input type="date" name="category_entrydate" id="category_entrydate" value="<?php echo $category_entrydate ?? ''; ?>" required><br><br>

        <input type="hidden" name="category_id" value="<?php echo $category_id ?? ''; ?>">
        <input type="submit" value="Update">

        
    </form>

     <!-- Navigation Buttons -->
     <br>
    <button onclick="window.location.href='list_of_category.php'">View Categories</button>
    <button onclick="window.location.href='add_category.php'">Add New Category</button>

</body>
</html>








































<?php

// require('connection.php'); // Ensure this connects to the database using $conn

// // Initialize variables
// $category_id = $category_name = $category_entrydate = "";

// // Check if the category ID is provided in the URL
// if (isset($_GET['id'])) {
//     $category_id = $conn->real_escape_string($_GET['id']);
    
//     // Fetch the category details
//     $sql = "SELECT * FROM categ WHERE category_id = $category_id";
//     $result = $conn->query($sql);

//     if ($result && $result->num_rows > 0) {
//         $data = $result->fetch_assoc();
//         $category_name = $data['category_name'];
//         $category_entrydate = $data['category_entrydate'];
//     } else {
//         echo "Category not found.";
//         exit;
//     }
// }

// // Check if form is submitted to update the category
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
//     $updated_name = $conn->real_escape_string($_POST['category_name']);
//     $updated_date = $conn->real_escape_string($_POST['category_entrydate']);
//     $category_id = $conn->real_escape_string($_POST['category_id']);

//     // Check if all values are set
//     if (!empty($updated_name) && !empty($updated_date) && !empty($category_id)) {
//         // Update the category in the database
//         $update_sql = "UPDATE categ SET category_name = '$updated_name', category_entrydate = '$updated_date' WHERE category_id = $category_id";

//         if ($conn->query($update_sql) === TRUE) {
//             echo "Category updated successfully.";
//         } else {
//             echo "Error updating category: " . $conn->error;
//         }
//     } else {
//         echo "All fields are required.";
//     }
// }

?>