<?php

if ($_POST['submit']) {
    include '../../includes/connection.php';
    if ($_FILES) {
        $filename = $_FILES["timage"]["name"];

        $tempname = $_FILES["timage"]["tmp_name"];

        $folder = "../../assets/images/team/" . $filename;
        move_uploaded_file($tempname, $folder);
    }
    $name = $_POST['name'];
    $desg = $_POST['desg'];
    $f_link = $_POST['f_link'];
    $i_link = $_POST['i_link'];
    $l_link = $_POST['l_link'];

    $sql = "INSERT INTO team(name,designation,facebook,instagram,linkedin,image) VALUES ('" . $name . "','" . $desg . "','" . $f_link . "','" . $i_link . "','" . $l_link. "','" . $filename . "')";
    $sql2 = "SELECT * FROM team WHERE name = '" . $name . "' and designation ='" . $desg . "' ";
    $query1 = mysqli_query($connection, $sql2);
    if ($row = mysqli_fetch_assoc($query1)) {
        $no = mysqli_num_rows($query1);
        if ($no > 0) {
            $status = "error";

            $msg = "Team member already exists";
            header("Location:../team.php?msg=" . $msg . "&&status=" . $status);
        }
    } else
    if (mysqli_query($connection, $sql)) {

        $status = "success";

        $msg = "Team member added Successfully";
        header("Location:../team.php?msg=" . $msg . "&&status=" . $status);
    } else {
        echo $connection->error;
    }
} else {
    echo "not called";
}
