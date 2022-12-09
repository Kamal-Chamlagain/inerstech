<?php include 'layout/header.php';
include 'admin/includes/connection.php';
if ($_GET) {
    $id = $_GET['id'];
}
?>
<div id="inner_banner" class="section inner_banner_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="title-holder">
                        <div class="title-holder-cell text-left">
                            <?php

                            $sql = "select * from vacancy where id = $id";
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($query)) {


                            ?>
                                <h1 class="page-title"><?php echo $row['title'] ?> job description</h1>
                                <ol class="breadcrumb">
                                    <li><a href="career.php">Career</a></li>
                                    <li class="active"><?php echo $row['title'] ?></li>
                                </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container">

    <p style="text-align:justify; " >

        <?php echo $row['description'] ?>

    </p>
</div>
<div class="container" style="text-align:justify ; color:black; ">
    <h1 style="font-weight: bold; ">Responsibilities</h1><br>
    <ul style="list-style-type: square; margin-left:20px;">

        <li><?php echo $row['responsibilities'] ?></li><br>


    </ul>
    <h1 style="font-weight: bold;">Requirements and skills</h1><br>
    <ul style="list-style-type: square; margin-left:20px;">
        <li><?php echo $row['requirements']?></li><br>
        
    </ul>
</div>
<center>
    <a class="btn main_bt" href="apply.php?post=<?php echo $row['title']?>">Apply Here</a>
</center><br>
<?php } ?>





<?php
include 'layout/footer.php';
?>