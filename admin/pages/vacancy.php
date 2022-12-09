<?php 
session_start();
if (isset($_SESSION['valid'])) { 
include '../includes/header.php';
include '../includes/connection.php';
?>
<main id="main" class="main">
<?php include('../includes/response.php') ?>

    <div class="pagetitle">
        <h1>Vacancies</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>

                <li class="breadcrumb-item active">Our Vacancies</li>
            </ol>
        </nav>
    </div>

    <!-- End Page Title -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#vacancyModal">
        Add Vacancy Post
    </button>

    <!-- Modal -->
    <div class="modal fade" id="vacancyModal" tabindex="-1" aria-labelledby="vacancyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="teamModalLabel">Add Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="action/add_post.php" method="post" enctype="multipart/form-data" id="vacancyForm">

                        <div class="mb-3">
                            <label for="Name" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>

                        </div>

                        <div class="mb-3">
                            <label for="Name" class="form-label">Description</label></br>
                            <textarea id="description" name="description" required></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Responsibilities</label>
                            <textarea id="responsibilities" name="responsibilities" required></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Requirements</label>
                            <textarea id="requirement" name="requirement" required></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Deadline Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>

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
                        <h5 class="card-title">Our vacancies post</h5>
                        <?php

                        $sql = mysqli_query($connection, "SELECT * FROM vacancy");

                        $no = mysqli_num_rows($sql);
                        if ($no >= 1) {
                        ?>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S.N.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Responsibilities</th>
                                        <th scope="col">Requirements</th>
                                        <th scope="col">Deadline</th>
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
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['responsibilities']; ?></td>
                                            <td><?php echo $row['requirements']; ?></td>
                                            <td><?php echo $row['deadline']; ?></td>

                                            <td>
                                                <a data-bs-toggle="modal" data-bs-target="#updateVacancyModal<?php echo $i ?>">
                                                    <i style='font-size:25px;color:blue;cursor: pointer;' class="bi bi-pencil-square"></i>
                                                </a>

                                                <a href="action/delete_post.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to remove this post?')"><i style='font-size:25px;color:red' class="bi bi-trash"></i></a>

                                                <!-- Update Modal -->
                                                <div class="modal fade" id="updateVacancyModal<?php echo $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Vacancy Post</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="action/update_post.php" method="post" enctype="multipart/form-data" id="vacancyForm">
                                                                            <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                                                    <div class="mb-3">
                                                                        <label for="Name" class="form-label">Title</label>
                                                                        <input type="text" class="form-control" value="<?php echo $row['title']?>"id="utitle" name="utitle" required>

                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="Name" class="form-label">Description</label></br>
                                                                        <textarea id="udescription" name="udescription" required><?php echo $row['description']?></textarea>

                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Name" class="form-label">Responsibilities</label>
                                                                        <textarea id="uresponsibilities" name="uresponsibilities" required><?php echo $row['responsibilities']?></textarea>

                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Name" class="form-label">Requirements</label>
                                                                        <textarea id="urequirement" name="urequirement" required><?php echo $row['requirements']?></textarea>

                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="Name" class="form-label">Deadline Date</label>
                                                                        <input type="date" class="form-control" value="<?php echo $row['deadline']?>" id="udate" name="udate" required>

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
                            <h2>No vaccancies opened</h2>
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