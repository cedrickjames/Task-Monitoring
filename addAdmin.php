<?php
session_start();
  include ("./connection.php");
  
  if(!isset( $_SESSION['connected'])){
    
    
    header("location: signin.php");
      
    // 
  }
  if($_SESSION['userlevel'] == "PIC" || $_SESSION['userlevel'] == "Leader"){
    header("location: signin.php");

  }
//     if(isset($_POST['sbtregister'])){
        
//         $username = $_POST['email'];
//         $password = $_POST['password'];
//         $conPassword = $_POST['conpass']; 
//         $FNAME = $_POST['fname'];      
//         $MNAME = $_POST['mname'];      
//         $LNAME = $_POST['lname']; 
//         $dept = $_POST['Department']; 

             

//     // $userLevel =  echo("<script>userLevel()</script>");
//     $radio_value=$_POST['radioPosition'];
        
//         $sql1 = "Select * FROM users WHERE username='$username'";
//         $result = mysqli_query($con, $sql1);
//         $numrows = mysqli_num_rows($result);
// // if(mysqli_fetch_assoc($result)){
// //     $_SESSION[]
// // }
//         if ($numrows == 0){
//             if($password==$conPassword){
//                 $sqlinsert = "INSERT INTO `users`(`userid`, `username`, `userpass`, `conpass`, `userlevel`, `f_name`, `m_name`, `l_name`, `department`) VALUES (null, '$username','$password','$conPassword', '$radio_value', '$FNAME', '$MNAME', '$LNAME', '$dept')";
//                 mysqli_query($con, $sqlinsert);
//                 header("location: signin.php");
            
//             }
//             else{
//                 echo '<script>alert("Password does not match!")</script>';
//             }
          
            

//         }
//         else{
//             ?><script>
//             Swal.fire({
//           icon: 'error',
//           title: 'Oops...',
//           text: 'This user is already exist!',
//         //   footer: '<a href="">Why do I have this issue?</a>'
//         })
//          </script><?php 
//         }
//     }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Task Monitoring</title>
        <link rel="icon" type="image/x-icon" href="design_files/images/Task Monitoring Icon.ico">
        
        <link rel="stylesheet" href="./css/bootstrap.min.css">

      
            <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
                
                <!-- STYLE CSS -->
        <link rel="stylesheet" href="design_files/css/style.css">
        <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
         

    </head>
  
    <body>
    <?php
    //            $sqlinsertS = "INSERT INTO `users`(`userid`, `username`, `userpass`, `conpass`, `userlevel`, `f_name`, `m_name`, `l_name`, `department`) VALUES (null, 'sample','sample','sample', 'Admin', 'sample', '', 'sample', 'Admin')";
    //            mysqli_query($con, $sqlinsertS);

               
    //    $selectAdmina= "SELECT * FROM `users` WHERE `username` = 'sample';";
    //    $resultSelectAdmina = mysqli_query($con, $selectAdmina);

    //    while($userRow = mysqli_fetch_assoc($resultSelectAdmina)){
    //        $userIDOFAdmin = $userRow['userid'];
    //    echo $userIDOFAdmin;
    //    }
  
    if(isset($_POST['sbtregister'])){
        
        $username = $_POST['email'];
        $password = $_POST['password'];
        $conPassword = $_POST['conpass']; 
        $FNAME = $_POST['fname'];      
        $MNAME = $_POST['mname'];      
        $LNAME = $_POST['lname']; 
        // $dept = $_POST['Department']; 

             

    // $userLevel =  echo("<script>userLevel()</script>");
    // $radio_value=$_POST['radioPosition'];
        
        $sql1 = "Select * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
// if(mysqli_fetch_assoc($result)){
//     $_SESSION[]
// }
        if ($numrows == 0){
            if($password==$conPassword){
                $sqlinsert = "INSERT INTO `users`(`userid`, `username`, `userpass`, `conpass`, `userlevel`, `f_name`, `m_name`, `l_name`, `department`) VALUES (null, '$username','$password','$conPassword', 'Admin', '$FNAME', '$MNAME', '$LNAME', 'Admin')";
                mysqli_query($con, $sqlinsert);

                
        $selectAdmin= "SELECT * FROM `users` WHERE `username` = '$username';";
        $resultSelectAdmin = mysqli_query($con, $selectAdmin);

        while($userRow = mysqli_fetch_assoc($resultSelectAdmin)){
            $userIDOFAdmin = $userRow['userid'];
        
                $sqlinsertAdmin = "INSERT INTO `admin`(`adminid`, `userid`, `name`) VALUES (null, '$userIDOFAdmin','$username')";
                mysqli_query($con, $sqlinsertAdmin);
        }
                ?><script>
                Swal.fire({
              icon: 'success',
              title: 'Registered',
              text: 'You have successfully registered an admin.',
            //   footer: '<a href="">Why do I have this issue?</a>'
            })
             </script><?php 
                // header("location: signup.php");
            
            }
            else{
                ?><script>
                Swal.fire({
              icon: 'error',
              title: 'Error',
              text: 'Password does not match',
            //   footer: '<a href="">Why do I have this issue?</a>'
            })
             </script><?php 
            }
          
            

        }
        else{
            ?><script>
            Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'This user is already exist!',
        //   footer: '<a href="">Why do I have this issue?</a>'
        })
         </script><?php 
        }
    }
?>
       <div class="wrapper" style="background-image:url('design_files/images/loginback.jpg')">
  <div class="inner">
      <div class="image-holder">
          <img src="design_files/images/Task Monitoring (4).png" style="height: 100%">
      </div>

                <form action="addAdmin.php" method = "POST" style="padding-top:0px" autocomplete="off" >
                    <h3>Register</h3> 
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" name="fname" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="First Name" >
                        </div>
                        <div class="col-sm-5">
                            <input type="text"  name="mname" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%;  padding: 10px;" placeholder="M.I.">
                        </div>
                        <div class="col-sm-10">
                            <input type="text"  name="lname" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%;  padding: 10px;" placeholder="Last Name">
                        </div>
                   
                    </div>

                <div class="form-wrapper">
                    <input  name="email" id="email"  placeholder="username" class="form-control" style="padding: 5px"onkeyup="checkinputs()">
                    <i class="zmdi zmdi zmdi-email" style="padding-right: 5px"></i>
                </div>  
                <div class="form-wrapper">
                    <input name="password" id="password" type="password" placeholder="Password" class="form-control" style="padding: 5px"onkeyup="checkinputs()">
                    <i class="zmdi zmdi zmdi-lock" style="padding-right: 5px"></i>
                </div>   
                <div class="form-wrapper">
                    <input name="conpass" id="confirmPassword" type="password" placeholder="Confirm Password" class="form-control" style="padding: 5px" onkeyup="checkinputs()">
                    <i class="zmdi zmdi zmdi-lock" style="padding-right: 5px"></i>
                </div>  
                <div class="form-group container-login100-form-btn">
                    <input id="btn-signup" class="btn-signin" name="sbtregister" type="submit" value="Register" disabled style="margin: auto;" >

                
                </div>
                <!-- <div class="w-full text-center" style="margin-top: 0%; font-size:15px;">
                <a href="signin.php" class="text-dark">
                    Already have an account? Signin
                </a>
                </div> -->
                    </form>
</div>
</div>
<script>

const email=document.getElementById("email");
const pass=document.getElementById("password");
const con=document.getElementById("confirmPassword");

function checkinputs(){

if(email.value == "" || pass.value == "" ||con.value==""){
    document.getElementById("btn-signup").disabled = true;
}
else{
    document.getElementById("btn-signup").disabled = false;
}

}
// function userLevel()
// {
//   var level=document.getElementsByName('radioPosition');
  
//   if(level[0].checked){
//     return user=level[0].value;
   
//   }
//   else if(level[1].checked){
//     return user=level[1].value;
    
//               }
//  else if(level[2].checked){
//     return user=level[2].value;
    
//               }

// }
</script>


 
    </body>
</html> 