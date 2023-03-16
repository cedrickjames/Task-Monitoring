<?php
//Set the session timeout for 2 seconds

$timeout = 3600;

//Set the maxlifetime of the session

ini_set( "session.gc_maxlifetime", $timeout );

//Set the cookie lifetime of the session

ini_set( "session.cookie_lifetime", $timeout );

  session_start();
  
$s_name = session_name();

$url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 3700; URL=$url1");
//Check the session exists or not

if(isset( $_COOKIE[ $s_name ] )) {


    setcookie( $s_name, $_COOKIE[ $s_name ], time() + $timeout, '/' );

    // echo "Session is created for $s_name.<br/>";

}

else

    echo "Session is expired.<br/>";
  include ("./connection.php");
  include ("./holidays.php");
// $date = "2022-08-23";
//   $date_now = date($date); // this format is string comparable

  
// $datea = "2022-04-01";
// $date_nowa = date($datea);

//   if ($date_now > $date_nowa) {
//       echo 'greater than';
//   }else{
//       echo 'Less than';
//   }
  //sample of printing weeks number of certain dates

  // Create a new DateTime object

  
  // $arrayWeekNumbers=array("29", "28");

  // $arrlength = count($arrayWeekNumbers);

  // for($x = 0; $x < $arrlength; $x++) {
   
  //   $week = 'week '.$arrayWeekNumbers[$x];
  //   echo $week;
  //   echo "<br>";
  // }

  


//   $aug = "aug";
//   $fDateOfTheMonth = new DateTime('last day of '.$aug);
 
//   $fday =  $fDateOfTheMonth->format('Y-m-d');
//   echo "First day of the month: ";
//   echo $fday;
//   $ddate = '2022-08-01';
//   $date = new DateTime($ddate);
  
//   $week = $date->format("W");
//   echo "Weeknumber: $week";
//   echo "<br>";



//   $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '35' LIMIT 1";
//   $result = mysqli_query($con, $selectUserTask);

//   while($userRow = mysqli_fetch_assoc($result)){
//     $dateStarted = $userRow['dateStarted'];
//   }

//   $date = new DateTime($dateStarted);
//   $datenow = new DateTime($dateStarted);


//   $dateStarteds = new DateTime($dateStarted);
//   $monthOfLastDate =  $dateStarteds->format('F');
//       $yearOfLastDate =  $dateStarteds->format('Y');

//       $monthofThisMonth = new DateTime(date('Y-m-d'));
//       $Month_Now = $monthofThisMonth->format('F');
//       $yearOfThisMonth = new DateTime(date('Y-m-d'));
//       $Year_Now = $yearOfThisMonth->format('Y');


//       $nextMonth = $date->modify('next month');
//       // $date->format('Y-m-d');
//       $nextMonthHehe =  $nextMonth->format('F');
//       $yearOfNextDate =  $date->format('Y');


//       if($nextMonthHehe == $Month_Now ){

// $finalDiff = "0";
//         echo"asdasd";
//       }
//       else{

//       }


//   $from=date_create(date('Y-m-d'));
//   $to=date_create("2022-08-27");
//   $diff=date_diff($to,$from);
//   // print_r($diff);
//   echo $diff->format('%R%a');
  
//   $n1 = $diff->format('%R%a');
//   $n2 = 3;
//   echo "<br>";
//   echo $n1 + $n2;
//   if($n1>1){
//     echo "hello";
//   }
  
//   echo "<br>";

//   $date = new DateTime('May 16, 2022');
//   // echo "Next monday is: ";
//   // $date->modify('next monday');


//   // echo "Next monday is: ";
//   $date->modify('+2 months');
//   // $date->modify('next month');

//   // $date->format('Y-m-d');
//   $monthOfDate =  $date->format('F');
//   $monthOfDate =  $date->format('F');
//   $year =  $date->format('Y');

// $fDateOfTheMonth = new DateTime('first day of '.$monthOfDate. $year);
// $FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');

// $lDateOfTheMonth = new DateTime('last day of '.$monthOfDate. $year);
//   $LDateofThisMonth =  $lDateOfTheMonth->format('Y-m-d');
  
//        echo $LDateofThisMonth;




//       $DateEnd2 =  $date->format('Y-m-d');
//       $end2 = new DateTime(date($LDateofThisMonth));
//       $start2 = new DateTime($FDateofThisMonth);
//     // otherwise the  end date is excluded (bug?)
//       $end2->modify('+1 day');

//       $interval2 = $end2->diff($start2);

//       // total days
//       $finalDiff2 = $interval2->days;

//       // create an iterateable period of date (P1D equates to 1 day)
//       $period2 = new DatePeriod($start2, new DateInterval('P1D'), $end2);

//       // best stored as array, so you can add more than one
//       $holidays2 = array('2012-09-07');

//       foreach($period2 as $dt2) {
//           $curr2 = $dt2->format('D');

//           // substract if Saturday or Sunday
//           if ($curr2 == 'Sat' || $curr2 == 'Sun') {
//             $finalDiff2--;
//           }

//           // (optional) for the updated question
//           elseif (in_array($dt2->format('Y-m-d'), $holidays2)) {
//             $finalDiff2--;
//           }
//       }

// $finalDiff2 = $finalDiff2+2;
// echo "<br>";

// echo $finalDiff2;
// echo "<br>";
//   $date = new DateTime('June 15, 2022');
//       // echo "Next monday is: ";
//       $date->modify('next month');
//       // $date->format('Y-m-d');
//       $DateEnd =  $date->format('F');
//       $year =  $date->format('Y');

// $fDateOfTheMonth = new DateTime('first day of '.$DateEnd. $year);
// $FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');
//       echo $FDateofThisMonth;
//       echo "<br>";

// $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '192' LIMIT 1";
// $result = mysqli_query($con, $selectUserTask);

// while($userRow = mysqli_fetch_assoc($result)){
//   $todayss = $userRow['dateStarted'];
// }

// // $from=date_create(date('Y-m-d'));
// // $to=date_create(date('Y-m-d', strtotime($today)));
// // $diff=date_diff($to,$from);
// // // print_r($diff);
// // $finalDiff =  $diff->format('%R%a');
// // $finalDiff = $finalDiff-1;

// $ends = new DateTime(date('Y-m-d'));
// $starts = new DateTime(date('Y-m-d', strtotime('July 23, 2022')));


// $eme = $starts->format('D');
// echo $eme;
// if($eme == "Sat"){
//   $starts->modify('-1 day');

// }
// else if( $eme =="Sun"){
//   $starts->modify('-2 day');
// }
// // echo "Next monday is: ";
// // $date->format('Y-m-d');

// // otherwise the  end date is excluded (bug?)
// $ends->modify('+1 day');

// $intervals = $ends->diff($starts);

// // total days
// $finalDiffs = $intervals->days;

// echo $starts->format('Y-m-d');
// // create an iterateable period of date (P1D equates to 1 day)
// $periods = new DatePeriod($starts, new DateInterval('P1D'), $ends);

// // best stored as array, so you can add more than one
// $holidays = array('2012-09-07');

// foreach($periods as $dts) {
// $currs = $dts->format('D');

// // substract if Saturday or Sunday
// if ($currs == 'Sat' || $currs == 'Sun') {
// $finalDiffs--;
// }

// // (optional) for the updated question
// else if (in_array($dts->format('Y-m-d'), $holidays)) {
// $finalDiffs--;
// }
// }
// echo "<br>";

// echo $finalDiffs;

// $finalDiffs=$finalDiffs-2;

// echo "<br>";

// echo $finalDiffs;
// echo "<br>";

//   $arrayNumberOfDaysPass=array();
//   $arrayWeekNumbers=array();
//   $arrayMonth=array();
//   $arrayYear=array();
//   $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '191' LIMIT 1";
//             $result = mysqli_query($con, $selectUserTask);
  
//             while($userRow = mysqli_fetch_assoc($result)){
//               $dateStarted = $userRow['dateStarted'];
//             }
  
//             $date = new DateTime($dateStarted);
//             // echo "Next monday is: ";
//             // $date->format('Y-m-d');
//             $startDate = $date->format('Y-m-d');
//             $start = new DateTime($startDate);
//             $end = new DateTime();
//             // otherwise the  end date is excluded (bug?)
//             $start->modify('+1 day');
//             // echo date('F j, Y');
//             $interval = $end->diff($start);
            
//             // total days
//             $days = $interval->days;
//             // echo $days;
//             // create an iterateable period of date (P1D equates to 1 day)
//             $period = new DatePeriod($start, new DateInterval('P1D'), $end);
            
//             // best stored as array, so you can add more than one
//             $holidays = array('2022-07-15');
//             $weekNo ="";
//             $NumberOfWeeksToDone = 0;
//             foreach($period as $dt) {
//                 $curr = $dt->format('W');
//                 $date = $dt->format('Y-m-d');
//                 $currMonth = $dt->format('F');
//                 $currYear = $dt->format('Y');
//                 echo $date;
//                 echo "<br>";
//                 array_push($arrayNumberOfDaysPass,"$date");

       
//                   // $NumberOfWeeksToDone = $NumberOfWeeksToDone +1;
//                   array_push($arrayWeekNumbers,"$curr");
//                   array_push($arrayMonth,"$currMonth");
//                   array_push($arrayYear,"$currYear");


//                   // echo $curr;
//                   // echo "\n";

                
//             }


// $arrlength = count($arrayNumberOfDaysPass);
// echo $arrlength;
// echo "<br>";










//   $car = array("2022-07-22", "2022-07-23", "2022-07-25");
// $arrlength = count($car);

// for($x = 0; $x < $arrlength; $x++) {
//   // echo $cars[$x];
//   // echo "<br>";
//   $day1 = $car[$x];
//   $date = new DateTime($day1);
//   $day = $date->format('D');
//                   if($day =="Sat" || $day == "Sun"){
                 
//                   }
//                   else{
//                     echo $day;
//                   }
// }


// $date = new DateTime('July 08, 2022');

// // Modify the date it contains
// // echo $date;
// $date->modify('next monday');


// $startDate = $date->format('Y-m-d');
// // echo date('r');
// $start = new DateTime($startDate);
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
// // Output
// echo "Next monday is: ";
//           $DateEnd =  $date->format('Y-m-d');
//           echo $date->format('Y-m-d');
//           $end = new DateTime(date('Y-m-d'));
//           $start = new DateTime($DateEnd);
//         // otherwise the  end date is excluded (bug?)
//           $end->modify('+1 day');

//           $interval = $end->diff($start);

//           // total days
//           $finalDiff = $interval->days;

//           // create an iterateable period of date (P1D equates to 1 day)
//           $period = new DatePeriod($start, new DateInterval('P1D'), $end);

//           // best stored as array, so you can add more than one
//           $holidays = array('2012-09-07');

//           foreach($period as $dt) {
//               $curr = $dt->format('D');

//               // substract if Saturday or Sunday
//               if ($curr == 'Sat' || $curr == 'Sun') {
//                 $finalDiff--;
//               }

//               // (optional) for the updated question
//               elseif (in_array($dt->format('Y-m-d'), $holidays)) {
//                 $finalDiff--;
//               }
//           }

//          echo "<br>";
//           echo "Number of days past since the next monday of that day: ";
//           echo $finalDiff;

//           echo "<br>";
//   $ddate = '2022-07-24';
//   $date = new DateTime($ddate);
  
//   $week = $date->format("W");
//   echo "Weeknumber: $week";
//   echo "<br>";



// $aug = "Jul";
//   $fDateOfTheMonth = new DateTime('first day of this month');
 
//   $fday =  $fDateOfTheMonth->format('Y-m-d');
//   echo "First day of the month: ";
//   echo $fday;
//   $lDateOfTheMonth = new DateTime('July 13, 2022');
// $sub = 2;
//   $lDateOfTheMonth->modify("-$sub day");
//   $lday =  $lDateOfTheMonth->format('F j, Y');
//   $realDate = date('Y-m-d', strtotime($lday));
//   echo "<br>";
//   echo "subtracted Date from 2: ";
//   echo $realDate;
//   echo "<br>";


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
    <!-- <link rel="stylesheet" href="node_modules/bootstrap-table/dist/bootstrap-table.min.css"> -->
  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- <link rel="stylesheet" href="design_files/css/MainPageStyle.css"> -->
<link rel="stylesheet" href="design_files/css/ListOfMembersStyle.css">

<link rel="stylesheet" href="design_files/css/admin.css">

<link rel="stylesheet" href="design_files/css/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

<!-- <script src="./node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script> -->

<script type="text/javascript" src="./js/jquery.slim.min.js"></script>
<script type="text/javascript" src="./design_files/css/bootstrap.min.js"></script>

<script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">
<!-- <link href="./node_modules/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet">
<link href="./node_modules/bootstrap-table/dist/extensions/fixed-columns/bootstrap-table-fixed-columns.min.css" rel="stylesheet">

<script src="./node_modules/bootstrap-table/dist/bootstrap-table.min.js"></script>
<script src="./node_modules/bootstrap-table/dist/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js"></script>
<link href="./node_modules/bootstrap-table/dist/extensions/sticky-header/bootstrap-table-sticky-header.css" rel="stylesheet">
<script src="./node_modules/bootstrap-table/dist/extensions/sticky-header/bootstrap-table-sticky-header.min.js"></script> -->
<!-- <link rel="stylesheet" href="./node_modules/bootstrap-table/extensions/fixed-columns/bootstrap-table-fixed-columns.css"> -->
<!-- <script src="./node_modules/bootstrap-table/extensions/fixed-columns/bootstrap-table-fixed-columns.js"></script> -->
</head>
    <body style="background: linear-gradient(to right, #FFFDE4, #b3dcff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
  

   <?php

  $db= $con;
$tableName="usertask";
$tableName2="users";
//sample, ito ang babalikan mo, find mo to
// $data = array(); // create a variable to hold the information
  
$query = "SELECT * FROM `holidays`;";
$result = mysqli_query($con, $query);
$holidaysArray = array();
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_assoc($result)){
  $holidaysArray[]=$row;
}
}
// print_r($datas);
// //  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
// //  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
//  $result = $db->query($query);
// while (($row = mysql_fetch_array($result, MYSQL_ASSOC)) !== false){
// $data[] = $row; // add the row in to the results (data) array

// $result = "SELECT * FROM `category`;";



// end of ito ang babalikan mo sana all babalikan

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

    $dateToPassDaily = "";
    $dateToPassEndDaily = "";
    $dateToPass1 = "";
    $dateToPass2 = "";

    $picfocus = "false";
    $taskfocus = "false";
    $dailyfocus = "false";
    $sectionfocus= "focus";

$dateToday = date('Y-m-d');
$fDateOfTheMonth = new DateTime('first day of '.$dateToday);
 
$FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');
$dateNow = date('Y-m-d');

    $month = date("F");
    $monthEnd = date("F");

    $year = date("Y");
    $yearEnd = date("Y");
    $ThisIsTheDateToday = date("F j, Y");
    $today = $_SESSION['FirstDayOfTheMonth']; 
    $todayEnd = date("F j, Y"); 

    $todaySummary = $_SESSION['FirstDayOfTheMonth']; 
    // $todayEndSummary = date("F j, Y"); 
    $todayEndSummary = $_SESSION['LastDayOfTheMonth']; 


    $todayDaily = $_SESSION['FirstDayOfTheMonth']; 
    // $todayEndDaily = date("F j, Y"); 
    $todayEndDaily = $_SESSION['LastDayOfTheMonth'];  
    $todayOthers = $_SESSION['FirstDayOfTheMonth']; 
    $todayWeekly = $_SESSION['FirstDayOfTheMonth']; 
    // $todayEndWeekly = date("F j, Y"); 
    $todayEndWeekly = $_SESSION['LastDayOfTheMonth']; 
    

    $todayMonthly = $_SESSION['FirstDayOfTheMonth']; 
    // $todayEndMonthly = date("F j, Y"); 
    $todayEndMonthly = $_SESSION['LastDayOfTheMonth']; 
    $todayEndOthers = $_SESSION['LastDayOfTheMonth'];  
    

//for annual

$dateOfNow = new DateTime(date('Y-m-d'));
$MonthOfNow =  $dateOfNow->format('F');
$YearToUseForApril = "";
$YearToUseforMarch = "";
if($MonthOfNow=="January" || $MonthOfNow=="February" || $MonthOfNow=="March"){

  $YearToUseforMarch =  $dateOfNow->format('Y');
  $dateOfNow->modify('last year');
  $YearToUseForApril =  $dateOfNow->format('Y');
}
else{
  $YearToUseForApril =  $dateOfNow->format('Y');
$dateOfNow->modify('next year');
$YearToUseforMarch =  $dateOfNow->format('Y');

}


$April = new DateTime($YearToUseForApril.'-04-01');
$March = new DateTime($YearToUseforMarch.'-03-31');
$April =  $April->format('Y-m-d');
$March =  $March->format('Y-m-d');

  
$todayAnnual = date('F j, Y', strtotime($April));
$todayEndAnnual = date('F j, Y', strtotime($March));

//end for annual
    

    $date_string = date('Y-m-d');
    $date_stringEnd = date('Y-m-d');

    $TaskActive = "active";
    $MembersActive = "";

    $dailyChecked = "";
    $weeklyChecked = "";
    $monthlyChecked = "checked";
    $annualChecked = "";
    $othersChecked = "";



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

     $MembersActive = "";
                      $TaskActive = "active";

    }
    $include="0";
    $_SESSION['include']=0;
    if(isset($_POST['exportProgDailySummary'])){
      $datePickerSummary = $_POST['datepickerProgSummary'];
    $datePickerEndSummary = $_POST['datepickerEndProgSummary'];
    if(isset($_POST['include'])) {
      $_SESSION['include']=1;

 }
    $_SESSION['dateStarted'] = $datePickerSummary;
    $_SESSION['dateEnded']=$datePickerEndSummary ;
    $userlevel = $_SESSION['userlevel'];
    if($userlevel =="Leader"){
      header("location: SummaryReport.php");
    }
    else{
      header("location: SummaryReportForAdmin.php");

    }
    }
    $includeexclude="0";
    if(isset($_POST['submitdateProgDailySummary'])){
      $datePickerSummary = $_POST['datepickerProgSummary'];
    $datePickerEndSummary = $_POST['datepickerEndProgSummary'];
    // $includeexclude = $_POST['includeexclude'];
    if(isset($_POST['include'])) {
      $include="1";
 }

       $monthSummary = date('F', strtotime($datePickerSummary));
       $monthEndSummary = date('F', strtotime($datePickerEndSummary));
   
       $yearSummary = date('Y', strtotime($datePickerSummary));
       $yearEndSummary = date('Y', strtotime($datePickerEndSummary));
   
       $todaySummary = date('F j, Y', strtotime($datePickerSummary));
       $todayEndSummary = date('F j, Y', strtotime($datePickerEndSummary));
   
   
       $datePickergetSummary = $datePickerSummary;
       $datePickergetEndSummary = $datePickerEndSummary;
   
       $date_stringSummary= date('Y-m-d', strtotime($datePickergetSummary));
       $date_stringEndSummary= date('Y-m-d', strtotime($datePickergetEndSummary));
   
       
       
     $dateToPassSummary = date('Y-m-d', strtotime($datePickerSummary));
     $dateToPassEndSummary = date('Y-m-d', strtotime($datePickerEndSummary));
   
     $Summaryfocus = "true";
   
      
     $date = new DateTime($todaySummary);
      $dateEnd = new DateTime($todayEndSummary);
  
      $DateNowAndToday =  $dateEnd->format('Y-m-d');
      $StartDateSelected = $date->format('Y-m-d');
  
  
      $TaskActive = "";
      $MembersActive = "";
      $SummaryActive = "active";
  
      
       }
       if(isset($_POST['submitdateProgOthers'])){
        $datePickerOthers = $_POST['datepickerProgOthers'];
      $datePickerEndOthers = $_POST['datepickerEndProgOthers'];
     
     
         $monthOthers = date('F', strtotime($datePickerOthers));
         $monthEndOthers = date('F', strtotime($datePickerEndOthers));
     
         $yearOthers = date('Y', strtotime($datePickerOthers));
         $yearEndOthers = date('Y', strtotime($datePickerEndOthers));
     
         $todayOthers = date('F j, Y', strtotime($datePickerOthers));
         $todayEndOthers = date('F j, Y', strtotime($datePickerEndOthers));
     
     
         $datePickergetOthers = $datePickerOthers;
         $datePickergetEndOthers = $datePickerEndOthers;
     
         $date_stringOthers= date('Y-m-d', strtotime($datePickergetOthers));
         $date_stringEndOthers= date('Y-m-d', strtotime($datePickergetEndOthers));
     
         
         
       $dateToPassOthers = date('Y-m-d', strtotime($datePickerOthers));
       $dateToPassEndOthers = date('Y-m-d', strtotime($datePickerEndOthers));
     
       $Othersfocus = "true";
     
        
       $date = new DateTime($todayOthers);
        $dateEnd = new DateTime($todayEndOthers);
  
        $DateNowAndToday =  $dateEnd->format('Y-m-d');
        $StartDateSelected = $date->format('Y-m-d');
  
  
        $TaskActive = "";
        $MembersActive = "active";
        $EndedActive = "";
        $dailyChecked = "";
        $weeklyChecked = "";
        $monthlyChecked = "";
        $annualChecked = "";
        $othersChecked = "checked";
  
        
         }

    if(isset($_POST['submitdateProgDaily'])){
      $datePickerDaily = $_POST['datepickerProgDaily'];
    $datePickerEndDaily = $_POST['datepickerEndProgDaily'];
   
   
       $monthDaily = date('F', strtotime($datePickerDaily));
       $monthEndDaily = date('F', strtotime($datePickerEndDaily));
   
       $yearDaily = date('Y', strtotime($datePickerDaily));
       $yearEndDaily = date('Y', strtotime($datePickerEndDaily));
   
       $todayDaily = date('F j, Y', strtotime($datePickerDaily));
       $todayEndDaily = date('F j, Y', strtotime($datePickerEndDaily));
   
   
       $datePickergetDaily = $datePickerDaily;
       $datePickergetEndDaily = $datePickerEndDaily;
   
       $date_stringDaily= date('Y-m-d', strtotime($datePickergetDaily));
       $date_stringEndDaily= date('Y-m-d', strtotime($datePickergetEndDaily));
   
       
       
     $dateToPassDaily = date('Y-m-d', strtotime($datePickerDaily));
     $dateToPassEndDaily = date('Y-m-d', strtotime($datePickerEndDaily));
   
     $dailyfocus = "true";
   
      
     $date = new DateTime($todayDaily);
      $dateEnd = new DateTime($todayEndDaily);

      $DateNowAndToday =  $dateEnd->format('Y-m-d');
      $StartDateSelected = $date->format('Y-m-d');


      $TaskActive = "";
      $MembersActive = "active";

      $dailyChecked = "checked";
      $weeklyChecked = "";
      $monthlyChecked = "";
      $annualChecked = "";

      
       }

       if(isset($_POST['submitdateProgWeekly'])){
        $datePickerWeekly = $_POST['datepickerProgWeekly'];
      $datePickerEndWeekly = $_POST['datepickerEndProgWeekly'];
     
     
         $monthWeekly = date('F', strtotime($datePickerWeekly));
         $monthEndWeekly = date('F', strtotime($datePickerEndWeekly));
     
         $yearWeekly = date('Y', strtotime($datePickerWeekly));
         $yearEndWeekly = date('Y', strtotime($datePickerEndWeekly));
     
         $todayWeekly = date('F j, Y', strtotime($datePickerWeekly));
         $todayEndWeekly = date('F j, Y', strtotime($datePickerEndWeekly));
     
     
         $datePickergetWeekly = $datePickerWeekly;
         $datePickergetEndWeekly = $datePickerEndWeekly;
     
         $date_stringWeekly= date('Y-m-d', strtotime($datePickergetWeekly));
         $date_stringEndWeekly= date('Y-m-d', strtotime($datePickergetEndWeekly));
     
         
         
       $dateToPassWeekly = date('Y-m-d', strtotime($datePickerWeekly));
       $dateToPassEndWeekly = date('Y-m-d', strtotime($datePickerEndWeekly));
     
       $weeklyfocus = "true";
     
        
       $date = new DateTime($todayWeekly);
        $dateEnd = new DateTime($todayEndWeekly);
  
        $DateNowAndToday =  $dateEnd->format('Y-m-d');
        $StartDateSelected = $date->format('Y-m-d');
  
  
        $TaskActive = "";
        $MembersActive = "active";

        $dailyChecked = "";
        $weeklyChecked = "checked";
        $monthlyChecked = "";
        $annualChecked = "";
        $othersChecked = "";


         }

    
         if(isset($_POST['submitdateProgMonthly'])){
          $datePickerMonthly = $_POST['datepickerProgMonthly'];
        $datePickerEndMonthly = $_POST['datepickerEndProgMonthly'];
       
       
           $monthMonthly = date('F', strtotime($datePickerMonthly));
           $monthEndMonthly = date('F', strtotime($datePickerEndMonthly));
       
           $yearMonthly = date('Y', strtotime($datePickerMonthly));
           $yearEndMonthly = date('Y', strtotime($datePickerEndMonthly));
       
           $todayMonthly = date('F j, Y', strtotime($datePickerMonthly));
           $todayEndMonthly = date('F j, Y', strtotime($datePickerEndMonthly));
       
       
           $datePickergetMonthly = $datePickerMonthly;
           $datePickergetEndMonthly = $datePickerEndMonthly;
       
           $date_stringMonthly= date('Y-m-d', strtotime($datePickergetMonthly));
           $date_stringEndMonthly= date('Y-m-d', strtotime($datePickergetEndMonthly));
       
           
           
         $dateToPassMonthly = date('Y-m-d', strtotime($datePickerMonthly));
         $dateToPassEndMonthly = date('Y-m-d', strtotime($datePickerEndMonthly));
       
         $monthlyfocus = "true";
       
          
         $date = new DateTime($todayMonthly);
          $dateEnd = new DateTime($todayEndMonthly);
    
          $DateNowAndToday =  $dateEnd->format('Y-m-d');
          $StartDateSelected = $date->format('Y-m-d');
    
    
          $TaskActive = "";
          $MembersActive = "active";

          $dailyChecked = "";
          $weeklyChecked = "";
          $monthlyChecked = "checked";
          $annualChecked = "";
          $othersChecked = "";

           }
           if(isset($_POST['submitdateProgAnnual'])){
            $datePickerAnnual = $_POST['datepickerProgAnnual'];
          $datePickerEndAnnual = $_POST['datepickerEndProgAnnual'];

          
        
      
          ////////////////////////////////////////
          $dateOfNow = new DateTime($datePickerAnnual);
          $MonthOfNow =  $dateOfNow->format('F');
          $YearToUseForApril = "";
          $YearToUseforMarch = "";
          if($MonthOfNow=="January" || $MonthOfNow=="February" || $MonthOfNow=="March"){
         
            $YearToUseforMarch =  $dateOfNow->format('Y');
            $dateOfNow->modify('last year');
            $YearToUseForApril =  $dateOfNow->format('Y');
          }
          else{
            $YearToUseForApril =  $dateOfNow->format('Y');
         $dateOfNow->modify('next year');
         $YearToUseforMarch =  $dateOfNow->format('Y');
         
         }
         $April = new DateTime($YearToUseForApril.'-04-01');
         $March = new DateTime($YearToUseforMarch.'-03-31');
         $April =  $April->format('Y-m-d');
         $March =  $March->format('Y-m-d');
         //////////////////////////////////////
         $dateToPassAnnual = date('Y-m-d', strtotime($datePickerAnnual));
         $dateToPassEndAnnual = date('Y-m-d', strtotime($datePickerEndAnnual));
       
         $todayAnnual = date('F j, Y', strtotime($April));
         $todayEndAnnual = date('F j, Y', strtotime($March));
           $annualfocus = "true";
         
      
            $TaskActive = "";
            $MembersActive = "active";
  
            $dailyChecked = "";
            $weeklyChecked = "";
            $monthlyChecked = "";
            $annualChecked = "checked";
            $othersChecked = "";
  
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
        $sqlUpdateStatus = "UPDATE `finishedtask` SET `noOfDaysLate`='5', `score`='0.5', `isLate`= true, `isCheckedByLeader` = true WHERE `FinishedTaskID`='$finishedTaskId';";
        mysqli_query($con, $sqlUpdateStatus);
      
      }
      else{
        $sqlUpdateStatus = "UPDATE `finishedtask` SET `noOfDaysLate`='0',`score`='1', `isLate`= false,  `isCheckedByLeader` = true WHERE `FinishedTaskID`='$finishedTaskId';";
        mysqli_query($con, $sqlUpdateStatus);
      
      }


    }
    if(isset($_POST['UpdateTaskbtn'])){
      $userName3 = $_POST['username'];
      $postDateStarted = $_POST['dateStarted'];
      $postTargetDate = $_POST['targetDate'];


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
      

      $sqlupdate = "UPDATE `usertask` SET `userid`='$resultUserId1',`username`='$userName3', `taskName`='$userTaskName',`taskCategory`='$userTaskCategory',`taskArea`='$userTaskArea',`taskType`='$userTaskType', `dateAdded`='$postDateStarted', `targetDate`='$postTargetDate' WHERE usertaskID = '$userTASKid'";
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
    //  $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department'  ORDER BY taskCategory ASC;";
     $query = " SELECT * FROM usertask INNER JOIN users ON usertask.username = users.username WHERE users.userlevel = 'PIC' AND usertask.Department = '$Department' AND usertask.ended = '0';";

    
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

     $fetchDataForEnded = fetch_data_for_ended($db, $tableName, $columns, $username);

     function fetch_data_for_ended($db, $tableName, $columns, $username){
       if(empty($db)){
        $msg= "Database connection error";
       }elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
       }elseif(empty($tableName)){
         $msg= "Table Name is empty";
      }else{
      $columnName = implode(", ", $columns);
      $Department = $_SESSION['userDept'];
     //  $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department'  ORDER BY taskCategory ASC;";
      $query = " SELECT * FROM usertask INNER JOIN users ON usertask.username = users.username WHERE users.userlevel = 'PIC' AND usertask.Department = '$Department' AND usertask.ended = true;";
 
     
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
     if(isset($_POST['changePassword'])){
      $oldPass = $_POST['oldPass'];
      $newPass = $_POST['newPass'];
      $confirmPass = $_POST['confirmPass'];

    $username =  $_SESSION['username'];

      $selectPassword= "SELECT `userpass` FROM `users` WHERE username = '$username' LIMIT 1";
      $resultPassword = mysqli_query($con, $selectPassword);
      
      while($userRow = mysqli_fetch_assoc($resultPassword)){
        $userpass = $userRow['userpass'];
    }
      if($oldPass != $userpass){
        ?><script>
        Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'You have entered a wrong "Old Password!',
    //   footer: '<a href="">Why do I have this issue?</a>'
    })
     </script><?php 
      }
      else if($newPass != $confirmPass){
        ?><script>
        Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'New password does not match. Please try again.',
    //   footer: '<a href="">Why do I have this issue?</a>'
    })
     </script><?php 
      }
      else{
        $sqlPassUpdate = "UPDATE `users` SET `userpass`='$newPass',`conpass`='$newPass' WHERE  username = '$username';";
        mysqli_query($con, $sqlPassUpdate);
        ?><script>
        Swal.fire({
      icon: 'success',
      title: 'success',
      text: 'Password change successfully!',
    //   footer: '<a href="">Why do I have this issue?</a>'
    })
     </script><?php 
      }
    }



    $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
    $fetchDataProgOthers = fetchDataProgOthers($db, $tableName, $columns, $username);

    function fetchDataProgOthers($db, $tableName, $columns, $username){
      if(empty($db)){
       $msg= "Database connection error";
      }elseif (empty($columns) || !is_array($columns)) {
       $msg="columns Name must be defined in an indexed array";
      }elseif(empty($tableName)){
        $msg= "Table Name is empty";
     }else{
     $columnName = implode(", ", $columns);
     $Department = $_SESSION['userDept'];
     $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department' AND taskType = 'others' ORDER BY username ASC;";
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

     $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
     $fetchDataProg = fetchDataProg($db, $tableName, $columns, $username);
 
     function fetchDataProg($db, $tableName, $columns, $username){
       if(empty($db)){
        $msg= "Database connection error";
       }elseif (empty($columns) || !is_array($columns)) {
        $msg="columns Name must be defined in an indexed array";
       }elseif(empty($tableName)){
         $msg= "Table Name is empty";
      }else{
      $columnName = implode(", ", $columns);
      $Department = $_SESSION['userDept'];
      $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department' AND taskType = 'daily' ORDER BY username ASC;";
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

      $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
      $fetchDataProgWeeky = fetchDataProgWeeky($db, $tableName, $columns, $username);
  
      function fetchDataProgWeeky($db, $tableName, $columns, $username){
        if(empty($db)){
         $msg= "Database connection error";
        }elseif (empty($columns) || !is_array($columns)) {
         $msg="columns Name must be defined in an indexed array";
        }elseif(empty($tableName)){
          $msg= "Table Name is empty";
       }else{
       $columnName = implode(", ", $columns);
       $Department = $_SESSION['userDept'];
       $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department' AND taskType = 'weekly' ORDER BY username ASC;";
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


           $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
      $fetchDataProgMonthly = fetchDataProgMonthly($db, $tableName, $columns, $username);
  
      function fetchDataProgMonthly($db, $tableName, $columns, $username){
        if(empty($db)){
         $msg= "Database connection error";
        }elseif (empty($columns) || !is_array($columns)) {
         $msg="columns Name must be defined in an indexed array";
        }elseif(empty($tableName)){
          $msg= "Table Name is empty";
       }else{
       $columnName = implode(", ", $columns);
       $Department = $_SESSION['userDept'];
       $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department' AND taskType = 'monthly' ORDER BY username ASC;";
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




       $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
       $fetchDataProgAnnual = fetchDataProgAnnual($db, $tableName, $columns, $username);
   
       function fetchDataProgAnnual($db, $tableName, $columns, $username){
         if(empty($db)){
          $msg= "Database connection error";
         }elseif (empty($columns) || !is_array($columns)) {
          $msg="columns Name must be defined in an indexed array";
         }elseif(empty($tableName)){
           $msg= "Table Name is empty";
        }else{
        $columnName = implode(", ", $columns);
        $Department = $_SESSION['userDept'];
        $query = "SELECT * FROM `usertask` WHERE `Department` = '$Department' AND taskType = 'annual' ORDER BY username ASC;";
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
 
 
 
       
       $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
       $fetchDataSummary = fetchDataSummary($db, $tableName, $columns, $username);
   
       function fetchDataSummary($db, $tableName, $columns, $username){
         if(empty($db)){
          $msg= "Database connection error";
         }elseif (empty($columns) || !is_array($columns)) {
          $msg="columns Name must be defined in an indexed array";
         }elseif(empty($tableName)){
           $msg= "Table Name is empty";
        }else{
        $columnName = implode(", ", $columns);
        $Department = $_SESSION['userDept'];
        $query = "SELECT * FROM `users` WHERE `Department` = '$Department' AND userlevel='PIC' ORDER BY username ASC;";
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
if(isset($_POST['RemoveCategory'])){
     
  $category = $_POST['inputCategoryRemove'];
  $categoryId = $_POST['inputCategoryRemoveId'];


  if($category == ""){
    ?><script>
          Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'You have to choose a category.',
      //   footer: '<a href="">Why do I have this issue?</a>'
      })
       </script><?php 
  }
  else{
    $sqlinsert = "DELETE FROM `category` WHERE categoryId = '$categoryId';";
    mysqli_query($con, $sqlinsert);
    ?><script>
    Swal.fire({
  icon: 'success',
  title: 'Success',
  text: 'You have successfully remove a category',
//   footer: '<a href="">Why do I have this issue?</a>'
})
 </script><?php 
  }
         
}



if (isset($_POST['submitSelected'])){
  foreach ($_POST['id'] as $id):

    $sq=mysqli_query($con,"select * from `usertask` where usertaskID='$id'");
    $srow=mysqli_fetch_array($sq);
  // echo $srow['taskName']. "<br>";
  
  $postTargetDate =  $_POST['dateForEnd'];
  $sqlupdate = "UPDATE `usertask` SET  `targetDate`='$postTargetDate' WHERE usertaskID = '$id'";
  mysqli_query($con, $sqlupdate);

  endforeach;
}
if (isset($_POST['deleteSelected'])){
  foreach ($_POST['id'] as $id):

    $sq=mysqli_query($con,"select * from `usertask` where usertaskID='$id'");
    $srow=mysqli_fetch_array($sq);
  // echo $srow['taskName']. "<br>";
  
  $postTargetDate =  $_POST['dateForEnd'];
  $sqlupdate = "DELETE FROM `usertask` WHERE usertaskID = '$id'";
  mysqli_query($con, $sqlupdate);

  $sqldeleteFromFinished = "DELETE FROM `finishedtask` WHERE taskID = '$id'";
  mysqli_query($con, $sqldeleteFromFinished);
  endforeach;
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
              <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="daily.php">Daily</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">My Task</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li> -->
                
                
              </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
            
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="./signup.php">Register User</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="./addTask.php">Add Task</a>
                </li>
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Category
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
                    
                    <a class="dropdown-item" id="btn-addCategory" href="#" data-toggle='modal'
                      data-target='#modalAdminCategory'>Add Category</a> 
                      <a class="dropdown-item" id="btn-addCategory" href="#" data-toggle='modal'
                      data-target='#modalAdminRemoveCategory'>Remove Category</a> 
                    <!-- <?php if($_SESSION['admin'] == "TRUE"){?>

                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalAdmin'>Add Admin</a>
                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalRemoveAdmin'>Remove Admin</a> 
                   
                      <?php } ?> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalAdmin'>Add Admin</a> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalRemoveAdmin'>Remove Admin</a> -->
              

                    
                   
                  </div>
                </li>
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Option
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
                   
                    <!-- <?php if($_SESSION['admin'] == "TRUE"){?>

                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalAdmin'>Add Admin</a>
                    <a class="dropdown-item" id="btn-addAdmin" href="#" data-toggle='modal'
                      data-target='#modalRemoveAdmin'>Remove Admin</a> 
                   
                      <?php } ?> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalAdmin'>Add Admin</a> -->
                    <!-- <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalRemoveAdmin'>Remove Admin</a> -->
                    <a class="dropdown-item" id="btn-changePass" href="#" data-toggle='modal'
                      data-target='#changePassword'>Change Password</a>
                    <a class="dropdown-item" id="btn-logout" href="./logout.php">Logout</a>

                    
                   
                  </div>
                </li>
                
              </ul>
            </div>
          </nav>
        </div>
        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div  class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
        <form action="leader.php" method = "POST" style="width: 100%; padding: 0; border: 0;">
        <!-- <input type="text" id="containerOfTaskId" name="containerOfTaskId" style="display: none"> -->
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Enter old password</label>
            <div class="col-sm-8">
            <input type="password" class="form-control" id="oldPass" name="oldPass">
                    </div>
                    </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Enter new password</label>
            <div class="col-sm-8">
            <input type="password" class="form-control" id="newPass" name="newPass">
             
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-4 col-form-label">Confirm new password</label>
            <div class="col-sm-8">
            <input type="password" class="form-control" id="confirmPass" name="confirmPass">
             
            </div>
          </div>
          </div>



  <!-- document.getElementById('modalNumberofDays').value=parseInt(noOfdays) -->
  <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="changePassword" name="changePassword" class="btn btn-info" >Update</button>
              
            
               </div>
                
        </form>
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

        <div class="modal fade" id="modalAdminRemoveCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Remove Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
               
                   
                <form action="leader.php" method = "POST" id="categoryForm" style="width: 100%; padding: 10px; border: 0;" >
                     
                  <div class="form-group">
                   
                    <label  for="message-text" class="col-form-label">Click to select category</label>
                    <input  type="text"class="form-control"  name="inputCategoryRemove" id="inputCategoryRemove" >
                    <input  type="text"class="form-control"  name="inputCategoryRemoveId" id="inputCategoryRemoveId" style="display: none">

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
                                   $category =  $data['categoryId'];
                                    ?>
                                    <tr>
                                      <td onclick= "clickpassdataCategory('<?php echo $data['CategoryName'];?>','<?php echo $category ?>')" ><a><?php echo $data['CategoryName']; ?> </a></td>
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
                <button type="submit" name="RemoveCategory" class="btn btn-danger" >Remove</button>
            
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
                                    <option value="annual">Annually</option>

                              

                                </select>
                                
                  </div>
                </div>
                 
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Date Started</label>
                  <div class="col-sm-8">
            <input <?php if($editTaskVar == "0"){ echo "disabled"; } ?> type="date" id="dateStarted"  name="dateStarted" style="margin-right: 20px;height: 90%; width: 100%; " >
           
                  </div>
                </div>
                 
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-4 col-form-label">Target End Date</label>
                  <div class="col-sm-8">
            <input <?php if($editTaskVar == "0"){ echo "disabled"; } ?> type="date" id="targetDate"  name="targetDate" style="margin-right: 20px; height: 90%; width: 100%;" >
                 
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
          <h3 style=" margin: 20px"> <?php echo $ThisIsTheDateToday ?> Week <?php $date = new DateTime($ThisIsTheDateToday);
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
    <a class="nav-link <?php echo $TaskActive; ?> " id="task-tab" data-toggle="tab" href="#task" role="tab" aria-controls="task" aria-selected="true">Task</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</a>
  </li> --> 
  <li class="nav-item ">
    <a class="nav-link <?php echo $EndedActive; ?>" id="ended-tab" data-toggle="tab" href="#ENDED" role="tab" aria-controls="ENDED" aria-selected="false">Ended Task</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link <?php echo $MembersActive; ?>" id="pic-tab" data-toggle="tab" href="#PIC" role="tab" aria-controls="PIC" aria-selected="false">Members Progress</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php echo $SummaryActive; ?>" id="dept-tab" data-toggle="tab" href="#Dept" role="tab" aria-controls="Dept" aria-selected="false">Summary Report</a>
  </li>
</ul>
</div>
<div class="tab-content" id="myTabContent" style="height: 100%;margin: 30px; margin-top: 0px ">
<?php include "endedTableForLeader.php"; ?>
<div class="tab-pane fade show <?php echo $TaskActive; ?>" id="task" style="height: 90%;  background-color: none" role="tabpanel" aria-labelledby="task-tab">
  
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
            
            <input type="date" id="datepicker" value="<?php $startDate = new DateTime($today);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>" name="datepicker" style="margin-right: 20px" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
            
            <input type="date" id="datepickerEnd" value="<?php $EndDate = new DateTime($todayEnd); $endDATE =  $EndDate->format('Y-m-d'); echo $endDATE ?>" name="datepickerEnd" onchange="filterMonth();">
          <button type="submit" name="submitdate" class="btn btn-info btn-sm" onclick="submitDate();">Submit</button>
            <button type="button" class="btn btn-outline-success btn-sm" onclick="exportData()"> <i style="font-size: 20px;"class="fas fa-file-csv fa-xs"></i> Export</button>
                         
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
                                            <input class="form-check-input" type="radio" name="checkDone" id="checkDone" onclick="FilterSched();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Annual
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
                            <div class="form-group searchInput" >
                                <select class="custom-select" id="inputGroupSelect01" onchange="getSelectValue();"style="display: none">
                                    <option  disabled selected hidden>Search by</option>
                                    <option value="1">Area</option>
                                    <option value="2">Task Name</option>
                                    <option value="4">Type</option>
                                    <option value="3">In charge</option>
                                    <option value="0">Category</option>
                                    
                                  </select>
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterbox" placeholder=" "onkeyup="getSelectValue();" >
                            </div>
                        </div> 
                    </div>
                    <form action="leader.php" method = "POST">
                    <!-- <input type="submit" name="submitSelected" value="End Task"> -->
                    <input type="date" id="dateForEnd" value="<?php $EndDate = new DateTime($todayEnd); $endDATE =  $EndDate->format('Y-m-d'); echo $endDATE ?>" name="dateForEnd" >
          
                    <button type="submit" id = "submitSelected" name="submitSelected" class="btn btn-outline-success btn-sm" style="margin-bottom: 2px">  End Task</button>
                    <button type="submit" id = "deleteSelected" name="deleteSelected" class="btn btn-outline-danger btn-sm" style="margin-bottom: 2px">  Delete</button>


                    <div class="overflow-x">
    <div class="overflow-y overflow-x" style="overflow-y: scroll;overflow-x: scroll; height:580px;"> 
                   

<!-- 
<table id="table"></table> -->
                        
                      <table class="table table-striped " style="width:  100%" id="filtertableMain" class="table datacust-datatable Table ">
                            <thead  class="thead-primary" style="position: sticky;top: -1px;">
                               
                            
                            <tr id="topLeft" class="table-dark table-bordered text-center" >
                                    <th style="min-width:15px;"></th>
                                    <th style="min-width:15px;">No.</th>
                                    <th style="width:200px;"  >In charge</th>
                                    <th style="width:200px;" >Task Name</th>
                                    <th style="min-width:40px;">Area</th>
                                    <th style="min-width:50px;">Category</th>
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
                                  // $holidays = array('2022-07-15');
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
                            <tbody class="text-center" id="TaskTable">
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
                                    $dateStarted = $data['dateAdded'];
                                    $dateTarget = $data['targetDate'];




                                    // echo("<script>console.log('taskname : " . $taskname. "');</script>");
                                    
                              //  echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                            ?>
                             
                             <!-- onclick= "PassTaskData('<?php //echo $data['usertaskID']; ?>')" -->
                             <!-- <tr  data-toggle='modal' data-target='#modalAdmin'> -->
                             <tr class="ewan" <?php
                               $selectstatus = "SELECT * FROM `usertask` WHERE `usertaskID` = '$userTaskID'";

                               // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                               $status = mysqli_query($con, $selectstatus);
                            
                               while($userRow = mysqli_fetch_assoc($status)){
                                  $unaccomplished = $userRow['unaccomplished'];
                                  if($unaccomplished){
                                    echo "style='background-color: red'";
                                  }
                               }
                             ?> >
                             <!-- <input id="btn-passdata" class="btn-signin" name="sbtlogin" type="submit" value="Login" style="margin: auto;" disabled> -->
                             <td><input type="checkbox" value="<?php echo $data['usertaskID']; ?>" name="id[]" onclick=ShowEndTaskButton()></td>
                             <td >
                               
                               <?php echo $sn; ?></td>
                               <td><?php $fname= $data['username'];    $sql1 = "SELECT * FROM `users` WHERE username = '$fname';";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
        while($userRow = mysqli_fetch_assoc($result)){
         $firstname = $userRow['f_name'];
         $lastname = $userRow['l_name'];

      } echo  $firstname.' ';
      echo  $lastname;  ?></td>
                              <td class="taskNameHover" onclick= "clickpassdata('<?php echo $taskUser?>','<?php echo $taskArea?>','<?php echo $userTaskID?>', '<?php echo $taskname?>','<?php echo $taskCategory?>', '<?php echo $taskType?>', '<?php echo $dateStarted?>', '<?php echo $dateTarget?>' )" data-toggle='modal' data-target='#modalAdmin'><?php echo $data['taskName']; ?></td>
                               <td><?php echo $data['taskArea']; ?></td>
                                <td><?php echo $data['taskCategory']; ?></td>
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
                                  // $holidays = $holidaysArray;

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
                                       
                                        // echo $curr;
                                        // echo " ";
                                        // echo $day;
                                   $taskID = $data['usertaskID'];
                                   $taskType = $data['taskType'];
                                   if($taskType == "daily"  || $taskType == "others"){
                                    ?>
                                    <td style='width:240px;'><?php
                                    //  echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");

                                      // $datePicker = $_POST['datepicker'];
                                      // $month= date('F', strtotime($datePicker));
                                      // $year =date('Y', strtotime($datePicker));


                                      // $selectUserTask1 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$monthOfThisDate' AND `year` = '$yearOfThisDate' AND `week` = 'week $curr' ORDER BY `FinishedTaskID` DESC LIMIT 1 ";//old query
                                      $selectUserTask1 = "SELECT * FROM finishedtask WHERE taskID = '$taskID'  AND `year` = '$yearOfThisDate' AND `week` = 'week $curr' ORDER BY `FinishedTaskID` DESC LIMIT 1";

                                      // $selectUserTask1 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND  `year` = '$yearOfThisDate' AND `week` = 'week $curr' ORDER BY `FinishedTaskID` DESC LIMIT 1 ";//old

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
                                         $pointReceived = $userRow['score'];
                                         $DateSubmitted = $userRow['DateSubmitted'];
                                         $dateN =  date('n-d', strtotime($DateSubmitted));
                                          $timestamp = $userRow['timestamp'];


                                        //  echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                        $noOfDays = $userRow['noOfDaysLate'];
                                               }
                                               if ($weekNumber == "week $curr" ){
     
                                                $weeknumber = $weekNumber;

                                                if($noOfDays >= 1){
                                                  // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                  
                                                  if($isCheckedByLeader){
                                                    ?>
                                                    <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->

                                                    <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                     <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                     <?php
                                                  }
                                                  
                                                  
                                                 
                                                }
                                                else if ($noOfDays <= 0){
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  if($isCheckedByLeader){
                                                    ?>
                                                    <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-point="<?php echo $pointReceived?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-point="<?php echo $pointReceived?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    <?php
                                                  }
                                                  
                                                }
                                                    // echo("<script>console.log('ok');</script>");
          
                                                   }
                                              //  //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                              ?> </td><?php
                                            }
                                   else if($taskType == "annual"){
                                    ?>
                                <?php
 // code for annual
 $dateOfNow = new DateTime($today);
 $MonthOfNow =  $dateOfNow->format('F');
 $YearToUseForApril = "";
 $YearToUseforMarch = "";
 if($MonthOfNow=="January" || $MonthOfNow=="February" || $MonthOfNow=="March"){

   $YearToUseforMarch =  $dateOfNow->format('Y');
   $dateOfNow->modify('last year');
   $YearToUseForApril =  $dateOfNow->format('Y');
 }
 else{
   $YearToUseForApril =  $dateOfNow->format('Y');
$dateOfNow->modify('next year');
$YearToUseforMarch =  $dateOfNow->format('Y');

}
$April = new DateTime($YearToUseForApril.'-04-01');
$March = new DateTime($YearToUseforMarch.'-03-31');
$April =  $April->format('Y-m-d');
$March =  $March->format('Y-m-d');


     $selectUserTasks = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND  `realDate` BETWEEN '$April' AND '$March';";
     // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
     $result = mysqli_query($con, $selectUserTasks);

     $numrows = mysqli_num_rows($result);
     $don = "0";
     while($userRow = mysqli_fetch_assoc($result)){
       $noOfDays = $userRow['noOfDaysLate'];
       $isLate = $userRow['isLate'];
       $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         $reason = $userRow['reason'];
                                         $action = $userRow['action'];
                                         $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                         $pointReceived = $userRow['score'];
                                         $timestamp = $userRow['timestamp'];
                                         $DateSubmitted = $userRow['DateSubmitted'];

   }
   if ($numrows >= 1){
    if($isLate){
      if($isCheckedByLeader){
        ?>
        <td style='width:240px; background-color:  #ff4800;'>
    <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
      </td>
     <?php
      }
      else{
        ?>
            <td style='width:240px; background-color:  #ff8000;'>

        <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
      </td>
         <?php
      }
    }
    else{
      if($isCheckedByLeader){

        ?>
        <td style='width:240px; background-color: #00b7ff;'>

        <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
          </td>
          <?php

       }
       else{
        ?>
            <td  colspan="1" style='width:240px; background-color: #09922d'>
        <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>"  data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
       </td>
          <?php
       }
    }
    $don = "1";
  //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
       }
       else{
        ?>
        <td  colspan="1" style='width:240px;'>
   </td> <?php
       }
       ?> <?php
//end of code for annual
                                  }
                                   else{
                                    ?>
                                    <td style='width:240px;'><?php
                                     //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID'  AND `year` = '$yearOfThisDate' AND `week` = 'week $curr' ORDER BY `FinishedTaskID` DESC LIMIT 1";
     
                                        //  $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$monthOfThisDate' AND `year` = '$yearOfThisDate';"; //old
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
                                         $pointReceived = $userRow['score'];
                                         $DateSubmitted = $userRow['DateSubmitted'];
                                        //  $dateN =  date('n-d', strtotime($DateSubmitted));
                                          $timestamp = $userRow['timestamp'];
                                         //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                               
                                               if ($weekNumber == "week $curr" ){
     
                                                $weeknumber = $weekNumber;

                                                if($noOfDays >= 2){

                                                  if($isCheckedByLeader){
                                                    ?>
                                                <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp ?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>

                                                 <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
    
                                                     <?php
                                                  }
                                                  // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  
                                                }
                                                else if ($noOfDays <= 1){
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                 if($isCheckedByLeader){

                                                  ?>
                                                  <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    
                                                    <?php

                                                 }
                                                 else{
                                                  ?>
                                                  <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    
                                                    <?php
                                                 }
                                                
                                                }
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // //echo("<script>console.log('ok');</script>");
          
                                                   }
                                                  }
                                                  ?> </td><?php
                                               //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }                       
                                   
                                ?>
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
                          echo "";
    }                     ?>                   
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <!--  -->
                    
                </form>
                </div>
            </div>
        </div>
      </div>
      </div>

      <div class="tab-pane fade show <?php echo $MembersActive; ?>" style="height: 90%; padding: 0px; background-color: none; " id="PIC" role="tabpanel" aria-labelledby="pic-tab">
      <div class="container p-30 " id="TableListOfMembers" style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
        <div class="ms-1 shadow row">
           <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-2 createSegment"> 
                         <h3>Members Progress</h3> 
                        </div>
                        
                        <div class="col-sm-7 add_flex" style="padding: 0">
                        <div class="col-sm-7" style="padding: 0" >
                        <fieldset class="row mb-3" style="margin-top: 25px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding: 0px">
                                   
                            <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" <?php echo $dailyChecked ?> onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Daily
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline" style="margin-left: 10px; ">
                                        <input class="form-check-input"  type="radio" name="ProgFilter" id="ProgFilter" <?php echo $weeklyChecked ?> onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Weekly
                                            </label>
                                    </div>
                                   
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" <?php echo $monthlyChecked ?> onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Monthly
                                            </label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" <?php echo $annualChecked ?> onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Annually
                                            </label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ProgFilter" id="ProgFilter" <?php echo $othersChecked ?> onclick="FilterProgress();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Others
                                            </label>
                                     </div>
                                   
                                  
                             </div>
                        </fieldset>
                    </div>
                    <div class="form-group searchInput">
                              
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterboxDaily" placeholder=" " onkeyup="getSelectValueDaily();">
                            </div>
                  </div>

                    </div>
                    <?php include "./Code For Members Progress Report/DetailedDailyTaskReport.php" ?>
                    <?php include "./Code For Members Progress Report/DetailedWeeklyReport.php" ?>
                    <?php include "./Code For Members Progress Report/DetailedMonthlyReport.php" ?>
                    <?php include "./Code For Members Progress Report/DetailedAnnuallyReport.php" ?>
                    <?php include "./Code For Members Progress Report/DetailedOthersReport.php" ?>


                    




                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade show <?php echo $SummaryActive; ?>" id="Dept" role="tabpanel" aria-labelledby="dept-tab">
      <div class="container p-30" id="TableListOfMembers"; style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
      <div class="ms-1 shadow row" >
      <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-3 createSegment"> 
                         <h3>Summary Report</h3> 
                        </div>
                        
                        
        <div class="form-group searchInput">
                              
                              <!-- <label for="email">Search:</label> -->
                              <input type="search" class="form-control" id="filterboxDaily" placeholder=" " onkeyup="getSelectValueDaily();">
                          </div>
                    </div>
                    <?php include "./Code For Summary Report/DetailedSummaryReport.php"?>
                    
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
        

        // document.getElementById('WeeklyReportArea').style.display='none';
        // document.getElementById('monthyReportArea').style.display='none';




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
  console.log(button.data('dateSubmitted'));
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
function clickpassdata(userName,usertaskArea,userTaskID, taskname, taskCategory, taskType, dateStarted, targetDate){
document.getElementById("usernameSelectmodal").value = userName;
document.getElementById("tasknamemodal").value = taskname;
document.getElementById("taskCategorymodal").value = taskCategory;
document.getElementById("taskTypemodal").value = taskType;
document.getElementById("containerOfTaskId").value = userTaskID;
document.getElementById("taskAreamodal").value = usertaskArea;
document.getElementById("dateStarted").value = dateStarted;
document.getElementById("targetDate").value = targetDate;




userTaskId = userTaskID;
}
function clickpassdataCategory(name,id){
  document.getElementById("inputCategoryRemove").value = name;
  document.getElementById("inputCategoryRemoveId").value = id;

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
document.getElementById("dateStarted").disabled = false;
document.getElementById("targetDate").disabled = false;







}
var dateNow = <?php echo json_encode("$dateNow"); ?>;
var FDateofThisMonth = <?php echo json_encode("$FDateofThisMonth"); ?>;



// document.getElementById("datepicker").value = FDateofThisMonth;
// document.getElementById("datepickerEnd").value = dateNow;

// document.getElementById("datepickerProgDaily").value = FDateofThisMonth;
// document.getElementById("datepickerEndProgDaily").value = dateNow;

// document.getElementById("datepicker1").value = dateNow;
// document.getElementById("datepicker2").value = dateNow;


// $('#myTab li:eq(0) a').tab('show');

// function submitDate(){
//  var jsonDataPIC = <?php echo json_encode("$picfocus"); ?>;
//  var jsonDataTask = <?php echo json_encode("$taskfocus"); ?>;
//  var jsonDailyTask= <?php echo json_encode("$dailyfocus"); ?>;

 
//  var jsonDataSection = <?php echo json_encode("$sectionfocus"); ?>;

//  var date = <?php echo json_encode("$dateToPass"); ?>;
//  var dateEnd = <?php echo json_encode("$dateToPassEnd"); ?>;

 
//  var datedaily = <?php echo json_encode("$dateToPassDaily"); ?>;
//  var dateEnddaily = <?php echo json_encode("$dateToPassEndDaily"); ?>;

//  var date1 = <?php echo json_encode("$dateToPass1"); ?>;
//  var date2 = <?php echo json_encode("$dateToPass2"); ?>;

// // console.log(jsonDataPIC);
 
// // if(jsonDailyTask == "true"){
// //   document.getElementById("datepickerProgDaily").value = datedaily;
// // document.getElementById("datepickerEndProgDaily").value = dateEnddaily;


// // // $('#myTab li:eq(1) a').tab('show');

// // }
// if(jsonDataTask == "true"){
// document.getElementById("datepicker").value = date;
// document.getElementById("datepickerEnd").value = dateEnd;
// $('#myTab li:eq(0) a').tab('show');
// }
// if(jsonDataSection == "true"){
// document.getElementById("datepicker2").value = date2;


// $('#myTab li:eq(2) a').tab('show');



// }


// }

 function FilterSched(){

  var types=document.getElementsByName('checkDone');
  
  if(types[0].checked){
    let filterValue="monthly";
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[6];
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
                let val = tr[index].getElementsByTagName('td')[6];
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
                let val = tr[index].getElementsByTagName('td')[6];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
  }

  else if (types[3].checked){
    let filterValue="annual";
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[6];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
  }
  else if (types[4].checked){
    let filterValue="";
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[6];
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


getSelectValue();
function getSelectValue() {
    let input = document.getElementById('filterbox').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('ewan');
    sheets=[-1];
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="table-row";      
            sheets.push(i);              

        }
    }
}
getSelectValueDaily();
function getSelectValueDaily() {
    let input = document.getElementById('filterboxDaily').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('dailyTable');
    sheets=[-1];
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="table-row";       
            sheets.push(i);              

        }
    }
}


function checkTextBox(){

const username = document.getElementById("usernameSelectmodal");
const usertask = document.getElementById("tasknamemodal");
const taskcategory = document.getElementById("taskCategorymodal");
const tasktype = document.getElementById("taskTypemodal");
const taskArea = document.getElementById("taskAreamodal");
const dateStarted = document.getElementById("dateStarted");
const targetDate = document.getElementById("targetDate");


if(username.value != "" && usertask.value != "" && taskcategory.value != "" && tasktype.value != "" && taskArea.value != "" && dateStarted.value != "" && targetDate.value != "" ){
  document.getElementById("UpdateTaskbtnSubmit").click();

}
else{
  window.alert("Form is incomplete. Please fill out all fields");
}

}





function FilterProgress(){

var types=document.getElementsByName('ProgFilter');

if(types[0].checked){
  document.getElementById('DailyReportArea').style.display='block';
  document.getElementById('WeeklyReportArea').style.display='none';
  document.getElementById('monthyReportArea').style.display='none';  
  document.getElementById('annualReportArea').style.display='none';  
  document.getElementById('OthersReportArea').style.display='none';


}
else if (types[1].checked){
  document.getElementById('DailyReportArea').style.display='none';
  document.getElementById('WeeklyReportArea').style.display='block';
  document.getElementById('monthyReportArea').style.display='none'; 
  document.getElementById('annualReportArea').style.display='none';  
  document.getElementById('OthersReportArea').style.display='none';



}
else if (types[2].checked){
  document.getElementById('DailyReportArea').style.display='none';

  document.getElementById('WeeklyReportArea').style.display='none';
  document.getElementById('monthyReportArea').style.display='block';  
  document.getElementById('annualReportArea').style.display='none';  
  document.getElementById('OthersReportArea').style.display='none';


}
else if (types[3].checked){
  document.getElementById('DailyReportArea').style.display='none';
  document.getElementById('WeeklyReportArea').style.display='none';
  document.getElementById('monthyReportArea').style.display='none';  
  document.getElementById('annualReportArea').style.display='block';  
  document.getElementById('OthersReportArea').style.display='none';

}
else if (types[4].checked){
  document.getElementById('DailyReportArea').style.display='none';
  document.getElementById('WeeklyReportArea').style.display='none';
  document.getElementById('monthyReportArea').style.display='none';  
  document.getElementById('annualReportArea').style.display='none';  
  document.getElementById('OthersReportArea').style.display='block';

}

}

function exportDataAnnual(){
  
  var table = document.getElementById("tableOfAnnual");
  var rows =[];

           column1 = 'No.';
           column2 = 'In Charge';
           column3 = 'Task';
           column4 = 'No. of ontime';
           column5 = 'No. of Late';
           column6 = 'Total points earned';
           column7 = 'Target points';
           column8 = 'Percentage';


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );
           
  for(var i=0,row; row = table.rows[i];i++){
        column1 = row.cells[0].innerText;
           column2 = row.cells[1].innerText;
           column3 = row.cells[2].innerText;
           column4 = row.cells[3].innerText;
           column5 = row.cells[4].innerText;
           column6 = row.cells[5].innerText;
           column7 = row.cells[6].innerText;
           column8 = row.cells[7].innerText;


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );

  }
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
       link.setAttribute("download", "WeeklyAnnual.csv");
       document.body.appendChild(link);
        /* download the data file named "Stock_Price_Report.csv" */
       link.click();
}
function exportDataMonthly(){
  
  var table = document.getElementById("tableOfMonthly");
  var rows =[];

           column1 = 'No.';
           column2 = 'In Charge';
           column3 = 'Task';
           column4 = 'No. of ontime';
           column5 = 'No. of Late';
           column6 = 'Total points earned';
           column7 = 'Target points';
           column8 = 'Percentage';


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );
           
  for(var i=0,row; row = table.rows[i];i++){
        column1 = row.cells[0].innerText;
           column2 = row.cells[1].innerText;
           column3 = row.cells[2].innerText;
           column4 = row.cells[3].innerText;
           column5 = row.cells[4].innerText;
           column6 = row.cells[5].innerText;
           column7 = row.cells[6].innerText;
           column8 = row.cells[7].innerText;


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );

  }
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
       link.setAttribute("download", "WeeklyMonthly.csv");
       document.body.appendChild(link);
        /* download the data file named "Stock_Price_Report.csv" */
       link.click();
}
function exportDataWeekly(){
  
  var table = document.getElementById("tableOfWeekly");
  var rows =[];

           column1 = 'No.';
           column2 = 'In Charge';
           column3 = 'Task';
           column4 = 'No. of ontime';
           column5 = 'No. of Late';
           column6 = 'Total points earned';
           column7 = 'Target points';
           column8 = 'Percentage';


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );
           
  for(var i=0,row; row = table.rows[i];i++){
        column1 = row.cells[0].innerText;
           column2 = row.cells[1].innerText;
           column3 = row.cells[2].innerText;
           column4 = row.cells[3].innerText;
           column5 = row.cells[4].innerText;
           column6 = row.cells[5].innerText;
           column7 = row.cells[6].innerText;
           column8 = row.cells[7].innerText;


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );

  }
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
       link.setAttribute("download", "WeeklyReport.csv");
       document.body.appendChild(link);
        /* download the data file named "Stock_Price_Report.csv" */
       link.click();
}

function exportDataDaily(){
  
  var table = document.getElementById("tableOfDaily");
  var rows =[];

           column1 = 'No.';
           column2 = 'In Charge';
           column3 = 'Task';
           column4 = 'No. of ontime';
           column5 = 'No. of Late';
           column6 = 'Total points earned';
           column7 = 'Target points';
           column8 = 'Percentage';


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );
           
  for(var i=0,row; row = table.rows[i];i++){
        column1 = row.cells[0].innerText;
           column2 = row.cells[1].innerText;
           column3 = row.cells[2].innerText;
           column4 = row.cells[3].innerText;
           column5 = row.cells[4].innerText;
           column6 = row.cells[5].innerText;
           column7 = row.cells[6].innerText;
           column8 = row.cells[7].innerText;


           
           rows.push(
               [
                   column1,
                   column2,
                   column3,
                   column4,
                   column5,
                   column6,
                   column7,
                   column8,


                  
            
               ]
           );

  }
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
       link.setAttribute("download", "DailyReport.csv");
       document.body.appendChild(link);
        /* download the data file named "Stock_Price_Report.csv" */
       link.click();
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
//sticky columns

//  var $table = $('#filtertableMain')

//  $table.bootstrapTable({
    
//     fixedColumns: true,
//     fixedNumber: 6,
//     stickyHeader: true,

//   })


//end of sticky column
//   var $tables = $('#table')

// function buildTable($el, cells, rows) {
//   var i
//   var j
//   var row
//   var columns = []
//   var data = []

//   for (i = 0; i < cells; i++) {
//     columns.push({
//       field: 'field' + i,
//       title: 'Cell' + i,
//       sortable: true
//     })
//   }
//   for (i = 0; i < rows; i++) {
//     row = {}
//     for (j = 0; j < cells; j++) {
//       row['field' + j] = 'Row-' + i + '-' + j
//     }
//     data.push(row)
//   }

//   var classes = $('.toolbar input:checked').next().text()

//   $el.bootstrapTable('destroy').bootstrapTable({
//     columns: columns,
//     data: data,
//     stickyHeader: true,

//   })
// }

// $(function() {
//   $('.toolbar input').change(function () {
//     buildTable($tables, 20, 50)
//   })
//   buildTable($tables, 20, 50)
// })

var haveSelected = 0;
function ShowEndTaskButton(){
  haveSelected++;
  if(haveSelected >=1){
document.getElementById("dateForEnd").style.display="inline";
document.getElementById("submitSelected").style.display="inline";
document.getElementById("deleteSelected").style.display="inline";


}
}

if(haveSelected >=1){
document.getElementById("dateForEnd").style.display="block";
document.getElementById("submitSelected").style.display="block";
document.getElementById("deleteSelected").style.display="block";


}
else{
  document.getElementById("dateForEnd").style.display="none";
document.getElementById("submitSelected").style.display="none";
document.getElementById("deleteSelected").style.display="none";

}
        </script>
    </body>
</html>