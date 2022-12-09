<?php
 include '../../includes/connection.php';
if($_GET['id']){
   $id = $_GET['id'];
   $sql ="DELETE FROM team WHERE id=$id";
   $query = mysqli_query($connection,$sql);
   if($query){
      $status = "success";
      $msg = "Team member deleted  Successfully";
      header("Location:../team.php?msg=" . $msg . "&&status=" . $status);

 
   }
   else{
    echo $connection->error; 
   }
}
?>