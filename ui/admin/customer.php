<?php
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/signup.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>customer</title>
</head>
<body>
    <header>
        <div class="menu">
            <div class="logo-div">
                <div class="logo"></div>
            </div>
            
            <div class="list-menu">
                <a href="index.html">HOME</a>
                <a href="../service.php">SERVICE</a>
                <a href="../signup.html">LOGOUT</a>
            </div>
        </div>
    </header>
    <main class="signup-body">
        <article class="articles-cust">
            <div class="art-div-cust">
                <div class="art-header pros">
                    <p>
                        Nutri-Sante is A Nutrition cabinet from Rwanda. 
                        Which aims at inspiring and helping you to live a healthy nutrition and lifestyle
                    </p>
                </div>
                 <div class="pro-display">
                
                    
                </div>
                
            </div>
        </article>
        
    </main>
    <footer class="bottom-footer">
        <div class="copy-right">
            <p>
                Nutri-Sante is A Nutrition cabinet from Rwanda. 
                Which aims at inspiring and helping you to live a healthy nutrition and lifestyle<br><br>
                NUTRI-SANTE ltd &copy; 2020
            </p>
        </div>
        <div class="address">
           Address: Opposite to, KK 10 Ave 59 St, Kigali<br>
           Working Hours:Monday to Friday: 8:00 AM-7:30 PM<br>
           E-mail: nutrisanterwanda@gmail.com<br>
           Phone: +250 788 729 794
        </div>
    </footer>
     
    <div id="orderModal" class="modal order-modal">

        <!-- Modal content -->
        <div class="modal-content content-comment">
          <span class="close">&times;</span>
        <section class="ordering-form">
            <div class="o-form">
               <form class="modal-form">
                <label class="labels">Product name</label><br>
                <input class="input" id="proname" type="text" disabled placeholder="Product Name"><br>
                <label class="labels">Price</label><br>
                <input class="input" id="price" type="text" disabled placeholder="Unitary Price"><br>
                <label class="labels">Quantity</label><br>
                <input class="inputs" id="quantity" type="text" focus placeholder="Quantity"><br>
                <label class="labels">Total</label><br>
                <input type="hidden" id="pid">
                <input type="hidden" id="uid" value= " <?php echo $_SESSION['uid'];  ?>">
                <input class="input" id="total" type="text" disabled  placeholder="Total" >
                <br>
                <button class="save-btn big-btn" id="confirm-order">Add To Cart</button>
              </form>
           </div>
           <div class='cart-form'></div>
        </section> 
        </div>  
      </div>


    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script src="../../js/customer.js"></script>
</body>
</html>