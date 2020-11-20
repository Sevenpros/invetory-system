<?php
  include "db_connection.php";
  if(isset($_POST["customer"])){
      $query = "SELECT * FROM customer";
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
    echo "</table></div>";
}

if(isset($_POST["displayOrder"])){
  $query = "SELECT users.fname, users.lname, products.name, cust_ordering.quantity, cust_ordering.u_price, cust_ordering.total, cust_ordering.date,cust_ordering.time FROM cust_ordering JOIN users ON cust_ordering.customer_id = users.user_id JOIN products ON cust_ordering.product_id = products.product_id";
  $run_query = mysqli_query($con, $query);
  echo "
  <h3>ORDERS INFORMATION</h3><br>
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
      $quantity = $rows['quantity'];
      $total = $rows['total'];
      $uprice = $rows['u_price'];

      echo "
              <tr>
                <td>$fname $lname</td>
                <td>$pname</td>
                <td>$quantity</td>
                <td>$uprice</td>
                <td>$total</td>
                <td>$date</td>
                <td>$time</td>
                <td><a href='#'>Confirm</a></td>
              </tr>

       ";
  }
  echo "</table> </div>";
}

if(isset($_POST["supplier"])){
  $query = "SELECT * FROM supplier";
  $run_query = mysqli_query($con, $query);
  echo "
  <div class='table>
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
  <div class='table'>
     <table class='table'>
     <tr>
      <th>Product Id</th>
      <th>Product Name</th>
      <th>Measures</th>
      <th>Category</th>
      <th>Cost</th>
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
      if($category == 'fluid'){
        echo "
        
        <div class='pro-element'>
            <div class='pro-desc'>$name -$price fr/Ltr</div>
            <div class='pro-img'>
                <img src='../../assets/honey.jpg'>
            </div>
            <div class='pro-order' pid= '$pro' proprice='$price' proname='$name'>ORDER NOW</div>
        </div>
        
    

 ";}
 else {
  echo "
 
        <div class='pro-element'>
            <div class='pro-desc' >$name -$price fr/Kg</div>
            <div class='pro-img'>
                <img src='../../assets/sugar2.jpg'>
            </div>
            <div class='pro-order' id='ordering' pid= '$pro' proprice='$price' proname='$name' >ORDER NOW</div>
        </div>
        
   

";
 
      }
     
  }
  echo "</div> </div>";
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


if(isset($_POST['viewPurchase'])){
  echo "
     <h2> PURCHASING DETAILS</h2>
     <br>
     <div class='pur-table'>
     <table>
     <tr>
     <th>product</th>
     <th>Supplier</th>
     <th>quantity</th>
     <th>Unitary price</th>
     <th>Total</th>
     <th>Action</th>
     </tr>
  ";

  $query = "SELECT *, products.name, supplier.name AS sname FROM purch_order_details JOIN products ON purch_order_details.p_o_number = products.product_id JOIN supplier ON purch_order_details.supplier_id = supplier.supplier_id WHERE  purch_order_details.status = 'ordered'";
  $run_query = mysqli_query($con, $query);
    if($run_query){
      while($rows = mysqli_fetch_array($run_query)){
           $pname = $rows['name'];
           $sname = $rows['sname'];
           $quantity = $rows['quantity'];
           $price = $rows['unitary_price'];
           $total = $rows['total'];
           echo "
           <tr>
            <td>$pname</td>
            <td>$sname</td>
            <td>$quantity</td>
            <td>$price</td>
            <td>$total</td>
            <td><a href='#'>Remove</a></td>
            </tr>
           
           
           ";

      }
      echo " </table></div>";
    }
  
}


if(isset($_POST['addPurchase'])){
  $product = $_POST['pur_pro'];
  $supplier = $_POST['supp'];
  $price = $_POST['price'];
  $quantity = $_POST['pur_q'];  
  $total = $_POST['total'];
  $query = "INSERT INTO `purch_order_details` (`purch_ord_det_id`, `quantity`, `total`, `unitary_price`, `p_o_number`, `supplier_id`, `status`) VALUES (NULL, '$quantity', '$total', '$price', '$product', '$supplier', 'ordered')"; 
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
  $query = "INSERT INTO `products` (`product_id`, `name`, `measures`, `category`, `cost`, `u_price`) VALUES (NULL, '$pname', '$measure', '$category', '$cost', '$price')";   
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
    $query = "INSERT INTO `cust_ordering` (`cust_order_id`, `date`, `time`, `quantity`, `u_price`, `total`, `customer_id`, `product_id`) VALUES (NULL, '$tdate', '$ntime', '$quantity', '$uprice', '$total', '$cid', '$proId')";
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
    $query = "INSERT INTO `merchant` (`merchant_id`, `fname`, `lname`, `email`, `phone`) VALUES (NULL, '$mfname', '$mlname', '$meamil', '$mphone')";    $run_query = mysqli_query($con, $query);
    if(!$run_query){
      echo "Some error occurred:".mysqli_error($con);
    }
    else{
      echo " Merchant successfully Registered";
    }

  }
?>