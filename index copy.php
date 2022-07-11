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
    <link rel="icon" type="image/x-icon" href="design_files/images/Task Monitoring Icon.ico">

     <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="design_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
       <link rel="stylesheet" href="design_files/css/MainPageStyle.css">
    <link rel="stylesheet" href="design_files/css/ListOfMembersStyle.css?v=<?php echo time(); ?>">

    <script type="text/javascript" src="./js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="./design_files/css/bootstrap.min.js"></script>

</head>
    <body style="background: #134E5E;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #71B280, #134E5E);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #71B280, #134E5E); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">

<?php

  date_default_timezone_set("Asia/Singapore");
  $db= $con;


  $from=date_create(date('Y-m-d'));
$to=date_create("2022-06-27");
$diff=date_diff($to,$from);
// print_r($diff);
// echo $diff->format('%R%a');

// $n1 = $diff->format('%R%a');
// $n2 = 3;
// echo "kasj";
// echo $n1 + $n2;
// if($n1>1){
//   echo "hello";
// }


$tableName="usertask";
    if(!isset( $_SESSION['connected'])){
    

      header("location: signin.php");
  
      // 
    }
    $timestamp = strtotime(date('Y-m-d'));
    //  echo date('l', $timestamp);

     $datess = 'April 26, 2022';
// echo date('Y-m-d', strtotime($datess));

$timenow = date("h:i a");       
echo("<script>console.log('Time Now: " .$timenow. "');</script>");

$PassContainer ="";
$message = ''; 
$newFileName = '';
$varAlert = '';
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  $IDCONTAINER = $_POST['idContainer'];
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK){
    // get details of the uploaded file
    
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
  
  $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    echo("<script>console.log('FILE NAME: " .$GLOBALS["newFileName"]. "');</script>");
   
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'pdf');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
      echo("<script>console.log('FILE LOCATION: " .$dest_path . "');</script>");
     
      $_SESSION['newFileLoc'] = $dest_path;
      
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $varAlert = "success";
        $PassContainer = $IDCONTAINER;
        $message ='File is successfully uploaded.';
        $_SESSION['newFileLoc'] = $dest_path;
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$dateToPass = "";
$date_string= date("Y-m-d");
$_SESSION['message'] = $message;
$today=date('F j, Y');
$month = date("F");
$year = date("Y");
$week = 'week '.weekOfMonth($date_string);
$dateNow = date('Y-m-d');

$taskfocus = "false";
$todaySession = $_SESSION['today'];
$reasonSession = $_SESSION['reason'];

if(isset($_POST['submitdate'])){
  $datePicker = $_POST['datepicker'];

   $month = date('F', strtotime($datePicker));
   $year = date('Y', strtotime($datePicker));
   $today = date('F j, Y', strtotime($datePicker));
  //  echo  $today;
   $_SESSION['today'] = $today;
$todaySession = $_SESSION['today'];
  
   $_SESSION['month'] = $month ;
   $_SESSION['year'] = $year;
   $datePickerget = $datePicker;
   $date_string= date('Y-m-d', strtotime($datePickerget));
   $_SESSION['date_string'] = $date_string;
$week = 'week '.weekOfMonth($date_string);
 $dateToPass = date('Y-m-d', strtotime($datePicker));
 $taskfocus = "true";

   }

   
if(isset($_POST['reason'])){
  $_SESSION['reason'] = $_POST['reasonInput'];
   }

 



   if(isset($_POST['testing'])){
    echo "<script>
    $('#reasonModal').modal('show');
    </script>";
 }
 echo "<script>
 $('#reasonModal').modal('show');
 </script>";
    if(isset($_GET['Finish'])){
$reason = $_SESSION['reason'];
echo "<script>
console.log($reason);
</script>";
      if (!file_exists($_FILES['uploadedFile']['tmp_name']) || !is_uploaded_file($_FILES['uploadedFile']['tmp_name'])) {

        $date_string= date("Y-m-d");
        echo("<script>console.log('Week: " . weekOfMonth($date_string) . "');</script>");
        $taskID = $_GET['Finish'];
        echo("<script>console.log('USer Task Id: " .$taskID . "');</script>");


      
        // $sqlinsert = "INSERT INTO `finishedtask`(`userid`, `username`, `taskName`, `taskCategory`, `taskType`) VALUES ('$resultUserId1','$enteredUserName','$taskname','$taskCategory','$taskType');";
        $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
        $result = mysqli_query($con, $selectUserTask);
        
        while($userRow = mysqli_fetch_assoc($result)){
          $usertaskID = $userRow['usertaskID'];
          $taskType = $userRow['taskType'];
          $taskCategory = $userRow['taskCategory'];
          $taskName = $userRow['taskName'];
          $incharge = $userRow['username'];
          $department = $userRow['Department'];
        }
        // $today = date("F j, Y");
        // $month = date("F");
        // $year = date("Y");
        // $week = 'week '.weekOfMonth($date_string);
        if($_SESSION['newFileLoc'] ==""){
          $fileloc ="" ;
          $today = $_SESSION['today'];
          $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
          $from=date_create(date('Y-m-d'));
          $to=date_create(date('Y-m-d', strtotime($today)));
          $diff=date_diff($to,$from);
          // print_r($diff);
          $finalDiff =  $diff->format('%R%a');
$myReason = $_SESSION['reason'];

          $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason');";
          mysqli_query($con, $sqlinsert);
          header("location:index.php");
          unset($_SESSION['newFileLoc']);
          $_SESSION['reason'] = "";
        }else{
          $today = $_SESSION['today'];

          $from=date_create(date('Y-m-d'));
          $to=date_create(date('Y-m-d', strtotime($today)));
          $diff=date_diff($to,$from);
          // print_r($diff);
          $finalDiff =  $diff->format('%R%a');
          $fileloc = $_SESSION['newFileLoc'] ;
          $myReason = $_SESSION['reason'];
          $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason');";
          mysqli_query($con, $sqlinsert);
          header("location:index.php");
          unset($_SESSION['newFileLoc']);
          $_SESSION['reason'] = "";
          
        }
  
      }
    }

    if(isset($_GET['Cancel'])){

      
      $FtaskID = $_GET['Cancel'];
      // $month = date("F");
      // $year = date("Y");
      $sqldelete = "DELETE FROM `finishedtask` WHERE FinishedTaskID = '$FtaskID'";
      mysqli_query($con, $sqldelete);
      $_SESSION['reason'] = "";

      // header("location:index.php");


    }




    
    // $_SESSION['username'] = $username;
    // echo "User: " .$_SESSION['username']. "."  ;
    // echo "<script>console.log('$_SESSION['username']')</script>";
    echo("<script>console.log('USER: " .$_SESSION['username'] . "');</script>");
    echo("<script>console.log('USER: " .$_SESSION['userlevel'] . "');</script>");
    // echo("<script>console.log('as,fjhaekjlh');</script>");
    // $today = date("F j, Y"); 
    // $date_string= date("Y-m-d");
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
     $query = "SELECT * FROM `usertask`  WHERE `username` = '$username';";
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
        <div class="alert alert-success" id = "successAlert" style="display: none"role="alert">
 <h3 id="successAlertWord"> </h3>
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
<form method="POST" action="index.php">
                        </form>
        <div class="parent" style= "max-height: 100%; height: 100%; padding:0px; ">
          <div class="wrapper" style= " max-height: 100%; height: 100% ;padding:0px; ">
         
          <div class="row"style= "margin-right: 0px; max-height: 100%; height: 100%; background-color: none; padding:0px; ">
          <div class="col-4">
            <h3 style=" margin: 20px; color: white;">  <i style="font-size: 30px; color: white;" class="fas fa-user"></i>  <?php echo $_SESSION['f_name'] ?> <?php echo $_SESSION['l_name'] ?>
             
            </h3>
          </div>
          <div class="col-4" style="padding-top: 20px; color: white">
          <!-- <h3  class="text-center"> <?php if( $_SESSION['userlevel'] == "PIC") echo 'Member' ?> </h3>   -->
          <h3 class="text-center"> <?php echo  $_SESSION['today'] ?> Week <?php echo weekOfMonth($_SESSION['date_string']) ?></h3>

          </div>
          <div class="col-4">
            <h3 style=" margin: 20px; color: white" class="float-right"> <?php if( $_SESSION['userlevel'] == "PIC") echo 'Member' ?> </h3>
          </div>
         
          <div class="container p-30" id="TableListOfMembers"; style="position: relative; height: 100%;  padding-top: 0px; margin:0 auto; max-width: 90%;  background-color: none">
          
        <div class=" ms-1 shadow row" style="">
            <div class=" shadow col-md-12 main-datatable" style=""> 
                <div class="card_body"  style="">
                    <div class="row d-flex " style="">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Task</h3> 
                        </div>


                        <div class="col-sm-4"  style="padding: 0;">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="index.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 20px">Date</label>
            <input type="date" id="datepicker" name="datepicker" data-value="[2020,0,1]" onchange="filterMonth();">
            <input type="submit" name="submitdate"  value = "Submit">
            </form>
           
        </div></div>

                        <div class="col-sm-6 add_flex">
                        <div class="col"  >
                        <fieldset class="row mb-3" style="margin-top: 25px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding-left: 10px">
                                   
                                    <div class="form-check form-check-inline" style="margin-left: 10px">
                                        <input class="form-check-input" type="checkbox" name="checkDone" id="checkDone" value="DONE" onclick="done();">
                                            <label class="form-check-label" for="checkPIC">
                                             Done
                                            </label>
                                    </div>
                                  
                             </div>
                        </fieldset>
                    </div>
                            <div class="form-group searchInput">
                                <select class="custom-select" id="inputGroupSelect01" onchange="getSelectValue();">
                                    <option  disabled selected hidden>Search by</option>
                                    
                                    <option value="2">Task Name</option>
                                    <option value="3">Type</option>
                                    <option value="3">Category</option>
                                    <option value="4">Status</option>
                                  </select>
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterbox" placeholder=" " >
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:600px;"> 
                        <table class="table table-striped table-hover  " style="width:100%;" id="filtertable" class="table datacust-datatable Table ">
                            <thead  class="thead-dark">
                                <tr>
                                    <th style="min-width:50px;">No.</th>
                                    <th style="width:30%;" >Task Name</th>
                                    <th style="min-width:100px;" >Type</th>
                                    <th style="min-width:100px;" >Category</th>
                                    <th style="min-width:100px;">Status</th>
                                    <th style="min-width:200px; text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="TaskTable">
                            <?php
                                  if(is_array($fetchData)){      
                                  $sn=1;
                                  foreach($fetchData as $data){
                            ?>
                             <tr style="height:50px">
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $data['taskName']??''; ?></td>
                                <td><?php echo $data['taskType']??''; ?></td>
                                <td><?php echo $data['taskCategory']??''; ?></td>
                              <!-- <td>
                                
                              <span class="mode mode_on">Done</span></td>
                              <td> -->
                              <td> <?php
                                $taskID = $data['usertaskID'];
                                $taskType =  $data['taskType'];
                       
                      // echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                      // $month = date("F");
                      // $year = date("Y");
                      $weeknumberrr = weekOfMonth($_SESSION['date_string']);
                      // echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

                      if ($taskType == 'weekly'){
                        $weekMonth = weekOfMonth($_SESSION['date_string']);
                        $month1 = $_SESSION['month'];
                        $year1 = $_SESSION['year'];
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' AND `week` = 'week $weekMonth';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);

                                    $don = "0";
                                    while($userRow = mysqli_fetch_assoc($result)){
                                      $noOfDays = $userRow['noOfDaysLate'];
                                    
                          
                                  }
                                    if ($numrows >= 1){
                                      if($noOfDays > 2){
                                        echo '<span id = "doneORnot" class="mode mode_late">LATE</span>';
                                      }
                                       else if($noOfDays<=2 && $noOfDays>=0){
                                        echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                      }
                                     
                                      $don = "1";
                                      // echo '<style type="text/css">#finished22 {pointer-events: none; <style>';
                                         }
                                    }
                                    else if($taskType == 'monthly'){
                                      $weekMonth = weekOfMonth($_SESSION['date_string']);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' ;";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    $don = "0";
                                    while($userRow = mysqli_fetch_assoc($result)){
                                      $noOfDays = $userRow['noOfDaysLate'];
                                    
                          
                                  }
                                    if ($numrows >= 1){
                                      if($noOfDays > 2){
                                        echo '<span id = "doneORnot" class="mode mode_late">LATE</span>';
                                      }
                                      else if($noOfDays <=2 && $noOfDays>=0){
                                        echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                      }
                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                    
                                    }
                                    else if($taskType == 'daily'){
                                      $weekMonth = weekOfMonth($_SESSION['date_string']);
                                      $today1 = $_SESSION['today'];
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `Date` = ' $today1';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    $don = "0";
                                    while($userRow = mysqli_fetch_assoc($result)){
                                      $noOfDays = $userRow['noOfDaysLate'];
                                    
                          
                                  }
                                    if ($numrows >= 1){
                                      if($noOfDays > 2){
                                        echo '<span id = "doneORnot" class="mode mode_late">LATE</span>';
                                      }
                                      else if($noOfDays <=2 &&$noOfDays >=0){
                                        echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                      }
                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                    }
                                ?> </td>
                                 <td>
                                 <form method="POST" action="index.php" enctype="multipart/form-data" >
                                 <div class="modal fade" id="reasonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">State your reason why are you late.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                           
                                             <form method="POST" action="index.php" >
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Reason:</label>
                                                    <textarea class="form-control" name="reasonInput" id="reason-text"></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="reason"class="btn btn-primary">Save reason</button>
                                              </div>
                                  </form>
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                                        <?php
                                                              // echo $data['taskType'];
                                                      if(isset($_GET['FinishSample'])){
                                                        $today = $_SESSION['today'];
                                                        $from=date_create(date('Y-m-d'));
                                                        $to=date_create(date('Y-m-d', strtotime($today)));
                                                        $diff=date_diff($to,$from);
                                                        // print_r($diff);
                                                        $reason =  $_SESSION['reason'];
                                                        $finalDiff =  $diff->format('%R%a');
                                                        if($finalDiff >=3 &&  $reason==""){
                                                      echo "<script> $('#reasonModal').modal('show'); </script>";
                                                      $_SESSION['TaskID'] = $_GET['FinishSample'];
                                                        }
                                                        else{
                                                          $_SESSION['TaskID'] = $_GET['FinishSample'];
                                                          $taskID = $_SESSION['TaskID'];
                                                          echo "<script>  
                                                            document.getElementById('finished$taskID').click();      

                                                            </script>";
                                                        }
                                                  
                                                      }

                                                   
                                                      if(isset($_POST['reason'])){
                                                        $_SESSION['reason'] = $_POST['reasonInput'];
                                                        if($_SESSION['reason'] != ""){
                                                          $taskID = $_SESSION['TaskID'];
                                                          echo $taskID;
                                                            echo "<script>  document.getElementById('finishedsample$taskID').style.display='none';
                                                            document.getElementById('finished$taskID').click();      

                                                            </script>";
                                                        }
                                                      }
                                                 
                                                      ?>
                                <div class="row">
                                  <div class="col">
                                    <?php $upFile = 'uploadedFile' . $data['usertaskID']; $varUpload = $data['usertaskID'];  $upBtn = 'uploadsample' . $data['usertaskID'];?>

                                      <input type="file" 
                                    <?php
                                $taskID = $data['usertaskID'];
                                $taskType =  $data['taskType'];

                      // echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                      // $month = date("F");
                      $year = date("Y");
                      $weeknumberrr = weekOfMonth($_SESSION['date_string']);
                      // echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

                      if ($taskType == 'weekly'){
                        $weekMonth = weekOfMonth($_SESSION['date_string']);
                       $month1 = $_SESSION['month'];
                       $year1 = $_SESSION['year'];

                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' AND `week` = 'week $weekMonth';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);

                                    $don = "0";

                                    if ($numrows == 1){
                                      echo 'disabled';
                                      $don = "1";
                                      // echo '<style type="text/css">#finished22 {pointer-events: none; <style>';
                                         }
                                    }
                                    else if($taskType == 'monthly'){
                                      $weekMonth = weekOfMonth($_SESSION['date_string']);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' ;";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    $don = "0";

                                    if ($numrows == 1){
                                      echo 'disabled';

                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                    
                                    }
                                    else if($taskType == 'daily'){
                                      $weekMonth = weekOfMonth($_SESSION['date_string']);
                                      $today1 = $_SESSION['today'];
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `Date` = ' $today1';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    $don = "0";

                                    if ($numrows == 1){
                                      echo 'disabled';

                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                    
                                    }
                                ?> 
                                    data-uploadId="<?php echo $data['usertaskID'] ?>" name="uploadedFile" id="<?php echo $upFile; ?>" class="form-control pt-1" style="width: 180px; height: 30px; font-size: 10px; padding-top:0px" title=" Select ">
                                    <input name="idContainer" value="<?php  echo $data['taskName'];?>" style="display: none">
                                  </div>
                                  <div class="col" style="width: 400px">
                                      <!-- <a type="button" class="btn btn-outline-primary" style="font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" onclick="sendNotification();sendNotificationAgri()">  Finish</button> -->
                                      <!-- upload -->
                                      
                                      <input type="submit" id = "uploadsample<?php echo $data['usertaskID'] ?>" name="uploadBtn" value="Upload"class="btn btn-outline-success" style="font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;"  />
                                      <script>

                                        // // document.getElementById("uploadsample30").disabled = true;
                                        var jsonDataUpload = <?php echo json_encode($varUpload); ?>;
                                        var uploadinput = document.getElementById(<?php echo json_encode($upFile); ?>);
                                    
                                        var fileId = <?php echo json_encode($upBtn); ?>;
                                        // alert(fileId);
                                          // document.getElementById(fileInputId).removeAttribute("disabled");

                                        if(uploadinput.value == ''){
                                          document.getElementById(<?php echo json_encode($upBtn); ?>).disabled = true;
                                        }else{
                                          document.getElementById(<?php echo json_encode($upBtn); ?>).disabled = false;
                                        }

                                        $('input[type="file"]').change(function() {
                                          var fileInputId = this.id;
                                          var dataId = $(this).attr("data-uploadId");
                                          var nId = 'uploadsample'+dataId;
                                          // alert(nId);
                                          document.getElementById(nId).disabled = false;
                                          // var nId = '#'+dataId;
                                          // alert(nId);
                                          // $(nId).prop('disabled', false);
                                          // alert(fileInputId);
                                        });

                                        // // console.log(uploadinput.value)
                                        // $(<?php //echo json_encode($upFile); ?>).change(function () {
                                        //   if ($(<?php //echo json_encode($upFile); ?>).val() == '') {
                                        //     $(<?php //echo json_encode($upBtn); ?>).attr('disabled', true)
                                        //   } else {
                                        //     $(<?php //echo json_encode($upBtn); ?>).attr('disabled', false);
                                        //   }
                                        // })
                                        </script>
                                  
                                      
                                      <!-- Finish -->
                                     <!-- <a onclick="checkIfLate(<?php echo $data['usertaskID'] ?>)" id= "checked<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Check</a> -->

                                     <a href="index.php?Finish=<?php echo $data['usertaskID'] ?>" style="display: none" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a>
                                        <!-- <a href="index.php?Cancel=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a> -->
                                      <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finishedsample<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a>
                                      
                                      <?php
                                       $taskID = $data['usertaskID'];
                                       $taskType =  $data['taskType'];       
                                       $noOfDays = "";
                                        if ($taskType == 'weekly'){
                                          
                                                         
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week $weekMonth';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);

                                    // $don = "0";
                                    while($userRow = mysqli_fetch_assoc($result)){
                                      $fTaskId = $userRow['FinishedTaskID'];
                                      $noOfDays = $userRow['noOfDaysLate'];
                                  }
                                  if($noOfDays>=3){
                                   ?> <a href="index.php?Update=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                    <?php
                                  }
                               
                                  // echo $noOfDays;
                                  ?>
                                 
                                      <a href="index.php?Cancel=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
                                      <!-- <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a> -->
                                      
                                   
                                      <?php
                                        }


                                        else if ($taskType == 'monthly'){
                                                                      
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year'";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);

                                    // $don = "0";
                                    while($userRow = mysqli_fetch_assoc($result)){
                                      $fTaskId = $userRow['FinishedTaskID'];
                                      $noOfDays = $userRow['noOfDaysLate'];
                                  }
                                  if($noOfDays>=3){
                                    ?> <a href="index.php?Update=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                     <?php
                                   }
                                
                                  //  echo $noOfDays;
                                  ?>
                                 
                                      <a href="index.php?Cancel=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
                                      <!-- <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a> -->
                                      <?php
                                        }

                                        else if ($taskType == 'daily'){
                                          $today = $_SESSION['today'];              
                                          $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `Date` = ' $today';";
                                          // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                          $result = mysqli_query($con, $selectUserTask);
      
                                          $numrows = mysqli_num_rows($result);
      
                                          // $don = "0";
                                          
                                            while($userRow = mysqli_fetch_assoc($result)){
                                              $fTaskId = $userRow['FinishedTaskID'];
                                      $noOfDays = $userRow['noOfDaysLate'];

                                          }
                                          // echo $noOfDays;
                                          if($noOfDays>=3){
                                            ?> <a href="index.php?Update=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                             <?php
                                           }
                                        ?>
                                              
                                            <a href="index.php?Cancel=<?php echo $fTaskId ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
                                            <!-- <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a> -->
                                            <?php
                                              }
                                       ?>
                                     

                                      
                                    </div>
                                    
                                </div>
                            
                                </form>
                              </td>

                                <!-- <td><?php echo $data['taskCategory']??''; ?></td> -->
                              
                             </tr>
                             <?php
                            $sn++;}}else{ ?>
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

                    <!-- <form method="POST" action="index.php" enctype="multipart/form-data">
    <div class="upload-wrapper">
      <span class="file-name">Choose a file...</span>
      <label for="file-upload">Browse<input type="file" id="file-upload" name="uploadedFile"></label>
    </div>
 
    <input type="submit" id = "uploadsample" name="uploadBtn" value="Upload" />
    
  </form> -->
                </div>
            </div>
        </div>
      </div>
    

      </div>
          </div> 
      
          <!-- <h1> </h1> -->
        
</div>
  
<script>

var jsonData = <?php echo json_encode("$varAlert"); ?>;
console.log(jsonData);
var jsonDataID = <?php echo json_encode("$PassContainer"); ?>;

if(jsonData == "success"){
  // document.getElementById("successAlertWord").value=jsonDataID;
successAlertWord.innerText = "Attachment for "+jsonDataID+" uploaded succesfully.";


  document.getElementById("successAlert").style.display="block";
  // var emerut = document.getElementById("successAlert").value;



}
 function done(){
  var checkBox = document.getElementById("checkDone");
  if (checkBox.checked == true){
  let filterValue="DONE";
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
          else{
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

// document.getElementById("successAlert").style.display="block";

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
    
    else if (text=='Type'){

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
    else if (text=='Category'){

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
    else if (text=='Status'){

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
}
getSelectValue();


var dateNow = <?php echo json_encode("$today"); ?>;

// document.getElementById("datepicker").value = dateNow;

var jsonDataTask = <?php echo json_encode("$taskfocus"); ?>;
var dates = <?php echo json_encode("$dateToPass"); ?>;

if(jsonDataTask == "true"){
      document.getElementById("datepicker").value = dates;

    }
var sessionReason = <?php echo json_encode("$reasonSession");?>;

function checkIfLate(id){

    var date1= new Date();
    // var date2= new Date('July 1, 2022');
   
var dateSession = <?php echo json_encode("$todaySession"); ?>;
console.log(sessionReason);
    var date2= new Date(dateSession);

    var daysbetween= Math.abs(date2-date1);
    var noOfdays = daysbetween/(1000 * 3600 * 24)
    console.log(parseInt(noOfdays));
    console.log(date2);

    console.log(date1);
var noOfDaysLate = parseInt(noOfdays);
var reason = document.getElementById('reason-text').value;
    if(noOfDaysLate >= 3){
      $('#reasonModal').modal('show');
// document.getElementById('checked'+id).style.display='none';

    }
    }
    // hideCheck();
  function hideCheck(){
var reason = document.getElementById('reason-text').value;

    if(sessionReason !=""){
      document.getElementById('checked34').style.display='none';

    }


  }
        </script>
    </body>
</html>