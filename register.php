<?php
session_start();
  include ("./connection.php");
  
    if(isset($_POST['sbtregister'])){
        
        $username = $_POST['email'];
        $password = $_POST['password'];
        $conPassword = $_POST['conpass'];

        $sql1 = "Select * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
// if(mysqli_fetch_assoc($result)){
//     $_SESSION[]
// }
        if ($numrows == 0){
            if($password==$conPassword){
                $sqlinsert = "INSERT INTO `users`(`userid`, `username`, `password`, `conpass`) VALUES (null, '$username','$password','$conPassword')";
                mysqli_query($con, $sqlinsert);
                header("location: index.php");
            
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <link rel="stylesheet" href="./css/bootstrap.min.css">

            
        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
            
            <!-- STYLE CSS -->
        <link rel="stylesheet" href="design_files/css/style.css?v=<?php echo time(); ?>">
        <!-- <link rel="stylesheet" href="design_files/css/style.css"> -->


 
    </head>

    <body>
        <div class="wrapper" style="background-image: url('design_files/images/accountSettingsback.jpg'); background-repeat: no-repeat; background-size:100%;">
            
            <div class="inner" style="width: 900px; height: 500px; max-width: 1000px">
               
                
                <form id="account-settings" action="" style="width: 1000px; padding: 10px;" >
                    <!-- <h3>Register User</h3> -->
                   
                     <h3 style="text-align: center; margin-bottom: 40px; ">Register User</h3>  
                     <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">User Name</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="" >
                        </div>
                      
                     </div> 
                     <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="First Name" >
                        </div>
                        <div class="col-sm-2">
                            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%;  padding: 10px;" placeholder="M.I.">
                        </div>
                        <div class="col-sm-3">
                            <input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%;  padding: 10px;" placeholder="Last Name">
                        </div>
                     </div>
                    <div class="col-sm-12"  >
                        <fieldset class="row mb-3" style="margin-top: 0px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding-left: 12px">
                                <label class="control-label" style=" font-size: 10pt; margin-right: 70px; " >Position</label>
                                    <div class="col-sm-3form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radioPosition" id="radiosPosition" value="Leader" checked onclick="position();">
                                            <label class="form-check-label" for="radioLeader">
                                             Leader
                                            </label>
                                     </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radioPosition" id="radiosPosition" value="PIC" onclick="position();">
                                            <label class="form-check-label" for="radioPIC">
                                             PIC
                                            </label>
                                    </div>
                             </div>
                        </fieldset>
                    </div>
                    <div  id="toHandle">
                    <div class="form-group row" id="toHandle">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">To Handle</label>
                            <div class="col-sm-10">
                            <select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px; width: 300px">
                            <option value="" disabled selected>Choose here.</option>
                            <option value="FEM&MIS">FEM & MIS</option>
                            <option value="Production">Production</option>
                            <option value="To be added">To be added</option>
                             </select>
                             </div>
                     </div>
                    
                    </div>
            <div class="overflow-x">
                <div  class="overflow-y" style="overflow-y: scroll; overflow-x: hidden; display: none; height: 170px" id="addtask">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Add Task</label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="Task Name" >
                            </div>
                            <div class="col-sm-2">
                                <select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Type</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Category</option>
                                    <option value="weekly">Network</option>
                                    <option value="monthly">Server</option>
                                    <option value="monthly">VM</option>
                                    <option value="monthly">Storage</option>
                                    <option value="monthly">Others</option>  
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <input name="btnplus" type="submit" value="+" class="btn btn-success" id="addProdBtn" style="margin-top: 0px; width: 50px; height: 30px; padding: 0px" onclick="addNewInputForProducts()"  ></button>
                            </div>
                            <input class="col-sm-1 col-form-label"  style="text-align: center; font-size: 2px; display: none; width: 30px; height: 30px" type="number" id="countInput" value=1>
                    </div>
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> </label>
                            <div class="col-sm-3">
                                <input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="Task Name" >
                            </div>
                            <div class="col-sm-2">
                                <select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Type</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Category</option>
                                    <option value="weekly">Network</option>
                                    <option value="monthly">Server</option>
                                    <option value="monthly">VM</option>
                                    <option value="monthly">Storage</option>
                                    <option value="monthly">Others</option>  
                                </select>
                            </div>
                            <!-- <div class="col-sm-1">
                                <input type="submit" value="+" class="btn btn-success" id="addProdBtn" style="margin-top: 0px; width: 50px; height: 30px; padding: 0px" onclick="addNewInputForProducts()"  ></button>
                            </div> -->
                    </div>
                   

                </div>
            </div>
                    
                  
                <div class="form-group container-login100-form-btn" >
                    <input id="btn-register"  class="btn-signin" type="submit" name="btnRegister" value="Register" style="margin: auto; width: 200px; margin-top: 10px">
                            
                    <!-- <input id="btn-signup" class="btn-signin" name="sbtregister" type="submit" value="Register" disabled style="margin: auto;" > -->

                </div>     
                </form>
            </div>  
        </div>
       
<script>
    function position()
        {
        var pos=document.getElementsByName('radioPosition');
        var task=document.getElementById('addtask');
        var toHandleDv = document.getElementById("toHandle");
        if(pos[0].checked){
            toHandleDv.style.display='block'
            task.style.display='none'
            return gender=pos[0].value;
        }
        else if(pos[1].checked){
            toHandleDv.style.display='none'
            task.style.display='block'

            return gender=pos[1].value;
            
                    }

        }
const DivProdContainer = document.getElementById("addtask")
// const formAddProducts = document.getElementById("AddProductsForm")
var formheight = 70;
var numForID=2;
    function addNewInputForProducts()
    {
        
        document.getElementById("countInput").stepUp(1);
        const newDiv=document.createElement("div");
        newDiv.classList.add("col-sm-12");
        var taskInput='<div class="form-group row"> <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"> </label><div class="col-sm-3"><input type="email" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="Task Name" ></div><div class="col-sm-2"><select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px;"> <option value="" disabled selected>Type</option> <option value="weekly">Weekly</option> <option value="monthly">Monthly</option> </select></div> <div class="col-sm-3"><select  name="" id="course" class=" form-control form-select form-select-sm" style="padding-left:10px;"> <option value="" disabled selected>Category</option> <option value="weekly">Network</option><option value="monthly">Server</option><option value="monthly">VM</option><option value="monthly">Storage</option><option value="monthly">Others</option></select></div></div>';

        newDiv.innerHTML=taskInput;
        DivProdContainer.appendChild(newDiv);

        // var formheightInt= 320+formheight;
        
        // formAddProducts.style.height=formheightInt+"px";
        // formheight+=70;

        numForID++;

    }
        </script>
       
        
    </body>
</html>