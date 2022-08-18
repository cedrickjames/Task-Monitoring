
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

        $arrayWeekNumbers=array();
        $arrayMonth=array();
        $arrayFirstDate=array();
        
        $arrayYear=array();
        $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
          $result = mysqli_query($con, $selectUserTask);

          while($userRow = mysqli_fetch_assoc($result)){
            $dateStarted = $userRow['dateStarted'];
          }

          $date = new DateTime($dateStarted);
          $date->modify('next month');
          $monthOfDate =  $date->format('F');
          $year =  $date->format('Y');

          $fDateOfTheMonth = new DateTime('first day of '.$monthOfDate. $year);
          $FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');

          $lDateOfTheMonth = new DateTime('last day of '.$monthOfDate. $year);
          $LDateofThisMonth =  $lDateOfTheMonth->format('Y-m-d');

          $start = new DateTime($FDateofThisMonth);
          $end = new DateTime();
          $end->modify('+1 day');

          $interval = $end->diff($start);
          
          $days = $interval->days;

          $period = new DatePeriod($start, new DateInterval('P1D'), $end);

          //$holidays = array('2022-07-15');
          // $holidays = $holidaysArray;

          $monthNo ="";
          $NumberOfWeeksToDone = 0;
          foreach($period as $dt) {

             
              $curr = $dt->format('F');
              $currYear = $dt->format('Y');

              $day =  $dt->format('Y-m-d');
              $LDateOfTheMonth = new DateTime('last day of '.$curr);
              $Lday =  $LDateOfTheMonth->format('Y-m-d');
              $datesss = new DateTime($Lday);

              $weeksss = $datesss->format("W");
              // echo "Weeknumber: $week";
              // echo "<br>";
                 

              $fDateOfTheMonth = new DateTime('first day of '.$curr);
              $firstDateOfTheMonthOrayt =  $fDateOfTheMonth->format('Y-m-d');
              if($curr==$monthNo){
                echo null;
              }
              else{
                $NumberOfWeeksToDone = $NumberOfWeeksToDone +1;
                array_push($arrayMonth,"$curr");
                array_push($arrayYear,"$currYear");
                array_push($arrayWeekNumbers,"$weeksss");
                array_push($arrayFirstDate, "$firstDateOfTheMonthOrayt");
                // echo $curr;
                echo "\n";
                $monthNo = $curr;
              }
          }
          $arrlength = count($arrayMonth);

          
for($x = 0; $x <$arrlength; $x++) {
// echo $cars[$x];
   

          $today = $_SESSION['today'];
          $dateNewToday = new DateTime($today);
            $weekNumberNew = $dateNewToday->format("W");
            $week = 'week '.$arrayWeekNumbers[$x]; //baguhin, dapat ay present week
            $month = $arrayMonth[$x];
              $year = $arrayYear[$x];
          // $week = 'week '.weekOfMonth(date('Y-m-d', strtotime($today)));
          $from=date_create(date('Y-m-d'));
          $to=date_create(date('Y-m-d', strtotime($today)));
          $diff=date_diff($to,$from);
          // print_r($diff);
          // $finalDiff =  $diff->format('%R%a');
          $finalDiff =$IntervalDays; //ibig sabihin late na
          $realDate = date('Y-m-d', strtotime($today));

          $firstdayorayt = $arrayFirstDate[$x];
// $myReason = $_SESSION['reason'];

$date = new DateTime($today);



$datenextnext= new DateTime($firstdayorayt);

$monthOfThis =  $datenextnext->format('F');
$monthOfsubmittedDay =  $date->format('F');

if($monthOfThis == $monthOfsubmittedDay){
$finalDiff = 0;
}
else{
$datenextnext->modify('next month');
$monthOfDate =  $datenextnext->format('F');
$year =  $datenextnext->format('Y');
$fDateOfTheMonth = new DateTime('first day of '.$monthOfDate. $year);
$FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');

$end = new DateTime(date('Y-m-d'));
$start = new DateTime($FDateofThisMonth);
$end->modify('+1 day');
$interval = $end->diff($start);
$finalDiff = $interval->days;
$period = new DatePeriod($start, new DateInterval('P1D'), $end);
//$holidays = array('2012-09-07');
// $holidays = $holidaysArray;

foreach($period as $dt) {
    $curr = $dt->format('D');
    if ($curr == 'Sat' || $curr == 'Sun') {
      $finalDiff--;
    }
    else if (in_array($dt->format('Y-m-d'), $holidays)) {
      $finalDiff--;
    }
}
}

    $timenowForSameId = date("hi");       
    $realDateForSameId = $dateSubmitted;     
    $sameID=$usertaskID . $timenowForSameId . $realDateForSameId . $action . $reason;
    $dateSubmitted = date('Y-m-d');


$updateDateStarted = "UPDATE `usertask` SET `dateStarted`='$today' WHERE `usertaskID` = '$usertaskID';";
          mysqli_query($con, $updateDateStarted);

          $validationVariable = $arrlength-2;
          $validationVar2 = $arrlength-1;

          //find4
              

          if($x<$validationVariable){
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`,`sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`,`firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isLate`) VALUES ('','$sameID','$usertaskID',' $today','$dateSubmitted', '$timenow','$taskName','$incharge','$taskType','$month','$firstdayorayt','$week','$fileloc', '$year', '$department', '$finalDiff', '$reason','$action', '$realDate' ,'0', true);";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            // echo $_SESSION
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
          }
          else if($x==$validationVariable){
            $pointFive = 0.5;
            if($finalDiff>2){
              $pointFive = 0;
            }
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`,`sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`,`firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isLate`) VALUES ('','$sameID','$usertaskID',' $today','$dateSubmitted', '$timenow','$taskName','$incharge','$taskType','$month','$firstdayorayt','$week','$fileloc', '$year', '$department', '$finalDiff', '$reason','$action', '$realDate' ,'$pointFive', true);";
            mysqli_query($con, $sqlinsert);
            header("location:index.php");
            unset($_SESSION['newFileLoc']);
            $_SESSION['reason'] = "";
            $_SESSION['noOfDaysLate']="";
            $_SESSION['action'] = "";
          }
          else if($x==$validationVar2){
            $week = 'week '.$weekNumberNew;
            $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`,`sameID`, `taskID`, `Date`, `DateSubmitted`, `timestamp`,`task_Name`, `in_charge`, `sched_Type`, `month`,`firstDateOfTheMonth`, `week`, `attachments`, `year`, `Department`,`noOfDaysLate`, `reason`, `action`, `realDate`, `score`, `isLate`) VALUES ('','$sameID','$usertaskID',' $today','$dateSubmitted', '$timenow','$taskName','$incharge','$taskType','$month','$firstdayorayt','$week','$fileloc', '$year', '$department', '$finalDiff', '$reason','$action', '$realDate' ,'1', true);";
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
   ?>