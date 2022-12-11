<?php
session_start();
if (isset($_SESSION['valid'])) { 
include '../includes/header.php';
include '../includes/connection.php';
?>
<main id="main" class="main">
  <?php include('../includes/response.php') ?>
  <div class="pagetitle">
    <h1>Applications</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>

        <li class="breadcrumb-item active">Applications</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card vh-100">
          <div class="card-body">
            <h5 class="card-title">Applications from applicant</h5>
            <?php

            $sql = mysqli_query($connection, "SELECT * FROM application");

            $no = mysqli_num_rows($sql);
            if ($no >= 1) {
            ?>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Post</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php


                  $i = 1;
                  while ($row = mysqli_fetch_assoc($sql)) {

                  ?>
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact']; ?></td>
                      <td><?php echo $row['post']; ?></td>
                      <td><?php echo $row['cover']; ?><a href="../../assets/files/cover/<?php echo $row['cover']; ?>" download ><i class="bi bi-download"></a></i></td>
                      <td><?php echo $row['resume']; ?><a href="../../assets/files/resume/<?php echo $row['resume']; ?>" download><i class="bi bi-download"></a></i></td>

                      <td>
                        <a href="action/delete_application.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this application?')"><i style='font-size:25px;color:red' class="bi bi-trash"></i></a>

                      </td>
                    </tr>
                  <?php $i++;
                  } ?>
                </tbody>
              </table>
            <?php } else { ?>
              <h2>No Applications Found</h2>
            <?php } ?>
            <!-- End Default Table Example -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php
include '../includes/footer.php';
}

?>