<?php
if(isset($_POST['changepass'])){
  include '../../includes/connection.php';
  
   $oldpass = $_POST['password'];
   $newpass = $_POST['newpassword'];
   $rnewpass = $_POST['renewpassword'];
  $hpassword = md5($oldpass);
  $hnewpass = md5($newpass);
 
  $sql ="SELECT * FROM admin WHERE password='$hpassword'";
  $result = mysqli_query($connection, $sql);
  $rows = mysqli_num_rows($result);
  if($rows>0){
    $sql2="UPDATE admin SET password='$hnewpass' where password='$hpassword'";

    if (mysqli_query($connection,$sql2)) {
      $status = "success";
      $msg = "Password Changed Successfully";
      header("Location:../c_password.php?msg=" . $msg . "&&status=" . $status);

  }
}
  else{
    $status = "error";
    $msg = "Incorrect Password";
    header("Location:../c_password.php?msg=" . $msg . "&&status=" . $status);
  }
$conn->close();
}
else{
  header('Location:c_password');
}
