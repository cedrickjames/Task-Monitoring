<?php
  session_start();
  include ("./connection.php");

  
  //sample of printing weeks number of certain dates

  // Create a new DateTime object

  
  // $arrayWeekNumbers=array("29", "28");

  // $arrlength = count($arrayWeekNumbers);

  // for($x = 0; $x < $arrlength; $x++) {
   
  //   $week = 'week '.$arrayWeekNumbers[$x];
  //   echo $week;
  //   echo "<br>";
  // }
  $arrayNumberOfDaysPass=array();
  $arrayWeekNumbers=array();
  $arrayMonth=array();
  $arrayYear=array();
  $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '191' LIMIT 1";
            $result = mysqli_query($con, $selectUserTask);
  
            while($userRow = mysqli_fetch_assoc($result)){
              $dateStarted = $userRow['dateStarted'];
            }
  
            $date = new DateTime($dateStarted);
            // echo "Next monday is: ";
            // $date->format('Y-m-d');
            $startDate = $date->format('Y-m-d');
            $start = new DateTime($startDate);
            $end = new DateTime();
            // otherwise the  end date is excluded (bug?)
            $start->modify('+1 day');
            // echo date('F j, Y');
            $interval = $end->diff($start);
            
            // total days
            $days = $interval->days;
            // echo $days;
            // create an iterateable period of date (P1D equates to 1 day)
            $period = new DatePeriod($start, new DateInterval('P1D'), $end);
            
            // best stored as array, so you can add more than one
            $holidays = array('2022-07-15');
            $weekNo ="";
            $NumberOfWeeksToDone = 0;
            foreach($period as $dt) {
                $curr = $dt->format('W');
                $date = $dt->format('Y-m-d');
                $currMonth = $dt->format('F');
                $currYear = $dt->format('Y');
                echo $date;
                echo "<br>";
                array_push($arrayNumberOfDaysPass,"$date");

       
                  // $NumberOfWeeksToDone = $NumberOfWeeksToDone +1;
                  array_push($arrayWeekNumbers,"$curr");
                  array_push($arrayMonth,"$currMonth");
                  array_push($arrayYear,"$currYear");


                  // echo $curr;
                  // echo "\n";

                
            }


$arrlength = count($arrayNumberOfDaysPass);
echo $arrlength;












  $car = array("2022-07-22", "2022-07-23", "2022-07-25");
$arrlength = count($car);

for($x = 0; $x < $arrlength; $x++) {
  // echo $cars[$x];
  // echo "<br>";
  $day1 = $car[$x];
  $date = new DateTime($day1);
  $day = $date->format('D');
                  if($day =="Sat" || $day == "Sun"){
                 
                  }
                  else{
                    echo $day;
                  }
}


$date = new DateTime('July 08, 2022');

// Modify the date it contains
// echo $date;
$date->modify('next monday');


$startDate = $date->format('Y-m-d');
// echo date('r');
$start = new DateTime($startDate);
$end = new DateTime();
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
$weekNo ="";
foreach($period as $dt) {
    $curr = $dt->format('W');
    if($curr==$weekNo){
      echo null;
    }
    else{
      echo $curr;
      echo "\n";
      $weekNo = $curr;
    }
}
// Output
echo "Next monday is: ";
          $DateEnd =  $date->format('Y-m-d');
          echo $date->format('Y-m-d');
          $end = new DateTime(date('Y-m-d'));
          $start = new DateTime($DateEnd);
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

         echo "<br>";
          echo "Number of days past since the next monday of that day: ";
          echo $finalDiff;

          echo "<br>";
  $ddate = '2022-07-24';
  $date = new DateTime($ddate);
  
  $week = $date->format("W");
  echo "Weeknumber: $week";
  echo "<br>";



$aug = "Jul";
  $fDateOfTheMonth = new DateTime('first day of this month');
 
  $fday =  $fDateOfTheMonth->format('Y-m-d');
  echo "First day of the month: ";
  echo $fday;
  $lDateOfTheMonth = new DateTime('July 13, 2022');
$sub = 2;
  $lDateOfTheMonth->modify("-$sub day");
  $lday =  $lDateOfTheMonth->format('F j, Y');
  $realDate = date('Y-m-d', strtotime($lday));
  echo "<br>";
  echo "subtracted Date from 2: ";
  echo $realDate;
  echo "<br>";


  //code of getting week numbers from this date to this date
// $start = new DateTime("July 04, 2022");
// $end = new DateTime();
// // otherwise the  end date is excluded (bug?)
// $end->modify('+1 day');
// // echo date('F j, Y');
// $interval = $end->diff($start);

// // total days
// $days = $interval->days;
// // echo $days;
// // create an iterateable period of date (P1D equates to 1 day)
// $period = new DatePeriod($start, new DateInterval('P1D'), $end);

// // best stored as array, so you can add more than one
// $holidays = array('2022-07-15');
// $weekNo ="";
// foreach($period as $dt) {
//     $curr = $dt->format('W');
//     if($curr==$weekNo){
//       echo null;
//     }
//     else{
//       echo $curr;
//       echo "\n";
//       $weekNo = $curr;
//     }
// }


//end of sample of printing weeks number of certain dates
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

  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- <link rel="stylesheet" href="design_files/css/MainPageStyle.css"> -->
<link rel="stylesheet" href="design_files/css/ListOfMembersStyle.css?v=<?php echo time(); ?>">

<link rel="stylesheet" href="design_files/css/admin.css">

<link rel="stylesheet" href="design_files/css/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">


<script type="text/javascript" src="./js/jquery.slim.min.js"></script>
<script type="text/javascript" src="./design_files/css/bootstrap.min.js"></script>

<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">


</head>
    <body style="background: linear-gradient(to right, #FFFDE4, #b3dcff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
    <?php

  $db= $con;
$tableName="usertask";
$tableName2="users";


    if(!isset( $_SESSION['connected'])){
    
    
      header("location: signin.php");
        
      // 
    }
    if($_SESSION['userlevel'] == "PIC"){
      header("location: index.php");

    }
    function php_func(){
      echo " Have a great day";
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
  // php_func();
    $editTaskVar = "0";

    $dateToPass = "";
    $dateToPassEnd = "";

    $dateToPass1 = "";
    $dateToPass2 = "";

    $picfocus = "false";
    $taskfocus = "false";
    $sectionfocus= "focus";

$dateToday = date('Y-m-d');
$fDateOfTheMonth = new DateTime('first day of '.$dateToday);
 
$FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');
$dateNow = date('Y-m-d');

    $month = date("F");
    $monthEnd = date("F");

    $year = date("Y");
    $yearEnd = date("Y");

    $today = $_SESSION['FirstDayOfTheMonth']; 
    $todayEnd = date("F j, Y"); 

    $date_string = date('Y-m-d');
    $date_stringEnd = date('Y-m-d');

    
    if(isset($_POST['submitdate'])){
   $datePicker = $_POST['datepicker'];
 $datePickerEnd = $_POST['datepickerEnd'];


    $month = date('F', strtotime($datePicker));
    $monthEnd = date('F', strtotime($datePickerEnd));

    $year = date('Y', strtotime($datePicker));
    $yearEnd = date('Y', strtotime($datePickerEnd));

    $today = date('F j, Y', strtotime($datePicker));
    $todayEnd = date('F j, Y', strtotime($datePickerEnd));


    $datePickerget = $datePicker;
    $datePickergetEnd = $datePickerEnd;

    $date_string= date('Y-m-d', strtotime($datePickerget));
    $date_stringEnd= date('Y-m-d', strtotime($datePickergetEnd));

    
    
  $dateToPass = date('Y-m-d', strtotime($datePicker));
  $dateToPassEnd = date('Y-m-d', strtotime($datePickerEnd));

  $taskfocus = "true";


    }

    
    $month1 = date("F");
    $year1 = date("Y");
    $today1 = date("F j, Y"); 
    $date_string1 = date('Y-m-d');
    

    if(isset($_POST['submitdate1'])){
   $datePicker1 = $_POST['datepicker1'];

    $month1 = date('F', strtotime($datePicker1));
    $year1 = date('Y', strtotime($datePicker1));
    $today1 = date('F j, Y', strtotime($datePicker1));

    $datePickerget1 = $datePicker1;
    $date_string1= date('Y-m-d', strtotime($datePickerget1));


  $picfocus = "true";
  $dateToPass1 = date('Y-m-d', strtotime($datePicker1));



  

    }

    if(isset($_POST['UpdateStatusName'])){
      $radioStatus=$_POST['radioStatus']; 
      $finishedTaskId = $_POST['finishedTaskID'];
      if($radioStatus=="4"){
        $sqlUpdateStatus = "UPDATE `finishedtask` SET `noOfDaysLate`='5', `isCheckedByLeader` = true WHERE `FinishedTaskID`='$finishedTaskId';";
        mysqli_query($con, $sqlUpdateStatus);
      
      }
      else{
        $sqlUpdateStatus = "UPDATE `finishedtask` SET `noOfDaysLate`='0', `isCheckedByLeader` = true WHERE `FinishedTaskID`='$finishedTaskId';";
        mysqli_query($con, $sqlUpdateStatus);
      
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
        // echo '<script>console.log("TEST: '.$resultUserId.'")</scrip>';
        }

      $userTASKid = $_POST['containerOfTaskId'];
      $userTaskName = $_POST['tasknamemodal'];
      $userTaskArea = $_POST['taskArea1'];
      $userTaskCategory = $_POST['taskCategory1'];
      $userTaskType = $_POST['taskType1'];
      

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

    $month2 = date("F");
    $year2 = date("Y");
    $today2 = date("F j, Y"); 
    $date_string2 = date('Y-m-d');
    if(isset($_POST['submitdate2'])){
   $datePicker2 = $_POST['datepicker2'];

    $month2 = date('F', strtotime($datePicker2));
    $year2 = date('Y', strtotime($datePicker2));
    $today2 = date('F j, Y', strtotime($datePicker2));

    $datePickerget2 = $datePicker2;
    $date_string2= date('Y-m-d', strtotime($datePickerget2));
    
    $sectionfocus = "true";

  $dateToPass2 = date('Y-m-d', strtotime($datePicker2));

 

    }


    //echo("<script>console.log('USER: " .$_SESSION['username'] . "');</script>");
    //echo("<script>console.log('USER: " .$_SESSION['userlevel'] . "');</script>");

 //echo("<script>console.log('Week: " .weekOfMonth('2022-04-10') . "');</script>");
 
    $username =  $_SESSION['username'];
    //echo("<script>console.log('USER: " .$username . "');</script>");

    $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
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
     $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department'  ORDER BY taskCategory ASC;";
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

     //echo("<script>console.log('USER: " .$username . "');</script>");
     $tableNameCat = 'category';
     $columnsCat= ['categoryId', 'CategoryName'];
     $fetchDataCat = fetch_dataCat($db, $tableNameCat, $columnsCat, $username);
 
     function fetch_dataCat($db, $tableNameCat, $columnsCat, $username){
       if(empty($db)){
        $msg= "Database connection error";
       }elseif (empty($columnsCat) || !is_array($columnsCat)) {
        $msg="columns Name must be defined in an indexed array";
       }elseif(empty($tableNameCat)){
         $msg= "Table Name is empty";
      }else{
     

      $query = "SELECT * FROM `category`;";
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
      $query = "SELECT * FROM `users` WHERE `userlevel` = 'PIC' AND department = '$Department';";
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
      $query = "SELECT * FROM `users` WHERE `userlevel` = 'PIC'  AND department = '$Department';";
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


if(isset($_POST['AddCategory'])){
     
  $category = $_POST['inputCategory'];

  if($category == ""){
    ?><script>
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'You have to enter a category.',
      //   footer: '<a href="">Why do I have this issue?</a>'
      })
       </script><?php 
  }
  else{
    $sqlinsert = "INSERT INTO `category`(`categoryId`, `CategoryName`) VALUES ('','$category')";
    mysqli_query($con, $sqlinsert);
    ?><script>
    Swal.fire({
  icon: 'success',
  title: 'Success',
  text: 'You have successfully add category',
//   footer: '<a href="">Why do I have this issue?</a>'
})
 </script><?php 
  }
         
}


?>

<!-- <div class="normal-container">
	<div class="smile-rating-container">
		<div class="smile-rating-toggle-container">
			<form class="submit-rating">
				<input id="meh"  name="satisfaction" type="radio" /> 
				<input id="fun" name="satisfaction" type="radio" /> 
				<label for="meh" class="rating-label rating-label-meh">Bad</label>
				<div class="smile-rating-toggle"></div>
				
				<div class="rating-eye rating-eye-left"></div>
				<div class="rating-eye rating-eye-right"></div>
				
				<div class="mouth rating-eye-bad-mouth"></div>
				
				<div class="toggle-rating-pill"></div>
				<label for="fun" class="rating-label rating-label-fun">Fun</label>
			</form>
		</div>
	</div>
</div> -->

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
                  <a class="nav-link" href="daily.php">Daily</a>
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
                    <a class="dropdown-item"  href="./signup.php">Register User</a>
                    <a class="dropdown-item"  href="./addTask.php">Add Task</a>
                    <a class="dropdown-item" id="btn-addCategory" href="#" data-toggle='modal'
                      data-target='#modalAdminCategory'>Add Category</a> 
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
                <form style="width: 100%; padding: 10px; border: 0;" >
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
        <div class="modal fade" id="modalAdminCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               
                   
                <form action="leader.php" method = "POST" id="categoryForm" style="width: 100%; padding: 10px; border: 0;" >
                     
                  <div class="form-group">
                   
                    <label  for="message-text" class="col-form-label">Enter category</label>
                    <input  type="text"class="form-control"  name="inputCategory" id="inputCategory" >
                  </div>
                  <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:480px;"> 
                        <table class="table table-striped table-hover" style="width:100%;" id="filtertable" class="table datacust-datatable Table ">
                            <thead  class="thead-dark" >
                                <tr>
                                <th style="min-width:15px;">Categories</th>
                    </tr>
                    </thead>
                    <tbody id="CategoryTable">
                       <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                  if(is_array($fetchDataCat)){      
                                 
                                  foreach($fetchDataCat as $data){
                                    ?>
                                    <tr>
                                      <td><?php echo $data['CategoryName']; ?></td>
                                  </tr>
 <?php
                         }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchData; ?>
                        </td>
                         </tr>
                          <?php
                          echo "PETMALU";
    }                     ?>                   
                            </tbody>
                    </table>
                    </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="AddCategory" class="btn btn-primary" >Add</button>
            
               </div>
                </form>
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
                                       <form action="leader.php" method = "POST" id="updateStatusForm" style="width: 100%; padding: 10px; border: 0;" >

                                              <div class="modal-body" >
                                                <input type="text" style="display: none" name="finishedTaskID" id="finishedID">
                                             
                                              

                                                <div class="form-group">
  <div class="normal-container">
	<div class="smile-rating-container">
		<div class="smile-rating-toggle-container">
			<div class="submit-rating">
				<input id="radioLate"  name="radioStatus" value="4" type="radio" checked/> 
				<input id="radioOnTime" name="radioStatus" value="0" type="radio" /> 
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
                                                    <label for="message-text" class="col-form-label">Reason</label>
                                                    <textarea class="form-control" name="reasonInputUpdate" id="reasonUpdate1" disabled></textarea>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Action</label>
                                                    <textarea class="form-control" name="actionInputUpdateLate" id="actionUpdate1" disabled></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                
                                                <button type="submit"  id="UpdateStatus" name="UpdateStatusName"class="btn btn-success">Update Status</button>
                                              </div>
                           
                                              </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>

        <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div  class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
        <form action="leader.php" method = "POST" style="width: 100%; padding: 0; border: 0;">
        <input type="text" id="containerOfTaskId" name="containerOfTaskId" style="display: none">
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Members</label>
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
                                    <?php
                                  if(is_array($fetchDataCat)){      
                                
                                  foreach($fetchDataCat as $data){
                                  ?>
                                 <option value="<?php echo $data['CategoryName']??''; ?>"><?php echo $data['CategoryName']??''; ?></option>
                                 <?php
                            }}else{ ?>
                            
                              <option colspan="8">
                          <?php echo $fetchDataCat; ?>
                        </option>
                          
                          <?php
    }?>
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

        <div class="parent" style= "max-height: 100%; height: 100%">
          <div class="wrapper" style= " max-height: 100%; height: 100% ">
         
          <div class="row" style= "margin-right: 0px; max-height: 100%; height: 100% " >
          <div class="col-4">
            <h3 style=" margin: 20px">  <i style="font-size: 30px;" class="fas fa-user"></i>  <?php echo $_SESSION['f_name'] ?> <?php echo $_SESSION['l_name'] ?>
             
            </h3>
          </div>
          <div class="col-4">
            <h3 style=" margin: 20px"> <?php echo $today ?> Week <?php $date = new DateTime($date_string);
  $week = $date->format("W"); echo "$week"; ?>
            </h3>
          </div>
          <div class="col-4">
            <h3 style=" margin: 20px; " class="float-right"> <?php echo $_SESSION['userlevel'] ?> (<?php echo $_SESSION['department'] ?>)</h3>
          </div>

<div class="container"  style="height: 100%; background-color: none;  margin:0 auto; " >
<div class="d-flex justify-content-start col-sm-6" style="background-color: none;padding-left: 0px; margin-left: 30px; width: 100%; max-width: 100% "> 
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
<div class="tab-content" id="myTabContent" style="height: 100%;margin: 30px; margin-top: 0px ">
<div class="tab-pane fade show active" id="task" style="height: 90%;  background-color: none" role="tabpanel" aria-labelledby="task-tab">
  
          <div class="container p-30 " id="TableListOfMembers";  style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
        <div class="ms-1 shadow row" >
            <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Task</h3> 
                        </div>
                        
                        <div class="col-sm-4" style="padding: 0;">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="leader.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">Start</label>
            
            <input type="date" id="datepicker" name="datepicker" style="margin-right: 20px" onchange="filterMonth();">
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
            
            <input type="date" id="datepickerEnd" name="datepickerEnd" onchange="filterMonth();">
            <button type="submit" name="submitdate" class="btn btn-info btn-sm">Submit</button>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="exportData()"> <i style="font-size: 20px;"class="fas fa-file-csv fa-xs"></i> Export</button>
                         
            <!-- <input type="submit" name="submitdate"> -->
            </form>
           
        </div></div>
                        
                        <div class="col-sm-7 add_flex" style="padding: 0">
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
                      <div class="overflow-y overflow-x" style="overflow-y: scroll;overflow-x: scroll; height:580px;"> 
                        <table class="table table-striped " style="width:  100%" id="filtertableMain" class="table datacust-datatable Table ">
                            <thead  class="thead-dark" style="position: sticky;top: -1px;">
                                <tr>
                                    <th style="min-width:15px;">No.</th>
                                    <th style="min-width:40px;">Area</th>
                                    <th style="min-width:50px;">Category</th>
                                    <th style="width:200px;" >Task Name</th>
                                    <th style="width:100px;"  >In charge</th>
                                    <th style="width:180px;"  >Type</th>



                                    <?php 
                                    $date = new DateTime($today);
                                    $dateEnd = new DateTime($todayEnd);
                                    // $dateEnd = new DateTime('2022-08-31');
                                    $selectedMonth = $date->format("M");
                                    $yearoftheDay = $date->format("o");
                                    $yearoftheDaylast = $dateEnd->format("o");

                                    // echo $yearoftheDay;
                                    $selectedEndMonth = $dateEnd->format("M");
                                                                       
                                   $DateTodayNow = $dateEnd->format('Y-m-d');
                                   $StartDateSelected = $date->format('Y-m-d');

                                    $fDateOfTheMonth = new DateTime($StartDateSelected);
                                    // echo "First day of the month: ";
                                    $fday =   $fDateOfTheMonth->format('Y-m-d');
                                    $lDateOfTheMonth = new DateTime($DateTodayNow);
                                    // echo "last day of the month: ";
                                    $lday = $lDateOfTheMonth->format('Y-m-d');
                                    // echo "<br>";
                                  $start = new DateTime($fday);
                                  $end = new DateTime($lday);
                                  
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
                                  $weekNo ="";
                                  $countColumns = 6;
                                  foreach($period as $dt) {
                                      $curr = $dt->format('W');
                                      if($curr==$weekNo){
                                        echo null;
                                      }
                                      else{
                                        $countColumns++;
                                  

                                        ?><th style='min-width:150px;' >Week <?php echo $curr?></th><?php
                                        // echo "<th style='width:240px;' >Week $curr</th>";
                                        // echo $curr;
                                        // echo "\n";
                                        $weekNo = $curr;
                                      }
                                  }
                                  
                                    ?>
                                    <input id="countColumn" disabled style="display: none;" name="countColumnName" value="<?php echo $countColumns ?>">
                                    <!-- <th style="width:8%;" >W1</th>
                                    <th style="width:8%;" >W2</th>
                                    <th style="width:8%;" >W3</th>
                                    <th style="width:8%;" >W4</th>
                                    <th style="width:8%;" >W5</th>
                                    <th style="width:8%;" >W6</th> -->
                                    

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



                                    echo("<script>console.log('taskname : " . $taskname. "');</script>");
                                    
                              //  echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                            ?>
                             
                             <!-- onclick= "PassTaskData('<?php //echo $data['usertaskID']; ?>')" -->
                             <!-- <tr  data-toggle='modal' data-target='#modalAdmin'> -->
                             <tr>
                             <!-- <input id="btn-passdata" class="btn-signin" name="sbtlogin" type="submit" value="Login" style="margin: auto;" disabled> -->
                             <td>
                               
                               <?php echo $sn; ?></td>
                               <td><?php echo $data['taskArea']; ?></td>
                                <td><?php echo $data['taskCategory']; ?></td>
                                <td class="taskNameHover" onclick= "clickpassdata('<?php echo $taskUser?>','<?php echo $taskArea?>','<?php echo $userTaskID?>', '<?php echo $taskname?>','<?php echo $taskCategory?>', '<?php echo $taskType?>' )" data-toggle='modal' data-target='#modalAdmin'><?php echo $data['taskName']; ?></td>
                                <td><?php $fname= $data['username'];    $sql1 = "SELECT f_name FROM `users` WHERE username = '$fname';";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
        while($userRow = mysqli_fetch_assoc($result)){
         $firstname = $userRow['f_name'];
      } echo  $firstname; ?></td>
                                <td><?php echo $data['taskType']??''; ?></td>

                                <!-- start of new code -->
                               <?php 
                                      
                                      $date = new DateTime($today);
                                    //   $date = new DateTime('2022-06-01');

                                      $dateEnd = new DateTime($todayEnd);
                                    //   $dateEnd = new DateTime('2022-08-31');


                                      $selectedMonth = $date->format("M");
                                      $selectedEndMonth = $dateEnd->format("M");
                                    //   echo $selectedEndMonth;
                                    $yearoftheDay = $date->format("o");
                                    $yearoftheDaylast = $dateEnd->format("o");

                                    $DateNowAndToday =  $dateEnd->format('Y-m-d');
                                    $StartDateSelected = $date->format('Y-m-d');
                                    $fDateOfTheMonth = new DateTime($StartDateSelected);
                                    // echo "First day of the month: ";
                                    $fday =   $fDateOfTheMonth->format('Y-m-d');
                                    $lDateOfTheMonth = new DateTime($DateNowAndToday);
                                    // echo "last day of the month: ";
                                    
                                    $lday = $lDateOfTheMonth->format('Y-m-d');
                                    // echo $lday;
                                    // echo "<br>";
                                    // echo $fday;
                                    // echo " ";
                                    // echo $lday;
                                  $start = new DateTime($fday);
                                  $end = new DateTime($lday);
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
                                  $weekNo ="";
                   

                                  foreach($period as $dt) {
                                      $curr = $dt->format('W');
                                      $day = $dt->format('Y-m-d');

                                      $monthOfThisDate=$dt->format('F');
                                      $yearOfThisDate=$dt->format('o');

                                      if($curr==$weekNo){
                                        echo null;
                                      }
                                      else{
                                        // echo "<th style='width:8%;' >Week $curr</th>";
                                        ?>
                                        <td style='width:240px;'><?php
                                        // echo $curr;
                                        // echo " ";
                                        // echo $day;
                                   $taskID = $data['usertaskID'];
                                   $taskType = $data['taskType'];
                                   if($taskType == "daily"){
                                    //  echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");

                                      // $datePicker = $_POST['datepicker'];
                                      // $month= date('F', strtotime($datePicker));
                                      // $year =date('Y', strtotime($datePicker));



                                      $selectUserTask1 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$monthOfThisDate' AND `year` = '$yearOfThisDate' AND `week` = 'week $curr' ORDER BY `FinishedTaskID` DESC LIMIT 1 ";

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
                                         $reason = $userRow['reason'];
                                         $action = $userRow['action'];
                                         $isCheckedByLeader = $userRow['isCheckedByLeader'];

                                        //  echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                        $noOfDays = $userRow['noOfDaysLate'];
                                               }
                                               if ($weekNumber == "week $curr" ){
     
                                                $weeknumber = $weekNumber;

                                                if($noOfDays >= 2){
                                                  // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                  
                                                  if($isCheckedByLeader){
                                                    ?>
                                                    <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->

                                                    <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1"  data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                     <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                     <?php
                                                  }
                                                  
                                                  
                                                 
                                                }
                                                else if ($noOfDays <= 1){
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  if($isCheckedByLeader){
                                                    ?>
                                                    <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    <?php
                                                  }
                                                  
                                                }
                                                    // echo("<script>console.log('ok');</script>");
          
                                                   }
                                              //  //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }
                                   else{
                                     //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");
     
                                         $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$monthOfThisDate' AND `year` = '$yearOfThisDate';";
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
                                         $noOfDays = $userRow['noOfDaysLate'];
                                         $reason = $userRow['reason'];
                                         $action = $userRow['action'];
                                         $isCheckedByLeader = $userRow['isCheckedByLeader'];

                                         //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                               
                                               if ($weekNumber == "week $curr" ){
     
                                                $weeknumber = $weekNumber;

                                                if($noOfDays >= 2){

                                                  if($isCheckedByLeader){
                                                    ?>
                                                <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>

                                                 <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
    
                                                     <?php
                                                  }
                                                  // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  
                                                }
                                                else if ($noOfDays <= 1){
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                 if($isCheckedByLeader){

                                                  ?>
                                                  <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    
                                                    <?php

                                                 }
                                                 else{
                                                  ?>
                                                  <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    
                                                    <?php
                                                 }
                                                
                                                }
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // //echo("<script>console.log('ok');</script>");
          
                                                   }
                                                  }
                                               //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }                       
                                   
                                ?></td>
                                        <?php
                                        // echo $curr;
                                        // echo "\n";
                                        $weekNo = $curr;
                                        
                                      }
                                  }
                                    ?>

                                    <!-- End of new code -->
                              

                                
                              

                          

                          











                                
                             </tr>
                             <?php
                        $sn++; }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchData; ?>
                        </td>
                         </tr>
                          <?php
                          echo "No data found";
    }                     ?>                   
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      </div>

      <div class="tab-pane fade " style="height: 90%; padding: 0px; background-color: none; " id="PIC" role="tabpanel" aria-labelledby="pic-tab">
      <div class="container p-30 " id="TableListOfMembers" style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
        <div class="ms-1 shadow row">
           <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-2 createSegment"> 
                         <h3>Members Progress</h3> 
                        </div>
                        <div class="col-sm-4"  style="padding: 0px;">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="leader.php" method = "POST" >
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
                        <table  style="width:100%;" id="filtertable" class="table datacust-datatable Table ">
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
                                <td><?php echo $data['f_name'] ?> <?php echo $data['l_name'] ?></td>
                                  <td>
                                    
                                    <div class="progress">
                                    <?php
                                         $username = $data['username'];
                                        
                                         $Department = $_SESSION['userDept'];
                                        $selectUserTask = "SELECT * FROM usertask WHERE username = '$username' AND Department = '$Department' AND `taskType` != 'daily';";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                        $result = mysqli_query($con, $selectUserTask);
                                        $numOfTask = mysqli_num_rows($result);

                                        $selectUserTaskDaily = "SELECT * FROM usertask WHERE username = '$username' AND Department = '$Department' AND `taskType` = 'daily' ;";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                        $resultdaily = mysqli_query($con, $selectUserTaskDaily);
                                        $numOfTaskdaily = mysqli_num_rows($resultdaily);


                                          //echo("<script>console.log('number of task: " .$numOfTask . "');</script>");
                                        
                                          $weekMonth = weekOfMonth($date_string1);
                                        $selectTaskeme = "SELECT * FROM finishedtask WHERE in_charge = '$username' AND Department = '$Department' AND `month` = '$month1' AND `year` = '$year1' AND `week` = 'week $weekMonth' AND `sched_Type` != 'daily';";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000

                                        $result2 = mysqli_query($con, $selectTaskeme);
                                        $numOfFinished = mysqli_num_rows($result2);

                                        // $today = date("F j, Y");
                                        $selectTaskdaiy = "SELECT * FROM finishedtask WHERE in_charge = '$username' AND Department = '$Department'AND `sched_Type` = 'daily' AND `Date` = ' $today1' ;";
                                        // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000

                                        $resultdaily2 = mysqli_query($con, $selectTaskdaiy);
                                        $numOfFinisheddaily = mysqli_num_rows($resultdaily2);

                                        //echo("<script>console.log('number of finished daily: " .$numOfFinisheddaily . "');</script>");
                                        
                                        // if($numOfFinisheddaily == 0){
                                        //   $percent = ($numOfFinished /  $numOfTask)* 100;
                                        //   //echo("<script>console.log('qoutient1234: " .$percent . "');</script>");
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
                                                    

                                          //echo("<script>console.log('qoutient242: " .$percent . "');</script>");
                                        // }
                                        // $percent = ($numOfFinished /  $numOfTask)* 100;
                                        // //echo("<script>console.log('qoutient: " .$percent . "');</script>");

                                        

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
                                            $selectUserTaskM = "SELECT * FROM usertask WHERE username = '$usernameM' AND Department = '$DepartmentM' AND `taskType` = 'monthly';";

                                            $resultM = mysqli_query($con, $selectUserTaskM);
                                            $numOfTaskM = mysqli_num_rows($resultM);




                                            
                                              $weekMonth = weekOfMonth($date_string1);
                                            $selectTaskemeM = "SELECT * FROM finishedtask WHERE in_charge = '$usernameM' AND Department = '$DepartmentM' AND `month` = '$month1' AND `year` = '$year1' AND `sched_Type` = 'monthly';";


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
                                            $selectUserTaskW = "SELECT * FROM usertask WHERE username = '$usernameW' AND Department = '$DepartmentW' AND `taskType` = 'weekly';";

                                            $resultW = mysqli_query($con, $selectUserTaskW);
                                            $numOfTaskW = mysqli_num_rows($resultW);




                                            
                                              $weekMonth = weekOfMonth($date_string1);
                                            $selectTaskemeW = "SELECT * FROM finishedtask WHERE in_charge = '$usernameW' AND Department = '$DepartmentW' AND `month` = '$month1' AND `year` = '$year1'AND `week` = 'week $weekMonth' AND `sched_Type` = 'weekly';";


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
                                            $selectUserTaskW = "SELECT * FROM usertask WHERE username = '$usernameW' AND Department = '$DepartmentW' AND `taskType` = 'daily';";

                                            $resultW = mysqli_query($con, $selectUserTaskW);
                                            $numOfTaskW = mysqli_num_rows($resultW);




                                            
                                              $weekMonthD = weekOfMonth($date_string1);
                                            $selectTaskemeW = "SELECT * FROM finishedtask WHERE in_charge = '$usernameW' AND Department = '$DepartmentW' AND `month` = '$month1' AND `year` = '$year1'AND `week` = 'week $weekMonthD' AND `sched_Type` = 'daily';";


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
      <div class="container p-30" id="TableListOfMembers"; style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
      <div class="ms-1 shadow row" >
      <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-3 createSegment"> 
                         <h3>Section's Progress</h3> 
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="leader.php" method = "POST" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 20px">Date</label>
            <input type="date" id="datepicker2" name="datepicker2" onchange="filterMonth();">
            <input type="submit" name="submitdate2"  value = "Submit">
            </form>
           
        </div></div>
                        
                        <div class="col-sm-5 add_flex">
                            <div class="form-group searchInput">
                                
                                <!-- <label for="email">Search:</label> -->
                                <!-- <input type="search" class="form-control" id="filterbox" placeholder=" " > -->
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 
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
                                              //echo("<script>console.log('number of task: " .$numOfTask . "');</script>");
      
                                              $selectUserTaskDaily = "SELECT * FROM usertask WHERE Department = '$dept'  AND `taskType` = 'daily' ;";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                              $resultdaily = mysqli_query($con, $selectUserTaskDaily);
                                              $numOfTaskdaily = mysqli_num_rows($resultdaily);
      
      
                                              
                                              $weekMonth = weekOfMonth($date_string2);
                                              $selectTaskeme = "SELECT * FROM finishedtask WHERE Department = '$dept' AND `month` = '$month2' AND `year` = '$year2' AND `week` = 'week $weekMonth' AND `sched_Type` != 'daily';";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000
      
                                              $result2 = mysqli_query($con, $selectTaskeme);
                                              $numOfFinished = mysqli_num_rows($result2);
                                              //echo("<script>console.log('number of finishedsdf: " .$numOfFinished . "');</script>");
      
                                              // $today = date("F j, Y");
                                              $selectTaskdaiy = "SELECT * FROM finishedtask WHERE Department = '$dept' AND `sched_Type` = 'daily' AND `Date` = ' $today2' ;";
                                              // SELECT week FROM `finishedtask` WHERE `taskID` = '23';0000
      
                                              $resultdaily2 = mysqli_query($con, $selectTaskdaiy);
                                              $numOfFinisheddaily = mysqli_num_rows($resultdaily2);
      
                                              //echo("<script>console.log('number of finished daily: " .$numOfFinisheddaily . "');</script>");
                                              
                                                $percents = (($numOfFinished + $numOfFinisheddaily) /  ($numOfTask + $numOfTaskdaily))* 100;
                                                //echo("<script>console.log('qoutient242: " .$percents . "');</script>");
                                              
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
// $("#reasonModalUpdate").modal('show');

function showDetails(reason, action, location){
  document.getElementById("reasonUpdate1").value = reason;
  document.getElementById("actionUpdate1").value = action;
  if (location ==''){
  document.getElementById("Attachments").href='#'; 
    
  }
  else{
    document.getElementById("Attachments").href=location; 

  }
  // $("#reasonModalUpdate").modal('show');

}

        var userTaskId = "";
function clickpassdata(userName,usertaskArea,userTaskID, taskname, taskCategory, taskType){
document.getElementById("usernameSelectmodal").value = userName;
document.getElementById("tasknamemodal").value = taskname;
document.getElementById("taskCategorymodal").value = taskCategory;
document.getElementById("taskTypemodal").value = taskType;
document.getElementById("containerOfTaskId").value = userTaskID;
document.getElementById("taskAreamodal").value = usertaskArea;



userTaskId = userTaskID;
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
var dateNow = <?php echo json_encode("$dateNow"); ?>;
var FDateofThisMonth = <?php echo json_encode("$FDateofThisMonth"); ?>;


document.getElementById("datepicker").value = FDateofThisMonth;
document.getElementById("datepickerEnd").value = dateNow;

document.getElementById("datepicker1").value = dateNow;
document.getElementById("datepicker2").value = dateNow;





 var jsonDataPIC = <?php echo json_encode("$picfocus"); ?>;
 var jsonDataTask = <?php echo json_encode("$taskfocus"); ?>;
 
 var jsonDataSection = <?php echo json_encode("$sectionfocus"); ?>;

 var date = <?php echo json_encode("$dateToPass"); ?>;
 var dateEnd = <?php echo json_encode("$dateToPassEnd"); ?>;

 var date1 = <?php echo json_encode("$dateToPass1"); ?>;
 var date2 = <?php echo json_encode("$dateToPass2"); ?>;

// console.log(jsonDataPIC);
 
if(jsonDataPIC == "true"){
document.getElementById("datepicker1").value = date1;


$('#myTab li:eq(1) a').tab('show');

}
if(jsonDataTask == "true"){
document.getElementById("datepicker").value = date;
document.getElementById("datepickerEnd").value = dateEnd;



$('#myTab li:eq(0) a').tab('show');



}
if(jsonDataSection == "true"){
document.getElementById("datepicker2").value = date2;


$('#myTab li:eq(2) a').tab('show');



}




 function FilterSched(){

  var types=document.getElementsByName('checkDone');
  
  if(types[0].checked){
    let filterValue="monthly";
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[5];
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
                let val = tr[index].getElementsByTagName('td')[5];
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
                let val = tr[index].getElementsByTagName('td')[5];
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
                let val = tr[index].getElementsByTagName('td')[5];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
  }
 
}
let today = new Date().toISOString().substr(0, 10);

// document.querySelector("#datepicker").valueAsDate = new Date();
var sheets = new Array();

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
    
    else if (text=='Type'){

        let filterInput = document.getElementById('filterbox');
        filterInput.addEventListener('keyup',function(){
            let filterValue=document.getElementById('filterbox').value;
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[5];
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
else if (text=='In charge'){

let filterInput = document.getElementById('filterbox');
filterInput.addEventListener('keyup',function(){

  sheets=[-1];

    let filterValue=document.getElementById('filterbox').value;
    var table = document.getElementById('TaskTable');
    let tr = table.querySelectorAll('tr');
    
    for(let index=0; index < tr.length;index++){
        let val = tr[index].getElementsByTagName('td')[4];
        if(val.innerHTML.indexOf(filterValue)> -1){
            tr[index].style.display='';
            sheets.push(index);

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



function exportData(){
   /* Get the HTML data using Element by Id */
   var table = document.getElementById("filtertableMain");
 
   /* Declaring array variable */
   var rows =[];
   const filterInput1 = document.getElementById('filterbox');


   

   
   var noOfColumns = document.getElementById('countColumn').value;
 
   if (filterInput1.value==""){
       for(var i=0,row; row = table.rows[i];i++){
           //rows would be accessed using the "row" variable assigned in the for loop
           //Get each cell value/column from the row
        
          //   column1 = row.cells[0].innerText;
          //  column2 = row.cells[1].innerText;
          //  column3 = row.cells[2].innerText;
          //  column4 = row.cells[3].innerText;
          //  column5 = row.cells[4].innerText;
          //  column6 = row.cells[5].innerText;
          //  column7 = row.cells[6].innerText;
          //  column8 = row.cells[7].innerText;
          //  column9 = row.cells[8].innerText;
          //  column10 = row.cells[9].innerText;




          //  rows.push(
          //      [
          //          column1,
          //          column2,
          //          column3,
          //          column4,
          //          column5,
          //          column6,
          //          column7,
          //          column8,
          //          column9,
          //          column10,

                  
            
          //      ]
          //  );
          var rowsArray =[];
          for(var j=0; j<noOfColumns; j++){
            var column = row.cells[j].innerText;

            rowsArray.push([column]);
          
          }
             rows.push(
               [
                rowsArray,
          ])
          // console.log(i);
         
          
    
       /* add a new records in the array */
           
    
           }
   }
   else{
     //iterate through rows of table
   for(var i=0,row; row = table.rows[sheets[i]+1];i++){
       //rows would be accessed using the "row" variable assigned in the for loop
       //Get each cell value/column from the row
       
       var rowsArray =[];
          for(var j=0; j<noOfColumns; j++){
            var column = row.cells[j].innerText;

            rowsArray.push([column]);
          
          }
             rows.push(
               [
                rowsArray,
          ])


 
       }
   }
   console.log(rows);
       csvContent = "data:text/csv;charset=utf-8,";
        /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
       rows.forEach(function(rowArray){
           row = rowArray.join(",");
           csvContent += row + "\r\n";
       });
 
       /* create a hidden <a> DOM node and set its download attribute */
       var encodedUri = encodeURI(csvContent);
       var link = document.createElement("a");
       link.setAttribute("href", encodedUri);
       link.setAttribute("download", "TaskReport.csv");
       document.body.appendChild(link);
        /* download the data file named "Stock_Price_Report.csv" */
       link.click();
 }



        </script>
    </body>
</html>