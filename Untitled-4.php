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

  $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND  `DateSubmitted` BETWEEN '$April' AND '$March';";
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


$date->modify('next year');
$nextYearSample =  $date->format('Y');

$date = new DateTime($nextYearSample.'-04-01');
$nextYearMarch =  $date->format('Y-m-d');

$end = new DateTime(date('Y-m-d'));


$start = new DateTime($nextYearMarch);


$end->modify('+1 day');

$interval = $end->diff($start);

// total days
// $finalDiff = $interval->days;
$finalDiff =  $interval->format('%R%a')."\n";
    if($finalDiff >0){
      $_SESSION['noOfDaysLate']=$finalDiff;
      $_SESSION['TaskID'] = $_GET['FinishSample'];
      // echo $eememe;
      echo "<script> 
      // document.getElementById('daysLateDiv').style.display = 'none';
      console.log('$finalDiff');
      $('#reasonModal').modal('show');
console.log('$eememe');
document.getElementById('daysLate').value='$finalDiff';
</script>";
    }
    else if($finalDiff == 0){
$_SESSION['noOfDaysLate']='0';
   $_SESSION['TaskID'] = $_GET['FinishSample'];
   $taskID = $_SESSION['TaskID'];

   echo "<script>  
// document.getElementById('actionText').value='$finalDiff';

  $('#actionModal').modal('show');


     //document.getElementById('finished$taskID').click();   DITO AKO NATAPOS   
             </script>";

    }
    
  
  }
?>