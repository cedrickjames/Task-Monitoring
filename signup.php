<?php
session_start();
  include ("./connection.php");
  
    if(isset($_POST['sbtregister'])){
        
        $username = $_POST['email'];
        $password = $_POST['password'];
        $conPassword = $_POST['conpass']; 
        $FNAME = $_POST['fname'];      
        $MNAME = $_POST['mname'];      
        $LNAME = $_POST['lname']; 
        $dept = $_POST['Department']; 

             

    // $userLevel =  echo("<script>userLevel()</script>");
    $radio_value=$_POST['radioPosition'];
        
        $sql1 = "Select * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
// if(mysqli_fetch_assoc($result)){
//     $_SESSION[]
// }
        if ($numrows == 0){
            if($password==$conPassword){
                $sqlinsert = "INSERT INTO `users`(`userid`, `username`, `userpass`, `conpass`, `userlevel`, `f_name`, `m_name`, `l_name`, `department`) VALUES (null, '$username','$password','$conPassword', '$radio_value', '$FNAME', '$MNAME', '$LNAME', '$dept')";
                mysqli_query($con, $sqlinsert);
                header("location: signin.php");
            
            }
            else{
                echo '<script>alert("Password does not match!")</script>';
            }
          
            

        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Task Monitoring</title>
        
        <link rel="stylesheet" href="./css/bootstrap.min.css">

      
            <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
                
                <!-- STYLE CSS -->
        <link rel="stylesheet" href="design_files/css/style.css">
         

    </head>
  
    <body>
       <div class="wrapper" style="background-image:url('design_files/images/loginback.jpg')">
  <div class="inner">
      <div class="image-holder">
          <img src="design_files/images/login.jpg">
      </div>

                <form action="signup.php" method = "POST" style="padding-top:0px" autocomplete="off" >
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
                        <div class="col-sm-10">
                        <select  name="Department" id="Department" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Select Department</option>
                                    <option value="MIS">MIS</option>
                                    <option value="FEM">FEM</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Parts Inspection">Parts Inspection</option>
                                    <option value="Parts Production">Parts Production</option>
                                    <option value="PPIC">PPIC</option>
                                    <option value="PPIC-Warehouse">PPIC-Warehouse</option>
                                    <option value="Production 1">Production 1</option>
                                    <option value="Production 2">Production 2</option>
                                    <option value="Production Support">Production Support</option>
                                    <option value="Purchasing">Purchasing</option>
                                    <option value="Quality Assurance">Quality Assurance</option>
                                    <option value="Quality Control">Quality Control</option>
                                    <option value="System Kaizen">System Kaizen</option>
                                </select>    
                        </div>
                    </div>
                    <div class="col-sm-12"  >
                        <fieldset class="row mb-3" style="margin-top: 0px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding-left: 10px">
                                    <div class="col-sm-3 form-check form-check-inline" style="margin-right: 10px">
                                        <input class="form-check-input" type="radio" name="radioPosition" id="radiosPosition" value="Leader" checked onclick="position();">
                                            <label class="form-check-label" for="radioLeader">
                                             Leader
                                            </label>
                                     </div>
                                    <div class="form-check form-check-inline" style="margin-left: 10px">
                                        <input class="form-check-input" type="radio" name="radioPosition" id="radiosPosition" value="PIC" onclick="position();">
                                            <label class="form-check-label" for="radioPIC">
                                             PIC
                                            </label>
                                    </div>
                                  
                             </div>
                        </fieldset>
                    </div>
                <div class="form-wrapper">
                    <input autocomplete="false" name="email" id="email"  placeholder="username" class="form-control" style="padding: 5px"onkeyup="checkinputs()">
                    <i class="zmdi zmdi zmdi-email" style="padding-right: 5px"></i>
                </div>  
                <div class="form-wrapper">
                    <input autocomplete="false" name="password" id="password" type="password" placeholder="Password" class="form-control" style="padding: 5px"onkeyup="checkinputs()">
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
function userLevel()
{
  var level=document.getElementsByName('radioPosition');
  
  if(level[0].checked){
    return user=level[0].value;
   
  }
  else if(level[1].checked){
    return user=level[1].value;
    
              }
 else if(level[2].checked){
    return user=level[2].value;
    
              }

}
</script>


 
    </body>
</html> 