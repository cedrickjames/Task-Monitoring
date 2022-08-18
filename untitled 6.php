<?php

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
    $isLate = $userRow['isLate'];
  

}
//new monthly code

$selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
$result = mysqli_query($con, $selectUserTask);

while($userRow = mysqli_fetch_assoc($result)){
  $dateStarted = $userRow['dateStarted'];
}

$date = new DateTime($dateStarted);
$datenow = new DateTime($dateStarted);


$dateStarteds = new DateTime($dateStarted);
$monthOfLastDate =  $dateStarteds->format('F');
    $yearOfLastDate =  $dateStarteds->format('Y');

    $monthofThisMonth = new DateTime(date('Y-m-d'));
    $Month_Now = $monthofThisMonth->format('F');
    $yearOfThisMonth = new DateTime(date('Y-m-d'));
    $Year_Now = $yearOfThisMonth->format('Y');


    $nextMonth = $date->modify('next month');
    // $date->format('Y-m-d');
    $nextMonthHehe =  $nextMonth->format('F');
    $yearOfNextDate =  $date->format('Y');


    if($nextMonthHehe == $Month_Now ){

$finalDiff = "0";
$finalDiff2 = "2";

    }
    else{
    // echo "Next monday is: ";
// $date->modify('next monday');


// echo "Next monday is: ";
// $date->modify('next monday');


// echo "Next monday is: ";
$date->modify('next month');
// $date->format('Y-m-d');
$monthOfDate =  $date->format('F');
$year =  $date->format('Y');

$fDateOfTheMonth = new DateTime('first day of '.$monthOfDate. $year);
$FDateofThisMonth =  $fDateOfTheMonth->format('Y-m-d');

// echo $FDateofThisMonth;

$lDateOfTheMonth = new DateTime('last day of '.$monthOfDate. $year);
$LDateofThisMonth =  $lDateOfTheMonth->format('Y-m-d');
    // echo $FDateofThisMonth;

$end2 = new DateTime(date($LDateofThisMonth));
$start2 = new DateTime($FDateofThisMonth);
// otherwise the  end date is excluded (bug?)
$end2->modify('+1 day');

$interval2 = $end2->diff($start2);

// total days
$finalDiff2 = $interval2->days;

// create an iterateable period of date (P1D equates to 1 day)
$period2 = new DatePeriod($start2, new DateInterval('P1D'), $end2);

// best stored as array, so you can add more than one
// $holidays2 = array('2012-09-07');
  $holidays2 = $holidaysArray;

foreach($period2 as $dt2) {
    $curr2 = $dt2->format('D');

    // substract if Saturday or Sunday
    if ($curr2 == 'Sat' || $curr2 == 'Sun') {
      $finalDiff2--;
    }

    // (optional) for the updated question
    elseif (in_array($dt2->format('Y-m-d'), $holidays)) {
      $finalDiff2--;
    }
}
$finalDiff3 = $finalDiff2;

$finalDiff2 = $finalDiff2+2;




// $date->format('Y-m-d');
// $DateEnd =  $date->format('Y-m-d');
$end = new DateTime(date('Y-m-d'));
// $end = new DateTime('2022-06-30');

$start = new DateTime($FDateofThisMonth);



$from=date_create(date('Y-m-d'));
$to=date_create($FDateofThisMonth);
$diff=date_diff($to,$from);
// print_r($diff);
// echo $diff->format('%R%a');

$Difference = $diff->format('%R%a');

// echo $n1 + $n2;



$eememe =  $end->format('Y-m-d');
  $DateEnd =  $start->format('Y-m-d');
// otherwise the  end date is excluded (bug?)
$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$finalDiff = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
//$holidays = array('2012-09-07');
  // $holidays = $holidaysArray;

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
$finalDifFinal = $finalDiff - $finalDiff3;

    }
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
          if($finalDiff >=2){
            echo '<span id = "doneORnot" class="mode mode_near">Unaccomplished</span>';
              }
              else if($finalDiff <= 0){
            echo '<span id = "doneORnot" class="mode mode_done">Pending</span>';
              }
              else if($finalDiff ==1){
                echo '<span class="⚠"></span><span id = "doneORnot" class="mode mode_done">Pending</span>';
                  }
         }
        }
        ?>