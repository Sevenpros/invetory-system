<?php
include "db_connection.php";
 if(isset($_POST['loggingIn'])){
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $query = "SELECT * FROM users WHERE username = '$email' AND password = '$pass'";
     $run_query = mysqli_query($con,$query);
     $row = mysqli_fetch_array($run_query);
     $userEmail = $row['username'];
     $role = $row['role'];
     echo $role;
 }

?>