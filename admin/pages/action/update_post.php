<?php 

if ($_POST['submit']) {
    include '../../includes/connection.php';  
   $id = $_POST['id'];
    $title = $_POST['utitle'];
    $description = $_POST['udescription'];
    $responsibilities = $_POST['uresponsibilities'];
    $requirement = $_POST['urequirement'];
    $date = $_POST['udate'];

    $sql ="UPDATE vacancy SET title='".$title."',description='".$description."',responsibilities='".$responsibilities."',requirements='".$requirement."',deadline='".$date."' WHERE id=$id";
        
    if (mysqli_query($connection, $sql)) {
        $status = "success";
        $msg = "Vacacncy Post updated Successfully";
        header("Location:../vacancy.php?msg=" . $msg . "&&status=" . $status);
    } else {
        echo $connection->error;
    }
    
} else {
    echo "not called";
}
?>