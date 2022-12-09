<?php
if(isset($_POST['submit'])){
    include '../admin/includes/connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['description'];

$sql = "INSERT INTO contact (name,email,subject,message) values('$name','$email','$subject','$message')";
$query = mysqli_query($connection,$sql);
if($query){
    echo "<script>
    window.alert('Your message sent successfully');
    window.location.href='../contact.php';
    </script>";
}
else{
    echo $connection->error;
}



}
else{
    echo "not called";
}
?>