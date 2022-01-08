<?php

    session_start();

    require_once('../db/dbconnect.php');

  require_once('header.php');
  require_once('navbar.php');

  require_once('dashboard_session.php');

  $profile_email = $_SESSION['View_Email'];
  echo "$profile_email";

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
                        <h5>User Details</h5>
                        <a class="text-decoration-none btn btn-info text-light" href="profile-edit.php">Edit Profile</a>
                    </div>

                    <div class="card-body">
                        <p><strong>User Name: </strong><?= $after_assoc['name']; ?></p>
                        <p><strong>User Phone: </strong><?= $after_assoc['mobile']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require_once('footer.php'); ?>