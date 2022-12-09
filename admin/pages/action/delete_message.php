<?php 
if(isset($_GET['id'])){
  include '../../includes/connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM contact WHERE id = $id";
$query = mysqli_query($connection,$sql);
if($query){
    $status = "success";

      $msg = "Message deleted  Successfully";
      header("Location:../message.php?msg=" . $msg . "&&status=" . $status);

 
}

}
?>