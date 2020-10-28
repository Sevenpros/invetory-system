const login = document.querySelector('#login');
const signup = document.querySelector('#signup');
const loginForm = document.querySelector('.login-form');
const signupForm = document.querySelector('.signup-form');

signup.onclick = () => {
    loginForm.style.display = 'none';
    signupForm.style.display = 'block';
}
login.onclick = () => {
    loginForm.style.display = 'block';
    signupForm.style.display = 'none';
}
$(document).ready(function(){
    $("#loginBtn").click(function(event){
        event.preventDefault();
        var email=$("#email").val();
        var pass=$("#password").val();
        $.ajax({
           url: "../server/login.php",
           method: "POST",
           data : {loggingIn:1,email:email,pass:pass},
           success :function(data){
              if (data == "admin") {
                 window.location.href="../ui/admin/index.html";
              }
              else if( data == "customer"){
                 window.location.href="../ui/admin/customer.php";
              }
              else
              {
                 alert("invalid username or password");
              }
           }
        })
     })


     $("#signupBtn").click(function(event){
        event.preventDefault();
        var lname=$("#lname").val();
        var fname=$("#fname").val();
        var email=$("#uemail").val();
        var pass=$("#upassword").val();
        var repass=$("#repass").val();
        var phone=$("#phone").val();
        if(pass !== repass){
            alert("passwords do not match");
        }
        else{
            $.ajax({
                url: "../server/login.php",
                method: "POST",
                data : {signUp:1,lname:lname, fname:fname, email:email, pass:pass, phone:phone},
                success :function(data){
                  alert(data);
                }
             })
        }
       
     })

})