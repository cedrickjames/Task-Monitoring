<div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 
                      <table  class="table table-bordered" class="table datacust-datatable Table ">
                        <thead class="table-dark text-center" style="position: sticky; top: -1px;">
                        <tr class="table-dark text-center" style="border-width: 0px" >
                            <th scope="col" colspan="10">
                              <div class="col-sm-4" style="padding: 0; margin: 0 auto" >
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="<?php $userlevel = $_SESSION['userlevel']; if($userlevel =='Leader'){?>leader.php<?php ; }else{?>admin.php<?php ;} ?>" method = "POST" >
                          <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">Start</label>
                          
                          <input type="date" id="datepickerProgSummary" value="<?php $startDate = new DateTime($todaySummary);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>" name="datepickerProgSummary" style="margin-right: 20px" onchange="filterMonth();">
                          <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
                          
                          <input type="date" id="datepickerEndProgSummary" value="<?php $endDate = new DateTime($todayEndSummary);  $endDate =  $endDate->format('Y-m-d'); echo $endDate ?>" name="datepickerEndProgSummary" onchange="filterMonth();">
                          <button type="submit" name="submitdateProgDailySummary" class="btn btn-info btn-sm">Submit</button>
                          <button type="submit" name="exportProgDailySummary"class="btn btn-outline-danger btn-sm" > <i style="font-size: 20px;"class="fas fa-file-pdf fa-xs"></i> Export</button>
                                      
                          <!-- <input type="submit" name="submitdate"> -->
                          </form>
                        
                      </div></div> </th>
                          </tr>
                          <tr class="table-dark text-center">
                          <th class="table-light" scope="col" colspan="2" style=" border-bottom: 0px"> </th>

                            <th  class="table-info" scope="col" colspan="2" style=" border-bottom: 0px">Daily</th>
                            <th class="table-warning" scope="col" colspan="2" style=" border-bottom: 0px">Weekly</th>
                            <th class="table-danger" scope="col" colspan="2" style=" border-bottom: 0px">Monthly</th>
                            <th class="table-primary" scope="col" colspan="2" style=" border-bottom: 0px">Annual</th>



                          </tr>
                       

                          <tr class="table-dark text-center" >
                              <th class="table-light" style="border-bottom: 2px solid black;">#</th>
                              <th class="table-light" style="border-bottom: 2px solid black;">In charge</th>
                              <th class="table-info" style="border-bottom: 2px solid black;">No. of ontime (1pt)</th>
                              <th class="table-info" style="border-bottom: 2px solid black;">No. of late (0.5pt)</th>
                              <th class="table-warning" style="border-bottom: 2px solid black;">No. of ontime (1pt)</th>
                              <th class="table-warning" style="border-bottom: 2px solid black;">No. of late (0.5pt)</th>
                              <th class="table-danger"  style="border-bottom: 2px solid black;">No. of ontime (1pt)</th>
                              <th class="table-danger" style="border-bottom: 2px solid black;">No. of late (0.5pt)</th>
                              <th class="table-primary"  style="border-bottom: 2px solid black;">No. of ontime (1pt)</th>
                              <th class="table-primary" style="border-bottom: 2px solid black;">No. of late (0.5pt)</th>
                  
<!-- find -->
                            </tr>
                          </thead>
                          <tbody id="tableOfSummary" class="table-dark text-center">

                          <?php
                                                
                                               $Username="";         

                                 if(is_array($fetchDataSummary)){      
                                   $sn=1;
                                 foreach($fetchDataSummary as $data){

                                   $PIC = $data['f_name'];
                                   $UserID = $data['userid'];
                                    $username = $data['username'];
                                   $TotalPointsEarned = 0;

                                   $TARGETPOINTS =0; 


                                   $getUserTasks = "SELECT * FROM `usertask` WHERE `userid` = '$UserID' AND `taskType` = 'daily';";
                                   $result = mysqli_query($con, $getUserTasks);
                                  $noOfResult =  mysqli_num_rows($result);
                                  // echo $noOfResult;
                                   while($userRow = mysqli_fetch_assoc($result)){
                                   $usertaskID = $userRow['usertaskID'];
                                   $username = $userRow['username'];
                                  $task =  $userRow['taskName'];
                                  // echo $task;
                                  // echo $usertaskID;
/////////////////////////////////////////daily

                                  $StartDateSelected = new DateTime($todaySummary);
                                  $startDATE =  $StartDateSelected->format('Y-m-d'); 

                                $DateNowAndToday = new DateTime($todayEndSummary);  
                                $endDATE =  $DateNowAndToday->format('Y-m-d');

                                  $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$usertaskID';"; //kunin ang first monday date na pipiliin
                                    $results = mysqli_query($con, $selectDateAdded);
                                    while($userRow = mysqli_fetch_assoc($results)){
                                      $dateAdded = $userRow['dateAdded'];
                                      $targetDate = $userRow['targetDate'];

                                    }
                                    $dateAdded = date($dateAdded);
                                    $targetDate = date($targetDate);

                                      $START = date($startDATE);
                                      $END = date($endDATE);
                                        if($START < $dateAdded){
                                          $startDATE = $dateAdded;
                                        }
                                      if($END > $targetDate){
                                            $endDATE = $targetDate;
                                        }
// echo $username . $startDATE .$endDATE. "asdf "; 
                                        $todayss="2022-07-01";            
                                        $ends = new DateTime(date('Y-m-d', strtotime($endDATE)));
                                        $starts = new DateTime(date('Y-m-d', strtotime($startDATE)));
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
                                        $ends->modify('+1 day');

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
                                        // echo $finalDiffs;
                                        // echo " ";
                                        $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;
                                  //  echo $TARGETPOINTS;
                                  //  echo  "     "  ;
                                }
/////////////////////////////////////////weekly
$getUserTasks = "SELECT * FROM `usertask` WHERE `userid` = '$UserID' AND `taskType` = 'weekly';";
$resultw = mysqli_query($con, $getUserTasks);
$noOfResult =  mysqli_num_rows($resultw);
// echo $noOfResult;
while($userRow = mysqli_fetch_assoc($resultw)){
$usertaskID = $userRow['usertaskID'];
$username = $userRow['username'];
$task =  $userRow['taskName'];
                                  $StartDateSelected = new DateTime($todaySummary);
                                  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                $DateNowAndToday = new DateTime($todayEndSummary);  
                                  $endDATE =  $DateNowAndToday->format('Y-m-d');


                                             $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$usertaskID';"; //kunin ang first monday date na pipiliin
                                             $resultww = mysqli_query($con, $selectDateAdded);
                                             while($userRow = mysqli_fetch_assoc($resultww)){
                                               $dateAdded = $userRow['dateAdded'];
                                               $targetDate = $userRow['targetDate'];
         
                                             
// echo  date('Y-m-d', strtotime($dateAdded)) .' '.date('Y-m-d', strtotime($targetDate)) ."<br>";
// echo  date('Y-m-d', strtotime($todayWeekly)) .' '.date('Y-m-d', strtotime($todayEndWeekly)) ."<br>";
                                             
                                             $dateAdded = date($dateAdded);
                                             $targetDate = date($targetDate);
         
                                               $START = date('Y-m-d', strtotime($todayWeekly));
                                               $END = date('Y-m-d', strtotime($todayEndWeekly));
                                                 if($START < $dateAdded){
                                                   $startDATE = $dateAdded;
                                                 }
                                               if($END > $targetDate){
                                                     $endDATE = $targetDate;
                                                 }
                                                }

                  $start = new DateTime(date('Y-m-d', strtotime($startDATE)));
                  $end = new DateTime(date('Y-m-d', strtotime($endDATE)));
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
                        // echo $curr;
                        // echo "<br>";
                        $NumberOfWeeksToDone++;
                        $weekNo = $curr;
                      }
                    }
                      $finalDiffs = $NumberOfWeeksToDone;
                      $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;

                  }



                  /////////////////////////monthly
                  $getUserTasks = "SELECT * FROM `usertask` WHERE `userid` = '$UserID' AND `taskType` = 'monthly';";
$resultm = mysqli_query($con, $getUserTasks);
$noOfResult =  mysqli_num_rows($resultm);
// echo $noOfResult;
while($userRow = mysqli_fetch_assoc($resultm)){
$usertaskID = $userRow['usertaskID'];
$username = $userRow['username'];
$task =  $userRow['taskName'];
                                  $StartDateSelected = new DateTime($todaySummary);
                                  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                $DateNowAndToday = new DateTime($todayEndSummary);  
                                  $endDATE =  $DateNowAndToday->format('Y-m-d');


                                  $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$usertaskID';"; //kunin ang first monday date na pipiliin
                                  $resultmm = mysqli_query($con, $selectDateAdded);
                                  while($userRow = mysqli_fetch_assoc($resultmm)){
                                    $dateAdded = $userRow['dateAdded'];
                                    $targetDate = $userRow['targetDate'];
         
                                  
         // echo  date('Y-m-d', strtotime($dateAdded)) .' '.date('Y-m-d', strtotime($targetDate)) ."<br>";
         // echo  date('Y-m-d', strtotime($todayWeekly)) .' '.date('Y-m-d', strtotime($todayEndWeekly)) ."<br>";
                                  
                                  $dateAdded = date($dateAdded);
                                  $targetDate = date($targetDate);
         
                                    $START = date('Y-m-d', strtotime($todayMonthly));
                                    $END = date('Y-m-d', strtotime($todayEndMonthly));
                                      if($START < $dateAdded){
                                        $startDATE = $dateAdded;
                                      }
                                    if($END > $targetDate){
                                          $endDATE = $targetDate;
                                      }
                                     }
         
         
                                $start = new DateTime($startDATE);
                                $end = new DateTime($endDATE);
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
                                $monthNo ="";
                                $NumberOfWeeksToDone = 0;
                                foreach($period as $dt) {
                                    $curr = $dt->format('W');
                                    $currMonth = $dt->format('F');
                                    $currYear = $dt->format('Y');
                                  
         
                                    if($currMonth==$monthNo){
                                      echo null;
                                    }
                                    else{
                                      // echo $curr;
                                      // echo "<br>";
                                      $NumberOfWeeksToDone++;
                                      $monthNo = $currMonth;
                                    }
                                  }
                                    $finalDiffs = $NumberOfWeeksToDone;
                                    $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;
         

                  }

                  /////////////////////////////annual

                  $countAnnual = "SELECT COUNT(username) as noOfTask FROM `usertask` WHERE `userid` = '$UserID' AND taskType = 'annual';"; 
      $resultan = mysqli_query($con, $countAnnual);


      while($userRow = mysqli_fetch_assoc($resultan)){
        $noOfTask = $userRow['noOfTask'];
      }
      $TARGETPOINTS = $TARGETPOINTS+$noOfTask;
                                  //  echo $Username;
                                  //  echo " ";
                                  //  echo $TARGETPOINTS;
//                                    // code for target points

//                                    $TARGETPOINTS=0;
//                                   $tableName="usertask";
//                                   $db= $con;
//                                   $Username =  $_SESSION['username'];
//        $columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
//        $fetchUserTask = fetchUserTask($db, $tableName, $columns, $Username);
   
//        function fetchUserTask($db, $tableName, $columns, $Username){
//          if(empty($db)){
//           $msg= "Database connection error";
//          }elseif (empty($columns) || !is_array($columns)) {
//           $msg="columns Name must be defined in an indexed array";
//          }elseif(empty($tableName)){
//            $msg= "Table Name is empty";
//         }else{
//         $columnName = implode(", ", $columns);
//         // $Department = $_SESSION['userDept'];
//         $query = "SELECT * FROM `usertask` WHERE `userid` = '$UserID';";
//        //  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
//        //  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
//         $result = $db->query($query);
//         if($result== true){ 
//          if ($result->num_rows > 0) {
//             $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
//             $msg= $row;
//          } else {
//             $msg= "No Data Found"; 
//          }
//         }else{
//           $msg= mysqli_error($db);
//         }
//         }
//         return $msg;
//         }


//         if(is_array($fetchUserTask)){      
  
//         foreach($fetchUserTask as $data){
//           $taskname = $data['taskName'];
//           $taskCategory = $data['taskCategory'];
//           $taskType = $data['taskType'];
//           $userTaskID = $data['usertaskID'];
//           $taskArea = $data['taskArea'];
//           $taskUser = $data['username'];


          
//           $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$userTaskID';"; //kunin ang first monday date na pipiliin
//           $result = mysqli_query($con, $selectDateAdded);
//           while($userRow = mysqli_fetch_assoc($result)){
//             $dateAdded = $userRow['dateAdded'];
//             $targetDate = $userRow['targetDate'];

//           }
//           $dateAdded = date($dateAdded);
//           $targetDate = date($targetDate);

//             $START = date($startDATE);
//             $END = date($endDATE);
//               if($START < $dateAdded){
//                 $startDATE = $dateAdded;
//               }
//             if($END > $targetDate){
//                   $endDATE = $targetDate;
//               }
// // echo $START .$startDATE;
//               $todayss="2022-07-01";            
//               $ends = new DateTime(date('Y-m-d', strtotime($endDATE)));
//               $starts = new DateTime(date('Y-m-d', strtotime($startDATE)));
//               // otherwise the  end date is excluded (bug?)
//               $eme = $starts->format('D');
//                     if($eme == "Sat"){
//                       $starts->modify('-1 day');

//                     }
//                     else if( $eme =="Sun"){
//                       $starts->modify('-2 day');
//                     }
//                     // $starts->modify('+1 day');
//               $end = new DateTime();
//               $ends->modify('+1 day');

//               $intervals = $ends->diff($starts);
//               $finalDiffs = $intervals->days;
//               // create an iterateable period of date (P1D equates to 1 day)
//               $periods = new DatePeriod($starts, new DateInterval('P1D'), $ends);
//               // best stored as array, so you can add more than one
//               $holidays = array('2012-09-07');
//               foreach($periods as $dts) {
//               $currs = $dts->format('D');
//               // substract if Saturday or Sunday
//               if ($currs == 'Sat' || $currs == 'Sun') {
//               $finalDiffs--;
//               }
//               // (optional) for the updated question
//               else if (in_array($dts->format('Y-m-d'), $holidays)) {
//               $finalDiffs--;
//               }
//               }
//               // echo $finalDiffs;
//               $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;

//         }
//       }
// echo $TARGETPOINTS;

//                                    //end of code for target points
                                   echo("<script>console.log('taskname : " . $taskname. "');</script>");
                                   
                             //  echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                           ?>
                            <tr class="table-dark text-center">
                            <td class="table-light"> <?php echo $sn; ?></td>
                            <td class="table-light"> <?php echo $PIC; ?></td>
                            <td name="noOfOnTimeDaily" class="table-light">
                            <?php
                                     $StartDateSelected = new DateTime($todaySummary);
                                       $startDATE =  $StartDateSelected->format('Y-m-d'); 

                                     $DateNowAndToday = new DateTime($todayEndSummary);  
                                     $endDATE =  $DateNowAndToday->format('Y-m-d');

                                      $countSummary = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '1' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                                      $result = mysqli_query($con, $countSummary);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                      }
                                      echo $totalNumberOfScore1;
                                      $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                  ?>    
                          </td>

                          <td name="noOfLateDaily" class="table-light">
                            <?php
                                     $StartDateSelected = new DateTime($todaySummary);
                                       $startDATE =  $StartDateSelected->format('Y-m-d'); 

                                     $DateNowAndToday = new DateTime($todayEndSummary);  
                                     $endDATE =  $DateNowAndToday->format('Y-m-d');

                                      $countSummary = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '0.5' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                                      $result = mysqli_query($con, $countSummary);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                      }
                                      echo $totalNumberOfScore1;
                                      $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                  ?>    
                          </td>

                          <td class="table-light" name="noOfOntimeWeekly">
                                  <?php
                                       $StartDateSelected = new DateTime($todaySummary);
                                       $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                       $startDAY=  $StartDateSelected->format('D'); 
                                     
                                     
                                       if ($startDAY == 'Mon') {
                                      //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                       $startDATE = $StartDateSelected->format('W');
                                        
                                         }
                                         else if($startDAY == 'Sun'){
                                           $StartDateSelected->modify('next monday');
                                          //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                           $startDATE = $StartDateSelected->format('W');
                                     
                                         }
                                         else{
                                          $StartDateSelected->modify('last monday');
                                          // $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                          $startDATE = $StartDateSelected->format('W');
                                     
                                         }
                                      
                                
                                    // (optional) for the updated question
                                    
                                     $DateNowAndToday = new DateTime($todayEndSummary);  
                                    //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                                     $endDATE = $DateNowAndToday->format('W');
                                    //  echo "week".$startDATE;
                                    //  echo "week".$endDATE;

                                      $countWeekly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '1' AND `sched_Type` = 'weekly' AND  `weekNumber` BETWEEN '$startDATE' AND '$endDATE';";
                                      $result = mysqli_query($con, $countWeekly);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                      }
                                      echo $totalNumberOfScore1;
                                      $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

                                  ?>
                             </td>

                             <td class="table-light" name="noOfLateWeekly">
                                  <?php
                                       $StartDateSelected = new DateTime($todaySummary);
                                       $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                       $startDAY=  $StartDateSelected->format('D'); 
                                     
                                     
                                       if ($startDAY == 'Mon') {
                                      //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                       $startDATE = $StartDateSelected->format('W');
                                        
                                         }
                                         else if($startDAY == 'Sun'){
                                           $StartDateSelected->modify('next monday');
                                          //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                           $startDATE = $StartDateSelected->format('W');
                                     
                                         }
                                         else{
                                          $StartDateSelected->modify('last monday');
                                          // $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                          $startDATE = $StartDateSelected->format('W');
                                     
                                         }
                                      
                                
                                    // (optional) for the updated question
                                    
                                     $DateNowAndToday = new DateTime($todayEndSummary);  
                                    //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                                     $endDATE = $DateNowAndToday->format('W');
                                    //  echo "week".$startDATE;
                                    //  echo "week".$endDATE;

                                      $countWeekly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '0.5' AND `sched_Type` = 'weekly' AND  `weekNumber` BETWEEN '$startDATE' AND '$endDATE';";
                                      $result = mysqli_query($con, $countWeekly);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                      }
                                      echo $totalNumberOfScore1;
                                      $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                  ?>
                             </td>


                             <td class="table-light" name="noOfMonthly">
                                 <?php
                                      $StartDateSelected = new DateTime($todaySummary);
                                      $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                     
                                      $startDateMonth = $StartDateSelected->format('F');
                                    

                                      
                                           $fDateOfTheMonth = new DateTime('first day of '.$startDateMonth);
                                         
                                           $startDATE =  $fDateOfTheMonth->format('Y-m-d');
                                          
                                    

                                     
                               
                                   // (optional) for the updated question
                                   
                                    $DateNowAndToday = new DateTime($todayEndSummary);  
                                   //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                                    $endDATE = $DateNowAndToday->format('Y-m-d');
                                   //  echo "week".$startDATE;
                                   //  echo "week".$endDATE;

                                     $countMonthly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '1' AND `sched_Type` = 'monthly' AND  `firstDateOfTheMonth` BETWEEN '$startDATE' AND '$endDATE';";
                                     $result = mysqli_query($con, $countMonthly);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                     }
                                     echo $totalNumberOfScore1;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

                                 ?>
                            </td>

                            <td class="table-light" name="noOfLateMonthly">
                                 <?php
                                      $StartDateSelected = new DateTime($todaySummary);
                                      $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                     
                                      $startDateMonth = $StartDateSelected->format('F');
                                    

                                      
                                           $fDateOfTheMonth = new DateTime('first day of '.$startDateMonth);
                                         
                                           $startDATE =  $fDateOfTheMonth->format('Y-m-d');
                                          
                                    

                                     
                               
                                   // (optional) for the updated question
                                   
                                    $DateNowAndToday = new DateTime($todayEndSummary);  
                                   //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                                    $endDATE = $DateNowAndToday->format('Y-m-d');
                                   //  echo "week".$startDATE;
                                   //  echo "week".$endDATE;

                                     $countMonthly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '0.5' AND `sched_Type` = 'monthly' AND  `firstDateOfTheMonth` BETWEEN '$startDATE' AND '$endDATE';";
                                     $result = mysqli_query($con, $countMonthly);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                     }
                                     echo $totalNumberOfScore1;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                 ?>
                            </td>
                            <td class="table-light" name="noOfAnnual">
                                 <?php
                                  $dateOfNow = new DateTime($todaySummary);
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
                                 
                                     $countAnnual = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '1' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';";
                                     $result = mysqli_query($con, $countAnnual);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                     }
                                     echo $totalNumberOfScore1;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

                                 ?>
                            </td>

                            <td class="table-light" name="noOfLateAnnual">
                                 <?php
                                      $dateOfNow = new DateTime($todaySummary);
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
                                     
                                    $April = new DateTime($todayAnnual);  $April =  $April->format('Y-m-d');
                                    $March = new DateTime($todayEndAnnual);  $March =  $March->format('Y-m-d');

                                    $countAnnual = "SELECT COUNT(score) as TotalNumberOfp5 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '0.5' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';"; 
                                     $result = mysqli_query($con, $countAnnual);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                       $totalNumberOfScore1 = $userRow['TotalNumberOfp5'];
                                     }
                                    echo $totalNumberOfScore1;
                                    // $totalNumberOfScore1 = $totalNumberOfScore1 * 0.5;
                                    $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                    ?>
                            </td>
                                 </tr>
                          <?php
                       $sn++; }}else{ ?>
                           <tr>
                             <td colspan="8">
                         <?php echo $fetchDataSummary; ?>
                       </td>
                        </tr>
                         <?php
                         echo "No data found";
   }                     ?>      
                          </tbody>

                
                      </table>
                <!-- <div><?php echo  $TotalPointsOntimeEarned; ?></div> -->
                      <table class="table table-bordered" class="table datacust-datatable Table ">
                        
                      <thead  class="text-center"style="position: sticky; top: -1px; ">

                          <tr class="table-dark" style="border: 1px solid black;">
                          <th class="table-light" style="border-bottom: 2px solid black;">#</th>

                            <th class="table-light" style="border-bottom: 2px solid black;">In charge</th>
                            <th class="table-light" style="border-bottom: 2px solid black;">Total No of ontime (1pt)</th>
                            <th class="table-light" style="border-bottom: 2px solid black;">Total No. of Late (0.5pt)</th>
                            <th class="table-light" style="border-bottom: 2px solid black;">Total points earned</thcess>
                            <th class="table-light" style="border-bottom: 2px solid black;">Target points</th>
                            <th class="table-light" style="border-bottom: 2px solid black;">Progress</th>

                          </tr>
                       

                          
                          </thead>
                          <tbody  class="table-dark text-center">

                    <?php

                          if(is_array($fetchDataSummary)){      
                            $sn=1;
                          foreach($fetchDataSummary as $data){

                            $PIC = $data['f_name'];
                            $UserID = $data['userid'];
                              $username = $data['username'];
                              $TotalPointsOntimeEarned=0;
                              $TotalPointsLateEarned=0;
                              $TargetPoints=0;

                              $noOfDailyTask = 0;
                              $noOfWeeklyTask = 0;
                              $noOfMonthlyTask = 0;


                            // $TotalPointsEarned = 0;
                            echo("<script>console.log('taskname : " . $taskname. "');</script>");
                            
                      //  echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                    ?>
                      <tr class="table-dark text-center">
                      <td class="table-light"> <?php echo $sn; ?></td>
                      <td class="table-light"> <?php echo $PIC; ?></td>
                      
                      <td  class="table-light"> <?php
                      $StartDateSelected = new DateTime($todaySummary);
                      $startDATE =  $StartDateSelected->format('Y-m-d'); 

                    $DateNowAndToday = new DateTime($todayEndSummary);  
                    $endDATE =  $DateNowAndToday->format('Y-m-d');

                     $countSummary = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '1' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                     $result = mysqli_query($con, $countSummary);
                     while($userRow = mysqli_fetch_assoc($result)){
                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                     }
                    //  echo $totalNumberOfScore1;
                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                     $TotalPointsOntimeEarned = $TotalPointsOntimeEarned + $totalNumberOfScore1;
                      
                      
                     $StartDateSelected = new DateTime($todaySummary);
                     $startDATE =  $StartDateSelected->format('Y-m-d'); 
                     $startDAY=  $StartDateSelected->format('D'); 
                   
                   
                     if ($startDAY == 'Mon') {
                    //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                     $startDATE = $StartDateSelected->format('W');
                      
                       }
                       else if($startDAY == 'Sun'){
                         $StartDateSelected->modify('next monday');
                        //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                         $startDATE = $StartDateSelected->format('W');
                   
                       }
                       else{
                        $StartDateSelected->modify('last monday');
                        // $startDATE =  $StartDateSelected->format('Y-m-d'); 
                        $startDATE = $StartDateSelected->format('W');
                   
                       }
                    
              
                  // (optional) for the updated question
                  
                   $DateNowAndToday = new DateTime($todayEndSummary);  
                  //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                   $endDATE = $DateNowAndToday->format('W');
                  //  echo "week".$startDATE;
                  //  echo "week".$endDATE;

                    $countWeekly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '1' AND `sched_Type` = 'weekly' AND  `weekNumber` BETWEEN '$startDATE' AND '$endDATE';";
                    $result = mysqli_query($con, $countWeekly);
                    while($userRow = mysqli_fetch_assoc($result)){
                    $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                    }
                    // echo $totalNumberOfScore1;
                    $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                    $TotalPointsOntimeEarned = $TotalPointsOntimeEarned + $totalNumberOfScore1;


                    $StartDateSelected = new DateTime($todaySummary);
                    $startDATE =  $StartDateSelected->format('Y-m-d'); 
                   
                    $startDateMonth = $StartDateSelected->format('F');
                  

                    
                         $fDateOfTheMonth = new DateTime('first day of '.$startDateMonth);
                       
                         $startDATE =  $fDateOfTheMonth->format('Y-m-d');
                        
                  

                   
             
                 // (optional) for the updated question
                 
                  $DateNowAndToday = new DateTime($todayEndSummary);  
                 //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                  $endDATE = $DateNowAndToday->format('Y-m-d');
                 //  echo "week".$startDATE;
                 //  echo "week".$endDATE;

                   $countMonthly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '1' AND `sched_Type` = 'monthly' AND  `firstDateOfTheMonth` BETWEEN '$startDATE' AND '$endDATE';";
                   $result = mysqli_query($con, $countMonthly);
                   while($userRow = mysqli_fetch_assoc($result)){
                   $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                   }
                  //  echo $totalNumberOfScore1;
                   $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                   $TotalPointsOntimeEarned = $TotalPointsOntimeEarned + $totalNumberOfScore1;






                   $dateOfNow = new DateTime($todaySummary);
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
                                 
                                     $countAnnual = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '1' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';";
                                     $result = mysqli_query($con, $countAnnual);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                     }
                                    //  echo $totalNumberOfScore1;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                     $TotalPointsOntimeEarned = $TotalPointsOntimeEarned + $totalNumberOfScore1;

                                  



                      echo $TotalPointsOntimeEarned; ?> </td>

                  <td class="table-light"> <?php 
                   $StartDateSelected = new DateTime($todaySummary);
                   $startDATE =  $StartDateSelected->format('Y-m-d'); 

                 $DateNowAndToday = new DateTime($todayEndSummary);  
                 $endDATE =  $DateNowAndToday->format('Y-m-d');

                  $countSummary = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '0.5' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                  $result = mysqli_query($con, $countSummary);
                  while($userRow = mysqli_fetch_assoc($result)){
                  $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                  }
                 //  echo $totalNumberOfScore1;
                 
                  $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                  $TotalPointsLateEarned = $TotalPointsLateEarned + $totalNumberOfScore1;
                   
                   
                  $StartDateSelected = new DateTime($todaySummary);
                  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                  $startDAY=  $StartDateSelected->format('D'); 
                
                
                  if ($startDAY == 'Mon') {
                 //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                  $startDATE = $StartDateSelected->format('W');
                   
                    }
                    else if($startDAY == 'Sun'){
                      $StartDateSelected->modify('next monday');
                     //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                      $startDATE = $StartDateSelected->format('W');
                
                    }
                    else{
                     $StartDateSelected->modify('last monday');
                     // $startDATE =  $StartDateSelected->format('Y-m-d'); 
                     $startDATE = $StartDateSelected->format('W');
                
                    }
                 
           
               // (optional) for the updated question
               
                $DateNowAndToday = new DateTime($todayEndSummary);  
               //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                $endDATE = $DateNowAndToday->format('W');
               //  echo "week".$startDATE;
               //  echo "week".$endDATE;

                 $countWeekly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '0.5' AND `sched_Type` = 'weekly' AND  `weekNumber` BETWEEN '$startDATE' AND '$endDATE';";
                 $result = mysqli_query($con, $countWeekly);
                 while($userRow = mysqli_fetch_assoc($result)){
                 $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                 }
                 // echo $totalNumberOfScore1;
                 $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                 $TotalPointsLateEarned = $TotalPointsLateEarned + $totalNumberOfScore1;


                 $StartDateSelected = new DateTime($todaySummary);
                 $startDATE =  $StartDateSelected->format('Y-m-d'); 
                
                 $startDateMonth = $StartDateSelected->format('F');
               

                 
                      $fDateOfTheMonth = new DateTime('first day of '.$startDateMonth);
                    
                      $startDATE =  $fDateOfTheMonth->format('Y-m-d');
                     
               

                
          
              // (optional) for the updated question
              
               $DateNowAndToday = new DateTime($todayEndSummary);  
              //  $endDATE =  $DateNowAndToday->format('Y-m-d');
               $endDATE = $DateNowAndToday->format('Y-m-d');
              //  echo "week".$startDATE;
              //  echo "week".$endDATE;

                $countMonthly = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND `score` = '0.5' AND `sched_Type` = 'monthly' AND  `firstDateOfTheMonth` BETWEEN '$startDATE' AND '$endDATE';";
                $result = mysqli_query($con, $countMonthly);
                while($userRow = mysqli_fetch_assoc($result)){
                $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                }
               //  echo $totalNumberOfScore1;
                $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                $TotalPointsLateEarned = $TotalPointsLateEarned + $totalNumberOfScore1;


                $dateOfNow = new DateTime($todaySummary);
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
               
              $April = new DateTime($todayAnnual);  $April =  $April->format('Y-m-d');
              $March = new DateTime($todayEndAnnual);  $March =  $March->format('Y-m-d');

              $countAnnual = "SELECT COUNT(score) as TotalNumberOfp5 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '0.5' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';"; 
               $result = mysqli_query($con, $countAnnual);
               while($userRow = mysqli_fetch_assoc($result)){
                 $totalNumberOfScore1 = $userRow['TotalNumberOfp5'];
               }
              // echo $totalNumberOfScore1;
              // $totalNumberOfScore1 = $totalNumberOfScore1 * 0.5;
              $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
              $TotalPointsLateEarned = $TotalPointsLateEarned + $totalNumberOfScore1;
              

                   echo $TotalPointsLateEarned; 
                  
                  
                  ?></td>
              <td class="table-light"> <?php
              $TotalPointsEarnedForSelectedDate = $TotalPointsOntimeEarned + ($TotalPointsLateEarned *0.5);
              echo $TotalPointsEarnedForSelectedDate;
              ?> </td>


    <td class="table-light"> <?php

$TARGETPOINTS =0; 


                                   $getUserTasks = "SELECT * FROM `usertask` WHERE `userid` = '$UserID' AND `taskType` = 'daily';";
                                   $result = mysqli_query($con, $getUserTasks);
                                  $noOfResult =  mysqli_num_rows($result);
                                  // echo $noOfResult;
                                   while($userRow = mysqli_fetch_assoc($result)){
                                   $usertaskID = $userRow['usertaskID'];
                                   $username = $userRow['username'];
                                  $task =  $userRow['taskName'];
                                  // echo $task;
                                  // echo $usertaskID;
/////////////////////////////////////////daily

                                  $StartDateSelected = new DateTime($todaySummary);
                                  $startDATE =  $StartDateSelected->format('Y-m-d'); 

                                $DateNowAndToday = new DateTime($todayEndSummary);  
                                $endDATE =  $DateNowAndToday->format('Y-m-d');

                                  $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$usertaskID';"; //kunin ang first monday date na pipiliin
                                    $results = mysqli_query($con, $selectDateAdded);
                                    while($userRow = mysqli_fetch_assoc($results)){
                                      $dateAdded = $userRow['dateAdded'];
                                      $targetDate = $userRow['targetDate'];

                                    }
                                    $dateAdded = date($dateAdded);
                                    $targetDate = date($targetDate);

                                      $START = date($startDATE);
                                      $END = date($endDATE);
                                        if($START < $dateAdded){
                                          $startDATE = $dateAdded;
                                        }
                                      if($END > $targetDate){
                                            $endDATE = $targetDate;
                                        }
// echo $username . $startDATE .$endDATE. "asdf "; 
                                        $todayss="2022-07-01";            
                                        $ends = new DateTime(date('Y-m-d', strtotime($endDATE)));
                                        $starts = new DateTime(date('Y-m-d', strtotime($startDATE)));
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
                                        $ends->modify('+1 day');

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
                                        // echo $finalDiffs;
                                        // echo " ";
                                        $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;
                                  //  echo $TARGETPOINTS;
                                  //  echo  "     "  ;
                                }
/////////////////////////////////////////weekly
$getUserTasks = "SELECT * FROM `usertask` WHERE `userid` = '$UserID' AND `taskType` = 'weekly';";
$resultw = mysqli_query($con, $getUserTasks);
$noOfResult =  mysqli_num_rows($resultw);
// echo $noOfResult;
while($userRow = mysqli_fetch_assoc($resultw)){
$usertaskID = $userRow['usertaskID'];
$username = $userRow['username'];
$task =  $userRow['taskName'];
                                  $StartDateSelected = new DateTime($todaySummary);
                                  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                $DateNowAndToday = new DateTime($todayEndSummary);  
                                  $endDATE =  $DateNowAndToday->format('Y-m-d');


                                             $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$usertaskID';"; //kunin ang first monday date na pipiliin
                                             $resultww = mysqli_query($con, $selectDateAdded);
                                             while($userRow = mysqli_fetch_assoc($resultww)){
                                               $dateAdded = $userRow['dateAdded'];
                                               $targetDate = $userRow['targetDate'];
         
                                             
// echo  date('Y-m-d', strtotime($dateAdded)) .' '.date('Y-m-d', strtotime($targetDate)) ."<br>";
// echo  date('Y-m-d', strtotime($todayWeekly)) .' '.date('Y-m-d', strtotime($todayEndWeekly)) ."<br>";
                                             
                                             $dateAdded = date($dateAdded);
                                             $targetDate = date($targetDate);
         
                                               $START = date('Y-m-d', strtotime($todayWeekly));
                                               $END = date('Y-m-d', strtotime($todayEndWeekly));
                                                 if($START < $dateAdded){
                                                   $startDATE = $dateAdded;
                                                 }
                                               if($END > $targetDate){
                                                     $endDATE = $targetDate;
                                                 }
                                                }

                  $start = new DateTime(date('Y-m-d', strtotime($startDATE)));
                  $end = new DateTime(date('Y-m-d', strtotime($endDATE)));
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
                        // echo $curr;
                        // echo "<br>";
                        $NumberOfWeeksToDone++;
                        $weekNo = $curr;
                      }
                    }
                      $finalDiffs = $NumberOfWeeksToDone;
                      $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;

                  }



                  /////////////////////////monthly
                  $getUserTasks = "SELECT * FROM `usertask` WHERE `userid` = '$UserID' AND `taskType` = 'monthly';";
$resultm = mysqli_query($con, $getUserTasks);
$noOfResult =  mysqli_num_rows($resultm);
// echo $noOfResult;
while($userRow = mysqli_fetch_assoc($resultm)){
$usertaskID = $userRow['usertaskID'];
$username = $userRow['username'];
$task =  $userRow['taskName'];
                                  $StartDateSelected = new DateTime($todaySummary);
                                  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                $DateNowAndToday = new DateTime($todayEndSummary);  
                                  $endDATE =  $DateNowAndToday->format('Y-m-d');


                                  $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$usertaskID';"; //kunin ang first monday date na pipiliin
                                  $resultmm = mysqli_query($con, $selectDateAdded);
                                  while($userRow = mysqli_fetch_assoc($resultmm)){
                                    $dateAdded = $userRow['dateAdded'];
                                    $targetDate = $userRow['targetDate'];
         
                                  
         // echo  date('Y-m-d', strtotime($dateAdded)) .' '.date('Y-m-d', strtotime($targetDate)) ."<br>";
         // echo  date('Y-m-d', strtotime($todayWeekly)) .' '.date('Y-m-d', strtotime($todayEndWeekly)) ."<br>";
                                  
                                  $dateAdded = date($dateAdded);
                                  $targetDate = date($targetDate);
         
                                    $START = date('Y-m-d', strtotime($todayMonthly));
                                    $END = date('Y-m-d', strtotime($todayEndMonthly));
                                      if($START < $dateAdded){
                                        $startDATE = $dateAdded;
                                      }
                                    if($END > $targetDate){
                                          $endDATE = $targetDate;
                                      }
                                     }
         
         
                                $start = new DateTime($startDATE);
                                $end = new DateTime($endDATE);
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
                                $monthNo ="";
                                $NumberOfWeeksToDone = 0;
                                foreach($period as $dt) {
                                    $curr = $dt->format('W');
                                    $currMonth = $dt->format('F');
                                    $currYear = $dt->format('Y');
                                  
         
                                    if($currMonth==$monthNo){
                                      echo null;
                                    }
                                    else{
                                      // echo $curr;
                                      // echo "<br>";
                                      $NumberOfWeeksToDone++;
                                      $monthNo = $currMonth;
                                    }
                                  }
                                    $finalDiffs = $NumberOfWeeksToDone;
                                    $TARGETPOINTS = $TARGETPOINTS+$finalDiffs;
         

                  }

                  /////////////////////////////annual

                  $countAnnual = "SELECT COUNT(username) as noOfTask FROM `usertask` WHERE `userid` = '$UserID' AND taskType = 'annual';"; 
      $resultan = mysqli_query($con, $countAnnual);


      while($userRow = mysqli_fetch_assoc($resultan)){
        $noOfTask = $userRow['noOfTask'];
      }
      $TARGETPOINTS = $TARGETPOINTS+$noOfTask;
                                  //  echo $Username;
                                  //  echo " ";
                                   echo $TARGETPOINTS;
      // echo $noOfDailyTask + $noOfWeeklyTask + $noOfMonthlyTask ;
    ?> </td>

    <td>
    <?php 
                             // echo $TotalPointsEarned;
                             // echo $finalDiffs;
                             $TotalPercentage = ($TotalPointsEarnedForSelectedDate / $TARGETPOINTS)* 100;
                            //  echo round($TotalPercentage).'%';
                              ?> 
                             
                             <div class="progress" style="height: 30px">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                       style="width:<?php echo round($TotalPercentage).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                       <?php echo round($TotalPercentage).'%'; ?> 
                                      
                                     </div>
                                     </div>

    </td>



       </tr>
<?php
$sn++; }}else{ ?>
 <tr>
   <td colspan="8">
<?php echo $fetchDataSummary; ?>
</td>
</tr>
<?php
echo "No data found";
}                     ?>      
</tbody>

                          <br>
                          <br>
                      </table>
                      </div>
                    </div>