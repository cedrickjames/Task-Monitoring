<?php
session_start();
  include ("./connection.php");
  $db= $con;
  $tableName="users";
  if($_SESSION['userlevel'] == "PIC"){
    header("location: index.php");
  }
 

 
 



  
  $columns= ['username'];
  $fetchData = fetch_data($db, $tableName, $columns);


  function fetch_data($db, $tableName, $columns){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columns) || !is_array($columns)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableName)){
      $msg= "Table Name is empty";
   }else{
   $columnName = implode(", ", $columns);
   $Department = $_SESSION['userDept'];
   $query = "SELECT * FROM `users` WHERE `department` = '$Department' AND `userlevel` = 'PIC'";
  //  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
   $result = $db->query($query);
   if($result== true){ 
    if ($result->num_rows > 0) {
       $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
       $msg= $row;
    } else {
       $msg= "No Data Found"; 
    }
   }else{
     $msg= mysqli_error($db);
   }
   }
   return $msg;
   }

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="design_files/css/bootstrap.min.css">

            
        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
            
            <!-- STYLE CSS -->
        <link rel="stylesheet" href="design_files/css/style.css?v=<?php echo time(); ?>">
        <!-- <link rel="stylesheet" href="design_files/css/style.css"> -->
        <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script type="text/javascript" src="./js/jquery.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
 
    </head>

    <body>

    <?php 
    
    if(isset($_POST['btnAddtask'])){
       
      // const numberOfAddedProducts=document.getElementById("countInput").value;
      $numberofAddedTask = $_POST['countInput'];
      $enteredUserName = $_POST['username'];
      echo '<script>console.log("Number of Added Task: '.$numberofAddedTask.'")</script>';
      
      $num = 1;
      $taskname = htmlspecialchars($_POST["taskName".$num]);
      $taskCategory = htmlspecialchars($_POST["taskCategory".$num]);
      $taskType = htmlspecialchars($_POST["taskType".$num]);
      $taskArea = htmlspecialchars($_POST["taskArea".$num]);

  
  
      // echo '<script>window.alert("TEST: '.$taskname.'")</script>';
      // $b = 0;
      $selectUserID = "SELECT `userid` FROM `users` WHERE `username` = '$enteredUserName';";
          $resultUserId = mysqli_query($con, $selectUserID);
          $resultUserId1;
          if (mysqli_num_rows($resultUserId) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($resultUserId)) {
               
                $resultUserId1 = $row["userid"];
              }
          // echo '<script>console.log("TEST: '.$resultUserId.'")</script>';
          }
  
          $selectUserDept= "SELECT `department` FROM `users` WHERE `username` = '$enteredUserName';";
          $resultUserDept = mysqli_query($con, $selectUserDept);
          $resultUserDept1;
          if (mysqli_num_rows($resultUserDept) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($resultUserDept)) {
               
                $resultUserDept1 = $row["department"];
              }
          // echo '<script>console.log("TEST: '.$resultUserId.'")</script>';
          }
      for($b=$numberofAddedTask;$b>0;$b--){
          $taskname = htmlspecialchars($_POST["taskName".$num]);
          $taskCategory = htmlspecialchars($_POST["taskCategory".$num]);
          $taskType = htmlspecialchars($_POST["taskType".$num]);
          $taskArea = htmlspecialchars($_POST["taskArea".$num]);

      
          echo '<script>console.log("TEST: '.$taskname.'")</script>';
          echo '<script>console.log("TEST: '.$taskCategory.'")</script>';
          echo '<script>console.log("TEST: '.$taskType.'")</script>';
          
  
          $sqlinsert = "INSERT INTO `usertask`(`userid`, `username`, `taskName`, `taskCategory`, `taskArea`, `taskType`, `department`) VALUES ('$resultUserId1','$enteredUserName','$taskname','$taskCategory','$taskArea','$taskType', '$resultUserDept1');";
                  mysqli_query($con, $sqlinsert);
            $num++;
           
            if( $_SESSION['admin']=="TRUE"){
              ?><script>
              Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'You have successfully added task/s!',
          //   footer: '<a href="">Why do I have this issue?</a>'
          }).then(function() {
    window.location = "admin.php";
});
           </script><?php 
              // header("location: admin.php");
  
            }
            else{
              ?><script>
              Swal.fire({
            icon: 'success',
            title: 'Successfull',
            text: 'You have successfully added task/s!',
          //   footer: '<a href="">Why do I have this issue?</a>'
          }).then(function() {
    window.location = "leader.php";
});
           </script><?php 
             
  
            }
  
  
      }
  //     if($b>=1){
  //         // $taskname = $_POST['taskName'.$num.];
  //  $num = 1;
   
  
  //     // $username = $_POST['username'];
  //     // $password = $_POST['password'];
  // // echo '<script>alert("OK")</script>';
  
  // }
  //LINTEK
    }
    ?>
    <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="
            
            <?php 
            if($_SESSION['admin'] == "False")
            {
               echo "leader.php";
            } 
            else{
               echo "admin.php";
              } 
             ?>"> <img src="design_files/images/GloryPhLogo.jpg" alt="..." height="40">&nbsp;Task Monitoring</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
             data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li> -->
                
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Option
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown"  style="right: 0; left: auto;">
                  <a class="dropdown-item" id="btn-addAdmin" href="./signup.php">Register User</a>
                    <a class="dropdown-item" id="btn-addAdmin" href="./addTask.php">Add Task</a>
                    <!-- <?php if($_SESSION['admin'] == "TRUE"){?>

                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalAdmin'>Add Admin</a>
                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalRemoveAdmin'>Remove Admin</a> 
                   
                      <?php } ?> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalAdmin'>Add Admin</a> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalRemoveAdmin'>Remove Admin</a> -->
                    <a class="dropdown-item" id="btn-logout" href="./logout.php">Logout</a>


                    
                   
                  </div>
                </li>
                
              </ul>
            </div>
          </nav>
        </div>
        <div class="wrapper" style="background: linear-gradient(to right, rgb(22, 34, 42), rgb(58, 96, 115));">
            
            <div class="inner" style="width: 1000px; height: 500px; max-width: 1000px; border-radius: 60px">
               
                
                <form id="account-settings" action="addTask.php" method = "POST" style="width: 1000px; padding: 10px;"  >
                    <!-- <h3>Register User</h3> -->
                   
                     <h3 style="text-align: center; margin-bottom: 40px; ">Add task</h3>
                     <div class="form-group row">
                         <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">User Name</label>
                         <!-- <div class="col-sm-5">
                            <input type="text" name="username" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="" >
                                                  
                        </div> -->
                         <div class="col-sm-5">
                             <select name="username" class=" form-control form-select form-select-sm"
                                 style="padding-left:10px;">
                                 <option value="" disabled selected>Select User Name</option>
                                 <!-- <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option> -->
                                 <?php
                                  if(is_array($fetchData)){      
                                
                                  foreach($fetchData as $data){
                                  ?>
                                 <option value="<?php echo $data['username']??''; ?>"><?php echo $data['username']??''; ?></option>
                                 <?php
                            }}else{ ?>
                            
                              <option colspan="8">
                          <?php echo $fetchData; ?>
                        </option>
                          
                          <?php
    }?>
                                </select>
                         </div>

                     </div>
                                       
            <div class="overflow-x">
                <div  class="overflow-y" style="overflow-y: scroll; overflow-x: hidden; display: block; height: 220px" id="addtask">
                    <div class="form-group row">
                        <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm" style="font-size: 10pt; padding-right: 0px">Add Task</label>
                            <div class="col-sm-3">
                                <input type="text" name="taskName1" class="form-control form-control-sm" id="taskName1" style="width:100%; padding: 10px; height: 38px" placeholder="Task Name" >
                            </div>
                            <div class="col-sm-2">
                                <select  name="taskType1" id="taskType1" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Type</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="annual">Annual</option>

                              

                                </select>
                            </div>
                            <div class="col-sm-3">
                                <select  name="taskCategory1" id="taskCategory1" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Category</option>
                                    <option value="Network">Network</option>
                                    <option value="Server">Server</option>
                                    <option value="VM">VM</option>
                                    <option value="Storage">Storage</option>
                                    <option value="Building Facilities Inspection">Building Facilities Inspection</option>
                                    <option value="Equipment">Equipment</option>
                                    <option value="Billing">Billing</option>
                                    <option value="Routine Inspection">Routine Inspection</option>
                                    <option value="Annual Maintenance">Annual Maintenance</option>
                                    <option value="Certification">Certification</option>
                                    <option value="Peza Compliance">Peza Compliance</option>
                                    <option value="Annual Maintenance">Annual Maintenance</option>
                                    <option value="Others">Others</option>  
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select  name="taskArea1" id="taskArea1" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Area</option>
                                    <option value="GPI 1">GPI 1</option>
                                    <option value="GPI 2">GPI 2</option>
                                    <option value="GPI 3">GPI 3</option>
                                    <option value="GPI 4">GPI 4</option>
                                    <option value="GPI 5">GPI 5</option>
                                    <option value="GPI 6">GPI 6</option>
                                    <option value="GPI 7">GPI 7</option>
                                    <option value="GPI 8">GPI 8</option>
                                    <option value="GPI 9">GPI 9</option>

                                   
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <!-- <input name="btnplus" type="submit" value="+" class="btn btn-success" id="addProdBtn" style="margin-top: 0px; width: 50px; height: 30px; padding: 0px" onclick="addNewInputsForAddTask()"  > -->
                                <button type="button" class="btn btn-success" id="addProdBtn" style="margin-top: 0px; width: 50px; height: 30px; padding: 0px" onclick="addNewInputForProducts()">+</button>
                            </div>
                            <input class="col-sm-1 col-form-label"  style="text-align: center; font-size: 13px; display: none; width: 80px; height: 30px" type="number" name="countInput" id="countInput" value=1>
                    </div>


                    
                
                    
                   

                </div>
            </div>
                    
                  
                <div class="form-group container-login100-form-btn" >
                    <button id="btn-register"  class="btn-signin" type="button" name="btnRegister" value="Register" style="margin: auto; width: 200px; margin-top: 10px" onclick=" checkTextBox('','','','','')">
                    Add Task</button>  
                    <input id="sbt-php-addtask"  class="btn-signin" type="submit" name="btnAddtask" value="Register" style="margin: auto; width: 200px; margin-top: 10px; display: none;">
     
                    <!-- <input id="btn-signup" class="btn-signin" name="sbtregister" type="submit" value="Register" disabled style="margin: auto;" > -->

                </div>     
                </form>
            </div>  
        </div>
       
<script>

 const DivProdContainer = document.getElementById("addtask")
//  var formheight = 70;
// var numForID=2;
// const formAddProducts = document.getElementById("AddProductsForm")
var formheight = 70;
var numForID=2;
    function addNewInputForProducts()
    {
        document.getElementById("countInput").stepUp(1);
        const newDiv=document.createElement("div");
        newDiv.classList.add("col-sm-12");
        newDiv.style.padding = '0px';
        // var taskInput='<div class="form-group row"><div class="col-lg-4"><input  class="form-control"   id="inputItem'+numForID+'" required ><div class="invalid-feedback"style=" margin-bottom: 20px; margin-left: 30px">Please fill out this field.</div></div><div class="col-lg-4"><input  class="form-control" id="inputDesc'+numForID+'"  ></div><div class="col-lg-3"><input  class="form-control"  id="inputPrice'+numForID+'"  ></div></div>'
        var taskInput='<div class="form-group row"  id="NewTaskDiv'+numForID+'"style="margin-top: -30px"> <label for="colFormLabelSm" class="col-sm-1 col-form-label col-form-label-sm" style="font-size: 10pt; padding-right: 0px"> </label><div class="col-sm-3"><input type="text" class="form-control form-control-sm" id="taskName'+numForID+'" style="width:100%; padding: 10px;height: 38px" name="taskName'+numForID+'" placeholder="Task Name" ></div><div class="col-sm-2"><select  name="taskType'+numForID+'" id="taskType'+numForID+'" class=" form-control form-select form-select-sm" style="padding-left:10px;"> <option value=""  disabled selected>Type</option> <option value="weekly">Weekly</option> <option value="monthly">Monthly</option><option value="annual">Annual</option> </select></div> <div class="col-sm-3"><select  name="taskCategory'+numForID+'" id="taskCategory'+numForID+'" class=" form-control form-select form-select-sm" style="padding-left:10px;"> <option value="" disabled selected>Category</option> <option value="Network">Network</option><option value="Server">Server</option><option value="VM">VM</option><option value="Storage">Storage</option><option value="Building Facilities Inspection">Building Facilities Inspection</option><option value="Equipment">Equipment</option><option value="Billing">Billing</option><option value="Routine Inspection">Routine Inspection</option><option value="Annual Maintenance">Annual Maintenance</option><option value="Certification">Certification</option><option value="Peza Compliance">Peza Compliance</option><option value="Annual Maintenance">Annual Maintenance</option><option value="Others">Others</option></select></div><div class="col-sm-2"><select  name="taskArea1" id="taskArea1" class=" form-control form-select form-select-sm" style="padding-left:10px;"><option value="" disabled selected>Area</option><option value="GPI 1">GPI 1</option><option value="GPI 2">GPI 2</option><option value="GPI 3">GPI 3</option><option value="GPI 4">GPI 4</option><option value="GPI 5">GPI 5</option><option value="GPI 6">GPI 6</option><option value="GPI 7">GPI 7</option><option value="GPI 8">GPI 8</option><option value="GPI 9">GPI 9</option></select></div><div class="col-sm-1"><button type="button" class="btn btn-success" id="addProdBtn" style="margin-top: 0px; width: 50px; height: 30px; padding: 0px" onclick="RemoveInputForProducts('+numForID+')">-</button></div>';
        newDiv.innerHTML=taskInput;
        DivProdContainer.appendChild(newDiv);

        // var formheightInt= 320+formheight;
        
        // formAddProducts.style.height=formheightInt+"px";
        // formheight+=70;

        numForID++;

    }
    function RemoveInputForProducts(divID){
      // numForID--;
      document.getElementById("countInput").stepDown(1);

      var newdivID = "NewTaskDiv"+numForID.toString()+"";
      console.log(newdivID);
      const elem = document.getElementById("NewTaskDiv"+divID); 
      elem.remove();

    
     
    }
    $(document).ready(function(){
			$("#btn").click( function() {
				$.post( $("#addTaskForm").attr("action"),
					 $('#str').val(JSON.stringify(divIdArray)),  
			         //$("#myForm :input").serializeArray(), 
			         function(info){ $("#result").html(info); 
				});
			});
			 
			$("#addTaskForm").submit( function() {
				return false;	
			});
			
		});
    function checkTextBox(count,id1,id2,id3,store){
    const numberOfAddedTask=document.getElementById("countInput").value;
    var c;
    var numb=1;
    var d=0;
    // var taskName1awda=document.getElementById("taskName1").value;
    // console.log(taskName1awda)
    //Age !=""&&NameOfKid !="" && MiddleInitial != ""&& LastName!=""&& 
    for(c=numberOfAddedTask;c>=1;c--){
      const taskName1=document.getElementById("taskName"+numb);
      const taskType1=document.getElementById("taskType"+numb);
      const taskCategory1=document.getElementById("taskCategory"+numb);

   
      if(taskName1.value != "" && taskType1.value != "" && taskCategory1.value !="")
    {
     
     d++;
      
    }
    
      numb++;
     
    }
    if(d==numberOfAddedTask){
    console.log("ok")
   document.getElementById("sbt-php-addtask").click();

    }
    else{
        // var formssag = document.getElementById('inputProducts');
        // formssag.classList.add('was-validated');
      window.alert("Form is incomplete. Please fill out all fields")
    }
}


        </script>
       
        
    </body>
</html>