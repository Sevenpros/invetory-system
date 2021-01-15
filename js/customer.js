

$(document).ready(function(){
    const proDisplay = () => {
        $.ajax({
            url: "../../server/action.php",
            method: "POST",
            data: {displayProduct:1},
            success: function(data){
                $(".pro-display").html(data);
            }
        })
    }
    proDisplay();
    const orderModal = document.querySelector('#orderModal');
const span = document.querySelector('.close');
const orderBtn = document.querySelectorAll('.pro-order');

$("#cust_products").click(event => {
  event.preventDefault();
  proDisplay();
})
const myCart = cid =>{
  $.ajax({
    url: "../../server/action.php",
    method: "POST",
    data: {myCart:1,cid:cid},
    success: function(data){
      $(".pro-display").html(data);
    }
  })
}

$("#mycart").click(event => {
  event.preventDefault();
  const cid = $("#uid").val();
  myCart(cid);
 
})

$("body").delegate(".pro-order","click",function(event){
    event.preventDefault();
    const proprice = $(this).attr("proprice");
    const proname = $(this).attr("proname");
    const pid = $(this).attr("pid");
    $("#price").val(proprice);
    $("#proname").val(proname);
    $("#pid").val(pid);
    const uid = $("#uid").val();
    orderModal.style.display = 'block';

})
  span.onclick = () => {
    orderModal.style.display = 'none';
  };
  window.onclick = (event) => {
    if (event.target == orderModal) {
      orderModal.style.display = 'none';
    }
  };

  $("#quantity").on('input', function(){
      var price = $("#price").val();
      var quantity = $("#quantity").val();
      const total = price * quantity;
      $("#total").val(total);
  })

  const addToCart = (c) => {
    $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {viewCart:1,c:c},
      success: function(data){
        $(".cart-form").html(data);
      }
  })
}
  


  $("#confirm-order").click(function(event){
    event.preventDefault();
    
    const cid = $("#uid").val();
    const proId = $("#pid").val();
    const uprice = $("#price").val();
    const total = $("#total").val();
    const quantity = $("#quantity").val();
    $.ajax({
      url: "../../server/action.php",
      method: "POST",
      data: {placeOrder:1, cid:cid,proId:proId,uprice:uprice,total:total,quantity:quantity},
      success: function(data){
        alert(data);
        addToCart(cid);

      }
    })
  })
    $("body").delegate("#remove_order","click",function(event) {
      event.preventDefault();
      const coid = $(this).attr("coid");
      const cid = $("#uid").val();

      $.ajax({
         url: "../../server/action.php",
         method: "POST",
         data: {removeOrder:1, coid:coid},
         success: data => {
            alert(data);
            addToCart(cid);
         }
      })
     
  })



  $("body").delegate("#cartDetails","click",function(event) {
    event.preventDefault();
    const cid = $(this).attr("cid");
    if(confirm("Is your ordered products Delivered")){
      $.ajax({
        url: "../../server/action.php",
        method: "POST",
       data: {cartDetails:1, cid:cid},
        success: data => {
           alert(data);
           myCart(cid);
        }
     })
    }
    
   
})


  $("body").delegate("#confirm_cart","click",function(event) {
    event.preventDefault();
    const cid = $("#uid").val();
    if(confirm("Do you want to place order? This action can not be reversed")){
      $.ajax({
        url: "../../server/action.php",
        method: "POST",
        data: {confirmCart:1, cid:cid},
        success: data => {
           alert(data);
           addToCart(cid);
        }
     })
    }
    
   
})
  
})

