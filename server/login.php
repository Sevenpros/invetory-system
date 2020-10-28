<?php
include "db_connection.php";
session_start();
 if(isset($_POST['loggingIn'])){
     $email = $_POST['email'];
     $pass = $_POST['pass'];
     $query = "SELECT * FROM users WHERE username = '$email' AND password = '$pass'";
     $run_query = mysqli_query($con,$query);
     if($run_query){
        $row = mysqli_fetch_array($run_query);
        if($row){
            $userEmail = $row['username'];
            $role = $row['role'];
            $name = $row['fname'];
            $uid = $row['user_id'];
            $_SESSION['uid'] = $uid;
            $_SESSION['name'] = $name;
            echo $role;
        }
        else{
            echo "login failed";
        }
     }
     
    
 }

 if(isset($_POST['signUp'])){
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $email = $_POST['email'];
     $password = $_POST['pass'];
     $phone = $_POST['phone'];
     $role = 'customer';
     $first_query = "SELECT * FROM users WHERE username = '$email'";
     $r_query = mysqli_query($con, $first_query);
     if(!$r_query){
         echo 'error:'.mysqli_error($con);
     }
     $count = mysqli_num_rows($r_query);
     if($count > 1){
         echo " User Already exist";
         exit;
     }
     $query = "INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `fname`, `lname`, `phone`) VALUES (NULL, '$email', '$password', 'customer', '$lname', '$fname', '$phone')";
     $run_query = mysqli_query($con,$query);
     if($run_query){
         echo "user successfully registered";
     }
     else{
         echo "error:".mysqli_error($con);
     }

 }

?>