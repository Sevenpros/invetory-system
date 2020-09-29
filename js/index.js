const signup = document.querySelector('#signup');
const login = document.querySelector('#login');
const  signupForm = document.querySelector(".signup-form");
const loginForm = document.querySelector('.login-form');
const customerForm = document.querySelector(".customer-form");
const merchantForm = document.querySelector(".merchant-form");
const table = document.querySelector(".table");
const customerBody = document.querySelector('.customer-body');
const supplierForm = document.querySelector('.supplier-form');

document.querySelector("#customer").onclick = () => {
   document.querySelector(".customer").style.display = "block";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
}
document.querySelector("#merchant").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "block";
   document.querySelector(".supplier").style.display = "none";
}
document.querySelector("#supplier").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "block";
}
document.querySelector("#cust-add").onclick = () => {
      if(document.querySelector('.table')){
         document.querySelector('.table').style.display = "none";
         
      };

      customerForm.style.display = "block";
}
document.querySelector("#merch-add").onclick = () => {
   if(document.querySelector('.table')){
      document.querySelector('.merch-table-view').style.display = "none";
   };
   merchantForm.style.display = "block";
}

document.querySelector("#sup-add").onclick = () => {
   if(document.querySelector('.table')){
      document.querySelector('.sup-table-view').style.display = "none";
   };
   supplierForm.style.display = "block";
}


 $(document).ready(function(){
    
    $("#cust-view").click(function(event){
       event.preventDefault();
       $.ajax({
          url: "../../server/action.php",
          method: "POST",
          data: {customer:1},
          success: function(data){
             $(".table-view").html(data);
             customerForm.style.display = "none";
          }
       })

    })


    $("#merch-view").click(function(event){
      event.preventDefault();
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {merchant:1},
         success: function(data){
            $(".merch-table-view").html(data);
            merchantForm.style.display = "none";
            document.querySelector('.merch-table-view').style.display = "block";

         }
      })

   })


   $("#sup-view").click(function(event){
      event.preventDefault();
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {supplier:1},
         success: function(data){
            $(".sup-table-view").html(data);
            supplierForm.style.display = "none";
            document.querySelector('.sup-table-view').style.display = "block";

         }
      })

   })


    $("#save-cust").click(function(event){
       event.preventDefault();
       const fname = $("#fname").val();
       const lname = $("#lname").val();
       const phone = $("#fphone").val();
       const nation = $("#nation").val();
       const city = $("#city").val();
       const street = $("#street").val();

       $.ajax({
          url: "../../server/action.php",
          method: "POST",
          data: {saveCustomer:1,fname:fname,lname:lname,phone:phone,nation:nation,city:city,street:street},
          success: function(data){
             alert(data);
          }
       })
    })


    $("#save-sup").click(function(event){
      event.preventDefault();
      const sname = $("#sname").val();
      const sphone = $("#sphone").val();
      const snation = $("#snation").val();
      const scity = $("#scity").val();
      const sstreet = $("#sstreet").val();

      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {saveSupplier:1,sname:sname,sphone:sphone,snation:snation,scity:scity,sstreet:sstreet},
         success: function(data){
            alert(data);
         }
      })
   })

    $("#save-merch").click(function(event){
      event.preventDefault();
      const mfname = $("#mfname").val();
      const mlname = $("#mlname").val();
      const mphone = $("#mphone").val();
      const memail = $("#memail").val();

      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {saveMerchant:1,mfname:mfname,mlname:mlname,mphone:mphone,memail:memail},
         success: function(data){
            alert(data);
         }
      })
   })

   
 })

 