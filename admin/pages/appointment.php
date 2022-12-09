<?php 
session_start();
if (isset($_SESSION['valid'])) { 
include '../includes/header.php';
include '../includes/connection.php';
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Appointment</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>

        <li class="breadcrumb-item active">Appointment</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col">

        <div class="card vh-100">
          <div class="card-body">
            <h5 class="card-title">Appointment From Users</h5>
            <?php

            $sql = mysqli_query($connection, "SELECT * FROM appointment");

            $no = mysqli_num_rows($sql);
            if ($no >= 1) {
            ?>
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.N.</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Description</th>
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
                      <td><?php echo $row['f_name']; ?></td>
                      <td><?php echo $row['l_name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['phone']; ?></td>
                      <td><?php echo $row['subject']; ?></td>
                      <td><?php echo $row['description']; ?></td>
                      <td>
                        <a href="action/delete_message.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this message?')"><i style='font-size:25px;color:red' class="bi bi-trash"></i></a>

                      </td>
                    </tr>
                  <?php $i++;
                  } ?>
                </tbody>
              </table>
            <?php } else { ?>
              <h2>No Appointment </h2>
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