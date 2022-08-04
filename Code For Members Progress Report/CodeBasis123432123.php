    <?php             $todayss="2022-07-01";            
       $ends = new DateTime(date('Y-m-d'));
       $starts = new DateTime(date('Y-m-d', strtotime($todayss)));
      // otherwise the  end date is excluded (bug?)


      $eme = $starts->format('D');
            if($eme == "Sat"){
              $starts->modify('-1 day');

            }
            else if( $eme =="Sun"){
              $starts->modify('-2 day');
            }
            // $starts->modify('+1 day');
      $end = new DateTime();
      $intervals = $ends->diff($starts);
      $finalDiffs = $intervals->days;
      // create an iterateable period of date (P1D equates to 1 day)
      $periods = new DatePeriod($starts, new DateInterval('P1D'), $ends);
      // best stored as array, so you can add more than one
      $holidays = array('2012-09-07');
      foreach($periods as $dts) {
      $currs = $dts->format('D');
      // substract if Saturday or Sunday
      if ($currs == 'Sat' || $currs == 'Sun') {
      $finalDiffs--;
      }
      // (optional) for the updated question
      else if (in_array($dts->format('Y-m-d'), $holidays)) {
      $finalDiffs--;
      }
      }
  
      $countDaily = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `score` = '1' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '2022-07-01' AND '2022-08-01';";
$result = mysqli_query($con, $countDaily);
while($userRow = mysqli_fetch_assoc($result)){
  $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
}
$countHalfDaily = "SELECT COUNT(score) as TotalNumberOfPointFive FROM `finishedtask` WHERE `score` = '0.5' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '2022-07-01' AND '2022-08-01';";
$result = mysqli_query($con, $countHalfDaily);
while($userRow = mysqli_fetch_assoc($result)){
  $totalNumberOfScorePointFive = $userRow['TotalNumberOfPointFive'];
}
$finalDiffs = $finalDiffs *3;
$totalPointsofLate = $totalNumberOfScorePointFive * 0.5;
$TotalPoints = $totalNumberOfScore1 + $totalPointsofLate ;
$TotalPercentage = ($TotalPoints / $finalDiffs)* 100;
  echo "Total Number of daily task to perform from July 1 up to Now: $finalDiffs <br>" ;
  echo "Total Number of finished daily task from July 1 up to Now: $totalNumberOfScore1<br>" ;
  echo "Total Number of late daily task from July 1 up to Now: $totalNumberOfScorePointFive <br>" ;
  echo "Total point for daily task from July 1 up to Now: $TotalPoints <br>" ;
  echo "Total percentage for daily task from July 1 up to Now: $TotalPercentage% <br>" ;

 

                $todayss="2022-07-01";            
                $start = new DateTime($todayss);
                $end = new DateTime();
                // $start->modify('-1 day');

                $interval = $end->diff($start);
                
                $days = $interval->days;
                echo $days;
                $period = new DatePeriod($start, new DateInterval('P1D'), $end);
  
                $holidays = array('2022-07-15');
  
                $monthNo ="";
                $NumberOfWeeksToDone = 0;
                // echo $days;
                $noOfMonths = 0;

                foreach($period as $dt) {
                    $curr = $dt->format('F');
                    $currYear = $dt->format('Y');
                    $day =  $dt->format('Y-m-d');
                    // echo "Weeknumber: $week";
                    // echo "<br>";
                    // echo $curr;
                    // echo $day;

                    // echo "<br>";
                    if($curr==$monthNo){
                      // echo $curr;
                      // echo "<br>";
                      $days--;
                    }
                    else{
                      $noOfMonths++;
                // echo $curr;
                // echo "<br>";
                // $days++;
                      $monthNo = $curr;
                    }
                }
  $countMonthly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `score` = '1' AND `sched_Type` = 'monthly' AND  `realDate` BETWEEN '2022-07-01' AND '2022-08-01';";
  $result = mysqli_query($con, $countMonthly);
  while($userRow = mysqli_fetch_assoc($result)){
    $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
  }
  $countHalfMonthly = "SELECT COUNT(score) as TotalNumberOfPointFive FROM `finishedtask` WHERE `score` = '0.5' AND `sched_Type` = 'monthly' AND  `realDate` BETWEEN '2022-07-01' AND '2022-08-01';";
  $result = mysqli_query($con, $countHalfMonthly);
  while($userRow = mysqli_fetch_assoc($result)){
    $totalNumberOfScorePointFive = $userRow['TotalNumberOfPointFive'];
  }
  $totalPointsofLate = $totalNumberOfScorePointFive * 0.5;
  $TotalPoints = $totalNumberOfScore1 + $totalPointsofLate ;
  $TotalPercentage = ($TotalPoints / $noOfMonths)* 100;
  echo "<br>";echo "<br>";echo "<br>";
    echo "Total Number of monthly task to perform from July 1 up to Now: $noOfMonths <br>" ;
    echo "Total Number of finished monthly task from July 1 up to Now: $totalNumberOfScore1<br>" ;
    echo "Total Number of late monthly task from July 1 up to Now: $totalNumberOfScorePointFive <br>" ;
    echo "Total point for monthly task from July 1 up to Now: $TotalPoints <br>" ;
    echo "Total percentage for monthly task from July 1 up to Now: $TotalPercentage% <br>" ;


    $todayss="2022-07-01";   
    $date = new DateTime($todayss);
    // echo "Next monday is: ";
    // $date->format('Y-m-d');
    $startDate = $date->format('Y-m-d');
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
    $NumberOfWeeksToDone = 0;
    foreach($period as $dt) {
        $curr = $dt->format('W');
        $currMonth = $dt->format('F');
        $currYear = $dt->format('Y');


        if($curr==$weekNo){
          echo null;
        }
        else{
          echo $curr;
          echo "<br>";
          $NumberOfWeeksToDone++;
          $weekNo = $curr;
        }
    }
    $countMonthly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `score` = '1' AND `sched_Type` = 'weekly' AND  `realDate` BETWEEN '2022-07-01' AND '2022-08-01';"; //kunin ang first monday date na pipiliin
    $result = mysqli_query($con, $countMonthly);
    while($userRow = mysqli_fetch_assoc($result)){
      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
    }
    $countHalfMonthly = "SELECT COUNT(score) as TotalNumberOfPointFive FROM `finishedtask` WHERE `score` = '0.5' AND `sched_Type` = 'weekly' AND  `realDate` BETWEEN '2022-07-01' AND '2022-08-01';";
    $result = mysqli_query($con, $countHalfMonthly);
    while($userRow = mysqli_fetch_assoc($result)){
      $totalNumberOfScorePointFive = $userRow['TotalNumberOfPointFive'];
    }
    $NumberOfWeeksToDone = $NumberOfWeeksToDone *3;
    $totalPointsofLate = $totalNumberOfScorePointFive * 0.5;
    $TotalPoints = $totalNumberOfScore1 + $totalPointsofLate ;
    $TotalPercentage = ($TotalPoints / $NumberOfWeeksToDone)* 100;
    echo "<br>";echo "<br>";echo "<br>";
      echo "Total Number of monthly task to perform from July 1 up to Now: $NumberOfWeeksToDone <br>" ;
      echo "Total Number of finished monthly task from July 1 up to Now: $totalNumberOfScore1<br>" ;
      echo "Total Number of late monthly task from July 1 up to Now: $totalNumberOfScorePointFive <br>" ;
      echo "Total point for monthly task from July 1 up to Now: $TotalPoints <br>" ;
      echo "Total percentage for monthly task from July 1 up to Now: $TotalPercentage% <br>" ;
 ?>
