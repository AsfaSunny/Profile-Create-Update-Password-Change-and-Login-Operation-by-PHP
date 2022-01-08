<?php

    session_start();

    require_once('../db/dbconnect.php');

  require_once('header.php');
  require_once('navbar.php');

  require_once('dashboard_session.php');


  $list_query = "SELECT * FROM registration_table";
  $user_db = mysqli_query($db_connect, $list_query);

?>


<section class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>User list</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($user_db as $user_table) :
                                ?>
                                <tr>
                                    <td><?=$user_table['name']?></td>
                                    <td><?=$user_table['address']?></td>
                                    <td><?=$user_table['email']?></td>
                                    <td><?=$user_table['mobile']?></td>
                                </tr>
                                <?php 
                                    endforeach
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php require_once('footer.php'); ?>