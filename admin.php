
<?php
  session_start();
  include ("./connection.php");
  ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1.0">

    <title>Main Page</title>
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="icon" type="image/x-icon" href="design_files/images/Task Monitoring Icon.ico">

 <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="design_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="./js/bootstrap.min.js"> -->

  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="design_files/css/ListOfMembersStyle.css">
<link rel="stylesheet" href="design_files/css/admin.css">

<link rel="stylesheet" href="design_files/css/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

<script type="text/javascript" src="./js/jquery.slim.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  -->
<script type="text/javascript" src="./design_files/css/bootstrap.min.js"></script>
<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
<!-- <script type="text/javascript" src="./js/node_modules/jquery/dist/jquery.slim.min.js"></script> -->

</head>
    <body style="background: linear-gradient(to right, rgb(247, 248, 248), rgb(172, 187, 120));">
    <?php

  $db= $con;
$tableName="usertask";
$tableName2="users";
    if(!isset( $_SESSION['connected'])){
    
    
      header("location: signin.php");
        
      // 
    }
    



    $tableNameRemove="admin"; 
  $columnsRemove= ['username'];
  $fetchDataRemove = fetch_dataRemove($db, $tableNameRemove, $columnsRemove );

  function fetch_dataRemove($db, $tableNameRemove, $columnsRemove){
    if(empty($db)){
     $msgRemove= "Database connection error";
    }elseif (empty($columnsRemove) || !is_array($columnsRemove)) {
     $msgRemove="columns Name must be defined in an indexed array";
    }elseif(empty($tableNameRemove)){
      $msgRemove= "Table Name is empty";
   }else{
   $columnNameRemove = implode(", ", $columnsRemove);
   $DepartmentRemove = $_SESSION['userDept'];
   $queryRemove = "SELECT * FROM `users` WHERE `userlevel` = 'Admin'";
  //  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
   $resultRemove = $db->query($queryRemove);
   if($resultRemove== true){ 
    if ($resultRemove->num_rows > 0) {
       $row= mysqli_fetch_all($resultRemove, MYSQLI_ASSOC);
       $msgRemove= $row;
    } else {
       $msgRemove= "No Data Found"; 
    }
   }else{
     $msgRemove= mysqli_error($db);
   }
   }
   return $msgRemove;
   }




    $columnss= ['username'];
  $fetchData2 = fetch_data2($db, $tableName2, $columnss);


  function fetch_data2($db, $tableName2, $columnss){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columnss) || !is_array($columnss)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableName2)){
      $msg= "Table Name is empty";
   }else{
   $columnName = implode(", ", $columnss);
   $Department = $_SESSION['userDept'];
   $query = "SELECT * FROM `users` WHERE `userlevel` = 'PIC'";
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
    $dateToPass = "";
    $dateToPass1 = "";
    $dateToPass2 = "";

    $picfocus = "false";
    $taskfocus = "false";
    $sectionfocus= "focus";

    $editTaskVar = "0";
    
$dateNow = date('Y-m-d');

    $month = date("F");
    $year = date("Y");
    $today = date("F j, Y"); 
    $date_string = date('Y-m-d');


    if(isset($_POST['removeAdminBtn'])){
$adminUserId = $_POST['usernameAdmin'];

$sqlRemoveAdmin = "DELETE FROM `users` WHERE userid = '$adminUserId'";
mysqli_query($con, $sqlRemoveAdmin);
$sqlRemoveAdmin2 = "DELETE FROM `admin` WHERE userid = '$adminUserId'";
mysqli_query($con, $sqlRemoveAdmin2);
    }

    if(isset($_POST['AddAdmin'])){
     
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

              $fnameAdmin="";
              $adminUserId="";
              $sqlSelectUserInfo = "Select * FROM users WHERE username = '$username'";
              $resultUserInfo = mysqli_query($con, $sqlSelectUserInfo);
              while($userRow = mysqli_fetch_assoc($resultUserInfo)){
        
                $fnameAdmin= $userRow['username'];
                $adminUserId= $userRow['userid'];
            }
        
              $sqlinsert = "INSERT INTO `admin`(`adminid`, `userid`, `name`) VALUES ('','$adminUserId','$fnameAdmin')";
              mysqli_query($con, $sqlinsert);
              ?><script>
             Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Admin Registered',
  showConfirmButton: false,
  timer: 1500
})
          //   footer: '<a href="">Why do I have this issue?</a>'
           </script><?php 
    
          
          }
          else{
            ?><script>
            Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Password does not match!',
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

    if(isset($_POST['UpdateTaskbtn'])){

      $userName3 = $_POST['username'];

      // $b = 0;
      $selectUserID = "SELECT `userid` FROM `users` WHERE `username` = '$userName3';";
      $resultUserId = mysqli_query($con, $selectUserID);
      $resultUserId1;
      if (mysqli_num_rows($resultUserId) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($resultUserId)) {
           
            $resultUserId1 = $row["userid"];
          }
      // echo '<script>console.log("TEST: '.$resultUserId.'")</script>';
      }


      $userTASKid = $_POST['containerOfTaskId'];
      $userTaskName = $_POST['tasknamemodal'];
      $userTaskCategory = $_POST['taskCategory1'];
      $userTaskType = $_POST['taskType1'];
      $userTaskArea = $_POST['taskArea1'];


      $sqlupdate = "UPDATE `usertask` SET `userid`='$resultUserId1',`username`='$userName3', `taskName`='$userTaskName',`taskCategory`='$userTaskCategory',`taskArea`='$userTaskArea',`taskType`='$userTaskType' WHERE usertaskID = '$userTASKid'";
      mysqli_query($con, $sqlupdate);
      ?><script>
      Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: 'Update Done.',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 

    }
    if(isset($_POST['DeleteTaskbtn'])){
      $userTASKid = $_POST['containerOfTaskId'];
      $sqldelete = "DELETE FROM `usertask` WHERE usertaskID = '$userTASKid';";
      mysqli_query($con, $sqldelete);

      ?><script>
      Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: 'Deleted.',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 

    }
    if(isset($_POST['submitdate'])){
   $datePicker = $_POST['datepicker'];

    $month = date('F', strtotime($datePicker));
    $year = date('Y', strtotime($datePicker));
    $today = date('F j, Y', strtotime($datePicker));

    $datePickerget = $datePicker;
    $date_string= date('Y-m-d', strtotime($datePickerget));
    
  $dateToPass = date('Y-m-d', strtotime($datePicker));
  $taskfocus = "true";

    }
    $month1 = date("F");
    $year1 = date("Y");
    $today1 = date("F j, Y"); 
    $date_string1 = date('Y-m-d');
    

    if(isset($_POST['submitdate1'])){
   $datePicker1 = $_POST['datepicker1'];
    // echo date('F', strtotime($datePicker));
    // echo date('Y', strtotime($datePicker));
    $month1 = date('F', strtotime($datePicker1));
    $year1 = date('Y', strtotime($datePicker1));
    $today1 = date('F j, Y', strtotime($datePicker1));
    // echo $month;
    // echo $year;
    $datePickerget1 = $datePicker1;
    $date_string1= date('Y-m-d', strtotime($datePickerget1));
  // echo("<script>  $('#myTab li:eq(1) a').tab('show');</script>");

  $picfocus = "true";
  $dateToPass1 = date('Y-m-d', strtotime($datePicker1));
  // echo("<script>console.log('DATEEEE: ". date() . "');</script>");


    //document.getElementID('pic-tab').click();
  
  
    
    

    //     echo date('Y-m-d', strtotime($datePicker));
    // echo date('Y', strtotime($datePicker));

    }


    $month2 = date("F");
    $year2 = date("Y");
    $today2 = date("F j, Y"); 
    $date_string2 = date('Y-m-d');
    if(isset($_POST['submitdate2'])){
   $datePicker2 = $_POST['datepicker2'];
    // echo date('F', strtotime($datePicker));
    // echo date('Y', strtotime($datePicker));
    $month2 = date('F', strtotime($datePicker2));
    $year2 = date('Y', strtotime($datePicker2));
    $today2 = date('F j, Y', strtotime($datePicker2));
    // echo $month;
    // echo $year;
    $datePickerget2 = $datePicker2;
    $date_string2= date('Y-m-d', strtotime($datePickerget2));
    
    $sectionfocus = "true";

  $dateToPass2 = date('Y-m-d', strtotime($datePicker2));

    //     echo date('Y-m-d', strtotime($datePicker));
    // echo date('Y', strtotime($datePicker));

    }

    // $_SESSION['username'] = $username;
    // echo "User: " .$_SESSION['username']. "."  ;
    // echo "<script>console.log('$_SESSION['username']')</script>";
    echo("<script>console.log('USER: " .$_SESSION['username'] . "');</script>");
    echo("<script>console.log('USER: " .$_SESSION['userlevel'] . "');</script>");
    // echo("<script>console.log('as,fjhaekjlh');</script>");
    // $today = date("F j, Y"); 
    // $date_string= date("Y-m-d");
 echo("<script>console.log('Week: " .weekOfMonth('2022-04-10') . "');</script>");
 
    $username =  $_SESSION['username'];
    echo("<script>console.log('USER: " .$username . "');</script>");

    $columns= ['usertaskID', 'taskName','taskCategory','taskType', 'taskArea'];
    $fetchData = fetch_data($db, $tableName, $columns, $username);

    function fetch_data($db, $tableName, $columns, $username){
      if(empty($db)){
       $msg= "Database connection error";
      }elseif (empty($columns) || !is_array($columns)) {
       $msg="columns Name must be defined in an indexed array";
      }elseif(empty($tableName)){
        $msg= "Table Name is empty";
     }else{
     $columnName = implode(", ", $columns);
    //  $Department = $_SESSION['userDept'];
     $query = "SELECT * FROM `usertask` ORDER BY taskCategory ASC;";
    //  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
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




     $columnsUser= ['usertaskID', 'taskName','taskCategory','taskType'];
     $fetchDataUT = fetchDataUT($db, $tableName, $columnsUser, $username);
 
     function fetchDataUT($db, $tableName, $columnsUser, $username){
       if(empty($db)){
        $msg= "Database connection error";
       }elseif (empty($columnsUser) || !is_array($columnsUser)) {
        $msg="columns Name must be defined in an indexed array";
       }elseif(empty($tableName)){
         $msg= "Table Name is empty";
      }else{
      $columnName = implode(", ", $columnsUser);
      $Department = $_SESSION['userDept'];
      $query = "SELECT * FROM `users` WHERE `userlevel` = 'PIC';";
     //  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
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


      $columnsUser2= ['usertaskID', 'taskName','taskCategory','taskType'];
     $fetchDataUT2 = fetchDataUT2($db, $tableName, $columnsUser2, $username);
 
     function fetchDataUT2($db, $tableName, $columnsUser2, $username){
       if(empty($db)){
        $msg= "Database connection error";
       }elseif (empty($columnsUser2) || !is_array($columnsUser2)) {
        $msg="columns Name must be defined in an indexed array";
       }elseif(empty($tableName)){
         $msg= "Table Name is empty";
      }else{
      $columnName = implode(", ", $columnsUser2);
      $Department = $_SESSION['userDept'];
      $query = "SELECT * FROM `users` WHERE `userlevel` = 'PIC';";
     //  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
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
      


     function weekOfMonth($qDate) {
    $dt = strtotime($qDate);
    $day  = date('j',$dt);
    $month = date('m',$dt);
    $year = date('Y',$dt);
    $totalDays = date('t',$dt);
    $weekCnt = 1;
    $retWeek = 0;
    for($i=1;$i<=$totalDays;$i++) {
        $curDay = date("N", mktime(0,0,0,$month,$i,$year));
        if($curDay==7) {
            if($i==$day) {
                $retWeek = $weekCnt+1;
            }
            $weekCnt++;
        } else {
            if($i==$day) {
                $retWeek = $weekCnt;
            }
        }
    }
    return $retWeek;
}

?>
      <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#"> <img src="design_files/images/GloryPhLogo.jpg" alt="..." height="40">&nbsp;Task Monitoring App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
             data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="dailyAdmin.php">Daily</a>
                </li>
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
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
                    <a class="dropdown-item" id="btn-addAdmin" href="./signup.php">Register User</a>
                    <a class="dropdown-item" id="btn-addAdmin" href="./addTaskAdmin.php">Add Task</a>



                    <?php if($_SESSION['admin'] == "TRUE"){?>

                <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalAdmin'>Add Admin</a> 
                   <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalRemoveAdmin'>Remove Admin</a>  
                   
                      <?php } ?>
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalAdmin'>Add Admin</a> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalRemoveAdmin'>Remove Admin</a> -->
                    <a class="dropdown-item" id="btn-logout" href="./logout.php">Logout</a>

                    
                   
                  </div>
                </li>
                
              </ul>
            </div>
          </nav>
        </div>
        <div class="modal fade" id="modalAdminEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div  class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
        <form action="admin.php" method = "POST" style="width: 100%; padding: 0; border: 0;">
        <input type="text" id="containerOfTaskId" name="containerOfTaskId" style="display: none">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">PIC</label>
            <div class="col-sm-8">
            <select  <?php if($editTaskVar == "0"){ echo "disabled"; } ?> name="username" id="usernameSelectmodal" class=" form-control form-select form-select-sm"
                                 style="padding-left:10px;">
                                 <option value="" disabled selected>Select User Name</option>
                                 <!-- <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option> -->
                                 <?php
                                  if(is_array($fetchData2)){      
                                
                                  foreach($fetchData2 as $data){
                                  ?>
                                 <option value="<?php echo $data['username']??''; ?>"><?php echo $data['username']??''; ?></option>
                                 <?php
                            }}else{ ?>
                            
                              <option colspan="8">
                          <?php echo $fetchData2; ?>
                        </option>
                          
                          <?php
    }?>
                                </select>
                    </div>
                    </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Task Name</label>
            <div class="col-sm-8">
              <input  <?php if($editTaskVar == "0"){ echo "disabled"; } ?> type="text" class="form-control" id="tasknamemodal" name="tasknamemodal">
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Area</label>
            <div class="col-sm-8">
          <select <?php if($editTaskVar == "0"){ echo "disabled"; } ?>  name="taskArea1" id="taskAreamodal" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Area</option>
                                    <option value="All">All</option>
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
                    </div>
           <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Category</label>
                  <div class="col-sm-8">
                  <select  <?php if($editTaskVar == "0"){ echo "disabled"; } ?>  name="taskCategory1" id="taskCategorymodal" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="Network">Network</option>
                                    <option value="Server">Server</option>
                                    <option value="VM">VM</option>
                                    <option value="Storage">Storage</option>
                                    <option value="Others">Others</option>  
                                </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Type</label>
                  <div class="col-sm-8">
                  <select   <?php if($editTaskVar == "0"){ echo "disabled"; } ?> name="taskType1" id="taskTypemodal" class=" form-control form-select form-select-sm" style="padding-left:10px;">
                                    <option value="" disabled selected>Please Select</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                              

                                </select>
                  </div>
                </div>

  <!-- document.getElementById('modalNumberofDays').value=parseInt(noOfdays) -->
  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button"  id ="EditTaskBTN" onclick="EditTask()" class="btn btn-success">Edit</button>
                <button type="submit" id="UpdateTaskbtnSubmit" name="UpdateTaskbtn" style="display: none">Update</button>
                <button type="button" id="UpdateTaskbtn"  onclick="checkTextBox()" class="btn btn-info" disabled >Update</button>

                <button type="submit" name="DeleteTaskbtn" class="btn btn-danger" >Delete</button>

            
               </div>
                
        </form>
      </div>
              
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalRemoveAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Remove Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="admin.php" method = "POST"  id="removeAdminform" style="width: 100%; padding: 10px; border: 0;" >
                  <div class="form-group">
                    <ul id="adminList">
                      <!-- <li>CEdrick</li>
                      <li>CEdrick</li>
                      <li>CEdrick</li> -->
  
                    </ul>
                  </div>
                  <div class="form-group">
                    <label  for="message-text" class="col-form-label">Choose admin</label>
                   
                      <select name="usernameAdmin" id="usernameSelect" class=" form-control form-select form-select-sm"
                                 style="padding-left:10px;">
                                 <option value="" disabled selected>Select User Name</option>
                                 <!-- <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option> -->
                                 <?php
                                  if(is_array($fetchDataRemove)){      
                                
                                  foreach($fetchDataRemove as $data){
                                  ?>
                                 <option value="<?php echo $data['userid']??''; ?>"><?php echo $data['f_name']??''; ?></option>
                                 <?php
                            }}else{ ?>
                            
                              <option colspan="8">
                          <?php echo $fetchDataRemove; ?>
                        </option>
                          
                          <?php
    }?>
                                </select>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="removeAdminBtn" class="btn btn-primary">Remove</button>
            
               </div>
               </form>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="admin.php" method = "POST" id="passwordform" style="width: 100%; padding: 10px; border: 0;" >
                  <div class="form-group">
                    <ul id="adminList2">
                      <!-- <li>CEdrick</li>
                      <li>CEdrick</li>
                      <li>CEdrick</li> -->
  
                    </ul>
                  </div>      
                  <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" name="fname" class="form-control form-control-sm" id="colFormLabelSm" style="width:100%; padding: 10px;" placeholder="First Name" >
                        </div>
                        <div class="col-sm-5">
                            <input type="text"  name="mname" class="form-control form-control-sm" id="colFormLabelSm2" style="width:100%;  padding: 10px;" placeholder="M.I.">
                        </div>
                        <div class="col-sm-10" style="margin-top: 10px;">
                            <input type="text"  name="lname" class="form-control form-control-sm" id="colFormLabelSm3" style="width:100%;  padding: 10px;" placeholder="Last Name">
                        </div>
                        <!-- <div class="col-sm-10"  style="margin-top: 10px;">
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
                        </div> -->
                    </div>
                    <!-- <div class="col-sm-12"  >
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
                    </div> -->
                <div class="form-wrapper" >
                    <input  name="email" id="email"  placeholder="username" class="form-control" readonly="readonly" 
  onfocus="if (this.hasAttribute('readonly')) {this.removeAttribute('readonly');}"
  onblur="if (!this.hasAttribute('readonly')) {this.setAttribute('readonly','readonly')};"
onkeyup="checkinputs()">
                    
                </div>  
                <div class="form-wrapper" style="margin-top: 10px;">
                    <input name="password" id="password" type="password" placeholder="Password" class="form-control" style="padding: 5px"readonly="readonly" 
  onfocus="if (this.hasAttribute('readonly')) {this.removeAttribute('readonly');}"
  onblur="if (!this.hasAttribute('readonly')) {this.setAttribute('readonly','readonly')};"onkeyup="checkinputs()">
              
                </div>   
                <div class="form-wrapper" style="margin-top: 10px;">
                    <input name="conpass" id="confirmPassword" type="password" placeholder="Confirm Password" class="form-control" style="padding: 5px" readonly="readonly" 
  onfocus="if (this.hasAttribute('readonly')) {this.removeAttribute('readonly');}"
  onblur="if (!this.hasAttribute('readonly')) {this.setAttribute('readonly','readonly')};"onkeyup="checkinputs()">
  
                </div> 
                  
                
              </div>
              <div class="modal-footer" style="margin-top: 10px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="AddAdmin" name="AddAdmin" class="btn btn-info" >Add</button>
            
               </div>
            </div>
          </div>
        </div>
        </form>
        <div class="parent" style= "max-height: 100%; height: 100%">
          <div class="wrapper" style= "max-height: 100%; height: 100%">
         
          <div class="row" style= "margin-right: 0px; max-height: 100%; height: 100% ">
          <div class="col">
            <h3 style=" margin: 20px">  <i style="font-size: 30px;" class="fas fa-user"></i>  <?php echo $_SESSION['f_name'] ?> <?php echo $_SESSION['l_name'] ?>
             <span  class="float-right"> <?php echo $_SESSION['userlevel'] ?> </span>  
            </h3>
          </div>
          <div class="col">
            <h3 style=" margin: 20px" class="float-right"> <?php echo $today ?> Week <?php echo weekOfMonth($date_string) ?></h3>
          </div>

<div class="container" style="height: 100%; background-color: none; margin: 0 auto" >
<div class="d-flex justify-content-start col-sm-6" style="background-color: none; padding-left: 0px; margin-left: 30px; width: 100%; max-width: 100% "> 
<ul class="nav nav-pills mb-3 d-flex justify-content-start" id="myTab" role="tablist" style="height: fit-content">
  <li class="nav-item">
    <a class="nav-link active" id="task-tab" data-toggle="tab" href="#task" role="tab" aria-controls="task" aria-selected="true">Task</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" id="pic-tab" data-toggle="tab" href="#PIC" role="tab" aria-controls="PIC" aria-selected="false">Members Progress</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="dept-tab" data-toggle="tab" href="#Dept" role="tab" aria-controls="Dept" aria-selected="false">Section's Progress</a>
  </li>
</ul>
                    </div>
                    <div class="tab-content" id="myTabContent" style="height: 100%; margin: 30px; margin-top: 0px ">
<div class="tab-pane fade show active" id="task" style="height: 90%; background-color: none" role="tabpanel" aria-labelledby="task-tab">

<div class="container p-30 " id="TableListOfMembers";  style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
<div class="ms-1 shadow row" >
            <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Task</h3> 
                        </div>
                        <div class="col-sm-4"  style="padding: 0;">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="admin.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 20px">Date</label>
            <input type="date" id="datepicker" name="datepicker" onchange="filterMonth();">
            <input type="submit" name="submitdate"  value = "Submit">
            </form>
           
        </div></div>
        
                        <div class="col-sm-7 add_flex"  style="padding: 0">
                        <div class="col-sm-6" style="padding: 0" >
                        <fieldset class="row mb-3" style="margin-top: 25px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding: 0px">
                                   
                                    <div class="form-check form-check-inline" style="margin-left: 10px; ">
                                        <input class="form-check-input"  type="radio" name="checkDone" id="checkDone" onclick="FilterSched();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Monthly
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDone" id="checkDone" onclick="FilterSched();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Daily
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDone" id="checkDone" onclick="FilterSched();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Weekly
                                            </label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDone" id="checkDone" checked onclick="FilterSched();">
                                            <label class="form-check-label" for="checkPIC">
                                             All
                                            </label>
                                    </div>
                                   
                                  
                             </div>
                        </fieldset>
                    </div>
                            <div class="form-group searchInput">
                                <select class="custom-select" id="inputGroupSelect01" onchange="getSelectValue();">
                                    <option  disabled selected hidden>Search by</option>

                                    <option value="1">Area</option>
                                    <option value="2">Task Name</option>
                                    <option value="4">Type</option>
                                    <option value="3">In charge</option>
                                    <option value="0">Category</option>
                                    
                                  </select>
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterbox" placeholder=" " >
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                    <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 
                        <table class="table table-striped table-hover" style="width:100%;" id="filtertable" class="table datacust-datatable Table ">
                            <thead  class="thead-dark" style="position: sticky;top: 0">
                                <tr>
                                    <th style="width:10%;">Category</th>
                                    <th style="min-width:8%;">Area</th>
                                    <th style="width:10%;" >Task Name</th>
                                    <th style="width:8%;"  >In charge</th>
                                    <th style="width:8%;"  >Type</th>
                                    <th style="width:9%;" >W1</th>
                                    <th style="width:9%;" >W2</th>
                                    <th style="width:9%;" >W3</th>
                                    <th style="width:9%;" >W4</th>
                                    <th style="width:9%;" >W5</th>
                                    <th style="width:9%;" >W6</th>

                                    
                                </tr>
                            </thead>
                            <tbody id="TaskTable">
                            <?php
                            $color1 = "#f9f9f9;";
                            $color2 = "white";
                            $color = "";
                                  if(is_array($fetchData)){      
                                    $sn=1;
                                  foreach($fetchData as $data){
                                    if($sn % 2 == 0){
                                      $color = $color1;
                                    }
                                    else{
                                      $color = $color2;

                                    }

                                    $taskname = $data['taskName'];
                                    $taskCategory = $data['taskCategory'];
                                    $taskType = $data['taskType'];
                                    $userTaskID = $data['usertaskID'];
                                    $taskArea = $data['taskArea'];
                                    $taskUser = $data['username'];


                      echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                            ?>
                             <tr onclick= "clickpassdata('<?php echo $taskUser?>','<?php echo $taskArea?>','<?php echo $userTaskID?>', '<?php echo $taskname?>','<?php echo $taskCategory?>', '<?php echo $taskType?>' )" data-toggle='modal' data-target='#modalAdminEdit'>
                             
                                <td><?php echo $data['taskCategory']??''; ?></td>
                                <td><?php echo $data['taskArea']??''; ?></td>
                                <td><?php echo $data['taskName']??''; ?></td>
                                <td><?php $fname= $data['username'];    $sql1 = "SELECT f_name FROM `users` WHERE username = '$fname';";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
        while($userRow = mysqli_fetch_assoc($result)){
         $firstname = $userRow['f_name'];
      } echo  $firstname; ?></td>
                                <td><?php echo $data['taskType']; ?></td>
                                <td><?php
                                   $taskID = $data['usertaskID'];
                                   $taskType = $data['taskType'];
                                   if($taskType == "daily"){
                                    //  echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");

                                      // $datePicker = $_POST['datepicker'];
                                      // $month= date('F', strtotime($datePicker));
                                      // $year =date('Y', strtotime($datePicker));



                                      $selectUserTask1 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week 1' ORDER BY 'FinishedTaskID' DESC LIMIT 1 ";

                                         // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                         $result1 = mysqli_query($con, $selectUserTask1);
                                         $weekNumber = '';
                                         while($userRow = mysqli_fetch_assoc($result1)){
                                     
                                           $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $date = $userRow['Date'];

                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                        //  echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                         
                                               }
                                               if ($weekNumber == "week 1" ){
     
                                                $weeknumber = $weekNumber;
                                                  echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // echo("<script>console.log('ok');</script>");
          
                                                   }
                                              //  //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }
                                   else{
                                     //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");
     
                                         $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year';";
                                         // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                         $result = mysqli_query($con, $selectUserTask);
                                         $weekNumber = '';
                                         while($userRow = mysqli_fetch_assoc($result)){
                                     
                                           $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                               }
                                               if ($weekNumber == "week 1" ){
     
                                                $weeknumber = $weekNumber;
                                                  echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // //echo("<script>console.log('ok');</script>");
          
                                                   }
                                               //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }                       
                                   
                                ?></td>
                                <td><?php
                                   $taskID = $data['usertaskID'];
                                   $taskType = $data['taskType'];
                                   if($taskType == "daily"){
                                     //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");
     
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week 2' ORDER BY 'FinishedTaskID' DESC LIMIT 1 ";
                                         // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                         $result = mysqli_query($con, $selectUserTask);
                                         $weekNumber = '';
                                         while($userRow = mysqli_fetch_assoc($result)){
                                     
                                           $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                        
                                               }
                                               if ($weekNumber == "week 2" ){
     
                                                $weeknumber = $weekNumber;
                                                  echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // echo("<script>console.log('ok');</script>");
          
                                                   }
                                               //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }
                                   else{
                                     //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                     //$month = date("F");
                                     //$year = date("Y");
     
                                         $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year';";
                                         // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                         $result = mysqli_query($con, $selectUserTask);
                                         $weekNumber = '';
                                         while($userRow = mysqli_fetch_assoc($result)){
                                     
                                           $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                        
                                               }
                                               if ($weekNumber == "week 2" ){
     
                                                $weeknumber = $weekNumber;
                                                   echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // echo("<script>console.log('ok');</script>");
          
                                                   }
                                               //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }                       
                                   
                                   ?></td>
                              <td><?php
                                 $taskID = $data['usertaskID'];
                                 $taskType = $data['taskType'];
                                 if($taskType == "daily"){
                                   //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                   //$month = date("F");
                                   //$year = date("Y");
   
                                   $selectUserTask3 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week 3' ORDER BY 'FinishedTaskID' DESC LIMIT 1 ";
                                       // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                       $result3 = mysqli_query($con, $selectUserTask3);
                                       $weekNumber3 = '';
                                       while($userRow = mysqli_fetch_assoc($result3)){
                                   
                                         $weekNumber3 = $userRow['week'];
                                         $fileloc =  $userRow['attachments'];
                                         $time = $userRow['timestamp'];
                                         $finishedtaskID = $userRow['FinishedTaskID'];
                                         $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                       //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       if ($weekNumber3 == "week 3" ){
   
                                              $weeknumber = $weekNumber3;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo("<script>console.log('ok');</script>");
        
                                                 }
                                             }
                                            
                                             //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                 }
                                 else{
                                   //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                   //$month = date("F");
                                   //$year = date("Y");
   
                                       $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year';";
                                       // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                       $result = mysqli_query($con, $selectUserTask);
                                       $weekNumber = '';
                                       while($userRow = mysqli_fetch_assoc($result)){
                                   
                                         $weekNumber = $userRow['week'];
                                         $fileloc =  $userRow['attachments'];
                                         $time = $userRow['timestamp'];
                                         $finishedtaskID = $userRow['FinishedTaskID'];
                                         $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                       //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                             }

                                             if ($weekNumber == "week 3" ){
   
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo("<script>console.log('ok');</script>");
        
                                                 }
                                             //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                 }                       
                                 
                              ?></td>

                          <td><?php
                                 $taskID = $data['usertaskID'];
                                 $taskType = $data['taskType'];
                                 if($taskType == "daily"){
                                   //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                   //$month = date("F");
                                   //$year = date("Y");
   
                                   $selectUserTask4 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week 4' ORDER BY 'FinishedTaskID' DESC LIMIT 1 ";

                                       // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                       $result4 = mysqli_query($con, $selectUserTask4);
                                       $weekNumber = '';
                                       while($userRow = mysqli_fetch_assoc($result4)){
                                   
                                         $weekNumber = $userRow['week'];
                                         $fileloc =  $userRow['attachments'];
                                         $time = $userRow['timestamp'];
                                         $finishedtaskID = $userRow['FinishedTaskID'];
                                         $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                       //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                             }
                                             if ($weekNumber == "week 4" ){
   
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo("<script>console.log('ok');</script>");
        
                                                 }
                                             //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                 }
                                 else{
                                   //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                   //$month = date("F");
                                   //$year = date("Y");
   
                                       $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year';";
                                       // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                       $result = mysqli_query($con, $selectUserTask);
                                       $weekNumber = '';
                                       while($userRow = mysqli_fetch_assoc($result)){
                                   
                                         $weekNumber = $userRow['week'];
                                         $fileloc =  $userRow['attachments'];
                                         $time = $userRow['timestamp'];
                                         $finishedtaskID = $userRow['FinishedTaskID'];
                                         $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                       //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                             }
                                             if ($weekNumber == "week 4" ){
   
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo("<script>console.log('ok');</script>");
        
                                                 }
                                             //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                 }                       
                                 
                            ?></td>

                          <td><?php
                                $taskID = $data['usertaskID'];
                                $taskType = $data['taskType'];
                                if($taskType == "daily"){
                                  //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                  //$month = date("F");
                                  //$year = date("Y");
  
                                  $selectUserTask5 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week 5' ORDER BY 'FinishedTaskID' DESC LIMIT 1 ";

                                      // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                      $result5 = mysqli_query($con, $selectUserTask5);
                                      $weekNumber = '';
                                      while($userRow = mysqli_fetch_assoc($result5)){
                                  
                                        $weekNumber = $userRow['week'];
                                        $fileloc =  $userRow['attachments'];
                                        $time = $userRow['timestamp'];
                                        $finishedtaskID = $userRow['FinishedTaskID'];
                                        $date = $userRow['Date'];
                                        $dateN =  date('n-d', strtotime($date));
                                      //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                     
                                            }
                                            if ($weekNumber == "week 5" ){
  
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // //echo("<script>console.log('ok');</script>");
        
                                                 }
                                            //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                }
                                else{
                                  //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                  //$month = date("F");
                                  //$year = date("Y");
  
                                      $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year';";
                                      // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                      $result = mysqli_query($con, $selectUserTask);
                                      $weekNumber = '';
                                      while($userRow = mysqli_fetch_assoc($result)){
                                  
                                        $weekNumber = $userRow['week'];
                                        $fileloc =  $userRow['attachments'];
                                        $time = $userRow['timestamp'];
                                        $finishedtaskID = $userRow['FinishedTaskID'];
                                        $date = $userRow['Date'];

                                        $dateN =  date('n-d', strtotime($date));
                                      //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                     
                                            }
                                            if ($weekNumber == "week 5" ){
  
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // //echo("<script>console.log('ok');</script>");
        
                                                 }
                                            //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                }                       
                                
                                 ?></td>
<td><?php
                                $taskID = $data['usertaskID'];
                                $taskType = $data['taskType'];
                                if($taskType == "daily"){
                                  //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                  //$month = date("F");
                                  //$year = date("Y");
  
                                  $selectUserTask5 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week 6' ORDER BY 'FinishedTaskID' DESC LIMIT 1 ";

                                      // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                      $result5 = mysqli_query($con, $selectUserTask5);
                                      $weekNumber = '';
                                      while($userRow = mysqli_fetch_assoc($result5)){
                                  
                                        $weekNumber = $userRow['week'];
                                        $fileloc =  $userRow['attachments'];
                                        $time = $userRow['timestamp'];
                                        $finishedtaskID = $userRow['FinishedTaskID'];
                                        $date = $userRow['Date'];
                                        $dateN =  date('n-d', strtotime($date));
                                      //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                     
                                            }
                                            if ($weekNumber == "week 6" ){
  
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // //echo("<script>console.log('ok');</script>");
        
                                                 }
                                            //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                }
                                else{
                                  //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                  //$month = date("F");
                                  //$year = date("Y");
  
                                      $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year';";
                                      // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                      $result = mysqli_query($con, $selectUserTask);
                                      $weekNumber = '';
                                      while($userRow = mysqli_fetch_assoc($result)){
                                  
                                        $weekNumber = $userRow['week'];
                                        $fileloc =  $userRow['attachments'];
                                        $time = $userRow['timestamp'];
                                        $finishedtaskID = $userRow['FinishedTaskID'];
                                        $date = $userRow['Date'];

                                        $dateN =  date('n-d', strtotime($date));
                                      //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                     
                                            }
                                            if ($weekNumber == "week 6" ){
  
                                              $weeknumber = $weekNumber;
                                                echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // //echo("<script>console.log('ok');</script>");
        
                                                 }
                                            //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                }                       
                                
                                 ?></td>
                               
                              
                              
                             </tr>
                             <?php
                        $sn++; }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchData; ?>
                        </td>
                         </tr>
                          <?php
    }?>
                              
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="dashboard"style="height: 90%; background-color: none" role="tabpanel" aria-labelledby="profile-tab"> 
      <div class="chart_container" style="max-width: 350px">
                    <canvas id="myChart" ></canvas>
      </div>
    </div>
    <div class="tab-pane fade " id="PIC" style="height: 90%; background-color: none"role="tabpanel" aria-labelledby="pic-tab">
      <div class="container p-30" id="TableListOfMembers";  style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
      <div class="ms-1 shadow row" >
      <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Members Progress</h3> 
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="admin.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 20px">Date</label>
            <input type="date" id="datepicker1" name="datepicker1" onchange="filterMonth();">
            <input type="submit" name="submitdate1"  value = "Submit">
            </form>
           
        </div></div>
        <div class="col-sm-6" style="padding: 0" >
                        <fieldset class="row mb-3" style="margin-top: 25px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding: 0px">
                                   
                                    <div class="form-check form-check-inline" style="margin-left: 10px; ">
                                        <input class="form-check-input"  type="radio" name="ProgFilter" id="ProgFilter" onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Monthly
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Daily
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Weekly
                                            </label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" checked onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             All
                                            </label>
                                     </div>
                                     
                                   
                                  
                             </div>
                        </fieldset>
                    </div>
                    </div>
                    <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 
                        <table style="width:100%;" id="filtertable" class="table datacust-datatable Table ">
                            <thead  class="thead-dark">
                                <tr>
                                    <th style="width:30%;">Members</th>
                                    <th style="width:70%;" >Progress</th>
                                   

                                </tr>
                            </thead>
                            <tbody id="tblAll" style="display: null">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                    if(is_array($fetchDataUT)){      
                                      $sn=1;
                                    foreach($fetchDataUT as $data){
                                      if($sn % 2 == 0){
                                        $color = $color1;
                                      }
                                      else{
                                        $color = $color2;

                                      }

                            ?>
                                <tr>
                                <tr>
                                <td><?php echo $data['f_name'] ?> <?php echo $data['l_name'] ?></td>
                                  <td>
                                    
                                    <div class="progress">
                                    <?php
                                         $username = $data['username'];
                                        

                                        $selectUserTask = "SELECT * FROM usertask WHERE username = '$username' AND `taskType` != 'daily';";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                        $result = mysqli_query($con, $selectUserTask);
                                        $numOfTask = mysqli_num_rows($result);

                                        $selectUserTaskDaily = "SELECT * FROM usertask WHERE username = '$username' AND `taskType` = 'daily' ;";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                        $resultdaily = mysqli_query($con, $selectUserTaskDaily);
                                        $numOfTaskdaily = mysqli_num_rows($resultdaily);


                                          echo("<script>console.log('number of task: " .$numOfTask . "');</script>");
                                        
                                          $weekMonth1 = weekOfMonth($date_string1);
                                        $selectTaskeme = "SELECT * FROM finishedtask WHERE in_charge = '$username'  AND `month` = '$month1' AND `year` = '$year1' AND `week` = 'week $weekMonth1' AND `sched_Type` != 'daily';";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000

                                        $result2 = mysqli_query($con, $selectTaskeme);
                                        $numOfFinished = mysqli_num_rows($result2);

                                        // $today = date("F j, Y");
                                        $selectTaskdaiy = "SELECT * FROM finishedtask WHERE in_charge = '$username' AND `sched_Type` = 'daily' AND `Date` = ' $today1' ;";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000

                                        $resultdaily2 = mysqli_query($con, $selectTaskdaiy);
                                        $numOfFinisheddaily = mysqli_num_rows($resultdaily2);

                                        echo("<script>console.log('number of finished daily: " .$numOfFinisheddaily . "');</script>");
                                        
                                        // if($numOfFinisheddaily == 0){
                                        //   $percent = ($numOfFinished /  $numOfTask)* 100;
                                        //   echo("<script>console.log('qoutient1234: " .$percent . "');</script>");
                                        // }
                                        // else{

                                          $divident1 = $numOfFinished + $numOfFinisheddaily;
                                          $divident2 = $numOfTask + $numOfTaskdaily;
                                                  if($divident1 != 0 || $divident2 != 0){
                                                    $percent = ($divident1 /  $divident2)* 100;
                                                  }
                                                    else{
                                                      $percent = 0;
                                                    }  
                                          // $percent = (($numOfFinished + $numOfFinisheddaily) /  ($numOfTask + $numOfTaskdaily))* 100;
                                          echo("<script>console.log('qoutient242: " .$percent . "');</script>");
                                        // }
                                        // $percent = ($numOfFinished /  $numOfTask)* 100;
                                        // echo("<script>console.log('qoutient: " .$percent . "');</script>");

                                        

                                        ?>
                                      <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                        style="width:<?php echo round($percent).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <?php echo round($percent).'%'; ?> 
                                       
                                      </div>
                                    </div>
                                  </td>

                                  </tr>
                             <?php
                           }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataUT; ?>
                        </td>
                            </tr>
                          <?php
    }?>
                            </tbody>




                            <tbody id="tblMonthly" style="display: none">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                    if(is_array($fetchDataUT)){      
                                      $sn=1;
                                    foreach($fetchDataUT as $data){
                                      if($sn % 2 == 0){
                                        $color = $color1;
                                      }
                                      else{
                                        $color = $color2;

                                      }

                            ?>
                               
                                <tr>
                                <td><?php echo $data['f_name'] ?> <?php echo $data['l_name'] ?></td>
                                <td>
                
                                        <div class="progress">
                                        <?php
                                            $usernameM = $data['username'];
                                            
                                            $DepartmentM = $_SESSION['userDept'];
                                            $selectUserTaskM = "SELECT * FROM usertask WHERE username = '$usernameM'   AND `taskType` = 'monthly';";

                                            $resultM = mysqli_query($con, $selectUserTaskM);
                                            $numOfTaskM = mysqli_num_rows($resultM);




                                            
                                              $weekMonth = weekOfMonth($date_string1);
                                            $selectTaskemeM = "SELECT * FROM finishedtask WHERE in_charge = '$usernameM' AND `month` = '$month1' AND `year` = '$year1' AND `sched_Type` = 'monthly';";


                                            $result2M = mysqli_query($con, $selectTaskemeM);
                                            $numOfFinishedM = mysqli_num_rows($result2M);


                                             

                                            
                                        if($numOfFinishedM !=0 || $numOfTaskM !=0){
                                          $percentM = ($numOfFinishedM /  $numOfTaskM)* 100;
                                        }
                                        else{
                                          $percentM = 0;
                                        }

                                            ?>
                                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width:<?php echo round($percentM).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo round($percentM).'%'; ?> 
                                          
                                          </div>
                                        </div>
                                        </td>
                                

                                  </tr>
                             <?php
                           }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataUT; ?>
                        </td>
                            </tr>
                          <?php
    }?>
                            </tbody>

                            
                           
                            <tbody id="tblWeekly" style="display: none">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                    if(is_array($fetchDataUT)){      
                                      $sn=1;
                                    foreach($fetchDataUT as $data){
                                      if($sn % 2 == 0){
                                        $color = $color1;
                                      }
                                      else{
                                        $color = $color2;

                                      }

                            ?>
                               
                                <tr>
                                <td><?php echo $data['f_name'] ?> <?php echo $data['l_name'] ?></td>
                                <td>
                
                                        <div class="progress">
                                        <?php
                                            $usernameW = $data['username'];
                                            
                                            $DepartmentW = $_SESSION['userDept'];
                                            $selectUserTaskW = "SELECT * FROM usertask WHERE username = '$usernameW' AND `taskType` = 'weekly';";

                                            $resultW = mysqli_query($con, $selectUserTaskW);
                                            $numOfTaskW = mysqli_num_rows($resultW);




                                            
                                              $weekMonth = weekOfMonth($date_string1);
                                            $selectTaskemeW = "SELECT * FROM finishedtask WHERE in_charge = '$usernameW' AND `month` = '$month1' AND `year` = '$year1'AND `week` = 'week $weekMonth' AND `sched_Type` = 'weekly';";


                                            $result2W = mysqli_query($con, $selectTaskemeW);
                                            $numOfFinishedW = mysqli_num_rows($result2W);


                                             

                                              if($numOfFinishedW !=0 || $numOfTaskW !=0){
                                                $percentW = ($numOfFinishedW /  $numOfTaskW)* 100;
                                              }
                                              else{
                                                $percentW = 0;
                                              }
                                            

                                            ?>
                                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width:<?php echo round($percentW).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo round($percentW).'%'; ?> 
                                          
                                          </div>
                                        </div>
                                        </td>
                                

                                  </tr>
                             <?php
                           }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataUT; ?>
                        </td>
                            </tr>
                          <?php
    }?>
                            </tbody>
                            <tbody id="tblDaily" style="display: none">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                    if(is_array($fetchDataUT)){      
                                      $sn=1;
                                    foreach($fetchDataUT as $data){
                                      if($sn % 2 == 0){
                                        $color = $color1;
                                      }
                                      else{
                                        $color = $color2;

                                      }

                            ?>
                               
                                <tr>
                                <td><?php echo $data['f_name'] ?> <?php echo $data['l_name'] ?></td>
                                <td>
                
                                        <div class="progress">
                                        <?php
                                            $usernameW = $data['username'];
                                            
                                            $DepartmentW = $_SESSION['userDept'];
                                            $selectUserTaskW = "SELECT * FROM usertask WHERE username = '$usernameW'  AND `taskType` = 'daily';";

                                            $resultW = mysqli_query($con, $selectUserTaskW);
                                            $numOfTaskW = mysqli_num_rows($resultW);




                                            
                                              $weekMonthD = weekOfMonth($date_string1);
                                            $selectTaskemeW = "SELECT * FROM finishedtask WHERE in_charge = '$usernameW' AND `month` = '$month1' AND `year` = '$year1'AND `week` = 'week $weekMonthD' AND `sched_Type` = 'daily';";


                                            $result2W = mysqli_query($con, $selectTaskemeW);
                                            $numOfFinishedW = mysqli_num_rows($result2W);

                                        if($numOfFinishedW !=0 || $numOfTaskW !=0){
                                          $percentW = ($numOfFinishedW /  $numOfTaskW)* 100;
                                        }
                                        else{
                                          $percentW = 0;
                                        }
                                            

                                            

                                            ?>
                                          <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                            style="width:<?php echo round($percentW).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo round($percentW).'%'; ?> 
                                          
                                          </div>
                                        </div>
                                        </td>
                                

                                  </tr>
                             <?php
                           }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataUT; ?>
                        </td>
                            </tr>
                          <?php
    }?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="Dept" role="tabpanel" aria-labelledby="dept-tab">
      <div class="container p-30" id="TableListOfMembers";  style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
      <div class="ms-1 shadow row" >
      <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Section's Progress</h3> 
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="admin.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 20px">Date</label>
            <input type="date" id="datepicker2" name="datepicker2" onchange="filterMonth();">
            <input type="submit" name="submitdate2"  value = "Submit">
            </form>
           
        </div></div>
                        <div class="col-sm-6 add_flex">
                            <div class="form-group searchInput">
                                
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterbox" placeholder=" " >
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height: 580px;"> 
                        <table style="width:100%;" id="filtertable" class="table datacust-datatable Table ">
                            <thead  class="thead-dark">
                                <tr>
                                    <th style="width:30%;">Section</th>
                                    <th style="width:70%;" >Progress</th>
                                   

                                </tr>
                            </thead>
                            <tbody id="TaskTable1">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";

                              $departmentvar="";
                                    if(is_array($fetchDataUT2)){      
                                      $sn=1;

                                    foreach($fetchDataUT2 as $data){
                                      if($sn % 2 == 0){
                                        $color = $color1;
                                      }
                                      else{
                                        $color = $color2;

                                      }
                                      

                             if($data['department'] != $departmentvar){
                                      ?><tr>
                                 
                                      <td><?php echo $data['department'] ?></td>
                                        <td>
                                          
                                          <div class="progress">
                                          <?php
                                               $username = $data['username'];
                                                $dept = $data['department'];
      
                                              $selectUserTask = "SELECT * FROM usertask WHERE Department = '$dept' AND `taskType` != 'daily';";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                              $result = mysqli_query($con, $selectUserTask);
                                              $numOfTask = mysqli_num_rows($result);
                                              echo("<script>console.log('number of task: " .$numOfTask . "');</script>");
      
                                              $selectUserTaskDaily = "SELECT * FROM usertask WHERE Department = '$dept'  AND `taskType` = 'daily' ;";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                              $resultdaily = mysqli_query($con, $selectUserTaskDaily);
                                              $numOfTaskdaily = mysqli_num_rows($resultdaily);
      
      
                                              
                                                $weekMonth2= weekOfMonth($date_string2);
                                              $selectTaskeme = "SELECT * FROM finishedtask WHERE Department = '$dept' AND `month` = '$month2' AND `year` = '$year2' AND `week` = 'week $weekMonth2' AND `sched_Type` != 'daily';";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000
      
                                              $result2 = mysqli_query($con, $selectTaskeme);
                                              $numOfFinished = mysqli_num_rows($result2);
                                              echo("<script>console.log('number of finishedsdf: " .$numOfFinished . "');</script>");
      
                                              // $today = date("F j, Y");
                                              $selectTaskdaiy = "SELECT * FROM finishedtask WHERE Department = '$dept' AND `sched_Type` = 'daily' AND `Date` = ' $today2' ;";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000
      
                                              $resultdaily2 = mysqli_query($con, $selectTaskdaiy);
                                              $numOfFinisheddaily = mysqli_num_rows($resultdaily2);
      
                                              echo("<script>console.log('number of finished daily: " .$numOfFinisheddaily . "');</script>");
                                              
                                                $percents = (($numOfFinished + $numOfFinisheddaily) /  ($numOfTask + $numOfTaskdaily))* 100;
                                                echo("<script>console.log('qoutient242: " .$percents . "');</script>");
                                              
                                              // $percent = ($numOfFinished /  $numOfTask)* 100;
                                              // echo("<script>console.log('qoutient: " .$percent . "');</script>");
                                              
                                              
      
                                              ?>
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                              style="width:<?php echo round($percents).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                              <?php echo round($percents).'%'; ?> 
                                             
                                            </div>
                                          </div>
                                        </td>
      
                                        </tr>
                                <?php  } $departmentvar = $data['department']; ?>
                                
                             <?php
                           }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataUT; ?>
                        </td>
                            </tr>
                          <?php
    }?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>





    

      </div>
          </div> 
      
          <!-- <h1> </h1> -->
        
</div>
  
      <script>
        var userTaskId = "";
function clickpassdata(userNames,usertaskArea,userTaskId, taskname, taskCategory, taskType){
document.getElementById("usernameSelectmodal").value = userNames;
document.getElementById("tasknamemodal").value = taskname;
document.getElementById("taskCategorymodal").value = taskCategory;
document.getElementById("taskTypemodal").value = taskType;
document.getElementById("containerOfTaskId").value = userTaskID;
document.getElementById("taskAreamodal").value = usertaskArea;
userTaskId = userTaskId;
}
function PassTaskData(){

 
document.getElementById("tasknamemodal").value = false;
document.getElementById("taskCategorymodal").value = false;
document.getElementById("taskTypemodal").value = false;

}
function EditTask(){
document.getElementById("tasknamemodal").disabled = false;
document.getElementById("taskCategorymodal").disabled = false;
document.getElementById("taskTypemodal").disabled = false;
document.getElementById("UpdateTaskbtn").disabled = false;
document.getElementById("EditTaskBTN").disabled = true;
document.getElementById("taskAreamodal").disabled = false;
document.getElementById("usernameSelectmodal").disabled = false;





}
// Swal.fire({
//   title: 'Error!',
//   text: 'Do you want to continue',
//   icon: 'error',
//   confirmButtonText: 'Cool'
// })
function FilterSched(){

var types=document.getElementsByName('checkDone');

if(types[0].checked){
  let filterValue="monthly";
          var table = document.getElementById('TaskTable');
          let tr = table.querySelectorAll('tr');
          
          for(let index=0; index < tr.length;index++){
              let val = tr[index].getElementsByTagName('td')[4];
              if(val.innerHTML.indexOf(filterValue)> -1){
                  tr[index].style.display='';
      
              }
              else{
                  tr[index].style.display='none';
              }
          }
}
else if (types[1].checked){
  let filterValue="daily";
          var table = document.getElementById('TaskTable');
          let tr = table.querySelectorAll('tr');
          
          for(let index=0; index < tr.length;index++){
              let val = tr[index].getElementsByTagName('td')[4];
              if(val.innerHTML.indexOf(filterValue)> -1){
                  tr[index].style.display='';
      
              }
              else{
                  tr[index].style.display='none';
              }
          }
}
else if (types[2].checked){
  let filterValue="weekly";
          var table = document.getElementById('TaskTable');
          let tr = table.querySelectorAll('tr');
          
          for(let index=0; index < tr.length;index++){
              let val = tr[index].getElementsByTagName('td')[4];
              if(val.innerHTML.indexOf(filterValue)> -1){
                  tr[index].style.display='';
      
              }
              else{
                  tr[index].style.display='none';
              }
          }
}

else if (types[3].checked){
  let filterValue="";
          var table = document.getElementById('TaskTable');
          let tr = table.querySelectorAll('tr');
          
          for(let index=0; index < tr.length;index++){
              let val = tr[index].getElementsByTagName('td')[4];
              if(val.innerHTML.indexOf(filterValue)> -1){
                  tr[index].style.display='';
      
              }
              else{
                  tr[index].style.display='none';
              }
          }
}

}


        var dateNow = <?php echo json_encode("$dateNow"); ?>;

       document.getElementById("datepicker").value = dateNow;
       document.getElementById("datepicker1").value = dateNow;
       document.getElementById("datepicker2").value = dateNow;

      // document.querySelector("#datepicker1").valueAsDate = new Date("05-03-2022");



        var jsonDataPIC = <?php echo json_encode("$picfocus"); ?>;
        var jsonDataTask = <?php echo json_encode("$taskfocus"); ?>;
        var jsonDataSection = <?php echo json_encode("$sectionfocus"); ?>;

        var date = <?php echo json_encode("$dateToPass"); ?>;
        var date1 = <?php echo json_encode("$dateToPass1"); ?>;
        var date2 = <?php echo json_encode("$dateToPass2"); ?>;

console.log(jsonDataPIC);
        
    if(jsonDataPIC == "true"){
      document.getElementById("datepicker1").value = date1;


      $('#myTab li:eq(1) a').tab('show');

    }
    if(jsonDataTask == "true"){
      document.getElementById("datepicker").value = date;


      $('#myTab li:eq(0) a').tab('show');



    }
    if(jsonDataSection == "true"){
      document.getElementById("datepicker2").value = date2;


      $('#myTab li:eq(2) a').tab('show');



    }


//  $('#myTab li:eq(1) a').tab('show');
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['lbl1','lbl2','lbl3'],
        datasets: [
            {
                label: 'Points',
                backgroundColor: ['#28a13c','#aa2b2b','#2980b9'],
                data: ['50', '20','30']
            }
        ]
    },
    options: {
        cutoutPercentage : 80,
        animation: {
            animationScale: true
        }
    }
});




        let today = new Date().toISOString().substr(0, 10);
        // document.querySelector("#datepicker").valueAsDate = new Date();
        // document.querySelector("#datepicker1").valueAsDate = new Date();
        // document.querySelector("#datepicker2").valueAsDate = new Date();

        console.log(new Date())


        function getSelectValue()
{
    var e = document.getElementById("inputGroupSelect01");
  
    var text=e.options[e.selectedIndex].text;//get the selected option text
    if(text=='Task Name'){

        let filterInput = document.getElementById('filterbox');
        filterInput.addEventListener('keyup',function(){
            let filterValue=document.getElementById('filterbox').value;
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[2];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
            
        }
        
        );
        
    }
    
    else if (text=='Type'){

        let filterInput = document.getElementById('filterbox');
        filterInput.addEventListener('keyup',function(){
            let filterValue=document.getElementById('filterbox').value;
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[4];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
            
        }
        
        );
    }
    else if (text=='Category'){

let filterInput = document.getElementById('filterbox');
filterInput.addEventListener('keyup',function(){
    let filterValue=document.getElementById('filterbox').value;
    var table = document.getElementById('TaskTable');
    let tr = table.querySelectorAll('tr');
    
    for(let index=0; index < tr.length;index++){
        let val = tr[index].getElementsByTagName('td')[0];
        if(val.innerHTML.indexOf(filterValue)> -1){
            tr[index].style.display='';

        }
        else{
            tr[index].style.display='none';
        }
    }
    
}

);
}
else if (text=='In charge'){

let filterInput = document.getElementById('filterbox');
filterInput.addEventListener('keyup',function(){
    let filterValue=document.getElementById('filterbox').value;
    var table = document.getElementById('TaskTable');
    let tr = table.querySelectorAll('tr');
    
    for(let index=0; index < tr.length;index++){
        let val = tr[index].getElementsByTagName('td')[3];
        if(val.innerHTML.indexOf(filterValue)> -1){
            tr[index].style.display='';

        }
        else{
            tr[index].style.display='none';
        }
    }
    
}

);
}
else if (text=='Area'){

let filterInput = document.getElementById('filterbox');
filterInput.addEventListener('keyup',function(){
    let filterValue=document.getElementById('filterbox').value;
    var table = document.getElementById('TaskTable');
    let tr = table.querySelectorAll('tr');
    
    for(let index=0; index < tr.length;index++){
        let val = tr[index].getElementsByTagName('td')[1];
        if(val.innerHTML.indexOf(filterValue)> -1){
            tr[index].style.display='';

        }
        else{
            tr[index].style.display='none';
        }
    }
    
}

);
}

}
getSelectValue();

function checkTextBox(){

const username = document.getElementById("usernameSelectmodal");
const usertask = document.getElementById("tasknamemodal");
const taskcategory = document.getElementById("taskCategorymodal");
const tasktype = document.getElementById("taskTypemodal");
const taskArea = document.getElementById("taskAreamodal");

if(username.value != "" && usertask.value != "" && taskcategory.value != "" && tasktype.value != "" && taskArea.value != "" ){
  document.getElementById("UpdateTaskbtnSubmit").click();

}
else{
  window.alert("Form is incomplete. Please fill out all fields");
}

}


function FilterProgress(){

var types=document.getElementsByName('ProgFilter');

if(types[0].checked){


  var tdMonthly = document.getElementById("tblMonthly");
  var tdWeekly = document.getElementById("tblWeekly");
  var tdDaily = document.getElementById("tblDaily");
  var tdAll= document.getElementById("tblAll");



  tdMonthly.style.display = null;
  tdWeekly.style.display = 'none';
  tdDaily.style.display = 'none';
  tdAll.style.display = 'none';



  
}
else if (types[1].checked){
  
  var tdAll= document.getElementById("tblAll");
  var tdMonthly = document.getElementById("tblMonthly");
  var tdWeekly = document.getElementById("tblWeekly");
  var tdDaily = document.getElementById("tblDaily");

  tdWeekly.style.display = 'none';
  tdDaily.style.display = null;
  tdMonthly.style.display = 'none';
  tdAll.style.display = 'none';

}
else if (types[2].checked){
  
  var tdAll= document.getElementById("tblAll");
  var tdMonthly = document.getElementById("tblMonthly");
  var tdWeekly = document.getElementById("tblWeekly");
  var tdDaily = document.getElementById("tblDaily");

  tdDaily.style.display = 'none';
  tdWeekly.style.display = null;
  tdMonthly.style.display = 'none';
  tdAll.style.display = 'none';

}
else if (types[3].checked){

  var tdAll= document.getElementById("tblAll");
  var tdMonthly = document.getElementById("tblMonthly");
  var tdDaily = document.getElementById("tblDaily");
  var tdWeekly = document.getElementById("tblWeekly");

  tdAll.style.display = null;
  tdWeekly.style.display = 'none';
  tdMonthly.style.display = 'none';
  tdDaily.style.display = 'none';


}


}
        </script>
    </body>
</html>