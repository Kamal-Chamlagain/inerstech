<?php
 include '../../includes/connection.php';
if($_GET['id']){
   $id = $_GET['id'];
   $sql ="DELETE FROM vacancy WHERE id=$id";
   $query = mysqli_query($connection,$sql);
   if($query){
      $status = "success";
      $msg = "Vacancy post deleted  Successfully";
      header("Location:../vacancy.php?msg=" . $msg . "&&status=" . $status);

 
   }
   else{
    echo $connection->error; 
   }
}
?>