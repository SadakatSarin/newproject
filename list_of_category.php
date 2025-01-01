<?php

require('connection.php');


    
    
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of category</title>

    <link rel="stylesheet" href="list.css">
</head>
<body>
    <?php

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM categ WHERE category_id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<p>Category deleted successfully.</p>";
    } else {
        echo "<p>Error deleting category: " . $conn->error . "</p>";
    }
}



     $sql="select * from categ";
     $query=$conn->query($sql);

    //  $data=mysqli_fetch_assoc($query);

    //  echo $data["category_name"];

    echo "<table border='1'>";
    echo "<caption>Category Details</caption>";
    echo "<tr><th>Category Name</th><th>Entry Date</th><th>Action</th></tr>";

    while ($data = mysqli_fetch_assoc($query)) {
    
         $category_id =$data["category_id"];
         $category_name =$data["category_name"];
         $category_entrydate=$data["category_entrydate"];

         echo "<tr>";
         echo "<td>$category_name</td>";
         echo "<td>$category_entrydate</td>";
         echo "<td>
         
         <a href='edit.php?id=$category_id'>Edit</a> 
         
          <a href='list_of_category.php?delete_id=$category_id' onclick='return confirm(\"Are you sure you want to delete this category?\")'>Delete</a>
         
         </td>";
         
         echo "</tr>";
    
    }

    echo"</table>";


    


      


    
    
    ?>

     <!-- Navigation Buttons -->
     <br>
    <button onclick="window.location.href='add_category.php'">Add New Category</button>

    
</body>
</html>