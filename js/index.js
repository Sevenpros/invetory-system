const customerForm = document.querySelector(".customer-form");
const merchantForm = document.querySelector(".merchant-form");
const table = document.querySelector(".table");
const supplierForm = document.querySelector('.supplier-form');
const productForm = document.querySelector('.product-form');
const purchaseForm = document.querySelector('.purchase-form');


document.querySelector("#customer").onclick = () => {
   document.querySelector(".customer").style.display = "block";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".payments").style.display = "none";



}
document.querySelector("#merchant").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "block";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".payments").style.display = "none";




}
document.querySelector("#supplier").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "block";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".payments").style.display = "none";
   document.querySelector(".payments").style.display = "none";



}


document.querySelector("#products").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "block";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".payments").style.display = "none";

}

document.querySelector("#payments").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".payments").style.display = "block";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".products").style.display = "none";


}

document.querySelector("#store").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".store").style.display = "block";
   document.querySelector(".payments").style.display = "none";


   $.ajax({
      url: '../../server/action.php',
      method: "POST",
      data: {storeControl:1},
      success: function(data){
         $(".store-table-view").html(data);
      }
   })

}


const fillProduct  = () => {
   $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {fillProduct:1},
      success: function(data){
         $("#pur_product").html(data);
      }
   })
}

const fillSupplier  = () => {
   $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {fillSupplier:1},
      success: function(data){
         $("#pur_supplier").html(data);
      }
   })
}


const viewPurchase = () => {
   $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {viewPurchase:1},
      success: (data) => {
         $(".pur-details").html(data);
      }
   })
}


document.querySelector("#purchase").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".orders").style.display = "none";
   document.querySelector(".purchase").style.display = "block";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".payments").style.display = "none";
   fillProduct();
   fillSupplier();
   viewPurchase();
   
}

document.querySelector("#order").onclick = () => {
   document.querySelector(".customer").style.display = "none";
   document.querySelector(".merchant").style.display = "none";
   document.querySelector(".supplier").style.display = "none";
   document.querySelector(".products").style.display = "none";
   document.querySelector(".purchase").style.display = "none";
   document.querySelector(".orders").style.display = "block";
   document.querySelector(".store").style.display = "none";
   document.querySelector(".payments").style.display = "none";

   $.ajax({
      url: '../../server/action.php',
      method: "POST",
      data: {displayOrder:1},
      success: function(data){
         $(".order-table-view").html(data);
      }
   })
}
const orders = () => {
   $.ajax({
      url: '../../server/action.php',
      method: "POST",
      data: {displayOrder:1},
      success: function(data){
         $(".orders").html(data);
      }
   })
}
orders();
document.querySelector("#cust-add").onclick = () => {
      if(document.querySelector('.table')){
         document.querySelector('.table').style.display = "none";
         
      };

      customerForm.style.display = "block";
}


document.querySelector("#sale_pay").onclick = () => {
   $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {salesPayments:1},
      success: data => {
         $(".payments-table-view").html(data);
      }
   })
}
document.querySelector("#pur_pay").onclick = () => {
   $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {purchasePayments:1},
      success: data => {
         $(".payments-table-view").html(data);
      }
   })
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

document.querySelector("#pur-add").onclick = () => {
   if(document.querySelector('.table')){
      document.querySelector('.pur-table-view').style.display = "none";
   };
   purchaseForm.style.display = "block";
   viewPurchase();
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

    
   const smsNotification = (number,sms) => {
      
var xhr = new XMLHttpRequest(),
body = JSON.stringify(
    {
        "messages": [
            {
                "channel": "sms",
                "to": number,
                "content": sms
            }
        ]
    }
);
xhr.open('POST', 'https://platform.clickatell.com/v1/message', true);
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.setRequestHeader('Authorization', 'MQLVhdIzStKL0nk_D_THhQ==');
xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200) {
        console.log('success');
    }
};

xhr.send(body);

   }

   $("body").delegate("#conf_order", "click", function(event) {
      event.preventDefault();
      const oid = $(this).attr("oid");
      const pname = $(this).attr("pname");
      const cname = $(this).attr("name");
      const quantity = $(this).attr("quantity");
      const total = $(this).attr("total");

      const number = 250782718860;
      const sms = "Dear "+cname+" we are pleased to inform you that your order of "+quantity+" "+pname+" have been confirmed. amount of "+total+" Frw is to be paid on product delivery";
      smsNotification(number,sms);
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

   $("#pur-view").click(function(event){
      event.preventDefault();
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {Purchase:1},
         success: function(data){
            $(".pur-table-view").html(data);
            purchaseForm.style.display = "none";
            document.querySelector('.pur-table-view').style.display = "block";

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
   

   $("body").delegate("#remove_pur","click",function(event) {
      event.preventDefault();
      const puid = $(this).attr("puid");
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {removePurchase:1, puid:puid},
         success: data => {
            alert(data);
            viewPurchase();
         }
      })
     
  })
 $("body").delegate("#confirm_pur","click", event => {
    event.preventDefault();
    $.ajax({
       url: "../../server/action.php",
       method: "POST",
       data: {confirmPurchase:1},
       success: data => {
          alert(data);
          viewPurchase();
       }
    })
 })

    $("#save-cust").click(function(event){
       event.preventDefault();
       const fname = $("#fname").val();
       const lname = $("#lname").val();
       const phone = $("#cphone").val();
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
  

   

    $("#save-pur").click(function(event){
      event.preventDefault();
      const pur_pro = $("#pur_product").val();
      const pur_q = $("#pur_quantity").val();
      const price = $("#pur_price").val();
      const supp = $("#pur_supplier").val();
      const total = price * pur_q;
      const mid = $("#userid").val();

      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {addPurchase:1,pur_pro:pur_pro,pur_q:pur_q,price:price,supp:supp,total:total,mid:mid},
         success: function(data){
            alert(data);
            viewPurchase();
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
      const max = $("#max").val();
      const photoFile = $("#photo").val();
      const photo = photoFile.split('\\').pop().split('/').pop()
      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {saveProduct:1,pname:pname,measure:measure,category:category,cost:cost,price:price,max:max,photo:photo},
         success: function(data){
            alert(data);
         }
      })
   })
   
 })

 