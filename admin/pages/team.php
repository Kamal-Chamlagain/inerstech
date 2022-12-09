<?php
session_start();
if (isset($_SESSION['valid'])) {
    include '../includes/header.php';
    include '../includes/connection.php';
?>
    <main id="main" class="main">
        <?php include('../includes/response.php') ?>

        <div class="pagetitle">
            <h1>Our Team</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>

                    <li class="breadcrumb-item active">Team</li>
                </ol>
            </nav>
        </div>

        <!-- End Page Title -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#teamModal">
            Add Team
        </button>

        <!-- Modal -->
        <div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="teamModalLabel">Add Team</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="action/add_team.php" method="post" enctype="multipart/form-data" id="teamForm">

                            <div class="mb-3">
                                <label for="Name" class="form-label">Member Name</label>
                                <input type="text" class="form-control" id="mname" name="name" onkeyup="myName();" required>
                                <p id="error1"></p>

                            </div>

                            <div class="mb-3">
                                <label for="Name" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="mdesg" name="desg" onkeyup="myDesg();" required>
                                <p id="error2"></p>

                            </div>
                            <div class="mb-3">
                                <label for="Facebook" class="form-label">Facebook Link</label>
                                <input type="text" class="form-control" name="f_link" required>


                            </div>
                            <div class="mb-3">
                                <label for="Facebook" class="form-label">Instagram Link</label>
                                <input type="text" class="form-control" name="i_link" required>


                            </div>
                            <div class="mb-3">
                                <label for="Facebook" class="form-label">LinkedIn Link</label>
                                <input type="text" class="form-control" name="l_link" required>


                            </div>
                            <div class="mb-3">
                                <label for="Blog Image" class="form-label">Image</label>
                                <input type="file" class="form-control" onchange="document.getElementById('nimg').src = window.URL.createObjectURL(this.files[0])" id=" bImage" name="timage" aria-describedby="emailHelp" required>
                                <img src="../assets/images/team/noimage.jpg" id="nimg" alt="Insert Image" height="100px" width="100px" class="mt-3">
                            </div>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="submit" name="submit">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col">

                    <div class="card vh-100">
                        <div class="card-body">
                            <h5 class="card-title">Our Team Members</h5>
                            <?php

                            $sql = mysqli_query($connection, "SELECT * FROM team");

                            $no = mysqli_num_rows($sql);
                            if ($no >= 1) {
                            ?>
                                <!-- Default Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.N.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Image</th>
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
                                                <td><?php echo $row['designation']; ?></td>
                                                <td class="team-image"><img src="../assets/images/team/<?php echo $row['image'] ?>" alt="team image"></td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#updateTeamModal<?php echo $i ?>">
                                                        <i style='font-size:25px;color:blue;cursor: pointer;' class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <a href="action/delete_team.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this team member?')"><i style='font-size:25px;color:red' class="bi bi-trash"></i></a>

                                                    <!-- Update Modal -->
                                                    <div class="modal fade" id="updateTeamModal<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Team</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="action/update_team.php" method="post" enctype="multipart/form-data" id="uTeamForm">
                                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                                        <input type="hidden" name="old_image" value="<?php echo $row['image'] ?>">

                                                                        <div class="mb-3">
                                                                            <label for="Name" class="form-label">Member Name</label>
                                                                            <input type="text" onkeyup="uMyName();" class="form-control" id="umname" name="name" value="<?php echo $row['name'] ?>" required>
                                                                            <p id="uerror1"></p>


                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="Name" class="form-label">Designation</label>
                                                                            <input type="text" class="form-control" id="umdesg" name="desg" value="<?php echo $row['designation'] ?>" onkeyup="uMyDesg();" required>
                                                                            <p id="uerror2"></p>

                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="Facebook" class="form-label">Facebook Link</label>
                                                                            <input type="text" class="form-control" name="f_link" value="<?php echo $row['facebook'] ?>" required>


                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="Facebook" class="form-label">Instagram Link</label>
                                                                            <input type="text" class="form-control" name="i_link" value="<?php echo $row['instagram'] ?>" required>


                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="Facebook" class="form-label">LinkedIn Link</label>
                                                                            <input type="text" class="form-control" name="l_link" value="<?php echo $row['linkedin'] ?>" required>


                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="Blog Image" class="form-label">Image</label>

                                                                            <input type="file" class="form-control" id="myFile" name="timage" aria-describedby="emailHelp" onchange="document.getElementById('img<?php echo $i ?>').src = window.URL.createObjectURL(this.files[0])">
                                                                            <img src="../assets/images/team/<?php echo $row['image'] ?>" id="img<?php echo $i ?>" alt="team image" height="100px" width="100px" class="mt-3">

                                                                        </div>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary" value="submit" name="submit">Update</button>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <h2>No Record Found</h2>
                            <?php } ?>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="../assets/js/team_validate.js"></script>
<?php
    include '../includes/footer.php';
}
?>