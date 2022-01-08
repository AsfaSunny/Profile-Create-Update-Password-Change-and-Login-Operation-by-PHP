<?php

session_start();
unset($_SESSION['status']); //logout hoile unset

header('location: login.php');

 ?>

