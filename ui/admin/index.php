<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/signup.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <title>admin/home</title>
</head>
<body>
    <header>
        <div class="menu">
            <div class="logo-div">
                <div class="logo"></div>
            </div>
            
            <div class="list-menu">
                <a href="index.html">HOME</a>
                <a href="#">SERVICE</a>
                <a href="../signup.html">LOGOUT</a>
            </div>
        </div>
    </header>
    <main class="admin-body">
        <div class="side-menu">
            <ul>
                <li id="customer"><a href="#">CUSTOMER</a></li>
                <li id="merchant"><a href="#">MERCHANT</a></li>
                <li id="supplier"><a href="#">SUPPLIER</a></li>
                <li id="products"><a href="#">PRODUCTS</a></li>
                <li id="order"><a href="#">ORDERING</a></li>
                <li id="purchase"><a href="#">PURCHASE</a></li>
                <li id="payments"><a href="#">PAYMENTS</a></li>
                <li id="store"><a href="#">STORE CONTROL</a></li>
            </ul>
        </div>
        <div class="main-body">
            <div class="customer">
                <div class="customer-header">
                    <div class="cust-heads view">HOME VIEW</div>
                    <div class="cust-heads add" id="cust-add">ADD NEW CUSTOMER</div>
                    <div class="cust-heads cust" id="cust-view">VIEW CUSTOMERS</div>
                </div>
                <div class="body">
                    <div class="table-view"></div>
                    <div class="customer-form">
                        <h3>CUSTOMER REGISTRATION</h3>
                        <form>
                            <input class="input" id="fname" type="text" placeholder="First Name">
                            <input class="input" id="lname" type="text" placeholder="Last Name">
                            <input class="input" id="cphone" type="text" placeholder="Phone Number">
                            <input class="input" id="nation" type="text" placeholder="Nationality">
                            <input class="input" id="city" type="text" placeholder="City">
                            <input class="input" id="street" type="text" placeholder="Street"><br>
                            <button class="save-btn" id="save-cust">REGISTER</button>
                        </form>
                    </div>
                   
                </div>
                <div class="customer-footer"></div>
            </div>
            <div class="merchant">
                <div class="customer-header">
                    <div class="cust-heads view">HOME VIEW</div>
                    <div class="cust-heads add" id="merch-add">ADD NEW MERCHANT</div>
                    <div class="cust-heads cust" id="merch-view">VIEW MERCHANTS</div>
                </div>
                <div class="body">
                    <div class="merch-table-view"></div>
                    <div class="merchant-form">
                        <h3>MERCHANT REGISTRATION</h3>
                        <form>
                            <input class="input" id="mfname" type="text" placeholder="First Name">
                            <input class="input" id="mlname" type="text" placeholder="Last Name">
                            <input class="input" id="mphone" type="text" placeholder="Phone Number">
                            <input class="input" id="memail" type="text" placeholder="email"><br>
                            <button class="save-btn" id="save-merch">REGISTER</button>
                        </form>
                    </div>
                   
                </div>
                <div class="merchant-footer"></div>
            </div>

            <div class="supplier">
                <div class="customer-header">
                    <div class="cust-heads view">HOME VIEW</div>
                    <div class="cust-heads add" id="sup-add">ADD NEW SUPPLIER</div>
                    <div class="cust-heads cust" id="sup-view">VIEW SUPPLIERS</div>
                </div>
                <div class="body">
                    <div class="sup-table-view"></div>
                    <div class="supplier-form">
                        <h3>SUPPLIER REGISTRATION</h3>
                        <form>
                            <input class="input" id="sname" type="text" placeholder="Supplier Name">
                            <input class="input" id="sphone" type="text" placeholder="Phone Number">
                            <input class="input" id="snation" type="text" placeholder="Nationality">
                            <input class="input" id="scity" type="text" placeholder="City">
                            <input class="input" id="sstreet" type="text" placeholder="Street"><br>
                            <button class="save-btn" id="save-sup">REGISTER</button>
                        </form>
                    </div>
                   
                </div>
                <div class="supplier-footer"></div>
            </div>
            <div class="products">
                <div class="customer-header">
                    <div class="cust-heads view">HOME VIEW</div>
                    <div class="cust-heads add" id="pro-add">ADD NEW PRODUCT</div>
                    <div class="cust-heads cust" id="pro-view">VIEW PRODUCTS</div>
                </div>
                <div class="body">
                    <div class="pro-table-view"></div>
                    <div class="product-form">
                        <h3>PRODUCT REGISTRATION</h3>
                        <form>
                            <input class="input" id="pname" type="text" placeholder="Product Name">
                            <input class="input" id="measure" type="text" placeholder="Measures">
                            <input class="input" id="max" type="text" placeholder="Maximum Measures">
                            <input class="input" id="cost" type="text" placeholder="Cost">
                            <input class="input" id="uprice" type="text" placeholder="Unitary Price">
                            <input class="input" id="photo" type="file" placeholder="Enter the image file">
                            <select class="select" id="category">
                                <option>Fluid</option>
                                <option>Flour</option>
                                <option>Cereal</option>
                                <option>Other</option>
                            </select><br>
                            <button class="save-btn" id="save-pro">REGISTER</button>
                        </form>
                    </div>
                   
                </div>
                <div class="product-footer"></div>
            </div>
            
            <div class="purchase">
                <div class="customer-header">
                    <div class="cust-heads view">HOME VIEW</div>
                    <div class="cust-heads add" id="pur-add">ADD NEW PURCHASE</div>
                    <div class="cust-heads cust" id="pur-view">VIEW PURCHASE</div>
                </div>
                <div class="body">
                    <div class="pur-table-view"></div>
                    <div class="purchase-form">
                        <div class="pur-form">
                        <h3>PURCHASE REGISTRATION</h3>
                        <form>
                            <select class="select" id="pur_product">
                               
                            </select><br>
                            <input class="input" id="pur_quantity" type="text" placeholder="Quantity">
                            <input class="input" id="pur_price" type="text" placeholder="Price">
                            <input type="hidden" id="userid" value="<?php echo $_SESSION['uid'] ?>">
                            <select class="select" id="pur_supplier">
                               
                            </select><br>
                            <button class="save-btn" id="save-pur">ADD</button>
                        </form>
                    </div>
                    <div class="pur-details">

                    </div>
                    </div>
                   
                </div>
                <div class="purchase-footer"></div>
            </div>
            <div class="orders">
            <div class='customer-header'>
          <div class='cust-heads view' id='allOrders'>All Orders</div>
          <div class='cust-heads add' id='confirmedOrders'>Confirmed Orders</div>
          <div class='cust-heads cust' id='receivedOrders'>Received Orders</div>
      </div><br>
                <div class="body">
                    
                    <div class="order-table-view">
                       
                    </div>
                    
                   
                </div>
                <div class="product-footer"></div>
            </div>
            

            <div class="store">
                
            <div class="body">
                    
              <div class="store-table-view">
                

                    
                       
                    </div>
                    
                   
                </div>
                <div class="store-footer"></div>
            </div>
            <div class="payments">
            <div class="customer-header">
                    <div class="cust-heads view">HOME VIEW</div>
                    <div class="cust-heads add" id="sale_pay">SALES PAYMENTS</div>
                    <div class="cust-heads cust" id="pur_pay">PURCHASE PAYMETNS</div>
                </div>
                <div class="body">
                        
                  <div class="payments-table-view">
                          
                  </div>
                    </div>
                    <div class="payements-footer"></div>
                </div>
        </div>
        
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

    <div class="modal fade" role="dialog" id="orderDetailsModal">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ORDERS DETAILS INFORMATION</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12" id="order_det_view">
                            
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                 </div>

    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/divjs.js"></script>
    <script src="../../js/index.js"></script>
</body>
</html>