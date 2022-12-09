<?php
 include '../../includes/connection.php';
if($_GET['id']){
   $id = $_GET['id'];
   $sql ="DELETE FROM application WHERE id=$id";
   $query = mysqli_query($connection,$sql);
   if($query){
      $status = "success";
      $msg = "Application deleted  Successfully";
      header("Location:../application.php?msg=" . $msg . "&&status=" . $status);

 
   }
   else{
    echo $connection->error; 
   }
}
?>