<?php

    session_start();

    require_once('../db/dbconnect.php');

  require_once('header.php');
  require_once('navbar.php');

  require_once('dashboard_session.php');

  $profile_email = $_SESSION['View_Email'];

  //die();


  $profile_query = "SELECT `name`, `mobile` FROM registration_table WHERE `email` = '$profile_email'";
  $profile_db = mysqli_query($db_connect, $profile_query );
  $after_assoc = mysqli_fetch_assoc($profile_db); //to avoid object size and output as associative array...

?>



<section class="mt-3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>User Profile Edit</h5>
                    </div>

                    <!-- message-warning -->
                      <?php 
                        if (isset($_SESSION['profile_error'])) {
                      ?>
                      <div class="wrapper-warning"> <!--alert div-->
                        <div class="alertcard">
                          <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                          <div class="subject">
                            <h3>Warning</h3>
                            <p><?php 
                              echo $_SESSION['profile_error'];
                              unset($_SESSION['profile_error']);
                            ?></p>
                          </div>
                          <!-- <div class="icon-times"><i class="fas fa-times"></i></div> -->
                        </div>
                      </div>
                      <?php 
                        }
                      ?>
                    <!-- message-warning -->

                    <div class="card-body">
                        <form action="profile-edit-post.php" method="post">
                            <div class="mb-3">
                              <input type="hidden" class="form-control" name="profile_email" value="<?= $profile_email ?>">
                            </div>
                            <div class="mb-3">
                              <label class="form-label">User Name</label>
                              <input type="text" class="form-control" name="user_name" value="<?= $after_assoc['name']; ?>">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">User Mobile</label>
                              <input type="text" class="form-control" name="mobile" value="<?= $after_assoc['mobile']; ?>">
                            </div>
                            <button class="btn btn-sm btn-secondary text-light" type="submit">Edit</button>
                        </form>
                    </div>
    
                </div>

            </div>
        </div>
    </div>
</section>







<?php require_once('footer.php'); ?>