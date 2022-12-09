<?php 

session_start();
if (isset($_SESSION['valid'])) { 
include '../includes/header.php';
include '../includes/connection.php';
?>
<main id="main" class="main">
<?php include('../includes/response.php') ?>
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">

        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <div class="row">

                    <!-- Message Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Messages <span>| Total</span></h5>

                                <div class="d-flex align-items-center">

                                    <a href="message.php">

                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-chat-left-text-fill"></i>
                                        </div>
                                    </a>
                                    <div class="ps-3">
                                        <?php
                                        $query = mysqli_query($connection, "SELECT * FROM contact");

                                        $no = mysqli_num_rows($query);
                                        ?>
                                        <h6><?php echo $no ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Message  Card -->
                    
                    
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Team Members <span>| Total</span></h5>

                                <div class="d-flex align-items-center">

                                    <a href="team.php">

                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </a>
                                    <div class="ps-3">
                                        <?php
                                        $query = mysqli_query($connection, "SELECT * FROM team");

                                        $no = mysqli_num_rows($query);
                                        ?>
                                        <h6><?php echo $no ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End  Team  Card -->
                    
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Appointment<span>| Total</span></h5>

                                <div class="d-flex align-items-center">

                                    <a href="appointment.php">

                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person-check-fill"></i>
                                        </div>
                                    </a>
                                    <div class="ps-3">
                                        <?php
                                        $query = mysqli_query($connection, "SELECT * FROM appointment");

                                        $no = mysqli_num_rows($query);
                                        ?>
                                        <h6><?php echo $no ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Appointment  Card -->
                    
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Vacancy Posts<span>| Total</span></h5>

                                <div class="d-flex align-items-center">

                                    <a href="vacancy.php">

                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-search"></i>
                                        </div>
                                    </a>
                                    <div class="ps-3">
                                        <?php
                                        $query = mysqli_query($connection, "SELECT * FROM vacancy");

                                        $no = mysqli_num_rows($query);
                                        ?>
                                        <h6><?php echo $no ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End vaccancy  Card -->
                    

                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">



                            <div class="card-body">
                                <h5 class="card-title">Applications<span>| Total</span></h5>

                                <div class="d-flex align-items-center">

                                    <a href="application.php">

                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book-fill"></i>
                                        </div>
                                    </a>
                                    <div class="ps-3">
                                        <?php
                                        $query = mysqli_query($connection, "SELECT * FROM application");

                                        $no = mysqli_num_rows($query);
                                        ?>
                                        <h6><?php echo $no ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End applications Card -->
                    
                </div>
            </div>
        </div>


    </section>




</main>
<?php 
include '../includes/footer.php';
}
?>