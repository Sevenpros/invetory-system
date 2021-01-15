<?php
  include "db_connection.php";
  if(isset($_POST["customer"])){
      $query = "SELECT * FROM customer";
      $run_query = mysqli_query($con, $query);
      echo "
      <input type='text' placeholder='Search any customer Here' id='searchCustomer'><br>
      <div class='customerView'>
      <div class='table'>
         <table class='table'>
         <tr>
          <th>Customer Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone</th>
          <th>Nationality</th>
          <th>City</th>
          <th>Street</th>
          <th>Action</th>

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
                    <td><a href='#' cust='$cust' id='deleteCustomer'>Delete</a></td>

                  </tr>

			     ";
      }
      echo "</table></div>";
  }

  if(isset($_POST["deleteCustomer"])){
    $cust = $_POST['cust'];
    $query = "DELETE FROM customer WHERE customer.customer_id = '$cust'";
    $run_query = mysqli_query($con, $query);
    if($run_query){
       echo "Customer Deleted";
    }
    else echo mysqli_error($con);
  }

  if(isset($_POST["deleteProduct"])){
    $pro = $_POST['pro'];
    $query = "DELETE FROM products WHERE products.product_id = '$pro'";
    $run_query = mysqli_query($con, $query);
    if($run_query){
       echo "Product Deleted";
    }
    else echo mysqli_error($con);
  }


  if(isset($_POST["deleteSupplier"])){
    $sup = $_POST['sup'];
    $query = "DELETE FROM supplier WHERE supplier.supplier_id = '$sup'";
    $run_query = mysqli_query($con, $query);
    if($run_query){
       echo "Supplier Deleted";
    }
    else echo mysqli_error($con);
  }

  if(isset($_POST["deleteMerchant"])){
    $mer = $_POST['mer'];
    $query = "DELETE FROM merchant WHERE merchant.merchant_id = '$mer'";
    $run_query = mysqli_query($con, $query);
    if($run_query){
       echo "Merchant Deleted";
    }
    else echo mysqli_error($con);
  }


  if(isset($_POST["searchCustomer"])){
    $cust = $_POST['cust'];
    $query = "SELECT * FROM customer WHERE customer.fname LIKE '%$cust%' OR customer.lname LIKE '%$cust%'";
    $run_query = mysqli_query($con, $query);
    echo "
    <div class='table'>
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
    echo "</table></div>";
}


  if(isset($_POST["merchant"])){
    $query = "SELECT * FROM merchant";
    $run_query = mysqli_query($con, $query);
    echo "
    <div class='table'>
       <table class='table'>
       <tr>
        <th>Merchant Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>


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
                  <td><a href='#' id='deleteMerchant' mer='$merch'>Delete</a></td>

                </tr>

         ";
    }
    echo "</table></div>";
}

if(isset($_POST["displayOrder"])){
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id GROUP BY cust_ordering.customer_id";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class=' search'>
  <input type='text' placeholder='Search Order by Product' id='orderProduct'>
  <input type='text' placeholder='Search Order by Customer' id='orderCustomer'>
  <input type='date' placeholder='Search Order by Date' id='orderDate'>
  <button  class='save-btn' id='print-order'>PRINT</button></div>
  <div class='orderView'>
      
  <h3>ORDERS INFORMATION</h3>

  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Unitary Price</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time</th>
      <th>Status</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $oid = $rows['cust_order_id'];
      if($status == 'ordered'){
      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td>Recevied</td>
              </tr>

       ";}
       if($status == 'confirmed'){
        echo "
        <tr>
          <td>$fname $lname</td>
          <td>$pname</td>
          <td>$quantity</td>
          <td>$uprice</td>
          <td>$total</td>
          <td>$date</td>
          <td>$time</td>
          <td>Confirmed</td>
        </tr>

 ";
       }
  }
  echo "</table> </div></div>";
}


if(isset($_POST["myCart"])){
  $cid = $_POST['cid'];
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE cust_ordering.customer_id = '$cid' GROUP BY cust_ordering.statuS";
  $run_query = mysqli_query($con, $query);
  echo "
  
  
      
  <h3>  MY ORDERS INFORMATION  </h3>

  <div class='table'>
     <table class='table'>
     <tr >
      
      <th>Date</th>
      <th>Time</th>
      <th>Amount</th>
      <th>Status</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $cid= $rows['customer_id'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $oid = $rows['cust_order_id'];
      if($status == 'ordered'){
      echo "
              <tr >

                <td>$date</td>
                <td>$time</td>
                <td>$total Frw</td>
                <td>Recevied</td>
              </tr>

       ";}
       if($status == 'delivered'){
        echo "
                <tr >
    
                  <td>$date</td>
                  <td>$time</td>
                  <td>$total Frw</td>
                  <td>Delivered</td>
                </tr>
    
         ";}
       if($status == 'confirmed'){
        echo "
        <tr data-toggle='tooltip' title='Click to view details' id='cartDetails' cid='$cid' data-toggle='modal' data-target='#cartDetailsModal'>
        <td>$date</td>
        <td>$time</td>
        <td>$total Frw</td>
          <td>Confirmed</td>
        </tr>

 ";
       }
  }

  
  echo "</table> </div></div>";
}


if(isset($_POST["confirmedOrders"])){
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE cust_ordering.status = 'confirmed' GROUP BY cust_ordering.customer_id";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class=' search'>
  <input type='text' placeholder='Search Order by Product' id='orderProduct'>
  <input type='text' placeholder='Search Order by Customer' id='orderCustomer'>
  <input type='date' placeholder='Search Order by Date' id='orderDate'>
  <button  class='save-btn' id='print-order'>PRINT</button></div>
  <div class='orderView'>
      
  <h3>ORDERS INFORMATION</h3>

  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Unitary Price</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time</th>
      <th>Status</th>
      <th>Details</th>
     

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $cid = $rows['user_id'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $oid = $rows['cust_order_id'];
      if($status == 'confirmed'){
      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td>Confirmed</td>
                <td ><a  href='#' id='conforderDet' class='btn btn-default btn-xs ' cid='$cid' data-toggle='modal' data-target='#orderDetailsModal'  data-toggle='tooltip' title='Click to view details'>
                <span class='glyphicon glyphicon-eye-open'></span> </a> </td>

              </tr>

       ";}
       
  }
  echo "</table> </div></div>";
}


if(isset($_POST["receivedOrders"])){
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE cust_ordering.status = 'ordered' GROUP BY cust_ordering.customer_id";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class=' search'>
  <input type='text' placeholder='Search Order by Product' id='orderProduct'>
  <input type='text' placeholder='Search Order by Customer' id='orderCustomer'>
  <input type='date' placeholder='Search Order by Date' id='orderDate'>
  <button  class='save-btn' id='print-order'>PRINT</button></div>
  <div class='orderView'>
      
  <h3>ORDERS INFORMATION</h3>

  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Unitary Price</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time</th>
      <th>Details</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $cid = $rows['user_id'];
      $oid = $rows['cust_order_id'];
      if($status == 'ordered'){
      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td ><a  href='#' id='orderDet' class='btn btn-default btn-xs ' cid='$cid' data-toggle='modal' data-target='#orderDetailsModal'  data-toggle='tooltip' title='Click to view details'>
                <span class='glyphicon glyphicon-eye-open'></span> </a> </td>
                </tr>

       ";}
       if($status == 'confirmed'){
        echo "
        <tr>
          <td>$fname $lname</td>
          <td>$pname</td>
          <td>$quantity</td>
          <td>$uprice</td>
          <td>$total</td>
          <td>$date</td>
          <td>$time</td>
          <td>Confirmed</td>
          
        </tr>

 ";
       }
  }
  echo "</table> </div></div>";
}


if(isset($_POST["orderProduct"])){
  $orpro = $_POST['oPro'];
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE products.name LIKE '%$orpro%'";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Unitary Price</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time</th>
      <th>Action</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $oid = $rows['cust_order_id'];
      if($status == 'ordered'){
      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td><a href='#' id='conf_order' oid='$oid' pname='$pname' name='$lname $fname' quantity='$quantity' total='$total'>Confirm</a></td>
              </tr>

       ";}
       if($status == 'confirmed'){
        echo "
        <tr>
          <td>$fname $lname</td>
          <td>$pname</td>
          <td>$quantity</td>
          <td>$uprice</td>
          <td>$total</td>
          <td>$date</td>
          <td>$time</td>
          <td>Confirmed</td>
        </tr>

 ";
       }
  }
  echo "</table> </div>";
}

if(isset($_POST["orderCustomer"])){
  $ocust = $_POST['oCust'];
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE users.fname LIKE '%$ocust%' OR users.lname LIKE '%$ocust%'";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Unitary Price</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time</th>
      <th>Action</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $oid = $rows['cust_order_id'];
      if($status == 'ordered'){
      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td><a href='#' id='conf_order' oid='$oid' pname='$pname' name='$lname $fname' quantity='$quantity' total='$total'>Confirm</a></td>
              </tr>

       ";}
       if($status == 'confirmed'){
        echo "
        <tr>
          <td>$fname $lname</td>
          <td>$pname</td>
          <td>$quantity</td>
          <td>$uprice</td>
          <td>$total</td>
          <td>$date</td>
          <td>$time</td>
          <td>Confirmed</td>
        </tr>

 ";
       }
  }
  echo "</table> </div>";
}

if(isset($_POST["orderDate"])){
  $odate = $_POST['oDate'];
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE cust_ordering.date LIKE '%$odate%'";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Unitary Price</th>
      <th>Total</th>
      <th>Date</th>
      <th>Time</th>
      <th>Action</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $fname = $rows['fname'];
      $lname = $rows['lname'];
      $pname = $rows['name'];
      $date = $rows['date'];
      $time = $rows['time'];
      $status = $rows['status'];
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];
      $oid = $rows['cust_order_id'];
      if($status == 'ordered'){
      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td><a href='#' id='conf_order' oid='$oid' pname='$pname' name='$lname $fname' quantity='$quantity' total='$total'>Confirm</a></td>
              </tr>

       ";}
       if($status == 'confirmed'){
        echo "
        <tr>
          <td>$fname $lname</td>
          <td>$pname</td>
          <td>$quantity</td>
          <td>$uprice</td>
          <td>$total</td>
          <td>$date</td>
          <td>$time</td>
          <td>Confirmed</td>
        </tr>

 ";
       }
  }
  echo "</table> </div>";
}


if(isset($_POST["supplier"])){
  $query = "SELECT * FROM supplier";
  $run_query = mysqli_query($con, $query);
  echo "
  <h2> SUPPLIER INFORMATION </2>
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Supplier Id</th>
      <th>Supplier Name</th>
      <th>Phone</th>
      <th>Nationality</th>
      <th>City</th>
      <th>Street</th>
      <th>Action</th>

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
                <td><a href='#' id='deleteSupplier' supp='$sup'>Delete</a></td>

              </tr>

       ";
  }
  echo "</table></div>";
}

if(isset($_POST["fillProduct"])){
  echo "
        <option readonly>-- Choose Product --</option>
        
      ";
  $query = "SELECT * FROM products";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    while($rows = mysqli_fetch_array($run_query)){
      $name = $rows['name'];
      $pid = $rows['product_id'];
      echo "
        <option value='$pid'>$name</option>

      ";
    }
  }
  
}


if(isset($_POST['salesPayments'])){
  $total = 0;
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id";
  $run_query = mysqli_query($con, $query);

  if($run_query){
     echo "
     <div class=' search'>
     <input type='text' class='search' placeholder='Search payment by Product' id='salesProduct'>
     <input type='date' class='search' placeholder='Search payment by Date' id='salesDate'>
     <button  class='save-btn' id='print-salesPay'>PRINT</button>
     <div class='salesView'>

  <h2> SALES PAYMENT </2><br><br>
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Date</th>
      <th>Time</th>
      <th>Amount</th>


     </tr>
";
while($rows = mysqli_fetch_array($run_query)){
  $name = $rows['name'];
  $fname = $rows['fname'];
  $lname = $rows['lname'];
  $quantity = $rows['quantity'];
  $amount = $rows['total'];
  $date = $rows['date'];
  $time = $rows['time'];
  $total = $total + $amount;

  echo "
    <tr>
       <td>$fname $lname</td>
       <td>$name</td>
       <td>$quantity</td>
       <td>$date</td>
       <td>$time</td>
       <td>$amount</td>
    </tr>
  
  ";
}
echo "</table> </div> 
 
 <h2> TOTAL: $total FRW</h2>
";
  }
}


if(isset($_POST['Profits'])){
  $total = 0;
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id";
  $run_query = mysqli_query($con, $query);

  if($run_query){
     echo "
     <div class=' search'>
     <input type='text' class='search' placeholder='Search payment by Product' id='salesProduct'>
     <input type='date' class='search' placeholder='Search payment by Date' id='salesDate'>
     <button  class='save-btn' id='print-salesPay'>PRINT</button>
     <div class='salesView'>

  <h2> PROFITS MADE</2><br><br>
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Date</th>
      <th>Time</th>
      <th>U cost</th>
      <th>U price</th>
      <th>Total Amount</th>
      <th>Profits</th>


     </tr>
";
while($rows = mysqli_fetch_array($run_query)){
  $name = $rows['name'];
  $ucost= $rows['cost'];
  $uprice=$rows['u_price'];
  $fname = $rows['fname'];
  $lname = $rows['lname'];
  $quantity = $rows['quantity'];
  $amount = $rows['total'];
  $date = $rows['date'];
  $time = $rows['time'];
  $profit = ($uprice - $ucost) * $quantity;
  $total = $total + $profit;

  echo "
    <tr>
       <td>$name</td>
       <td>$quantity</td>
       <td>$date</td>
       <td>$time</td>
       <td>$ucost</td>
       <td>$uprice</td>
       <td>$amount Frw</td>
       <td>$profit Frw</td>
    </tr>
  
  ";
}
echo "</table> </div> 
 
 <h2> TOTAL PROFITS: $total FRW</h2>
";
  }
}



if(isset($_POST['salesProduct'])){
  $salepro = $_POST['salepro'];
  $total = 0;
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE products.name LIKE '%$salepro%'";
  $run_query = mysqli_query($con, $query);

  if($run_query){
     echo "

  <h2> SALES PAYMENT </2><br><br>
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Date</th>
      <th>Time</th>
      <th>Amount</th>


     </tr>
";
while($rows = mysqli_fetch_array($run_query)){
  $name = $rows['name'];
  $fname = $rows['fname'];
  $lname = $rows['lname'];
  $quantity = $rows['quantity'];
  $amount = $rows['total'];
  $date = $rows['date'];
  $time = $rows['time'];
  $total = $total + $amount;

  echo "
    <tr>
       <td>$fname $lname</td>
       <td>$name</td>
       <td>$quantity</td>
       <td>$date</td>
       <td>$time</td>
       <td>$amount</td>
    </tr>
  
  ";
}
echo "</table> </div> 
 
 <h2> TOTAL: $total FRW</h2>
";
  }
}


if(isset($_POST['salesDate'])){
  $sale = $_POST['saled'];
  $total = 0;
  $query = "SELECT *, users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id WHERE cust_ordering.date LIKE '%$sale%'";
  $run_query = mysqli_query($con, $query);

  if($run_query){
     echo "

  <h2> SALES PAYMENT </2><br><br>
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Customer</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Date</th>
      <th>Time</th>
      <th>Amount</th>


     </tr>
";
while($rows = mysqli_fetch_array($run_query)){
  $name = $rows['name'];
  $fname = $rows['fname'];
  $lname = $rows['lname'];
  $quantity = $rows['quantity'];
  $amount = $rows['total'];
  $date = $rows['date'];
  $time = $rows['time'];
  $total = $total + $amount;

  echo "
    <tr>
       <td>$fname $lname</td>
       <td>$name</td>
       <td>$quantity</td>
       <td>$date</td>
       <td>$time</td>
       <td>$amount</td>
    </tr>
  
  ";
}
echo "</table> </div> 
 
 <h2> TOTAL: $total FRW</h2>
";
  }
}


if(isset($_POST["fillSupplier"])){
  echo "
        <option readonly>-- Choose Supplier --</option>
        
      ";
  $query = "SELECT * FROM supplier";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    while($rows = mysqli_fetch_array($run_query)){
      $name = $rows['name'];
      $sid = $rows['supplier_id'];
      echo "
        <option  value='$sid'>$name</option>

      ";
    }
  }
  
}


if(isset($_POST["product"])){
  $query = "SELECT * FROM products";
  $run_query = mysqli_query($con, $query);
  echo "
  <input type='text' placeholder='Search any product Here' id='searchProduct'><br>
 <div class='productView'>
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Measures</th>
      <th>Category</th>
      <th>Unitary Cost</th>
      <th>Unitary Price</th>
      <th>Action</th>
  
     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $name = $rows['name'];
      $pro = $rows['product_id'];
      $measures = $rows['measures'];
      $category = $rows['category'];
      $cost = $rows['cost'];
      $price = $rows['u_price'];
      if($category == 'fluid'){
        echo "
        <tr>
          <td>PRO- $pro</td>
          <td>$name</td>
          <td>$measures litres</td>
          <td>$category</td>
          <td>$cost FRW/Ltr </td>
          <td>$price FRW/Ltr</td>
          <td><a href='#' id='deleteProduct' pro='$pro'>Delete</a></td>
        </tr>

 ";}
 else {
  echo "
  <tr>
    <td>PRO- $pro</td>
    <td>$name</td>
    <td>$measures kgs</td>
    <td>$category</td>
    <td>$cost FRW/Kg </td>
    <td>$price FRW/kg</td>
    <td><a href='#' id='deleteProduct' pro='$pro'>Delete</a></td>
 
  </tr>

";
 
      }
     
  }
  echo "</table></div>";
}


if(isset($_POST["searchProduct"])){
  $pro = $_POST['pro'];
  $query = "SELECT * FROM products WHERE products.name LIKE '%$pro%'";
  $run_query = mysqli_query($con, $query);
  echo "
  
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Measures</th>
      <th>Category</th>
      <th>Unitary Cost</th>
      <th>Unitary Price</th>

     </tr>
";
  while($rows = mysqli_fetch_array($run_query)){
      $name = $rows['name'];
      $pro = $rows['product_id'];
      $measures = $rows['measures'];
      $category = $rows['category'];
      $cost = $rows['cost'];
      $price = $rows['u_price'];
      if($category == 'fluid'){
        echo "
        <tr>
          <td>PRO- $pro</td>
          <td>$name</td>
          <td>$measures litres</td>
          <td>$category</td>
          <td>$cost FRW/Ltr </td>
          <td>$price FRW/Ltr</td>
          
        </tr>

 ";}
 else {
  echo "
  <tr>
    <td>PRO- $pro</td>
    <td>$name</td>
    <td>$measures kgs</td>
    <td>$category</td>
    <td>$cost FRW/Kg </td>
    <td>$price FRW/kg</td>
    
  </tr>

";
 
      }
     
  }
  echo "</table></div>";
}


if(isset($_POST['storeControl'])){
  echo "<h2> STORE CONTROL INFORMATION </h2><br>";
  $query = "SELECT * FROM products";
  $run_query = mysqli_query($con, $query);
  if($run_query){
  while($rows = mysqli_fetch_array($run_query)){
    $pname = $rows['name'];
    $quantity = $rows['measures'];
    $max = $rows['maximum'];
    if($max > 0){
    $pro = $quantity/$max;
    $perc = $pro * 100;
    }
    if ($perc <= 25){
      echo "
    
      <div class='progress'>
      <div class='progress-bar progress-bar-danger progress-bar-striped active' role='progressbar'
        aria-valuenow='$perc' aria-valuemin='0' aria-valuemax='100' style='width:$perc%'>
            $perc % $pname 
        </div>
    </div>
      ";
    }
    if( $perc > 25 && $perc <=50){
      echo "
    
    <div class='progress'>
    <div class='progress-bar progress-bar-warning progress-bar-striped active' role='progressbar'
      aria-valuenow='$perc' aria-valuemin='0' aria-valuemax='100' style='width:$perc%'>
          $perc % $pname 
      </div>
  </div>
    ";
    }
    if ($perc > 50 && $perc <=75){
      echo "
    
    <div class='progress'>
    <div class='progress-bar progress-bar-primary progress-bar-striped active' role='progressbar'
      aria-valuenow='$perc' aria-valuemin='0' aria-valuemax='100' style='width:$perc%'>
          $perc % $pname 
      </div>
  </div>
    ";
    }

    if ($perc > 75){
      echo "
    
    <div class='progress'>
    <div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar'
      aria-valuenow='$perc' aria-valuemin='0' aria-valuemax='100' style='width:$perc%'>
          $perc % $pname 
      </div>
  </div>
    ";
    }
}
  }
}
if(isset($_POST["displayProduct"])){
  $query = "SELECT * FROM products";
  $run_query = mysqli_query($con, $query);
  echo "
  <div class='pro-display'>
  <div class='product-row'>
  

";



  while($rows = mysqli_fetch_array($run_query)){
      $name = $rows['name'];
      $pro = $rows['product_id'];
      $measures = $rows['measures'];
      $category = $rows['category'];
      $cost = $rows['cost'];
      $price = $rows['u_price'];
      $price = $rows['u_price'];
      $image = $rows['image'];
      if($category == 'fluid'){
        echo "
        
        <div class='pro-element'>
            <div class='pro-desc'>$name -$price fr/Ltr</div>
            <div class='pro-img'>
                <img src='../../assets/$image'>
            </div>
            <div class='pro-order' pid= '$pro' proprice='$price' proname='$name'>ORDER NOW</div>
        </div>
        
    

 ";}
 else {
  echo "
 
        <div class='pro-element'>
            <div class='pro-desc' >$name -$price fr/Kg</div>
            <div class='pro-img'>
                <img src='../../assets/$image'>
            </div>
            <div class='pro-order' id='ordering' pid= '$pro' proprice='$price' proname='$name' >ORDER NOW</div>
        </div>
        
   

";
 
      }
     
  }
  echo "</div> </div>";
}


if(isset($_POST['confirmOrder'])){
  $cid = $_POST['cid'];
  $query = "UPDATE cust_ordering SET cust_ordering.status = 'confirmed' WHERE cust_ordering.customer_id = '$cid' AND cust_ordering.status='ordered'";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    echo " order confirmed";
  }
  else echo mysqli_error($con);
}

if(isset($_POST['confirmCart'])){
  $cid = $_POST['cid'];
  $query = "UPDATE cust_ordering SET cust_ordering.status = 'ordered' WHERE cust_ordering.customer_id = '$cid' AND cust_ordering.status = 'carted'";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    echo " order confirmed";
  }
  else echo mysqli_error($con);
}
if(isset($_POST['cartDetails'])){
  $cid = $_POST['cid'];
  $query = "UPDATE cust_ordering SET cust_ordering.status = 'delivered' WHERE cust_ordering.customer_id = '$cid' AND cust_ordering.status = 'confirmed'";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    echo " Done";
  }
  else echo mysqli_error($con);
}
if(isset($_POST['saveCustomer'])){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $phone = $_POST['phone'];
  $nation = $_POST['nation'];  
  $city = $_POST['city'];
  $street = $_POST['street'];  
  if (empty($fname)||empty($lname)||empty($phone)||empty($nation)||empty($city)||empty($street)) {
		echo "All Fields Must Be filled ";
		exit();

	} 
  $query = "INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `phone`,`Nationality`,`City`,`Street`) VALUES (NULL, '$fname', '$lname', '$phone', '$nation', '$city', '$street')";    $run_query = mysqli_query($con, $query);
  if(!$run_query){
    echo "Some error occurred:".mysqli_error($con);
  }
  else{
    echo " Customer successfully Registered";
  }

}


if(isset($_POST['viewPurchase'])){
 

  $query = "SELECT *, products.name, supplier.name AS sname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id WHERE  purch_order_details.status = 'ordered'";
  $run_query = mysqli_query($con, $query);
  if($count = mysqli_num_rows($run_query) > 0){
    echo "
     <h2> PURCHASING DETAILS</h2>
     <div class='pur-table'>
     <table>
     <tr>
     <th>product</th>
     <th>quantity</th>
     <th>U price</th>
     <th>Total</th>
     <th>Supplier    Name</th>
     <th>Action</th>
     </tr>
  ";
  if($run_query){
    while($rows = mysqli_fetch_array($run_query)){
         $pname = $rows['name'];
         $sname = $rows['sname'];
         $quantity = $rows['quantity'];
         $price = $rows['unitary_price'];
         $total = $rows['total'];
         $purId = $rows['purch_ord_det_id'];
         echo "
         <tr>
          <td>$pname</td>
          <td>$quantity</td>
          <td>$price</td>
          <td>$total</td>
          <td>$sname</td>
          <td><a href='#' id='remove_pur' name'$pname'  puid='$purId'>Remove</a></td>
          </tr>
         
         
         ";

    }
    echo " </table></div><br>
    <button class='save-btn' id='confirm_pur'>Confirm Order</button>

    ";
  }

}
  }
   

  if(isset($_POST['viewCart'])){
     $c= $_POST['c'];
    $query = "SELECT *, products.name, users.fname, users.lname  FROM cust_ordering JOIN products ON cust_ordering.product_id = products.product_id JOIN users ON cust_ordering.customer_id = users.user_id   WHERE cust_ordering.status = 'carted' AND cust_ordering.customer_id ='$c'";
    $run_query = mysqli_query($con, $query);
    if($count = mysqli_num_rows($run_query) > 0){
      echo "
      <h2> ORDER DETAILS</h2>
       <div class='pur-table'>
       <table>
       <tr>
       <th>product</th>
       <th>quantity</th>
       <th>U price</th>
       <th>Total</th>
       <th>Action</th>
       </tr>
    ";
    if($run_query){
      while($rows = mysqli_fetch_array($run_query)){
           $pname = $rows['name'];
           $fname = $rows['fname'];
           $lname = $rows['lname'];
           $quantity = $rows['quantity'];
           $price = $rows['u_price'];
           $total = $rows['total'];
           $coid = $rows['cust_order_id'];
           echo "
           <tr>
            <td>$pname</td>
            <td>$quantity</td>
            <td>$price</td>
            <td>$total</td>
            <td><a href='#' id='remove_order' name'$pname'  coid='$coid'>Remove</a></td>
            </tr>
           
           
           ";
  
      }
      echo " </table></div><br>
      <button class='save-btn big-btn' id='confirm_cart'>Place Order</button>
  
      ";
    }
  
  }
    }
     
  
    if(isset($_POST['orderDetails'])){
      $cid= $_POST['cid'];
     $query = "SELECT *, products.name, users.fname, users.lname  FROM cust_ordering JOIN products ON cust_ordering.product_id = products.product_id JOIN users ON cust_ordering.customer_id = users.user_id   WHERE cust_ordering.status = 'ordered' AND cust_ordering.customer_id ='$cid'";
     $run_query = mysqli_query($con, $query);
     if($count = mysqli_num_rows($run_query) > 0){
       echo "
       <h2> ORDER DETAILS</h2>
        <div class='pur-table'>
        <table border='collapse'>
        <tr>
        <th>product</th>
        <th>quantity</th>
        <th>U price</th>
        <th>Total</th>
        </tr>
     ";
     if($run_query){
       while($rows = mysqli_fetch_array($run_query)){
            $pname = $rows['name'];
            $fname = $rows['fname'];
            $lname = $rows['lname'];
            $quantity = $rows['quantity'];
            $price = $rows['u_price'];
            $total = $rows['total'];
            $coid = $rows['cust_order_id'];
            echo "
            <tr>
             <td>$pname</td>
             <td>$quantity</td>
             <td>$price</td>
             <td>$total</td>
             </tr>
            
            
            ";
   
       }
       echo " </table></div><br>
       <h2>Customer: $fname $lname</h2>

       <button class='save-btn big-btn' cid='$cid' cname='$fname $lname' id='conf_order'> Confirm </button>
   
       ";
     }
   
   }
     }


     if(isset($_POST['confirmedOrderDetails'])){
      $cid= $_POST['cid'];
     $query = "SELECT *, products.name, users.fname, users.lname  FROM cust_ordering JOIN products ON cust_ordering.product_id = products.product_id JOIN users ON cust_ordering.customer_id = users.user_id   WHERE cust_ordering.status = 'confirmed' AND cust_ordering.customer_id ='$cid'";
     $run_query = mysqli_query($con, $query);
     if($count = mysqli_num_rows($run_query) > 0){
       echo "
       <h2> ORDER DETAILS</h2>
        <div class='pur-table'>
        <table>
        <tr>
        <th>product</th>
        <th>quantity</th>
        <th>U price</th>
        <th>Total</th>
        </tr>
     ";
     if($run_query){
       while($rows = mysqli_fetch_array($run_query)){
            $pname = $rows['name'];
            $fname = $rows['fname'];
            $lname = $rows['lname'];
            $quantity = $rows['quantity'];
            $price = $rows['u_price'];
            $total = $rows['total'];
            $coid = $rows['cust_order_id'];
            echo "
            <tr>
             <td>$pname</td>
             <td>$quantity</td>
             <td>$price</td>
             <td>$total</td>
             </tr>
            
            
            ";
   
       }
       echo " </table></div><br>
       <h2>Customer: $fname $lname</h2>
   
       ";
     }
   
   }
     }


  if(isset($_POST['Purchase'])){
 

    $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed'";
    $run_query = mysqli_query($con, $query);
    if($count = mysqli_num_rows($run_query) > 0){
      echo "
      <div class=' search'>
      <input type='text' class='search' placeholder='Search Purchase by Product' id='purchaseProduct'>
      <input type='text' class='search' placeholder='Search Purchase by Supplier' id='purchaseSupplier'>
      <input type='text' class='search' placeholder='Search Purchase by Merchant' id='purchaseMerchant'>
      <button  class='save-btn' id='print-purchase'>PRINT</button>
      <div class='purchaseView'>
       <h2> PURCHASING INFORMATION</h2>
       <div class='table'>
       <table class='table'>
       <tr>
       <th>product</th>
       <th>quantity</th>
       <th>U price</th>
       <th>Total</th>
       <th>Supplier    Name</th>
       <th> Date</th>
       <th> Time</th>
       <th> Merchant</th>
       </tr>
    ";
    if($run_query){
      while($rows = mysqli_fetch_array($run_query)){
           $pname = $rows['name'];
           $sname = $rows['sname'];
           $fname = $rows['fname'];
           $lname = $rows['lname'];
           $tdate = $rows['date'];
           $ntime = $rows['time'];
           $quantity = $rows['quantity'];
           $price = $rows['unitary_price'];
           $total = $rows['total'];
           $purId = $rows['purch_ord_det_id'];
           echo "
           <tr>
            <td>$pname</td>
            <td>$quantity</td>
            <td>$price</td>
            <td>$total</td>
            <td>$sname</td>
            <td>$tdate</td>
            <td>$ntime</td>
            <td>$fname $lname</td>
            </tr>
           
           
           ";
  
      }
      echo " </table></div><br>
  
      ";
    }
  
  }
    }


    if(isset($_POST['purchaseProduct'])){
 
      $purpro = $_POST['purpro'];
      $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed' AND products.name LIKE '%$purpro%'";
      $run_query = mysqli_query($con, $query);
      if($count = mysqli_num_rows($run_query) > 0){
        echo "
         <div class='table'>
         <table class='table'>
         <tr>
         <th>product</th>
         <th>quantity</th>
         <th>U price</th>
         <th>Total</th>
         <th>Supplier    Name</th>
         <th> Date</th>
         <th> Time</th>
         <th> Merchant</th>
         </tr>
      ";
      if($run_query){
        while($rows = mysqli_fetch_array($run_query)){
             $pname = $rows['name'];
             $sname = $rows['sname'];
             $fname = $rows['fname'];
             $lname = $rows['lname'];
             $tdate = $rows['date'];
             $ntime = $rows['time'];
             $quantity = $rows['quantity'];
             $price = $rows['unitary_price'];
             $total = $rows['total'];
             $purId = $rows['purch_ord_det_id'];
             echo "
             <tr>
              <td>$pname</td>
              <td>$quantity</td>
              <td>$price</td>
              <td>$total</td>
              <td>$sname</td>
              <td>$tdate</td>
              <td>$ntime</td>
              <td>$fname $lname</td>
              </tr>
             
             
             ";
    
        }
        echo " </table></div><br>
    
        ";
      }
    
    }
      }

      if(isset($_POST['purchaseSupplier'])){
 
        $pursup = $_POST['pursup'];
        $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed' AND supplier.name LIKE '%$pursup%'";
        $run_query = mysqli_query($con, $query);
        if($count = mysqli_num_rows($run_query) > 0){
          echo "
           <div class='table'>
           <table class='table'>
           <tr>
           <th>product</th>
           <th>quantity</th>
           <th>U price</th>
           <th>Total</th>
           <th>Supplier    Name</th>
           <th> Date</th>
           <th> Time</th>
           <th> Merchant</th>
           </tr>
        ";
        if($run_query){
          while($rows = mysqli_fetch_array($run_query)){
               $pname = $rows['name'];
               $sname = $rows['sname'];
               $fname = $rows['fname'];
               $lname = $rows['lname'];
               $tdate = $rows['date'];
               $ntime = $rows['time'];
               $quantity = $rows['quantity'];
               $price = $rows['unitary_price'];
               $total = $rows['total'];
               $purId = $rows['purch_ord_det_id'];
               echo "
               <tr>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$price</td>
                <td>$total</td>
                <td>$sname</td>
                <td>$tdate</td>
                <td>$ntime</td>
                <td>$fname $lname</td>
                </tr>
               
               
               ";
      
          }
          echo " </table></div><br>
      
          ";
        }
      
      }
        }


        if(isset($_POST['purchaseMerchant'])){
 
          $purmer = $_POST['purmer'];
          $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed' AND users.fname LIKE '%$purmer%' OR users.lname LIKE '%$purmer%'";
          $run_query = mysqli_query($con, $query);
          if($count = mysqli_num_rows($run_query) > 0){
            echo "
             <div class='table'>
             <table class='table'>
             <tr>
             <th>product</th>
             <th>quantity</th>
             <th>U price</th>
             <th>Total</th>
             <th>Supplier    Name</th>
             <th> Date</th>
             <th> Time</th>
             <th> Merchant</th>
             </tr>
          ";
          if($run_query){
            while($rows = mysqli_fetch_array($run_query)){
                 $pname = $rows['name'];
                 $sname = $rows['sname'];
                 $fname = $rows['fname'];
                 $lname = $rows['lname'];
                 $tdate = $rows['date'];
                 $ntime = $rows['time'];
                 $quantity = $rows['quantity'];
                 $price = $rows['unitary_price'];
                 $total = $rows['total'];
                 $purId = $rows['purch_ord_det_id'];
                 echo "
                 <tr>
                  <td>$pname</td>
                  <td>$quantity</td>
                  <td>$price</td>
                  <td>$total</td>
                  <td>$sname</td>
                  <td>$tdate</td>
                  <td>$ntime</td>
                  <td>$fname $lname</td>
                  </tr>
                 
                 
                 ";
        
            }
            echo " </table></div><br>
        
            ";
          }
        
        }
          }

    
       

    if(isset($_POST['purchasePayments'])){
 
     $tot = 0;
      $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed'";
      $run_query = mysqli_query($con, $query);
      if($count = mysqli_num_rows($run_query) > 0){
        echo "
        <div class=' search'>
        <input type='text' class='search' placeholder='Search payment by Product' id='purProduct'>
        <input type='date' class='search' placeholder='Search payment by Date' id='purDate'>
        <button  class='save-btn' id='print-purchasePay'>PRINT</button>
        <div class='purView'>
   
         <h2> PURCHASING PAYMENTS</h2>
         <div class='table'>
         <table class='table'>
         <tr>
         <th>product</th>
         <th>quantity</th>
         <th>Total</th>
         <th>Supplier    Name</th>
         <th> Date</th>
         <th> Time</th>
         <th> Merchant</th>
         </tr>
      ";
      if($run_query){
        while($rows = mysqli_fetch_array($run_query)){
             $pname = $rows['name'];
             $sname = $rows['sname'];
             $fname = $rows['fname'];
             $lname = $rows['lname'];
             $tdate = $rows['date'];
             $ntime = $rows['time'];
             $quantity = $rows['quantity'];
             $price = $rows['unitary_price'];
             $total = $rows['total'];
             $purId = $rows['purch_ord_det_id'];
             $tot = $tot + $total;
             echo "
             <tr>
              <td>$pname</td>
              <td>$quantity</td>
              <td>$total</td>
              <td>$sname</td>
              <td>$tdate</td>
              <td>$ntime</td>
              <td>$fname $lname</td>
              </tr>
             
             
             ";
    
        }
        echo " </table></div><br>
        <h2>TOTAL: $tot FRW</h2>
    
        ";
      }
    
    }
      }
    

      if(isset($_POST['purProduct'])){
        $purpay = $_POST['purpay'];
        $tot = 0;
         $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed' AND products.name LIKE '%$purpay%'";
         $run_query = mysqli_query($con, $query);
         if($count = mysqli_num_rows($run_query) > 0){
           echo "
           
      
            <h2> PURCHASING PAYMENTS</h2>
            <div class='table'>
            <table class='table'>
            <tr>
            <th>product</th>
            <th>quantity</th>
            <th>Total</th>
            <th>Supplier    Name</th>
            <th> Date</th>
            <th> Time</th>
            <th> Merchant</th>
            </tr>
         ";
         if($run_query){
           while($rows = mysqli_fetch_array($run_query)){
                $pname = $rows['name'];
                $sname = $rows['sname'];
                $fname = $rows['fname'];
                $lname = $rows['lname'];
                $tdate = $rows['date'];
                $ntime = $rows['time'];
                $quantity = $rows['quantity'];
                $price = $rows['unitary_price'];
                $total = $rows['total'];
                $purId = $rows['purch_ord_det_id'];
                $tot = $tot + $total;
                echo "
                <tr>
                 <td>$pname</td>
                 <td>$quantity</td>
                 <td>$total</td>
                 <td>$sname</td>
                 <td>$tdate</td>
                 <td>$ntime</td>
                 <td>$fname $lname</td>
                 </tr>
                
                
                ";
       
           }
           echo " </table></div><br>
           <h2>TOTAL: $tot FRW</h2>
       
           ";
         }
       
       }
         }



         if(isset($_POST['purDate'])){
          $purdate = $_POST['purdate'];
          $tot = 0;
           $query = "SELECT *, products.name, supplier.name AS sname, fname, lname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id JOIN users ON purch_order_details.merchant_id = users.user_id WHERE  purch_order_details.status = 'confirmed' AND purch_order_details.date LIKE '%$purdate%'";
           $run_query = mysqli_query($con, $query);
           if($count = mysqli_num_rows($run_query) > 0){
             echo "
             
        
              <h2> PURCHASING PAYMENTS</h2>
              <div class='table'>
              <table class='table'>
              <tr>
              <th>product</th>
              <th>quantity</th>
              <th>Total</th>
              <th>Supplier    Name</th>
              <th> Date</th>
              <th> Time</th>
              <th> Merchant</th>
              </tr>
           ";
           if($run_query){
             while($rows = mysqli_fetch_array($run_query)){
                  $pname = $rows['name'];
                  $sname = $rows['sname'];
                  $fname = $rows['fname'];
                  $lname = $rows['lname'];
                  $tdate = $rows['date'];
                  $ntime = $rows['time'];
                  $quantity = $rows['quantity'];
                  $price = $rows['unitary_price'];
                  $total = $rows['total'];
                  $purId = $rows['purch_ord_det_id'];
                  $tot = $tot + $total;
                  echo "
                  <tr>
                   <td>$pname</td>
                   <td>$quantity</td>
                   <td>$total</td>
                   <td>$sname</td>
                   <td>$tdate</td>
                   <td>$ntime</td>
                   <td>$fname $lname</td>
                   </tr>
                  
                  
                  ";
         
             }
             echo " </table></div><br>
             <h2>TOTAL: $tot FRW</h2>
         
             ";
           }
         
         }
           }




if(isset($_POST['removePurchase'])){
  $puid = $_POST['puid'];
  $query = "DELETE FROM purch_order_details WHERE purch_ord_det_id = '$puid'";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    echo "Purchase Successfuly removed";
  }
  else{
    echo mysqli_error($con);
  }
}


if(isset($_POST['removeOrder'])){
  $coid = $_POST['coid'];
  $query = "DELETE FROM cust_ordering WHERE cust_order_id = '$coid'";
  $run_query = mysqli_query($con, $query);
  if($run_query){
    echo "Item(s) Successfuly removed";
  }
  else{
    echo mysqli_error($con);
  }
}

if(isset($_POST['confirmPurchase'])){
  $query = "UPDATE `purch_order_details` SET `status` = 'confirmed' WHERE status ='ordered'";
 // $squery = "UPDATE `products` SET `measures` = '$updated' WHERE `products`.`product_id` = $proId";
 //   $run_squery = mysqli_query($con, $squery);
    //if(!$run_squery){
   //   echo mysqli_error($con);
  //    exit;
 //   }
  $run_query = mysqli_query($con, $query);
  if($run_query){
    echo "Purchase Successfuly confirmed";
  }
  else{
    echo mysqli_error($con);
  }
}


if(isset($_POST['addPurchase'])){
  $product = $_POST['pur_pro'];
  $supplier = $_POST['supp'];
  $price = $_POST['price'];
  $quantity = $_POST['pur_q'];  
  $total = $_POST['total'];
  $mid = $_POST['mid'];
  $ntime=date("h:i:sa");
  $tdate=date("y-m-d");
  if (empty($product)||empty($supplier)||empty($price)||empty($quantity)||empty($total)) {
		echo "All Fields Must Be filled ";
		exit();

  }
  $fquery = "SELECT * FROM products WHERE products.product_id = '$product'";
  $run_fquery = mysqli_query($con, $fquery);
  if(!$run_fquery){
    echo mysqli_error($con);
  }else{
    $row = mysqli_fetch_array($run_fquery);
    $mes = $row['measures'];
    $updatedMes = $quantity + $mes;
    $squery ="UPDATE `products` SET `measures` = '$updatedMes' WHERE `products`.`product_id` = $product";
    $run_squery = mysqli_query($con, $squery);
    if(!$run_squery){
      echo mysqli_error($con);
    }
  }
  $query = "INSERT INTO `purch_order_details` (`purch_ord_det_id`, `quantity`, `total`, `unitary_price`, `p_o_number`, `supplier_id`,`date`,`time`,`merchant_id`, `status`) VALUES (NULL, '$quantity', '$total', '$price', '$product', '$supplier', '$tdate', '$ntime', '$mid', 'ordered')"; 
  $run_query = mysqli_query($con, $query);
  if(!$run_query){
    echo "Some error occurred:".mysqli_error($con);
  }
  else{
    echo " purchase added";
  }

}


if(isset($_POST['saveProduct'])){
  $pname = $_POST['pname'];
  $measure = $_POST['measure'];
  $category = $_POST['category'];
  $cost = $_POST['cost'];  
  $price = $_POST['price'];
  $max = $_POST['max'];  
  $photo = $_POST['photo'];
  if (empty($pname)||empty($measure)||empty($category)||empty($cost)||empty($price)||empty($max)||empty($photo)) {
		echo "All Fields Must Be filled ";
		exit();

	}
  $query = "INSERT INTO `products` (`product_id`, `name`, `measures`,`maximum`, `category`, `cost`, `u_price`, `image`) VALUES (NULL, '$pname', '$measure','$max', '$category', '$cost', '$price', '$photo')";   
   $run_query = mysqli_query($con, $query);
  if(!$run_query){
    echo "Some error occurred:".mysqli_error($con);
  }
  else{
    echo " Product successfully Registered";
  }

}


if(isset($_POST['saveSupplier'])){
  $sname = $_POST['sname'];
  $phone = $_POST['sphone'];
  $nation = $_POST['snation'];  
  $city = $_POST['scity'];
  $street = $_POST['sstreet'];   
  if (empty($sname)||empty($phone)||empty($nation)||empty($city)||empty($street)) {
		echo "All Fields Must Be filled ";
		exit();

	}
  $query = "INSERT INTO `supplier` (`supplier_id`, `name`, `phone`,`nationality`,`city`,`street`) VALUES (NULL, '$sname', '$phone', '$nation', '$city', '$street')";    
  $run_query = mysqli_query($con, $query);
  if(!$run_query){
    echo "Some error occurred:".mysqli_error($con);
  }
  else{
    echo " Supplier successfully Registered";
  }

}


  if(isset($_POST['placeOrder'])){
    $cid = $_POST['cid'];
    $proId = $_POST['proId'];
    $uprice = $_POST['uprice'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $ntime=date("h:i:sa");
    $tdate=date("y-m-d");
    if (empty($quantity)) {
      echo "All Fields Must Be filled ";
      exit();
  
    }
    $mes = "";
    $fquery = "SELECT * FROM products WHERE product_id = '$proId'";
    $run_fquery = mysqli_query($con, $fquery);
    if($run_fquery){
      $frow = mysqli_fetch_array($run_fquery);
      $pro_quantity = $frow['measures'];
      $pro_name = $frow['name'];
      $cat = $frow['category'];
      if($cat == 'fluid'){
        $mes = 'litres';
      }
      else $mes = 'Kilos';
    }
    else{
      echo mysqli_error($con);
    }
    if($quantity > $pro_quantity){
      echo "The order could not processed only ".$pro_quantity." $mes of ".$pro_name." are remaining";
      exit;
    }
    $updated = $pro_quantity - $quantity;
    $query = "INSERT INTO `cust_ordering` (`cust_order_id`, `date`, `time`, `quantity`, `u_price`, `total`, `customer_id`, `product_id`, `status`) VALUES (NULL, '$tdate', '$ntime', '$quantity', '$uprice', '$total', '$cid', '$proId', 'carted')";
    $squery = "UPDATE `products` SET `measures` = '$updated' WHERE `products`.`product_id` = $proId";
    $run_squery = mysqli_query($con, $squery);
    if(!$run_squery){
      echo mysqli_error($con);
      exit;
    }
    $run_query = mysqli_query($con, $query);
    if($run_query){
      echo 'order received';
    }
    else{
      echo "some error:".mysqli_error($con);
    }

  }


  if(isset($_POST['saveMerchant'])){
    $mfname = $_POST['mfname'];
    $mlname = $_POST['mlname'];
    $mphone = $_POST['mphone'];
    $meamil = $_POST['memail'];    
    if (empty($mfname)||empty($mlname)||empty($mphone)||empty($meamil)) {
      echo "All Fields Must Be filled ";
      exit();
  
    }
    $query = "INSERT INTO `merchant` (`merchant_id`, `fname`, `lname`, `email`, `phone`) VALUES (NULL, '$mfname', '$mlname', '$meamil', '$mphone')";    $run_query = mysqli_query($con, $query);
    if(!$run_query){
      echo "Some error occurred:".mysqli_error($con);
    }
    else{
      echo " Merchant successfully Registered";
    }

  }
?>