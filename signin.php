<?php
session_start();
  include ("./connection.php");
  
    if(isset($_POST['sbtlogin'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql1 = "Select * FROM users WHERE username='$username' AND userpass='$password'";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);


        if ($numrows == 0){
            echo '<script>alert("This account does not exist!")</script>';
        }
        else{
            $_SESSION['connected'] = 'TRUE';  
            $_SESSION['username'] = $username;
            
            // $userlevel = "SELECT userlevel FROM users WHERE username='$username'";
        // $userlevelresult = mysqli_query($con, $userlevel);
            // $_SESSION['userlevel'] = $userlevelresult;
            while($userRow = mysqli_fetch_assoc($result)){
                $_SESSION['userlevel'] = $userRow['userlevel'];
                $_SESSION['f_name'] = $userRow['f_name'];
                $_SESSION['l_name'] = $userRow['l_name'];

            }
            header("location: index.php");

        }
   
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>MIS Monitoring</title>
        
    <link rel="stylesheet" href="./css/bootstrap.min.css">

        <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
                
                <!-- STYLE CSS -->
        <link rel="stylesheet" href="design_files/css/style.css">
         
    </head>
    <body>
       <div class="wrapper" style="background-image:url('design_files/images/registerback.jpg')">
  <div class="inner">
      <div class="image-holder">
          <img src="design_files/images/registration-form-1.jpg">
      </div>
   <form action="signin.php" method = "POST">
       <h3>Login</h3>
<div class="form-wrapper">
    <input name="username" id="username"  placeholder="User Name" class="form-control" style="padding: 5px" onkeyup="checkinputs()">
    <i class="zmdi zmdi zmdi-email" style="padding-right: 5px"></i>
</div>  
<div class="form-wrapper">
    <input name ="password" id="password" type="password" placeholder="Password" class="form-control" style="padding: 5px" onkeyup="checkinputs()">
    <i class="zmdi zmdi zmdi-lock" style="padding-right: 5px"></i>
</div>   

<div class="form-group container-login100-form-btn">
    <input id="btn-login" class="btn-signin" name="sbtlogin" type="submit" value="Login" style="margin: auto;" disabled>
     

    </button>
</div>
<!-- 
<div class="w-full text-center" style="margin-top: 30%; font-size:15px;">
    <span class="text-muted">
        Not have an account?
    </span>
<a href="signup.php" class="text-dark">
   Signup
</a>
</div> -->
    </form>
</div>
</div>

<script>

const email=document.getElementById("username");
const pass=document.getElementById("password");


function checkinputs(){

if(email.value == "" || pass.value == ""){
    document.getElementById("btn-login").disabled = true;
}
else{
    document.getElementById("btn-login").disabled = false;
}

}
</script>
 
</body>
</html> 