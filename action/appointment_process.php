<?php
if(isset($_POST['submit'])){
    include '../admin/includes/connection.php';
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$description = $_POST['description'];

$sql = "INSERT INTO appointment(f_name,l_name,email,phone,subject,description) values('$f_name','$l_name','$email','$phone','$subject','$description')";
$query = mysqli_query($connection,$sql);
if($query){
    echo "<script>
    window.alert('Your appointment is send');
    window.location.href='../index.php';
    </script>";
}
else{
    echo $connection->error;
}

}



?>