<?php

else if($taskType == "annual"){


    $IntervalDays = $_SESSION['noOfDaysLate'];
    echo "<script> console.log('$meron') </script>";//find2
    if($IntervalDays ==0 ){
      // echo "meron";
      if($_SESSION['newFileLoc'] ==""){
        $fileloc ="" ;
      }
      else{
        $fileloc = $_SESSION['newFileLoc'];
      }
        //echo "merom";
        

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
$startDateMonth = $dateNewToday->format('F');
$fDateOfTheMonth = new DateTime('first day of '.$startDateMonth);
                                     
      $firstDateOfTheMonth =  $fDateOfTheMonth->format('Y-m-d');
      $timenowForSameId = date("hi");       
      $realDateForSameId = $dateSubmitted;     
      $sameID=$usertaskID . $timenowForSameId . $realDateForSameId . $action . $myReason;

$updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
        mysqli_query($con, $updateDateStarted);
        $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `sameID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$sameID','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$firstDateOfTheMonth','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate', '1');";
        mysqli_query($con, $sqlinsert);
        header("location:index.php");
        unset($_SESSION['newFileLoc']);
        $_SESSION['reason'] = "";
        $_SESSION['action'] = "";

        $_SESSION['noOfDaysLate']="";

      
    }
    else if($IntervalDays >0) {//find3
    
      if($_SESSION['newFileLoc'] ==""){
        $fileloc ="" ;
      }
      else{
        $fileloc = $_SESSION['newFileLoc'];
      }
//ganito nalang, kapag late automatic dalwa ang malalagay, last year at ngayun
// kasi siguro naman walang 2 years na late hahaha unless resign na diba



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
$startDateMonth = $dateNewToday->format('F');
$fDateOfTheMonth = new DateTime('first day of '.$startDateMonth);
                             
$firstDateOfTheMonth =  $fDateOfTheMonth->format('Y-m-d');
$timenowForSameId = date("hi");       
$realDateForSameId = $dateSubmitted;     
$sameID=$usertaskID . $timenowForSameId . $realDateForSameId . $action . $myReason;

$updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
mysqli_query($con, $updateDateStarted);
$sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `sameID`, `taskID`, `Date`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$sameID','$usertaskID',' $today', '$timenow','$taskName','$incharge','$taskType','$month','$firstDateOfTheMonth','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate', '1', false);";
mysqli_query($con, $sqlinsert);
header("location:index.php");
unset($_SESSION['newFileLoc']);
$_SESSION['reason'] = "";
$_SESSION['action'] = "";

$_SESSION['noOfDaysLate']="";


$dateOfTheDay = new DateTime();
$dateOfTheDays = $dateOfTheDay->format('m-d');
$yearNow = $dateOfTheDay->format('Y');
$dateSubmitted = date('Y-m-d');
$today=" March 31, ".$yearNow;
if($dateOfTheDays =="04-01" || $dateOfTheDays =="04-02"){
  $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`,  `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$sameID','$usertaskID',' $today', '$dateSubmitted', '$timenow','$taskName','$incharge','$taskType','$month','$firstDateOfTheMonth','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate', '0.5', true);";
  mysqli_query($con, $sqlinsert);
  header("location:index.php");
  unset($_SESSION['newFileLoc']);
  $_SESSION['reason'] = "";
  $_SESSION['action'] = "";
  $_SESSION['noOfDaysLate']="";
  
}
else{
  $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `sameID`, `taskID`, `Date`, `DateSubmitted`,  `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`, `firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`,`action`, `realDate`, `score`) VALUES ('','$sameID','$usertaskID',' $today', '$dateSubmitted', '$timenow','$taskName','$incharge','$taskType','$month','$firstDateOfTheMonth','$week','$fileloc', '$year', '$department', '$finalDiff', '$myReason', '$action', '$realDate', '0', true);";
  mysqli_query($con, $sqlinsert);
  header("location:index.php");
  unset($_SESSION['newFileLoc']);
  $_SESSION['reason'] = "";
  $_SESSION['action'] = "";
  $_SESSION['noOfDaysLate']="";
}

//if april 1 or 2, 0.5, else 0 na tas ang date na ilalagay mo para lang ma read yung year 2022 ay march 31 2022. for basis only. PEro lalagyan mo parin ng date submitted.


      
    }
   }

?>