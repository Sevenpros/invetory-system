const customerForm = document.querySelector(".customer-form");
const merchantForm = document.querySelector(".merchant-form");
const table = document.querySelector(".table");
const supplierForm = document.querySelector('.supplier-form');
const productForm = document.querySelector('.product-form');

document.querySelector("#customer").onclick = () => {
   document.querySelector(".customer").style.display = "block";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";


}
document.querySelector("#merchant").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "block";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";


}
document.querySelector("#supplier").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "block";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";

}
document.querySelector("#products").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "block";
   document.querySelector(".orders").style.display = "none";


}
document.querySelector("#order").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "block";
   $.ajax({
      url: '../../server/action.php',
      method: "POST",
      data: {displayOrder:1},
      success: function(data){
         $(".order-table-view").html(data);
      }
   })
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
document.querySelector("#pro-add").onclick = () => {
   if(document.querySelector('.table')){
      document.querySelector('.pro-table-view').style.display = "none";
   };
   productForm.style.display = "block";
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

   $("#pro-view").click(function(event){
      event.preventDefault();
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {product:1},
         success: function(data){
            $(".pro-table-view").html(data);
            productForm.style.display = "none";
            document.querySelector('.pro-table-view').style.display = "block";

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
   
   $("#save-pro").click(function(event){
      event.preventDefault();
      const pname = $("#pname").val();
      const measure = $("#measure").val();
      const category = $("#category").val();
      const cost = $("#cost").val();
      const price = $("#uprice").val();
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {saveProduct:1,pname:pname,measure:measure,category:category,cost:cost,price:price},
         success: function(data){
            alert(data);
         }
      })
   })
   
 })

 