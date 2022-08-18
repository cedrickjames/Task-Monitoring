<?php

else if($taskType == 'annual'){
                                      

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

  $selectUserTasks = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND  `DateSubmitted` BETWEEN '$April' AND '$March';";
  // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
  $result = mysqli_query($con, $selectUserTasks);

  $numrows = mysqli_num_rows($result);
  $don = "0";
  while($userRow = mysqli_fetch_assoc($result)){
    $noOfDays = $userRow['noOfDaysLate'];
    $isLate = $userRow['isLate'];
  

}
//new monthly code

$selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
$result = mysqli_query($con, $selectUserTask);

while($userRow = mysqli_fetch_assoc($result)){
  $dateStarted = $userRow['dateStarted'];
}

$date = new DateTime($dateStarted);


$date->modify('next year');
$nextYearSample =  $date->format('Y');

$date = new DateTime($nextYearSample.'-04-01');
$nextYearMarch =  $date->format('Y-m-d');

$end = new DateTime(date('Y-m-d'));


$start = new DateTime($nextYearMarch);


$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$finalDiff = $interval->days;
// $finalDiff =  $interval->format('%R%a')."\n";
// echo $finalDiff;
// create an iterateable period of date (P1D equates to 1 day)


// best stored as array, so you can add more than one
//$holidays = array('2012-09-07');
  // $holidays = $holidaysArray;
  

  
    $period = new DatePeriod($start, new DateInterval('P1D'), $end);
    foreach($period as $dt) {
        $curr = $dt->format('D');
    // echo $curr;
   

        if ($curr == 'Sat' || $curr == 'Sun') {
          $finalDiff++;
        }
    
        if (in_array($dt->format('Y-m-d'), $holidays)) {
          $finalDiff++;
        }
    }
    echo "<br>";
    // echo $finalDiff;

// else{
// // echo $finalDiff;

// $periods = new DatePeriod($start, new DateInterval('P1D'), $end);
// foreach($periods as $dt) {
//     $currs = $dt->format('D');
//     // echo $currs;

//     // substract if Saturday or Sunday
//     if ($currs == 'Sat' || $currs == 'Sun') {
//       $finalDiff--;
//     }

//     // (optional) for the updated question
//   if (in_array($dt->format('Y-m-d'), $holidays)) {
//       $finalDiff--;
//     }
// }
// }


    
    if ($numrows >= 1){
      if($isLate){
        echo '<span id = "doneORnot" class="mode mode_late">LATE</span>';
      }
      else{
        echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
      }
      $don = "1";
    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
         }
         else{
          if($finalDiff<=-2){
            echo '<span id = "doneORnot" class="mode mode_near">Unaccomplished</span>';
              }
              else if($finalDiff >=0){
            echo '<span id = "doneORnot" class="mode mode_done">Pending</span>';
              }
              else if($finalDiff ==-1){
                echo '<span class="⚠"></span><span id = "doneORnot" class="mode mode_done">Pending</span>';
                  }
         }


//end of new monthly code
  // if ($numrows >= 1){
  //   if($isLate){
  //     echo '<span id = "doneORnot" class="mode mode_late">LATE</span>';
  //   }
  //   else{
  //     echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
  //   }
  //   $don = "1";
  // //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
  //      }
  //      else{
  //       $lastmonth =  date("F", strtotime("previous month"));

  //       $meronBaSiyaLastMonth = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$lastmonth' AND `year` = '$year1' ;";
  //       // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
  //       $resultm = mysqli_query($con, $meronBaSiyaLastMonth);

  //       $meronlastMonth = mysqli_num_rows($resultm);

  //       if($meronlastMonth >=1){
  //         echo '<span id = "doneORnot" class="mode mode_done">Pending</span>';
  //       }
  //       else if($meronlastMonth <=0){
  //     echo '<span id = "doneORnot" class="mode mode_near">Unaccomplished</span>';
  //       }
  //      }
  
  }
?>