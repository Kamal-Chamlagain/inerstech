<?php
if (isset($_GET['status']) && $_GET['status'] == 'error') {
?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_GET['msg'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>


<?php }
if (isset($_GET['status']) && $_GET['status'] == 'success') {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_GET['msg'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php }
