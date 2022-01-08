<?php

    session_start();

    require_once('../db/dbconnect.php');

  require_once('header.php');
  require_once('navbar.php');

  require_once('dashboard_session.php');

  $profile_email = $_SESSION['View_Email'];

  //die();


?>



<section class="mt-3">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Password Chnge</h5>
                    </div>

                    <!-- message-warning -->
                      <?php 
                        if (isset($_SESSION['change_pass_error'])) {
                      ?>
                      <div class="wrapper-warning"> <!--alert div-->
                        <div class="alertcard">
                          <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                          <div class="subject">
                            <h3>Warning</h3>
                            <p><?php 
                              echo $_SESSION['change_pass_error'];
                              unset($_SESSION['change_pass_error']);
                            ?></p>
                          </div>
                          <!-- <div class="icon-times"><i class="fas fa-times"></i></div> -->
                        </div>
                      </div>
                      <?php 
                        }
                      ?>
                    <!-- message-warning -->

                    <!-- message-success -->
                      <?php 
                        if (isset($_SESSION['change_pass_success'])) {
                      ?>
                      <div class="wrapper-success">
                        <div class="alertcard">
                          <div class="icon"><i class="fas fa-check-circle"></i></div>
                          <div class="subject">
                            <h3>Success</h3>
                            <p><?php 
                              echo $_SESSION['change_pass_success'];
                              unset($_SESSION['change_pass_success']);
                            ?></p>
                          </div>
                          <!-- <div class="icon-times"><i class="fas fa-times"></i></div> -->
                        </div>
                      </div>
                      <?php 
                        }
                      ?>
                    <!-- message-success -->

                    <div class="card-body">

                        <form action="change-pass-post.php" method="post">
                            <div class="mb-3">
                              <input type="hidden" class="form-control" name="password_email" value="<?= $profile_email ?>">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Enter Old Password</label>
                              <input type="Password" class="form-control" name="main_pass">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Enter New Password</label>
                              <input type="Password" class="form-control" name="new_pass">
                            </div>

                            <div class="mb-3">
                              <label class="form-label">Confirm New Password</label>
                              <input type="Password" class="form-control" name="confirm_pass">
                            </div>
                            <button class="btn btn-sm btn-success text-light" type="submit">Edit Password</button>
                        </form>

                    </div>
    
                </div>

            </div>
        </div>
    </div>
</section>







<?php require_once('footer.php'); ?>