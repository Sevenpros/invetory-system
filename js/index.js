const signup = document.querySelector('#signup');
const login = document.querySelector('#login');
const  signupForm = document.querySelector(".signup-form");
const loginForm = document.querySelector('.login-form');

login.onclick = () => {
   signupForm.style.display = 'none';
   loginForm.style.display = 'block';
}
signup.onclick = () => {
    signupForm.style.display = 'block';
    loginForm.style.display = 'none';
 }
 $(document).ready(function(){
   $("#userLogin").click(function(event){
      event.preventDefault();
      var email=$("#email").val();
      var pass=$("#password").val();
      //alert(email);
      $.ajax({
         url: "login.php",
         method: "POST",
         data : {empLogin:1,userEmail:email,userPass:pass},
         success :function(data){
            //alert(data);
            if (data == "adminkslleowiousd") {
               window.location.href="admin/index.php";
            }
            else
            {
               alert("#loginError");
            }
         }
      })
   })
 })

 