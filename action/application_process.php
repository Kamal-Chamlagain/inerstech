<?php
if($_POST['submit']){
    include '../admin/includes/connection.php';

if ($_FILES) {
    $filename1 = $_FILES["c_letter"]["name"];
    $tempname1 = $_FILES["c_letter"]["tmp_name"];
    $folder1 = "../assets/files/cover/" . $filename1;
    move_uploaded_file($tempname1, $folder1);

    $filename2 = $_FILES["resume"]["name"];
    $tempname2 = $_FILES["resume"]["tmp_name"];
    $folder2 = "../assets/files/resume/" . $filename2;
    move_uploaded_file($tempname2, $folder2);
 
}
$post = $_POST['post'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO application(name,email,contact,post,cover,resume) values('$name','$email','$phone','$post','".$filename1."','".$filename2."')";
$query= mysqli_query($connection,$sql);
if($query){
    echo "<script>
    window.alert('Your application is submitted')
    window.location.href='../index.php'
    </script>";
}
else{
    echo $connection->error;
}
}
else{
    echo "not called";
}
