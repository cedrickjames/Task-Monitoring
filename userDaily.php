<?php
  session_start();
  include ("./connection.php");
  $db= $con;
$tableName="usertask";
    if(!isset( $_SESSION['connected'])){
    
    
      header("location: signin.php");
        
      // 
    }


    $month = date("F");
    $year = date("Y");
    $today = date("F j, Y"); 
    $date_string = date('Y-m-d');
    if(isset($_POST['submitdate'])){
   $datePicker = $_POST['datepicker'];

    $month = date('F', strtotime($datePicker));
    $year = date('Y', strtotime($datePicker));
    $today = date('F j, Y', strtotime($datePicker));

    $datePickerget = $datePicker;
    $date_string= date('Y-m-d', strtotime($datePickerget));


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

    $columns= ['usertaskID', 'taskName','taskCategory','taskType'];
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
     $Department = $_SESSION['userDept'];
     $query = "SELECT * FROM `usertask` WHERE `username` = '$username' AND `taskType` = 'daily'  ORDER BY taskCategory ASC;";
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
if(isset($_POST['UpdateStatusName'])){
  $radioStatus=$_POST['radioStatus']; 
  $finishedTaskId = $_POST['finishedTaskID'];
  if($radioStatus=="4"){
    $sqlUpdateStatus = "UPDATE `finishedtask` SET `noOfDaysLate`='5', `score`='0.5', `isLate`= true,`isCheckedByLeader` = true WHERE `FinishedTaskID`='$finishedTaskId';";
    mysqli_query($con, $sqlUpdateStatus);
  
  }
  else{
    $sqlUpdateStatus = "UPDATE `finishedtask` SET `noOfDaysLate`='0', `score`='1', `isLate`= false, `isCheckedByLeader` = true WHERE `FinishedTaskID`='$finishedTaskId';";
    mysqli_query($con, $sqlUpdateStatus);
  
  }


}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1.0">

    <title>Main Page</title>
    <link rel="icon" type="image/x-icon" href="design_files/images/Task Monitoring Icon.ico">

    <!-- MATERIAL DESIGN ICONIC FONT -->
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

<!-- <script type="text/javascript" src="./js/node_modules/jquery/dist/jquery.slim.min.js"></script> -->

</head>
    <body style="background: #70e1f5;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ffd194, #70e1f5);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ffd194, #70e1f5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
      <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#"> <img src="design_files/images/GloryPhLogo.jpg" alt="..." height="40">&nbsp;Task Monitoring App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
             data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="userDaily.php">Daily</a>
                </li>
             
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li> -->
                
                
              </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="userDashBoard.php">Dash Board</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li> -->
                
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Option
                  </a>
                  
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown"  style="right: 0; left: auto;">
                  <a class="dropdown-item" id="btn-changePass" href="#" data-toggle='modal'
                      data-target='#changePassword'>Change Password</a>
                   <a class="dropdown-item" id="btn-logout" href="./logout.php">Logout</a>
                        <?php
                        if($_SESSION['admin'] == "TRUE"){?>

                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalAdmin'>Add Admin</a>
                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalRemoveAdmin'>Remove Admin</a>  -->
                   
                      <?php } ?>

                    
                   
                  </div>

                </li>
                
              </ul>
            </div>
          </nav>
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
                <form id="passwordform" style="width: 100%; padding: 10px; border: 0;" >
                  <div class="form-group">
                    <ul id="adminList">
                      <!-- <li>CEdrick</li>
                      <li>CEdrick</li>
                      <li>CEdrick</li> -->
  
                    </ul>
                  </div>
                  <div class="form-group">
                    <label  for="message-text" class="col-form-label">Enter email</label>
                      <input  type="text"class="form-control"   id="inputRemoveAdmin" >
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick =" RemoveAdmin();" class="btn btn-primary" data-dismiss="modal">Remove</button>
            
               </div>
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
                <form id="passwordform" style="width: 100%; padding: 10px; border: 0;" >
                  <div class="form-group">
                    <ul id="adminList2">
                      <!-- <li>CEdrick</li>
                      <li>CEdrick</li>
                      <li>CEdrick</li> -->
  
                    </ul>
                  </div>      
                  <div class="form-group">
                   
                    <label  for="message-text" class="col-form-label">Enter email</label>
                    <input  type="text"class="form-control"   id="inputAdmin" >
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick =" addAdmin();" class="btn btn-primary" data-dismiss="modal">Add</button>
            
               </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="reasonModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog"style="max-width: 700px; width: 600px" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                       <form action="daily.php" method = "POST" id="updateStatusForm" style="width: 100%; padding: 10px; border: 0;" >

                                              <div class="modal-body" >
                                                <input type="text" style="display: none" name="finishedTaskID" id="finishedID">
                                             
                                              

                                                <div class="form-group">
  <div class="normal-container">
	<div class="smile-rating-container">
		<div class="smile-rating-toggle-container">
			<div class="submit-rating">
				<input id="radioLate"  name="radioStatus" value="4" type="radio" disabled checked/> 
				<input id="radioOnTime" name="radioStatus" value="0" type="radio" disabled /> 
				<label for="radioLate" class="rating-label rating-label-meh">Late</label>
				<div class="smile-rating-toggle"></div>
				
				<div class="rating-eye rating-eye-left"></div>
				<div class="rating-eye rating-eye-right"></div>
				
				<div class="mouth rating-eye-bad-mouth"></div>
				
				<div class="toggle-rating-pill"></div>
				<label for="radioOnTime" class="rating-label rating-label-fun">On Time</label>
			</div>
		</div>
	</div>
</div>
  </div>
                                              
                                                <!-- <div class="col-sm-12"  >
                        <fieldset class="row mb-3" style="margin-top: 0px;  font-size: 22pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding-left: 10px">
                                    <div class="col-sm-3 form-check form-check-inline" style="margin-right: 10px">
                                        <input class="form-check-input" type="radio" name="radioStatus" id="radioLate" value="4" checked >
                                            <label class="form-check-label" for="radioLeader">
                                             Late
                                            </label>
                                     </div>
                                    <div class="form-check form-check-inline" style="margin-left: 10px">
                                        <input class="form-check-input" type="radio" name="radioStatus" id="radioOnTime" value="0" >
                                            <label class="form-check-label" for="radioPIC">
                                             On Time
                                            </label>
                                    </div>
                                  
                             </div>
                        </fieldset>
                    </div> -->
                                              <!-- <a type="button" id="Attachments" class="btn btn-outline-warning btn-lg btn-block">Change Status</a> -->
                                              <a type="button" id="Attachments" class="btn btn-outline-info btn-lg btn-block">See attachments</a>
                                              <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Date and Time Submitted</label>
                                                    <input class="form-control" name="dateSubmitted" id="dateSubmitted" disabled></input>
                                                  </div>
                                              <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Point</label>
                                                    <input class="form-control" name="pointReceived" id="pointReceived" disabled></input>
                                                  </div>  
                                              <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Reason</label>
                                                    <textarea class="form-control" name="reasonInputUpdate" id="reasonUpdate1" disabled></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Action</label>
                                                    <textarea class="form-control" name="actionInputUpdateLate" id="actionUpdate1" disabled></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                
                                                <!-- <button type="submit"  id="UpdateStatus" name="UpdateStatusName"class="btn btn-success">Update Status</button> -->
                                              </div>
                           
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
        <div class="parent" style= "max-height: 100%; height: 100%; ">
          <div class="wrapper" style= " max-height: 100%; height: 100% ;">
         
          <div class="row"style= "margin-right: 0px; max-height: 100%; height: 100%; background-color: none ">
          <div class="col">
            <h3 style=" margin: 20px">  <i style="font-size: 30px;" class="fas fa-user"></i>  <?php echo $_SESSION['f_name'] ?> <?php echo $_SESSION['l_name'] ?>
             <span  class="float-right"> <?php echo $_SESSION['userlevel'] ?> </span>  
            </h3>
          </div>
          <div class="col">
            <h3 style=" margin: 20px" class="float-right"> <?php echo $today ?> Week <?php $date = new DateTime($date_string);
  $week = $date->format("W"); echo "$week"; ?></h3>
          </div>
          <!-- <h3 style=" margin: 20px"> <?php echo $ThisIsTheDateToday ?> Week <?php $date = new DateTime($ThisIsTheDateToday);
  $week = $date->format("W"); echo "$week"; ?>
            </h3> -->
          <div class="container p-30" id="TableListOfMembers"; style="position: relative; height: 100%;  padding-top: 0px; margin:0 auto; max-width: 90%;  background-color: none">
        <div class="ms-1 shadow row">
            <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Task</h3> 
                        </div>
                        <div class="col-sm-4" style="padding: 0;">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="daily.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 20px">Date</label>
            <input type="date" id="datepicker" name="datepicker" onchange="filterMonth();">
            <input type="submit" name="submitdate">
            </form>
           
        </div></div>
                        
                        <div class="col-sm-6 add_flex">
                            <div class="form-group searchInput">
                                <!-- <select class="custom-select" id="inputGroupSelect01" onchange="getSelectValue();">
                                    <option  disabled selected hidden>Search by</option>
                                    
                                    <option value="1">Task Name</option>
                                    <option value="3">Type</option>
                                    <option value="2">In charge</option>
                                    <option value="0">Category</option>
                                    
                                  </select> -->
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterbox" placeholder=" " onkeyup="getSelectValueDaily();">
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:500px;">  
                        <table style="width:100%;" id="filtertable" class="table datacust-datatable Table">
                            <thead  class="thead-dark">
                                <tr>
                                    <th style="min-width:50px;">Category</th>
                                    <th style="width:20%;" >Task Name</th>
                                    <th style="width:20%;"  >In charge</th>
                                    <th style="width:10%;" >Mon</th>
                                    <th style="width:10%;" >Tue</th>
                                    <th style="width:10%;" >Wed</th>
                                    <th style="width:10%;" >Thu</th>
                                    <th style="width:10%;" >Fri</th>
                                    <th style="width:10%;" >Sat</th>


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
                      echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                            ?>
                             <tr class="tableMain" style="background-color: <?php echo $color?>">
                                
                                <td><?php echo $data['taskCategory']??''; ?></td>
                                <td><?php echo $data['taskName']??''; ?></td>
                                <td><?php $fname= $data['username'];    $sql1 = "SELECT f_name FROM `users` WHERE username = '$fname';";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
        while($userRow = mysqli_fetch_assoc($result)){
         $firstname = $userRow['f_name'];
      } echo  $firstname; ?></td>
                                <td><?php
                                $taskID = $data['usertaskID'];
                                echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                // //$month = date("F");
                                // $year = date("Y");
                                // $numberofWeek = weekOfMonth($date_string);
                                $date = new DateTime($date_string);
                                $numberofWeek = $date->format("W");
                                $weeknow = "week $numberofWeek";
                                    // echo $weeknow;
                                $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `week` = '$weeknow' AND `month` = '$month' AND `year` = '$year';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                $result = mysqli_query($con, $selectUserTask);
                                $datenow = '';
                                while($userRow = mysqli_fetch_assoc($result)){
                                
                                $weekNumber = $userRow['week'];
                                $fileloc =  $userRow['attachments'];
                                $time = $userRow['timestamp'];
                                $dateoftask = $userRow['Date'];
                                $dateofTassk =  date('Y-m-d', strtotime($dateoftask));
                                $noOfDays = $userRow['noOfDaysLate'];
                                $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                $finishedtaskID = $userRow['FinishedTaskID'];

                                $reason = $userRow['reason'];
                                $action = $userRow['action'];
                                $timestamp = strtotime($dateofTassk);
                                $datenow = date('l', $timestamp);
                                $pointReceived = $userRow['score'];
                                $DateSubmitted = $userRow['DateSubmitted'];
                                $dateN =  date('n-d', strtotime($DateSubmitted));
                                $timestamp = $userRow['timestamp'];
                                
                                      // echo $dateoftask;
                                      // $trimedDate = str_replace(",","",$dateoftask);
                                      // echo("<script>console.log('sample trim:".trim(strtotime($dateoftask), "April")."');</script>");
                                      if ($datenow == "Monday" ){
                                        if($noOfDays >= 1){
                                          // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                          // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                          
                                          if($isCheckedByLeader){
                                            ?>
                                            <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->

                                            <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>"  data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                             <?php
                                          }
                                          else{
                                            ?>
                                            <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>"data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                             <?php
                                          }
                                          
                                          
                                         
                                        }
                                        else if ($noOfDays <= 0){
                                          // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                          if($isCheckedByLeader){
                                            ?>
                                            <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0"data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                            <?php
                                          }
                                          else{
                                            ?>
                                            <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>"data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                            <?php
                                          }
                                          
                                        }
                                         //echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$time.'</a></span>';
                                     // echo("<script>console.log('ok');</script>");
   
                                     }
                                }
                                  // echo trim($dateoftask, 'April');
                                  // echo("<script>console.log('testing:".$weekNumber."');</script>");
                                  // $datess = 'April 26 2022';
                                  // echo date('Y-m-d', strtotime($datess));
                                  // echo $datenow;
                                
                                
                                 ?></td>

                               
                                <td><?php
                                      $taskID = $data['usertaskID'];

                                      echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                      //$month = date("F");
                                      //$year = date("Y");
                                                    // $numberofWeek = weekOfMonth($date_string);
                                                    $date = new DateTime($date_string);
                                                    $numberofWeek = $date->format("W");
                                                    $weeknow = "week $numberofWeek";
                                                    // echo $weeknow;
                                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `week` = '$weeknow' AND `month` = '$month' AND `year` = '$year';";
                                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                                    $result = mysqli_query($con, $selectUserTask);
                                                    $datenow = '';
                                                    while($userRow = mysqli_fetch_assoc($result)){
                                                
                                                      $weekNumber = $userRow['week'];
                                                      $fileloc =  $userRow['attachments'];
                                                      $time = $userRow['timestamp'];
                                                      $dateoftask = $userRow['Date'];
                                                      $dateofTassk =  date('Y-m-d', strtotime($dateoftask));
                                                      $noOfDays = $userRow['noOfDaysLate'];
                                                       $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                                      $finishedtaskID = $userRow['FinishedTaskID'];

                                                        $reason = $userRow['reason'];
                                                        $action = $userRow['action'];
                                                          $timestamp = strtotime($dateofTassk);
                                                          $datenow = date('l', $timestamp);
                                $pointReceived = $userRow['score'];
                                $DateSubmitted = $userRow['DateSubmitted'];
                                $timestamp = $userRow['timestamp'];

                                $dateN =  date('n-d', strtotime($DateSubmitted));

                                                      // echo $dateoftask;
                                                      // $trimedDate = str_replace(",","",$dateoftask);
                                                      // echo("<script>console.log('sample trim:".trim(strtotime($dateoftask), "April")."');</script>");
                                                      if ($datenow == "Tuesday" ){
                                                        if($noOfDays >= 1){
                                                          // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                          // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                          
                                                          if($isCheckedByLeader){
                                                            ?>
                                                            <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->
                
                                                            <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                             <?php
                                                          }
                                                          else{
                                                            ?>
                                                            <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                             <?php
                                                          }
                                                          
                                                          
                                                         
                                                        }
                                                        else if ($noOfDays <= 0){
                                                          // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                          if($isCheckedByLeader){
                                                            ?>
                                                            <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                            <?php
                                                          }
                                                          else{
                                                            ?>
                                                            <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                            <?php
                                                          }
                                                          
                                                        }
                                                        // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$time.'</a></span>';
                                                        
    
                                          // echo("<script>console.log('ok');</script>");
    
                                            }
                                                  }
                                                  // echo trim($dateoftask, 'April');
                                                      // echo("<script>console.log('testing:".$weekNumber."');</script>");

                                                      // $datess = 'April 26 2022';
                                                      // echo date('Y-m-d', strtotime($datess));
                                                    
                                                          // echo $datenow;

                                            
                                
                                 ?>
                                 </td>
                                <td><?php
                                  $taskID = $data['usertaskID'];

                                  echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                  //$month = date("F");
                                  //$year = date("Y");
                                                // $numberofWeek = weekOfMonth($date_string);
                                                $date = new DateTime($date_string);
                                                $numberofWeek = $date->format("W");
                                                $weeknow = "week $numberofWeek";
                                                // echo $weeknow;
                                                $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `week` = '$weeknow' AND `month` = '$month' AND `year` = '$year';";
                                                // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                                $result = mysqli_query($con, $selectUserTask);
                                                $datenow = '';
                                                while($userRow = mysqli_fetch_assoc($result)){
                                            
                                                  $weekNumber = $userRow['week'];
                                                  $fileloc =  $userRow['attachments'];
                                                  $time = $userRow['timestamp'];
                                                  $dateoftask = $userRow['Date'];
                                                  $dateofTassk =  date('Y-m-d', strtotime($dateoftask));
                                                  $noOfDays = $userRow['noOfDaysLate'];
                                                  $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                                 $finishedtaskID = $userRow['FinishedTaskID'];

                                                   $reason = $userRow['reason'];
                                                   $action = $userRow['action'];
                                                      $timestamp = strtotime($dateofTassk);
                                                      $datenow = date('l', $timestamp);
                                $pointReceived = $userRow['score'];
                                $DateSubmitted = $userRow['DateSubmitted'];
                                $dateN =  date('n-d', strtotime($DateSubmitted));
                                $timestamp = $userRow['timestamp'];

                                                  // echo $dateoftask;
                                                  // $trimedDate = str_replace(",","",$dateoftask);
                                                  // echo("<script>console.log('sample trim:".trim(strtotime($dateoftask), "April")."');</script>");
                                                  if ($datenow == "Wednesday" ){
                                                
                                                    if($noOfDays >= 1){
                                                      // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                      // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                      
                                                      if($isCheckedByLeader){
                                                        ?>
                                                        <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->
            
                                                        <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                         <?php
                                                      }
                                                      else{
                                                        ?>
                                                        <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                         <?php
                                                      }
                                                      
                                                      
                                                     
                                                    }
                                                    else if ($noOfDays <= 0){
                                                      // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                      if($isCheckedByLeader){
                                                        ?>
                                                        <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                        <?php
                                                      }
                                                      else{
                                                        ?>
                                                        <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                        <?php
                                                      }
                                                      
                                                    }
                                                    //echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$time.'</a></span>';
                                                    
    
                                      // echo("<script>console.log('ok');</script>");
    
                                        }
                                              }
                                              // echo trim($dateoftask, 'April');
                                                  // echo("<script>console.log('testing:".$weekNumber."');</script>");

                                                  // $datess = 'April 26 2022';
                                                  // echo date('Y-m-d', strtotime($datess));
                                                
                                                      // echo $datenow;

                                          
                            
                                 ?></td>
                                <td><?php
                                      $taskID = $data['usertaskID'];

                                      echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                      //$month = date("F");
                                      //$year = date("Y");
                                                // $numberofWeek = weekOfMonth($date_string);
                                                $date = new DateTime($date_string);
                                                $numberofWeek = $date->format("W");
                                                    $weeknow = "week $numberofWeek";
                                                    // echo $weeknow;
                                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `week` = '$weeknow' AND `month` = '$month' AND `year` = '$year';";
                                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                                    $result = mysqli_query($con, $selectUserTask);
                                                    $datenow = '';
                                                    while($userRow = mysqli_fetch_assoc($result)){
                                                
                                                      $weekNumber = $userRow['week'];
                                                      $fileloc =  $userRow['attachments'];
                                                      $time = $userRow['timestamp'];
                                                      $dateoftask = $userRow['Date'];
                                                      $dateofTassk =  date('Y-m-d', strtotime($dateoftask));
                                                      $noOfDays = $userRow['noOfDaysLate'];
                                                      $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                                     $finishedtaskID = $userRow['FinishedTaskID'];
    
                                                       $reason = $userRow['reason'];
                                                       $action = $userRow['action'];
                                                          $timestamp = strtotime($dateofTassk);
                                                          $datenow = date('l', $timestamp);
                                $pointReceived = $userRow['score'];
                                $DateSubmitted = $userRow['DateSubmitted'];
                                $dateN =  date('n-d', strtotime($DateSubmitted));
                                $timestamp = $userRow['timestamp'];

                                                      // echo $dateoftask;
                                                      // $trimedDate = str_replace(",","",$dateoftask);
                                                      // echo("<script>console.log('sample trim:".trim(strtotime($dateoftask), "April")."');</script>");
                                                      if ($datenow == "Thursday" ){
                                                        if($noOfDays >= 1){
                                                          // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                          // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                          
                                                          if($isCheckedByLeader){
                                                            ?>
                                                            <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->
                
                                                            <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1"  data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                             <?php
                                                          }
                                                          else{
                                                            ?>
                                                            <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                             <?php
                                                          }
                                                          
                                                          
                                                         
                                                        }
                                                        else if ($noOfDays <= 0){
                                                          // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                          if($isCheckedByLeader){
                                                            ?>
                                                            <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                            <?php
                                                          }
                                                          else{
                                                            ?>
                                                            <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                            <?php
                                                          }
                                                          
                                                        }
                                                       // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$time.'</a></span>';
                                                        
    
                                          // echo("<script>console.log('ok');</script>");
    
                                            }
                                                  }
                                                  // echo trim($dateoftask, 'April');
                                                      // echo("<script>console.log('testing:".$weekNumber."');</script>");

                                                      // $datess = 'April 26 2022';
                                                      // echo date('Y-m-d', strtotime($datess));
                                                    
                                                          // echo $datenow;

                                         
                                
                                 ?>
                                 </td>
                                <td><?php
                                    $taskID = $data['usertaskID'];

                                    echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //$month = date("F");
                                    //$year = date("Y");
                                                // $numberofWeek = weekOfMonth($date_string);
                                                $date = new DateTime($date_string);
                                                $numberofWeek = $date->format("W");
                                                  $weeknow = "week $numberofWeek";
                                                  // echo $weeknow;
                                                  $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `week` = '$weeknow' AND `month` = '$month' AND `year` = '$year';";
                                                  // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                                  $result = mysqli_query($con, $selectUserTask);
                                                  $datenow = '';
                                                  while($userRow = mysqli_fetch_assoc($result)){
                                              
                                                    $weekNumber = $userRow['week'];
                                                    $fileloc =  $userRow['attachments'];
                                                    $time = $userRow['timestamp'];
                                                    $dateoftask = $userRow['Date'];
                                                    $dateofTassk =  date('Y-m-d', strtotime($dateoftask));
                                                    $noOfDays = $userRow['noOfDaysLate'];
                                                    $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                                   $finishedtaskID = $userRow['FinishedTaskID'];
  
                                                     $reason = $userRow['reason'];
                                                     $action = $userRow['action'];
                                                        $timestamp = strtotime($dateofTassk);
                                                        $datenow = date('l', $timestamp);
                                $pointReceived = $userRow['score'];
                                $DateSubmitted = $userRow['DateSubmitted'];
                                $dateN =  date('n-d', strtotime($DateSubmitted));
                                $timestamp = $userRow['timestamp'];

                                                    // echo $dateoftask;
                                                    // $trimedDate = str_replace(",","",$dateoftask);
                                                    // echo("<script>console.log('sample trim:".trim(strtotime($dateoftask), "April")."');</script>");
                                                    if ($datenow == "Friday" ){
                                                      if($noOfDays >= 1){
                                                        // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                        // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                        
                                                        if($isCheckedByLeader){
                                                          ?>
                                                          <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->
              
                                                          <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>"  data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                           <?php
                                                        }
                                                        else{
                                                          ?>
                                                          <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                           <?php
                                                        }
                                                        
                                                        
                                                       
                                                      }
                                                      else if ($noOfDays <= 0){
                                                        // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                        if($isCheckedByLeader){
                                                          ?>
                                                          <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                          <?php
                                                        }
                                                        else{
                                                          ?>
                                                          <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>"  data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                          <?php
                                                        }
                                                        
                                                      }
                                                  //  echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$time.'</a></span>';
                                                      
    
                                        // echo("<script>console.log('ok');</script>");
    
                                          }
                                                }
                                                // echo trim($dateoftask, 'April');
                                                    // echo("<script>console.log('testing:".$weekNumber."');</script>");

                                                    // $datess = 'April 26 2022';
                                                    // echo date('Y-m-d', strtotime($datess));
                                                  
                                                        // echo $datenow;

                                           
                              
                                  ?>
                                  </td>
                                <td><?php
                                      $taskID = $data['usertaskID'];

                                      echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                      //$month = date("F");
                                      //$year = date("Y");
                                                // $numberofWeek = weekOfMonth($date_string);
                                                $date = new DateTime($date_string);
                                                $numberofWeek = $date->format("W");
                                                    $weeknow = "week $numberofWeek";
                                                    // echo $weeknow;
                                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `week` = '$weeknow' AND `month` = '$month' AND `year` = '$year';";
                                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                                    $result = mysqli_query($con, $selectUserTask);
                                                    $datenow = '';
                                                    while($userRow = mysqli_fetch_assoc($result)){
                                                
                                                      $weekNumber = $userRow['week'];
                                                      $fileloc =  $userRow['attachments'];
                                                      $time = $userRow['timestamp'];
                                                      $dateoftask = $userRow['Date'];
                                                      $dateofTassk =  date('Y-m-d', strtotime($dateoftask));
                                                      $noOfDays = $userRow['noOfDaysLate'];
                                                      $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                                     $finishedtaskID = $userRow['FinishedTaskID'];
    
                                                       $reason = $userRow['reason'];
                                                       $action = $userRow['action'];
                                                          $timestamp = strtotime($dateofTassk);
                                                          $datenow = date('l', $timestamp);
                                $pointReceived = $userRow['score'];
                                $DateSubmitted = $userRow['DateSubmitted'];
                                $dateN =  date('n-d', strtotime($DateSubmitted));
                                $timestamp = $userRow['timestamp'];
                                
                                                      // echo $dateoftask;
                                                      // $trimedDate = str_replace(",","",$dateoftask);
                                                      // echo("<script>console.log('sample trim:".trim(strtotime($dateoftask), "April")."');</script>");
                                                      if ($datenow == "Saturday" ){
                                                        if($noOfDays >= 1){
                                                          // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                          // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                          
                                                          if($isCheckedByLeader){
                                                            ?>
                                                            <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->
                
                                                            <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>"  data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                             <?php
                                                          }
                                                          else{
                                                            ?>
                                                            <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                             <?php
                                                          }
                                                          
                                                          
                                                         
                                                        }
                                                        else if ($noOfDays <= 0){
                                                          // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                          if($isCheckedByLeader){
                                                            ?>
                                                            <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                            <?php
                                                          }
                                                          else{
                                                            ?>
                                                            <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                            <?php
                                                          }
                                                          
                                                        }
                                                        // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>'; 
                                          // echo("<script>console.log('ok');</script>");
                                            }
                                                  }
                                                  // echo trim($dateoftask, 'April');
                                                      // echo("<script>console.log('testing:".$weekNumber."');</script>");

                                                      // $datess = 'April 26 2022';
                                                      // echo date('Y-m-d', strtotime($datess));
                                                    
                                                          // echo $datenow;

                                            
                                
                                  ?>
                                  </td>
                                

                               
                              
                              
                                  </tr>
                                  <?php
                                  $sn++;  }}else{ ?>
                                  <tr>
                                    <td colspan="8">
                                    <?php echo $fetchData; ?>
                                   </td>
                                        <tr>
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
      
          <!-- <h1> </h1> -->
        
</div>
  
      <script>



$('#reasonModalUpdate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) ;// Button that triggered the modal
  var reason = button.data('reason');
  var action = button.data('action');
  var location = button.data('location');
  var itoAyID = button.data('taskid');
  var late = button.data('late');
  var point = button.data('point');
  var dateSubmitted = button.data('datesubmitted');
  var time = button.data('time');

  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body reasonUpdate1').val(recipient)
  console.log(button.data('lates'));
  document.getElementById("finishedID").value = itoAyID;
  document.getElementById("reasonUpdate1").value = reason;
  document.getElementById("actionUpdate1").value = action;
  document.getElementById("pointReceived").value = point;
  document.getElementById("dateSubmitted").value = dateSubmitted;

  // document.getElementById("UpdateStatus").style.display = 'block';

  if(late == "1"){
// document.getElementById("UpdateStatus").style.display = 'block';
document.getElementById("radioLate").checked = true;
document.getElementById("radioOnTime").checked = false;

  }
  else{
// document.getElementById("UpdateStatus").style.display = 'none';
document.getElementById("radioLate").checked = false;
document.getElementById("radioOnTime").checked = true;

  }
  if (location ==''){
  document.getElementById("Attachments").href='#'; 
    
  }
  else{
    document.getElementById("Attachments").href=location; 

  }

 
})



let today = new Date().toISOString().substr(0, 10);

document.querySelector("#datepicker").valueAsDate = new Date();



getSelectValueDaily();
function getSelectValueDaily() {
    let input = document.getElementById('filterbox').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('tableMain');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="table-row";                 
        }
    }
}
        </script>
    </body>
</html>