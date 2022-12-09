<?php

if ($_POST['submit']) {
    include '../../includes/connection.php';
    $filename = $_POST['old_image'];
    if ($_FILES["timage"]&& !empty($_FILES["timage"]["name"])) {
        $filename = $_FILES["timage"]["name"];

        $tempname = $_FILES["timage"]["tmp_name"];

        $folder = "../../assets/images/team/" . $filename;
        move_uploaded_file($tempname, $folder);
    }
   
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desg = $_POST['desg'];
    $f_link = $_POST['f_link'];
    $i_link = $_POST['i_link'];
    $l_link = $_POST['l_link'];
    $sql = "UPDATE team SET name='" . $name . "',designation='" . $desg . "',facebook='".$f_link."',instagram='".$i_link."',linkedin='".$l_link."',image='" . $filename . "' WHERE id =$id";

    if (mysqli_query($connection, $sql)) {
        $status = "success";

        $msg = "Team Updated Successfully";
        header("Location:../team.php?msg=" . $msg . "&&status=" . $status);

        //         echo "<script>
        // window.alert('Team successfully updated');
        // window.location.href='../team';
        // </script>";
    } else {
        echo $connection->error;
        // header('Location:../dashboard');
    }
} else {
    echo "not called";
}
