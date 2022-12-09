<?php

if(isset($_POST['submit'])){
    session_start();
 include '../../includes/connection.php';

 $email = $_POST['email'];
 $pass = $_POST['pass'];
 $e_password =md5($pass);

 $sql ="select * from admin where email='".$email."' and password = '".$e_password."'";
 $query = mysqli_query($connection,$sql);
 $row = mysqli_num_rows($query);
 if($row>0){
    $_SESSION['valid']=1;
    
    $status = "success";
    $msg = "Login Successfully";
    header("Location:../dashboard.php?msg=" . $msg . "&&status=" . $status);
 }

else{
    echo "<script>
    window.alert('Invalid Username or password');
    window.location.href='../../index.php'
    </script>";

}



}

?>