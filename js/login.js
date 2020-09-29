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
              else
              {
                 alert("#loginError");
              }
           }
        })
     })
})