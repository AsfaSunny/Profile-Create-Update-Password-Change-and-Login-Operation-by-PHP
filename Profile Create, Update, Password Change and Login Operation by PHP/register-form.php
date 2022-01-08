<?php 
  session_start();
  require_once('header.php');

  if (isset($_SESSION['status'])) { //isset na thakle login hoite parbe na....
      header('location: dashboard/dashboard.php');
  }
?>


      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="card mt-4">
              <div class="card-header d-flex justify-content-between">
                <h5>Registration Form</h5>
                <a class="text-decoration-none text-secondary" href="login/login.php">Log In</a>
              </div>

              <!-- message-warning -->
              <?php 
                if (isset($_SESSION['register_error'])) {
              ?>
              <div class="wrapper-warning"> <!--alert div-->
                <div class="alertcard">
                  <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                  <div class="subject">
                    <h3>Warning</h3>
                    <p><?php 
                      echo $_SESSION['register_error'];
                      unset($_SESSION['register_error']);
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
                if (isset($_SESSION['register_success'])) {
              ?>
              <div class="wrapper-success">
                <div class="alertcard">
                  <div class="icon"><i class="fas fa-check-circle"></i></div>
                  <div class="subject">
                    <h3>Success</h3>
                    <p><?php 
                      echo $_SESSION['register_success'];
                      unset($_SESSION['register_success']);
                    ?></p>
                  </div>
                  <!-- <div class="icon-times"><i class="fas fa-times"></i></div> -->
                </div>
              </div>
              <?php 
                }
              ?>
              <!-- message-success -->

              <form action="register-post.php" method="post">
                <div class="mb-3">
                  <label class="form-label">User Name</label>
                  <input type="text" class="form-control" name="user_name">
                </div>
                <div class="mb-3">
                  <label class="form-label">User Address</label>
                  <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-3">
                  <label class="form-label">User Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                  <label class="form-label">User Mobile</label>
                  <input type="text" class="form-control" name="mobile">
                </div>
                <div class="mb-3">
                  <label class="form-label">User Password</label>
                  <input type="Password" class="form-control" name="user_pass">
                </div>

                <button type="submit" class="btn btn-info text-light">Submit</button>

              </form>
            </div>
          </div>
        </div>
      </div>


<?php require_once('footer.php') ?>