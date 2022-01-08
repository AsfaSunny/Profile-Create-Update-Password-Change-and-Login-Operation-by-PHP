<?php 
  session_start();
  //require_once('header.php');

  if (isset($_SESSION['status'])) { //isset na thakle login hoite parbe na....
      header('location: ../dashboard/dashboard.php');
  }
?>




<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: indigo;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid indigo;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <div class="section">
              <!-- message-warning -->
              <?php 
                if (isset($_SESSION['Log_err'])) {
              ?>
              <div class="wrapper-warning"> <!--alert div-->
                <div class="alertcard">
                  <div class="icon"><i class="fas fa-exclamation-circle"></i></div>
                  <div class="subject">
                    <h3 style="color: #fbb117;">Warning</h3>
                    <p>
                      <?php 
                      echo $_SESSION['Log_err'];
                      unset($_SESSION['Log_err']);
                      ?>
                    </p>
                  </div>
                  <!-- <div class="icon-times"><i class="fas fa-times"></i></div> -->
                </div>
              </div>
              <?php 
                }
              ?>
              <!-- message-warning -->
      </div>

      <h5 class="indigo-text">Please, login into your account</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" action="login-post.php" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='email' name='email' id='email' />
                <label for='email'>Enter your email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Enter your password</label>
              </div>
              <label style='float: right;'>
								<a class='indigo-text' href='#!'><b>Forgot Password?</b></a>
							</label>
            </div>

            <br>

            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>

          </form>
        </div>
      </div>
      <span>Don't have a account? </span>
      <a href="../register-form.php">Register Now!!</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript">
    document.addEventListener('contextmenu', event => event.preventDefault());
  </script>
</body>

</html>