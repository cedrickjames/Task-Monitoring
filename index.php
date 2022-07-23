<?php
  session_start();
  include ("./connection.php");
  // echo $_SESSION['TaskID'];
// echo date("Y-m-d", strtotime("monday last week"));
// echo date("F", strtotime("previous month"));
// echo  $sundaylw =  date("Y-m-d", strtotime("sunday last week"));
// echo weekOfMonth($_SESSION['date_string']);
$start = new DateTime('2022-07-08');
$end = new DateTime('2022-07-18');
// otherwise the  end date is excluded (bug?)
$end->modify('+1 day');
// echo date('F j, Y');
$interval = $end->diff($start);

// total days
$days = $interval->days;
// echo $days;
// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
$holidays = array('2022-07-15');

foreach($period as $dt) {
    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sat' || $curr == 'Sun') {
        $days--;
        // echo $days;
    }

    // (optional) for the updated question
    else if (in_array($dt->format('Y-m-d'), $holidays)) {
        $days--;
    }
}


 //echo $days-2; // return difference except weekends

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

    <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">

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
// if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
// {
//   echo "<script> console.log('uploadddddd'); </script>";
//   echo "ajsdghasd";
// }
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  echo "<script> console.log('uploadddddd'); </script>";
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
$dateForToday = new DateTime($date_string);
$weekNumber = $dateForToday->format("W");
$week = 'week '.$weekNumber;
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
// echo  $todaySession;
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




    if(isset($_GET['Finish'])){
$reason = $_SESSION['reason'];
$action = $_SESSION['action'];
echo "akjshdas";
// echo $_FILES['uploadedFile']['tmp_name']
      // if (!file_exists($_FILES['uploadedFile']['tmp_name']) || !is_uploaded_file($_FILES['uploadedFile']['tmp_name'])) {

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
echo $taskType;
        if($taskType == "weekly"){
          echo "orayt";

          $mondaylw =  date("Y-m-d", strtotime("monday last week"));
          $sundaylw =  date("Y-m-d", strtotime("sunday last week"));
              echo "merom";
          $meronBaSiyaLastWeek = "SELECT * FROM `finishedtask` WHERE `taskID` = '$taskID' AND `realDate` BETWEEN '$mondaylw' AND '$sundaylw';";
          // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
          $result = mysqli_query($con, $meronBaSiyaLastWeek);
          $meron = mysqli_num_rows($result);
          echo "<script> console.log('$meron') </script>";
          if($meron >=1 ){
            echo "meron";
            if($_SESSION['newFileLoc'] ==""){
              echo "merom";
              $fileloc ="" ;
    
              $today = $_SESSION['today'];

              $dateNewToday = new DateTime($today);
                $weekNumberNew = $dateNewToday->format("W");
                $week = 'week '.$weekNumberNew;
              // $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
              $from=date_create(date('Y-m-d'));
              $to=date_create(date('Y-m-d', strtotime($today)));
              $diff=date_diff($to,$from);
              // print_r($diff);
              // $finalDiff =  $diff->format('%R%a');
              $finalDiff = "0";
              $realDate = date('Y-m-d', strtotime($today));
    
    $myReason = $_SESSION['reason'];
    
    
    $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
              mysqli_query($con, $updateDateStarted);
              $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate', '1');";
              mysqli_query($con, $sqlinsert);
              header("location:index.php");
              unset($_SESSION['newFileLoc']);
              $_SESSION['reason'] = "";
              $_SESSION['action'] = "";

              $_SESSION['noOfDaysLate']="";
    
            }else{
              $today = $_SESSION['today'];
    
              $from=date_create(date('Y-m-d'));
              $to=date_create(date('Y-m-d', strtotime($today)));
              $diff=date_diff($to,$from);
              // print_r($diff);
              // $finalDiff =  $diff->format('%R%a');
              $finalDiff = "0";
              $fileloc = $_SESSION['newFileLoc'] ;
              $myReason = $_SESSION['reason'];
              $realDate = date('Y-m-d', strtotime($today));
    
              $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
              mysqli_query($con, $updateDateStarted);
    
              $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`, `action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate' ,'1');";
              mysqli_query($con, $sqlinsert);
              header("location:index.php");
              unset($_SESSION['newFileLoc']);
              $_SESSION['reason'] = "";
              $_SESSION['noOfDaysLate']="";
              $_SESSION['action'] = "";
              
            }
          }
          else if($meron == 0) {
            if($_SESSION['newFileLoc'] ==""){
              $fileloc ="" ;
    
              $today = $_SESSION['today'];
              $dateNewToday = new DateTime($today);
                $weekNumberNew = $dateNewToday->format("W");
                $week = 'week '.$weekNumberNew;
              // $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
              $from=date_create(date('Y-m-d'));
              $to=date_create(date('Y-m-d', strtotime($today)));
              $diff=date_diff($to,$from);
              // print_r($diff);
              // $finalDiff =  $diff->format('%R%a');
              $finalDiff =4; //ibig sabihin late na
              $realDate = date('Y-m-d', strtotime($today));
    
    $myReason = $_SESSION['reason'];
    
    
    $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
              mysqli_query($con, $updateDateStarted);
              $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`, `action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate' ,'0.5');";
              mysqli_query($con, $sqlinsert);
              header("location:index.php");
              unset($_SESSION['newFileLoc']);
              $_SESSION['reason'] = "";
              $_SESSION['noOfDaysLate']="";
              $_SESSION['action'] = "";
    
            }else{
              $today = $_SESSION['today'];
    
              $from=date_create(date('Y-m-d'));
              $to=date_create(date('Y-m-d', strtotime($today)));
              $diff=date_diff($to,$from);
              // print_r($diff);
              // $finalDiff =  $diff->format('%R%a');
              $finalDiff =4;
              $fileloc = $_SESSION['newFileLoc'] ;
              $myReason = $_SESSION['reason'];
              $realDate = date('Y-m-d', strtotime($today));
    
              $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
              mysqli_query($con, $updateDateStarted);
    
              $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate', '0.5');";
              mysqli_query($con, $sqlinsert);
              header("location:index.php");
              unset($_SESSION['newFileLoc']);
              $_SESSION['reason'] = "";
              $_SESSION['noOfDaysLate']="";
              $_SESSION['action'] = "";
              
            }
          }
        }
          
          
        // $today = date("F j, Y");
        // $month = date("F");
        // $year = date("Y");
        // $week = 'week '.weekOfMonth($date_string);
        else if($taskType == "daily"){
          if($_SESSION['newFileLoc'] ==""){
            $fileloc ="" ;
  
            $today = $_SESSION['today'];
            $dateNewToday = new DateTime($today);
                $weekNumberNew = $dateNewToday->format("W");
                $week = 'week '.$weekNumberNew;
              // $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
            $from=date_create(date('Y-m-d'));
            $to=date_create(date('Y-m-d', strtotime($today)));
            $diff=date_diff($to,$from);
            // print_r($diff);
            // $finalDiff =  $diff->format('%R%a');
            $finalDiff =$_SESSION['noOfDaysLate'];
            $realDate = date('Y-m-d', strtotime($today));
  
  $myReason = $_SESSION['reason'];
  
  if($finalDiff >=2){
    $score = 0.5;
  }
  else{
    $score = 1;
  }
  $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
            mysqli_query($con, $updateDateStarted);
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`, `action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate', '$score');";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
  
          }else{
            $today = $_SESSION['today'];
  
            $from=date_create(date('Y-m-d'));
            $to=date_create(date('Y-m-d', strtotime($today)));
            $diff=date_diff($to,$from);
            // print_r($diff);
            // $finalDiff =  $diff->format('%R%a');
            $finalDiff = $_SESSION['noOfDaysLate'];
            $fileloc = $_SESSION['newFileLoc'] ;
            $myReason = $_SESSION['reason'];
            $realDate = date('Y-m-d', strtotime($today));
  
            
  if($finalDiff >=2){
    $score = 0.5;
  }
  else{
    $score = 1;
  }
            $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
            mysqli_query($con, $updateDateStarted);
  
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate` ,`score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate', '$score');";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
            
          }
        }

       else if($taskType == "monthly"){
        // echo "orayt";

        $lastMonth =  date("F", strtotime("previous month"));
        
            // echo "merom";
        $meronBaSiyaLastMonth = "SELECT * FROM `finishedtask` WHERE `taskID` = '$taskID' AND `month`= '$lastMonth';";
        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
        $result = mysqli_query($con, $meronBaSiyaLastMonth);
        $meron = mysqli_num_rows($result);
        echo "<script> console.log('$meron') </script>";
        if($meron >=1 ){
          // echo "meron";
          if($_SESSION['newFileLoc'] ==""){
            // echo "merom";
            $fileloc ="" ;
  
            $today = $_SESSION['today'];
            $dateNewToday = new DateTime($today);
                $weekNumberNew = $dateNewToday->format("W");
                $week = 'week '.$weekNumberNew;
              // $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
            $from=date_create(date('Y-m-d'));
            $to=date_create(date('Y-m-d', strtotime($today)));
            $diff=date_diff($to,$from);
            // print_r($diff);
            // $finalDiff =  $diff->format('%R%a');
            $finalDiff = "0";
            $realDate = date('Y-m-d', strtotime($today));
  
  $myReason = $_SESSION['reason'];
  if($finalDiff >=2){
    $score = 0.5;
  }
  else{
    $score = 1;
  }
  
  $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
            mysqli_query($con, $updateDateStarted);
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate` ,`score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate' ,'$score');";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";

  
          }else{
            $today = $_SESSION['today'];
  
            $from=date_create(date('Y-m-d'));
            $to=date_create(date('Y-m-d', strtotime($today)));
            $diff=date_diff($to,$from);
            // print_r($diff);
            // $finalDiff =  $diff->format('%R%a');
            $finalDiff = "0";
            $fileloc = $_SESSION['newFileLoc'] ;
            $myReason = $_SESSION['reason'];
            $realDate = date('Y-m-d', strtotime($today));
            if($finalDiff >=2){
              $score = 0.5;
            }
            else{
              $score = 1;
            }
            $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
            mysqli_query($con, $updateDateStarted);
  
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate', '$score');";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
            
          }
        }
        else if($meron == 0) {
          if($_SESSION['newFileLoc'] ==""){
            $fileloc ="" ;
  
            $today = $_SESSION['today'];
            $dateNewToday = new DateTime($today);
                $weekNumberNew = $dateNewToday->format("W");
                $week = 'week '.$weekNumberNew;
              // $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
            $from=date_create(date('Y-m-d'));
            $to=date_create(date('Y-m-d', strtotime($today)));
            $diff=date_diff($to,$from);
            // print_r($diff);
            // $finalDiff =  $diff->format('%R%a');
            $finalDiff =4; //ibig sabihin late na
            $realDate = date('Y-m-d', strtotime($today));
  
  $myReason = $_SESSION['reason'];
  if($finalDiff >=2){
    $score = 0.5;
  }
  else{
    $score = 1;
  }
  
  $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
            mysqli_query($con, $updateDateStarted);
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`,  `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate', '$score');";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
  
          }else{
            $today = $_SESSION['today'];
  
            $from=date_create(date('Y-m-d'));
            $to=date_create(date('Y-m-d', strtotime($today)));
            $diff=date_diff($to,$from);
            // print_r($diff);
            // $finalDiff =  $diff->format('%R%a');
            $finalDiff =4;
            $fileloc = $_SESSION['newFileLoc'] ;
            $myReason = $_SESSION['reason'];
            $realDate = date('Y-m-d', strtotime($today));
            if($finalDiff >=2){
              $score = 0.5;
            }
            else{
              $score = 1;
            }
            $updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
            mysqli_query($con, $updateDateStarted);
  
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `timestamp`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason','$action', '$realDate', '$score');";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
            
          }
        }
       }
  
      }
    // }
  
    if(isset($_GET['Cancel'])){

      
      $FtaskID = $_GET['Cancel'];
      // $month = date("F");
      // $year = date("Y");
      $sqldelete = "DELETE FROM `finishedtask` WHERE FinishedTaskID = '$FtaskID'";
      mysqli_query($con, $sqldelete);
      $_SESSION['reason'] = "";
      $_SESSION['action'] = "";

      // header("location:index.php");


    }
    if(isset($_GET['Update'])){

      // echo $_GET['Update'];
      echo "<script> console.log('sdhgfjsdghfjkasgfkg') </script>";
      $FtaskID = $_GET['Update'];
      // $month = date("F");
      // $year = date("Y");
      $myReason = $_SESSION['reason'];
      echo "<script> console.log('$myReason') </script>";
      $myAction = $_SESSION['action'];
      $sqldelete = "UPDATE `finishedtask` SET `reason`='$myReason', `action`= '$myAction' WHERE `FinishedTaskID`='$FtaskID';";
      mysqli_query($con, $sqldelete);
      $_SESSION['reason'] = "";
      $_SESSION['action'] = "";

      // header("location:index.php");


    }

    if(isset($_GET['UpdateAction'])){

      // echo $_GET['UpdateAction'];
      echo "<script> console.log('sdhgfjsdghfjkasgfkg') </script>";
      $FtaskID = $_GET['UpdateAction'];
      // $month = date("F");
      // $year = date("Y");
      $myAction = $_SESSION['action'];
      $sqlUpdate = "UPDATE `finishedtask` SET `action`='$myAction' WHERE `FinishedTaskID`='$FtaskID';";
      mysqli_query($con, $sqlUpdate);
      $_SESSION['reason'] = "";
      $_SESSION['action'] = "";

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
          <h3 class="text-center"> <?php echo  $_SESSION['today'] ?> Week <?php $date = new DateTime($_SESSION['date_string']);
  $week = $date->format("W"); echo "$week"; ?></h3>

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


                        <div class="col-sm-4"  style="padding: 0; display: none">
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
                                    <th style="min-width:1%;">No.</th>
                                    <th style="width:30%;" >Task Name</th>
                                    <th style="min-width:1px;" >Type</th>
                                    <th style="min-width:4%;" >Category</th>
                                    <th style="min-width:10%;">Status</th>
                                    <th style="min-width:30%; text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="TaskTable">
                            <?php
                                  if(is_array($fetchData)){      
                                  $sn=1;
                                  foreach($fetchData as $data){
                            ?>
                             <tr style="height:50px">
                                <td  style="width: 1%;"><?php echo $sn; ?></td>
                                <td style="width:30%;"><?php echo $data['taskName']??''; ?></td>
                                <td  style="width: 5%;"><?php echo $data['taskType']??''; ?></td>
                                <td  style="width: 5%;"><?php echo $data['taskCategory']??''; ?></td>
                              <!-- <td>
                                
                              <span class="mode mode_on">Done</span></td>
                              <td> -->
                              <td style="width: 10%;"> <?php
                                $taskID = $data['usertaskID'];
                                $taskType =  $data['taskType'];
                       
                      // echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                      // $month = date("F");
                      // $year = date("Y");
                      $weeknumberrr = weekOfMonth($_SESSION['date_string']);
                      // echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

                      if ($taskType == 'weekly'){
                        $sessionDateNow=$_SESSION['date_string'];
                        $date = new DateTime($sessionDateNow);
                        $weekMonth = $date->format("W");
                        // $weekMonth = weekOfMonth($_SESSION['date_string']);
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
                                         else{
                                          $mondaylw =  date("Y-m-d", strtotime("monday last week"));
                                          $sundaylw =  date("Y-m-d", strtotime("sunday last week"));
                                             
                                          $meronBaSiyaLastWeek = "SELECT * FROM `finishedtask` WHERE `taskID` = '$taskID' AND `realDate` BETWEEN '$mondaylw' AND '$sundaylw';";
                                          // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                          $result = mysqli_query($con, $meronBaSiyaLastWeek);
                                          $meron = mysqli_num_rows($result);
                                          if($meron >=1){
                                            echo '<span id = "doneORnot" class="mode mode_done">On going</span>';
                                          }
                                          else{
                                            echo '<span id = "doneORnot" class="mode mode_near">Unaccomplished</span>';
                                          }
                                         }
                                    }
                                    else if($taskType == 'monthly'){
                                      $sessionDateNow=$_SESSION['date_string'];
                                      $date = new DateTime($sessionDateNow);
                                      $weekMonth = $date->format("W");
                                      // $weekMonth = weekOfMonth($_SESSION['date_string']);
                        $month1 = $_SESSION['month'];
                        $year1 = $_SESSION['year'];
                                      
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
                                         else{
                                          $lastmonth =  date("F", strtotime("previous month"));
  
                                          $meronBaSiyaLastMonth = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$lastmonth' AND `year` = '$year1' ;";
                                          // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                          $resultm = mysqli_query($con, $meronBaSiyaLastMonth);
      
                                          $meronlastMonth = mysqli_num_rows($resultm);

                                          if($meronlastMonth >=1){
                                            echo '<span id = "doneORnot" class="mode mode_done">On going</span>';
                                          }
                                          else if($meronlastMonth <=0){
                                        echo '<span id = "doneORnot" class="mode mode_near">Unaccomplished</span>';

                                          }
                                         }
                                    
                                    }
                                    else if($taskType == 'daily'){
                                      $sessionDateNow=$_SESSION['date_string'];
                                      $date = new DateTime($sessionDateNow);
                                      $weekMonth = $date->format("W");
                                      // $weekMonth = weekOfMonth($_SESSION['date_string']);
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
                                      if($noOfDays >= 2){
                                        echo '<span id = "doneORnot" class="mode mode_late">LATE</span>';
                                      }
                                      else if($noOfDays <=1 && $noOfDays >=0){
                                        echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                      }
                                      else if($noOfDays <1){
                                        echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                      }
                                      $don = "1";
                                    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                                         }
                                         else{
                                          $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
                                          $result = mysqli_query($con, $selectUserTask);
                                          
                                          while($userRow = mysqli_fetch_assoc($result)){
                                            $today = $userRow['dateStarted'];
                                          }
    
                                          // $from=date_create(date('Y-m-d'));
                                          // $to=date_create(date('Y-m-d', strtotime($today)));
                                          // $diff=date_diff($to,$from);
                                          // // print_r($diff);
                                          // $reason =  $_SESSION['reason'];
                                          // $finalDiff =  $diff->format('%R%a');
                                          // $finalDiff = $finalDiff-1;
                                          
// $start = date_create(date('Y-m-d'));
// // echo "<script> console.log('$start') </script>";
// $end = date_create(date('Y-m-d', strtotime($today)));
// otherwise the  end date is excluded (bug?)

$end = new DateTime(date('Y-m-d'));
$start = new DateTime(date('Y-m-d', strtotime($today)));
$result = $start->format('Y-m-d');
// echo $result;


$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$finalDiff = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
$holidays = array('2022-01-01');

foreach($period as $dt) {
    $curr = $dt->format('D');
 
    // substract if Saturday or Sunday
    if ($curr == 'Sat' || $curr == 'Sun') {
      $finalDiff--;
     
    }

    // (optional) for the updated question
     if (in_array($dt->format('Y-m-d'), $holidays)) {
      $finalDiff--;
    }
}

$finalDiff=$finalDiff-2;
// echo $finalDiff; // return difference except weekends
                                          if($finalDiff >=2){
                                            echo '<span id = "doneORnot" class="mode mode_near">Unaccomplished</span>';
                                              }
                                              else if($finalDiff <= 0){
                                            echo '<span id = "doneORnot" class="mode mode_done">On Going</span>';
                                              }
                                              else if($finalDiff ==1){
                                                echo '<span class="⚠"></span><span id = "doneORnot" class="mode mode_done">On goinqg</span>';
                                                  }
                                                  // echo $finalDiff;
                                         }
                                    }
                                ?> </td>
                                 <td style="width: 30%">
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
                                           
                                           
                                             <div class="form-group" id="daysLateDiv">
                                                    <label for="message-text" class="col-form-label" >No. of days late</label>
                                                    <input class="form-control" name="daysLate" id="daysLate"></input>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Reason:</label>
                                                    <textarea class="form-control" name="reasonInput" id="getReason"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Action:</label>
                                                    <textarea class="form-control" name="ActionInputwithLate" id="getAction"></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="reason" id="submitReasonAndAction" class="btn btn-primary">Save reason</button>
                                              </div>
                           
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal fade" id="actionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">State your action.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                           
                                           
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Action:</label>
                                                    <textarea class="form-control" name="actionInput" id="actionText"></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" id="submitAction" name="action"class="btn btn-primary">Save action</button>
                                              </div>
                           
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal fade" id="reasonModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update your reason.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                           
                                           
                                            <input style="display: none" name="ForFinishedTaskName" id="ForFinishedTaskID"> 
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Reason:</label>
                                                    <textarea class="form-control" name="reasonInputUpdate" id="reasonUpdate1"></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Action:</label>
                                                    <textarea class="form-control" name="actionInputUpdateLate" id="actionUpdate1"></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="reasonUpdate" id="reasonAndActionUpdateOnly"class="btn btn-primary">Save reason</button>
                                              </div>
                           
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal fade" id="actionModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update your action.</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                           
                                           
                                              <input style="display: none" name="ForFinishedTaskNameForActionOnly" id="ForFinishedTaskIDActionOnly"> 
                                            
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Action:</label>
                                                    <textarea class="form-control" name="actionInputUpdate" id="actionUpdateText"></textarea>
                                                  </div>
                                                  
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="actionUpdate" id="submitUpdateAction" class="btn btn-primary">Save action</button>
                                              </div>
                           
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                                        <?php
                                                              // echo $data['taskType'];
                                                     

                                                 
                                                      ?>
                                <div class="row">
                                  <div class="col-3">
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
                        $dateForNow = $_SESSION['date_string'];
                        $date = new DateTime($dateForNow);
                        $week = $date->format("W");
                        $weekMonth = $week;
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
                                      $dateForNow = $_SESSION['date_string'];
                        $date = new DateTime($dateForNow);
                        $week = $date->format("W");
                        $weekMonth = $week;
                                      // $weekMonth = weekOfMonth($_SESSION['date_string']);
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
                                      $dateForNow = $_SESSION['date_string'];
                        $date = new DateTime($dateForNow);
                        $week = $date->format("W");
                        $weekMonth = $week;
                                      // $weekMonth = weekOfMonth($_SESSION['date_string']);
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
                                  <div class="col-9" style="padding-left: 90px">
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
                                      $reason = $userRow['reason'];
                                      $action = $userRow['action'];
                                  }
                                  if($noOfDays>=3){
                                   ?> <a href="index.php?Update=<?php echo $fTaskId ?>" style="display: none" id= "updates<?php echo $fTaskId ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                      <!-- <a href="index.php?UpdateModal=<?php echo $fTaskId ?>"  id= "update<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a> -->
                                      <a class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" href="#" data-fid="<?php echo $fTaskId ?>"  data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'       style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                    

                                      

                                    <?php
                                  }
                               else{

                               
                                  // echo $noOfDays;
                                  ?>
                                      <a href="index.php?UpdateAction=<?php echo $fTaskId ?>" style="display: none" id= "updatesAction<?php echo $fTaskId ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                      <!-- <a href="index.php?UpdateModalAction=<?php echo $fTaskId ?>"  id= "updateAction<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a> -->
                                      <!-- <span class="mode mode_late"><a style = "color: white" href="#" data-location="<?php echo $fileloc?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->
                                      <a class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" href="#"  data-fid="<?php echo $fTaskId ?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#actionModalUpdate'       style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                    
                                      <!-- <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a> -->

                                   
                                      <?php
                               }
                               ?>
                                      <a href="index.php?Cancel=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
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
                                      $reason = $userRow['reason'];
                                      $action = $userRow['action'];
                                  }
                                  if($noOfDays>=3){
                                    ?> <a href="index.php?Update=<?php echo $fTaskId ?>" style="display: none" id= "updates<?php echo $fTaskId ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                    <!-- <a href="index.php?UpdateModal=<?php echo $fTaskId ?>"  id= "update<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a> -->
                                    <a class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" href="#" data-fid="<?php echo $fTaskId ?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'       style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                  
                                     <?php
                                   }
                                else{
                                  //  echo $noOfDays;
                                  ?>
                                 <a href="index.php?UpdateAction=<?php echo $fTaskId ?>" style="display: none" id= "updatesAction<?php echo $fTaskId ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                      <!-- <a href="index.php?UpdateModalAction=<?php echo $fTaskId ?>"  id= "updateAction<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a> -->
                                      <a class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" href="#" data-fid="<?php echo $fTaskId ?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#actionModalUpdate'       style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                    
                                      
                                      <!-- <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a> -->
                                      <?php
                                }
                                ?>
                                      <a href="index.php?Cancel=<?php echo $fTaskId ?>" id= "cancel<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
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
                                      $reason = $userRow['reason'];
                                      $action = $userRow['action'];

                                          }
                                          // echo $noOfDays;
                                          if($noOfDays>=2){
                                            ?> <a href="index.php?Update=<?php echo $fTaskId ?>" style="display: none" id= "updates<?php echo $fTaskId ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                            <!-- <a href="index.php?UpdateModal=<?php echo $fTaskId ?>"  id= "update<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a> -->
                                      <a class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" data-fid="<?php echo $fTaskId ?>" href="#"  data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'       style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                          
                                             <?php
                                           }
                                           else{
                                        ?>
                                                  <a href="index.php?UpdateAction=<?php echo $fTaskId ?>" style="display: none" id= "updatesAction<?php echo $fTaskId ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
                                      <!-- <a href="index.php?UpdateModalAction=<?php echo $fTaskId ?>"  id= "updateAction<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a> -->
                                      <a class="btn btn-outline-<?php if($don == "1"){ echo 'info';} else{ echo 'secondary';}?>" href="#" data-fid="<?php echo $fTaskId ?>"  data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#actionModalUpdate'       style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Update</a>
              
                                        
                                            <!-- <a href="index.php?FinishSample=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'secondary';} else{ echo 'primary';}?>" style="<?php if($don == "1"){ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a> -->
                                            <?php
                                           }
                                           ?>
                                            <a href="index.php?Cancel=<?php echo $fTaskId ?>" id= "finished<?php echo $data['usertaskID'] ?>"class="btn btn-outline-<?php if($don == "1"){ echo 'danger';} else{ echo 'secondary';}?>" style="<?php if($don == "1"){ ?> pointer-events: auto; <?php } else{ ?> pointer-events: none; <?php } ?>font-size: 15px; padding: 3px; height: 25px;width:30px; margin:0 auto;" >X</a>
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
    }
    if(isset($_GET['UpdateModal'])){
      $_SESSION['TaskID'] = $_GET['UpdateModal'];
      $taskID = $_SESSION['TaskID'];
      $getReason = "SELECT `reason`, `action` FROM `finishedtask` WHERE FinishedTaskID = '$taskID' LIMIT 1";
      $result = mysqli_query($con, $getReason);

      while($userRow = mysqli_fetch_assoc($result)){
        // $today = $userRow['dateStarted'];
        $reason = $userRow['reason'];
        $action = $userRow['action'];


      }

      echo "<script> 
      document.getElementById('reasonUpdate1').value='$reason';
      document.getElementById('actionUpdate1').value='$action';

      $('#reasonModalUpdate').modal('show');
      </script>";
    }

  
    if(isset($_GET['UpdateModalAction'])){
      $_SESSION['TaskID'] = $_GET['UpdateModalAction'];
      $taskID = $_SESSION['TaskID'];
      $getAction = "SELECT `action` FROM `finishedtask` WHERE FinishedTaskID = '$taskID' LIMIT 1";
      $result = mysqli_query($con, $getAction);

      while($userRow = mysqli_fetch_assoc($result)){
        // $today = $userRow['dateStarted'];
        $action = $userRow['action'];


      }
      echo "<script> 
      document.getElementById('actionUpdateText').value='$action';
      $('#actionModalUpdate').modal('show');
      </script>";
    }
    
    if(isset($_GET['FinishSample'])){
      $taskID = $_GET['FinishSample'];
      echo "<script> console.log('$taskID');</script>";
      $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
      $result = mysqli_query($con, $selectUserTask);
      
      while($userRow = mysqli_fetch_assoc($result)){
        // $today = $userRow['dateStarted'];
        $taskType = $userRow['taskType'];
      }
//       // $today = $_SESSION['today'];
//       $from=date_create(date('Y-m-d'));
//       $to=date_create(date('Y-m-d', strtotime($today)));
//       $diff=date_diff($to,$from);
//       // print_r($diff);
//       $reason =  $_SESSION['reason'];
//       $finalDiff =  $diff->format('%R%a');
//       if($finalDiff >=3 &&  $reason==""){
       
//     echo "<script> $('#reasonModal').modal('show');
// console.log($finalDiff);
//     document.getElementById('daysLate').value=$finalDiff;
//     </script>";
//     $_SESSION['noOfDaysLate']=$finalDiff;
//     $_SESSION['TaskID'] = $_GET['FinishSample'];
//       }
//       else{
//     $_SESSION['noOfDaysLate']=$finalDiff;
//         $_SESSION['TaskID'] = $_GET['FinishSample'];
//         $taskID = $_SESSION['TaskID'];
//         echo "<script>  
//           document.getElementById('finished$taskID').click();      

//           </script>";
//       }


// echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
// $month = date("F");
// $year = date("Y");
$weeknumberrr = weekOfMonth($_SESSION['date_string']);
// echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

if ($taskType == 'weekly'){


          $mondaylw =  date("Y-m-d", strtotime("monday last week"));
          $sundaylw =  date("Y-m-d", strtotime("sunday last week"));
             
          $meronBaSiyaLastWeek = "SELECT * FROM `finishedtask` WHERE `taskID` = '$taskID' AND `realDate` BETWEEN '$mondaylw' AND '$sundaylw';";
          // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
          $result = mysqli_query($con, $meronBaSiyaLastWeek);
          $meron = mysqli_num_rows($result);
          if($meron <=0){
            $_SESSION['noOfDaysLate']='4';
            $_SESSION['TaskID'] = $_GET['FinishSample'];
            echo "<script> 
            document.getElementById('daysLateDiv').style.display = 'none';
            $('#reasonModal').modal('show');
// console.log($finalDiff);
  //document.getElementById('daysLate').value=$finalDiff;
  </script>";
          }
          else if($meron >=1){
     $_SESSION['noOfDaysLate']='0';
         $_SESSION['TaskID'] = $_GET['FinishSample'];
         $taskID = $_SESSION['TaskID'];
         echo "<script>  
        $('#actionModal').modal('show');
           //document.getElementById('finished$taskID').click();   DITO AKO NATAPOS   
                   </script>";

          }
          
         
    }
    else if($taskType == 'monthly'){
      $year1 = $_SESSION['year'];
                    

                    
                        $lastmonth =  date("F", strtotime("previous month"));

                        $meronBaSiyaLastMonth = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$lastmonth' AND `year` = '$year1' ;";
                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                        $resultm = mysqli_query($con, $meronBaSiyaLastMonth);

                        $meronlastMonth = mysqli_num_rows($resultm);

                        if($meronlastMonth >=1){
                          $_SESSION['noOfDaysLate']='0';
         $_SESSION['TaskID'] = $_GET['FinishSample'];
         $taskID = $_SESSION['TaskID'];
         echo "<script>  
         $('#actionModal').modal('show');
          //  document.getElementById('finished$taskID').click();    DITO AKO NATAPOS  
                   </script>";

                        }
                        else if($meronlastMonth <=0){
                          $_SESSION['noOfDaysLate']= '4';
                          $_SESSION['TaskID'] = $_GET['FinishSample'];
                          echo "<script> 
                          document.getElementById('daysLateDiv').style.display = 'none';
                          $('#reasonModal').modal('show');
      
                </script>";

                        }
                       
    
    }
    else if($taskType == 'daily'){

  
          $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
          $result = mysqli_query($con, $selectUserTask);
          
          while($userRow = mysqli_fetch_assoc($result)){
            $today = $userRow['dateStarted'];
          }

          // $from=date_create(date('Y-m-d'));
          // $to=date_create(date('Y-m-d', strtotime($today)));
          // $diff=date_diff($to,$from);
          // // print_r($diff);
          // $finalDiff =  $diff->format('%R%a');
          // $finalDiff = $finalDiff-1;

          $end = new DateTime(date('Y-m-d'));
          $start = new DateTime(date('Y-m-d', strtotime($today)));
// otherwise the  end date is excluded (bug?)
$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$finalDiff = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
$holidays = array('2012-09-07');

foreach($period as $dt) {
    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sat' || $curr == 'Sun') {
      $finalDiff--;
    }

    // (optional) for the updated question
    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
      $finalDiff--;
    }
}

$finalDiff=$finalDiff-2;
          if($finalDiff >=2 ){
            $_SESSION['noOfDaysLate']=$finalDiff;
         $_SESSION['TaskID'] = $_GET['FinishSample'];
         $taskID = $_SESSION['TaskID'];
            echo "<script> 
            $('#reasonModal').modal('show');
// console.log($finalDiff);
  document.getElementById('daysLate').value=$finalDiff;
  </script>";
              }
              else {
                $_SESSION['noOfDaysLate']=$finalDiff;
         $_SESSION['TaskID'] = $_GET['FinishSample'];
         $taskID = $_SESSION['TaskID'];
         echo "<script>  
         console.log('$taskID');
         $('#actionModal').modal('show');
          //  document.getElementById('finished$taskID').click();     DITO AKO NATAPOS 
                     </script>";
                  }
         
    }

    }
    

    
                                                   
    if(isset($_POST['reason'])){
      $_SESSION['reason'] = $_POST['reasonInput'];
      $_SESSION['action'] = $_POST['ActionInputwithLate'];

      
      if($_SESSION['reason'] != "" || $_SESSION['action']!=""){
        $taskID = $_SESSION['TaskID'];
        echo $taskID;
          echo "<script> // document.getElementById('finishedsample$taskID').style.display='none';
          document.getElementById('finished$taskID').click();      

          </script>";
      }
      else{
        ?><script>
      Swal.fire({
    icon: 'error',
    title: 'Ooppss!',
    text: 'You have to complete the form',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
      }
    }

    if(isset($_POST['action'])){
      $_SESSION['action'] = $_POST['actionInput'];
      if($_SESSION['action'] != ""){
        $taskID = $_SESSION['TaskID'];
        echo $taskID;
          echo "<script> // document.getElementById('finishedsample$taskID').style.display='none';
          document.getElementById('finished$taskID').click();      

          </script>";
      }
      else{
        ?><script>
      Swal.fire({
    icon: 'error',
    title: 'Ooppss!',
    text: 'You have to complete the form',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
      }
    }

    if(isset($_POST['reasonUpdate'])){
      $_SESSION['reason'] = $_POST['reasonInputUpdate'];
      $_SESSION['action'] = $_POST['actionInputUpdateLate'];
      $finishedTaskId = $_POST['ForFinishedTaskName'];
      if($_SESSION['reason'] != "" || $_SESSION['action'] != ""){
        $taskID = $finishedTaskId;
        // echo $_SESSION['reason'];
        // echo $taskID;

          echo "<script>  //document.getElementById('update$taskID').style.display='none';
          document.getElementById('updates$taskID').click();      

          </script>";
      }
      else{
        ?><script>
      Swal.fire({
    icon: 'error',
    title: 'Ooppss!',
    text: 'You have to complete the form',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
      }
    }
    
    if(isset($_POST['actionUpdate'])){
      $_SESSION['action'] = $_POST['actionInputUpdate'];
      $finishedTaskId = $_POST['ForFinishedTaskNameForActionOnly'];
      
      if($_SESSION['action'] != ""){
        $taskID = $finishedTaskId;
        echo $_SESSION['reason'];
        echo $taskID;
        echo "<script> console.log('$taskID') </script>";
          echo "<script>  //document.getElementById('updateAction$taskID').style.display='none';
          document.getElementById('updatesAction$taskID').click();      

          </script>";
      }
      else{
        ?><script>
      Swal.fire({
    icon: 'error',
    title: 'Ooppss!',
    text: 'You have to complete the form',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
      }
    }


    ?>

                              
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
//Enter Event
//     var input = document.getElementById("reasonUpdate1");
//     var input2 = document.getElementById("actionUpdate1");

//     input.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("reasonAndActionUpdateOnly").click();
//   }
// });
// input2.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("reasonAndActionUpdateOnly").click();
//   }
// });

// var actionInput = document.getElementById("actionText");

// actionInput.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("submitAction").click();
//   }
// });

// var reason1 = document.getElementById("getReason");
//     var action1 = document.getElementById("getAction");

//     reason1.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("submitReasonAndAction").click();
//   }
// });
// action1.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("submitReasonAndAction").click();
//   }
// });


// var actionUpdate = document.getElementById("actionUpdateText");

// actionUpdate.addEventListener("keypress", function(event) {
//   if (event.key === "Enter") {
//     event.preventDefault();
//     document.getElementById("submitUpdateAction").click();
//   }
// });

//End of Enter event

$('#actionModalUpdate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) ;// Button that triggered the modal
  var action = button.data('action');
 var finishedTaskID = button.data('fid');

  
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body reasonUpdate1').val(recipient)
  document.getElementById("actionUpdateText").value = action;
  document.getElementById("ForFinishedTaskIDActionOnly").value = finishedTaskID;


  
})

$('#reasonModalUpdate').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) ;// Button that triggered the modal
  var action = button.data('action');
  var reason = button.data('reason');
 var finishedTaskID = button.data('fid');
  

 

  
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  // modal.find('.modal-title').text('New message to ' + recipient)
  // modal.find('.modal-body reasonUpdate1').val(recipient)
  document.getElementById("actionUpdate1").value = action;
  document.getElementById("reasonUpdate1").value = reason;
  document.getElementById("ForFinishedTaskID").value = finishedTaskID;


})


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