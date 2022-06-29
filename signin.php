<?php
session_start();
  include ("./connection.php");
  if(isset( $_SESSION['connected'])){
    

    header("location: leader.php");

    // 
  }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Task Monitoring</title>
        <link rel="icon" type="image/x-icon" href="design_files/images/Task Monitoring Icon.ico">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

        <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
                
                <!-- STYLE CSS -->
        <link rel="stylesheet" href="design_files/css/style.css">
        <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">


    </head>
    <body>

    <?php 

if(isset($_POST['sbtlogin'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql1 = "Select * FROM users WHERE username='$username' AND userpass='$password'";
    $sql1 = "Select * FROM users WHERE username='$username'";

    $result = mysqli_query($con, $sql1);
    $numrows = mysqli_num_rows($result);

    $selectadmin = "Select * FROM admin WHERE name='$username'";
    $resultadmin = mysqli_query($con, $selectadmin);
    $numrowsadmin = mysqli_num_rows($resultadmin);

    $selectUserDept= "SELECT `department` FROM `users` WHERE username = '$username' LIMIT 1";
    $resultDept = mysqli_query($con, $selectUserDept);
    
    while($userRow = mysqli_fetch_assoc($resultDept)){

      $userDept = $userRow['department'];
$_SESSION['userDept'] =  $userDept; 

      
  }

if($numrowsadmin > 0){
$_SESSION['admin'] = 'TRUE'; 

}
else{
$_SESSION['admin'] = 'False'; 
}



    if ($numrows == 0 ){
        $_SESSION['loginError'] = true;
        $userName = $_POST['username']
        ?><script>
            Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'This user does not exist!',
        //   footer: '<a href="">Why do I have this issue?</a>'
        })
         </script><?php 
    }
    else{

        $sqlpass = "Select * FROM users WHERE username = '$username' AND `userpass` = '$password';";
        $resultpass = mysqli_query($con, $sqlpass);
        $numrowspass = mysqli_num_rows($resultpass);
if($numrowspass == 0){
    ?><script>
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Wrong password',
//   footer: '<a href="">Why do I have this issue?</a>'
})
 </script><?php 
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
            $_SESSION['department'] = $userRow['department'];
// $_SESSION['today'] = date('F j, Y');

        }
        if($numrowsadmin > 0){
            header("location: admin.php");

        }
        else{
            if($_SESSION['userlevel'] == "Leader"){
                header("location: leader.php");
                   
                }
                else if ($_SESSION['userlevel']  == "PIC"){
                header("location: index.php");
    
                }
        }
    }

    }

}?>
       <div class="wrapper" style="background-image:url('design_files/images/registerback.jpg')">
  <div class="inner">
      <div class="image-holder">
          <img src="design_files/images/Task Monitoring.png">
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