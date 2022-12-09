<?php

if ($_POST['submit']) {
    include '../../includes/connection.php';
   
    $title = $_POST['title'];
    $description = $_POST['description'];
    $responsibilities = $_POST['responsibilities'];
    $requirement = $_POST['requirement'];
    $date = $_POST['date'];
   
    $sql = "INSERT INTO vacancy(title,description,responsibilities,requirements,deadline) VALUES ('" . $title . "','" . $description. "','" .$responsibilities . "','".$requirement."','".$date."')";
  
    if (mysqli_query($connection, $sql)) {
        $status = "success";
        $msg = "Vacacncy Post Added Successfully";
        header("Location:../vacancy.php?msg=" . $msg . "&&status=" . $status);
    } else {
        echo $connection->error;
    }
    
} else {
    echo "not called";
}
