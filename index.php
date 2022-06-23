<?php
  session_start();
  include ("./connection.php");
  date_default_timezone_set("Asia/Singapore");
  $db= $con;
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

$_SESSION['message'] = $message;

    if(isset($_GET['Finish'])){

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
        $today = date("F j, Y");
        $month = date("F");
        $year = date("Y");
        $week = 'week '.weekOfMonth($date_string);
        if($_SESSION['newFileLoc'] ==""){
          $fileloc ="" ;
          $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department');";
          mysqli_query($con, $sqlinsert);
          header("location:index.php");
          unset($_SESSION['newFileLoc']);
        }else{
          $fileloc = $_SESSION['newFileLoc'] ;
          $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department');";
          mysqli_query($con, $sqlinsert);
          header("location:index.php");
          unset($_SESSION['newFileLoc']);
        }
      }
    }

    if(isset($_GET['Cancel'])){

      
      $taskID = $_GET['Cancel'];
      $month = date("F");
      $year = date("Y");
      $sqldelete = "DELETE FROM `finishedtask` WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year'";
      mysqli_query($con, $sqldelete);
      // header("location:index.php");


    }




    
    // $_SESSION['username'] = $username;
    // echo "User: " .$_SESSION['username']. "."  ;
    // echo "<script>console.log('$_SESSION['username']')</script>";
    echo("<script>console.log('USER: " .$_SESSION['username'] . "');</script>");
    echo("<script>console.log('USER: " .$_SESSION['userlevel'] . "');</script>");
    // echo("<script>console.log('as,fjhaekjlh');</script>");
    $today = date("F j, Y"); 
    $date_string= date("Y-m-d");
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

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1.0">

    <title>Main Page</title>
    <link rel="icon" type="image/x-icon" href="design_files/images/Task Monitoring Icon.ico">

     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="design_files/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">

<!-- <link rel="stylesheet" href="./js/bootstrap.min.js"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="">
    
  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
<!-- <link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
<link rel="stylesheet" href="design_files/css/MainPageStyle.css">
<link rel="stylesheet" href="design_files/css/ListOfMembersStyle.css?v=<?php echo time(); ?>">


<script type="text/javascript" src="./js/jquery.slim.min.js"></script>
<script type="text/javascript" src="./design_files/css/bootstrap.min.js"></script>

<!-- <script type="text/javascript" src="./js/node_modules/jquery/dist/jquery.slim.min.js"></script> -->

</head>
    <body style="background: #134E5E;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #71B280, #134E5E);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #71B280, #134E5E); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
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

        <div class="parent" style= "max-height: 100%; height: 100%; padding:0px; ">
          <div class="wrapper" style= " max-height: 100%; height: 100% ;padding:0px; ">
         
          <div class="row"style= "margin-right: 0px; max-height: 100%; height: 100%; background-color: none; padding:0px; ">
          <div class="col-4">
            <h3 style=" margin: 20px; color: white;">  <i style="font-size: 30px; color: white;" class="fas fa-user"></i>  <?php echo $_SESSION['f_name'] ?> <?php echo $_SESSION['l_name'] ?>
             
            </h3>
          </div>
          <div class="col-4" style="padding-top: 20px; color: white">
          <h3  class="text-center"> <?php echo $_SESSION['userlevel'] ?> </h3>  
          </div>
          <div class="col-4">
            <h3 style=" margin: 20px; color: white" class="float-right"> <?php echo $today ?> Week <?php echo weekOfMonth($date_string) ?></h3>
          </div>
         
          <div class="container p-30" id="TableListOfMembers"; style="position: relative; height: 100%;  padding-top: 0px; margin:0 auto; max-width: 90%;  background-color: none">
          
        <div class=" ms-1 shadow row" style="">
            <div class=" shadow col-md-12 main-datatable" style=""> 
                <div class="card_body"  style="">
                    <div class="row d-flex " style="">
                        <div class="col-sm-3 createSegment"> 
                         <h3>Task</h3> 
                        </div>
                        

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
                             <tr>
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
                      $month = date("F");
                      $year = date("Y");
                      $weeknumberrr = weekOfMonth($date_string);
                      // echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

                      if ($taskType == 'weekly'){
                        $weekMonth = weekOfMonth($date_string);
                       
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week $weekMonth';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);

                                    $don = "0";

                                    if ($numrows == 1){
                                      echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                      $don = "1";
                                      // echo '<style type="text/css">#finished22 {pointer-events: none; <style>';
                                         }
                                    }
                                    else if($taskType == 'monthly'){
                                      $weekMonth = weekOfMonth($date_string);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' ;";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    $don = "0";

                                    if ($numrows == 1){
                                      echo '<span class="mode mode_on">DONE</span>';
                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                    
                                    }
                                    else if($taskType == 'daily'){
                                      $weekMonth = weekOfMonth($date_string);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `Date` = ' $today';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    $don = "0";

                                    if ($numrows == 1){
                                      echo '<span class="mode mode_on">DONE</span>';
                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                    }
                                ?> </td>
                                 <td>
                                 <form method="POST" action="index.php" enctype="multipart/form-data" >
                                <div class="row">
                                  <div class="col">
                                    <?php $upFile = 'uploadedFile' . $data['usertaskID']; $varUpload = $data['usertaskID'];  $upBtn = 'uploadsample' . $data['usertaskID'];?>

                                      <input type="file" 
                                    <?php
                                $taskID = $data['usertaskID'];
                                $taskType =  $data['taskType'];

                      // echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                      $month = date("F");
                      $year = date("Y");
                      $weeknumberrr = weekOfMonth($date_string);
                      // echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

                      if ($taskType == 'weekly'){
                        $weekMonth = weekOfMonth($date_string);
                       
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week $weekMonth';";
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
                                      $weekMonth = weekOfMonth($date_string);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' ;";
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
                                      $weekMonth = weekOfMonth($date_string);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `Date` = ' $today';";
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
                                      <a href="index.php?Finish=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a>
                                      <a href="index.php?Cancel=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
                                    

                                      
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
        </script>
    </body>
</html>