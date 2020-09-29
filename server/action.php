<?php
  include "db_connection.php";
  if(isset($_POST["customer"])){
      $query = "SELECT * FROM customer";
      $run_query = mysqli_query($con, $query);
      echo "
         <table class='table'>
         <tr>
          <th>Customer Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Nationality</th>
          <th>City</th>
          <th>Street</th>

         </tr>
    ";
      while($rows = mysqli_fetch_array($run_query)){
          $fname = $rows['fname'];
          $cust = $rows['customer_id'];
          $lname = $rows['lname'];
          $phone = $rows['phone'];
          $nation = $rows['Nationality'];
          $city = $rows['City'];
          $street = $rows['Street'];
          echo "
                  <tr>
                    <td>CUST- $cust</td>
                    <td>$fname</td>
                    <td>$lname</td>
                    <td>$phone</td>
                    <td>$nation</td>
                    <td>$city</td>
                    <td>$street</td>
                    
                  </tr>

			     ";
      }
      echo "</table>";
  }

  if(isset($_POST["merchant"])){
    $query = "SELECT * FROM merchant";
    $run_query = mysqli_query($con, $query);
    echo "
       <table class='table'>
       <tr>
        <th>Merchant Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Email</th>
        

       </tr>
  ";
    while($rows = mysqli_fetch_array($run_query)){
        $fname = $rows['fname'];
        $merch = $rows['merchant_id'];
        $lname = $rows['lname'];
        $phone = $rows['phone'];
        $email = $rows['email'];
        echo "
                <tr>
                  <td>MERCH- $merch</td>
                  <td>$fname</td>
                  <td>$lname</td>
                  <td>$phone</td>
                  <td>$email</td>
                  
                </tr>

         ";
    }
    echo "</table>";
}

if(isset($_POST["supplier"])){
  $query = "SELECT * FROM supplier";
  $run_query = mysqli_query($con, $query);
  echo "
     <table class='table'>
     <tr>
      <th>Supplier Id</th>
      <th>Supplier Name</th>
      <th>Phone</th>
      <th>Nationality</th>
      <th>City</th>
      <th>Street</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $name = $rows['name'];
      $sup = $rows['supplier_id'];
      $phone = $rows['phone'];
      $nation = $rows['nationality'];
      $city = $rows['city'];
      $street = $rows['street'];
      echo "
              <tr>
                <td>SUPP- $sup</td>
                <td>$name</td>
                <td>$phone</td>
                <td>$nation</td>
                <td>$city</td>
                <td>$street</td>
                
              </tr>

       ";
  }
  echo "</table>";
}


if(isset($_POST['saveCustomer'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $nation = $_POST['nation'];  
  $city = $_POST['city'];
  $street = $_POST['street'];   
  $query = "INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `phone`,`Nationality`,`City`,`Street`) VALUES (NULL, '$fname', '$lname', '$phone', '$nation', '$city', '$street')";    $run_query = mysqli_query($con, $query);
  if(!$run_query){
    echo "Some error occurred:".mysqli_error($con);
  }
  else{
    echo " Customer successfully Registered";
  }

}

if(isset($_POST['saveSupplier'])){
  $sname = $_POST['sname'];
  $phone = $_POST['sphone'];
  $nation = $_POST['snation'];  
  $city = $_POST['scity'];
  $street = $_POST['sstreet'];   
  $query = "INSERT INTO `supplier` (`supplier_id`, `name`, `phone`,`nationality`,`city`,`street`) VALUES (NULL, '$sname', '$phone', '$nation', '$city', '$street')";    
  $run_query = mysqli_query($con, $query);
  if(!$run_query){
    echo "Some error occurred:".mysqli_error($con);
  }
  else{
    echo " Supplier successfully Registered";
  }

}

  if(isset($_POST['saveMerchant'])){
    $mfname = $_POST['mfname'];
    $mlname = $_POST['mlname'];
    $mphone = $_POST['mphone'];
    $meamil = $_POST['memail'];    
    $query = "INSERT INTO `merchant` (`merchant_id`, `fname`, `lname`, `email`, `phone`) VALUES (NULL, '$mfname', '$mlname', '$meamil', '$mphone')";    $run_query = mysqli_query($con, $query);
    if(!$run_query){
      echo "Some error occurred:".mysqli_error($con);
    }
    else{
      echo " Merchant successfully Registered";
    }

  }
?>