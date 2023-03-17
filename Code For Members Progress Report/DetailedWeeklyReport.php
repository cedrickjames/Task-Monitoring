<div class="overflow-x" name="WeeklyReportArea" id="WeeklyReportArea" style="display: <?php
                     if($weeklyChecked != ""){
                      echo "block";
                    }
                    else{
                      echo "none";
                    }  ?>">
                    <!-- <?php echo $weeklyChecked;?> -->
                      <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 

                     
                      <table class="table table-bordered" class="table datacust-datatable Table ">
                        <thead  style="position: sticky; top: -1px;">
                          <tr class="table-dark text-center">
                            <th scope="col" colspan="10" style=" border-bottom: 0px">Detailed Weekly Task Report</th>
                          </tr>
                          <tr class="table-warning text-center" style="border-width: 0px" >
                            <th scope="col" colspan="10">
                              <div class="col-sm-4" style="padding: 0; margin: 0 auto" >
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="<?php $userlevel = $_SESSION['userlevel'];
                                if ($userlevel =='Leader') {?>leader.php<?php ;
                                } elseif ($userlevel =='PIC') {?>userDashBoard.php<?php ;
                                } elseif ($userlevel =='admin2') {?>leaderstask.php<?php ;
                                } else {?>admin.php<?php ;
                                } ?>" method="POST">
                          <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">Start</label>
                          
                          <input type="date" id="datepickerProgWeekly" value="<?php $startDate = new DateTime($todayWeekly);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>" name="datepickerProgWeekly" style="margin-right: 20px" onchange="filterMonth();">
                          <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
                          
                          <input type="date" id="datepickerEndProgWeekly" value="<?php $endDate = new DateTime($todayEndWeekly);  $endDate =  $endDate->format('Y-m-d'); echo $endDate ?>" name="datepickerEndProgWeekly" onchange="filterMonth();">
                          <button type="submit" name="submitdateProgWeekly" class="btn btn-info btn-sm">Submit</button>
                          <button type="button" class="btn btn-outline-success btn-sm" onclick="exportDataWeekly()"> <i style="font-size: 20px;"class="fas fa-file-csv fa-xs"></i> Export</button>
                                      
                          <!-- <input type="submit" name="submitdate"> -->
                          </form>
                        
                      </div></div> </th>
                          </tr>

                          <tr class="table-secondary text-center" >
                              <th>#</th>
                              <th>In charge</th>
                              <th>Task</th>
                              <th>No. of ontime (1pt)</th>
                              <th>No. of late (0.5pt)</th>
                              <th>Total points earned</th>
                              <th>Target points</th>
                              <th>Percentage</th>
<!-- find -->
                            </tr>
                          </thead>
                          
                          
                         
                   
                          
                         
                        <tbody class="text-center" id="tableOfWeekly">
                        <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                  if(is_array($fetchDataProgWeeky)){      
                                    $sn=1;
                                  foreach($fetchDataProgWeeky as $data){
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


                                    $TotalPointsEarned = 0;
                                    // echo("<script>console.log('taskname : " . $taskname. "');</script>");
                                    
                              //  echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                            ?>
                             
                             <!-- onclick= "PassTaskData('<?php //echo $data['usertaskID']; ?>')" -->
                             <!-- <tr  data-toggle='modal' data-target='#modalAdmin'> -->
                             <tr class="dailyTable">
                             <!-- <input id="btn-passdata" class="btn-signin" name="sbtlogin" type="submit" value="Login" style="margin: auto;" disabled> -->
                             <td> <?php echo $sn; ?></td>
                             <td><?php $fname= $data['username'];    $sql1 = "SELECT f_name FROM `users` WHERE username = '$fname';";
                                $result = mysqli_query($con, $sql1);
                                $numrows = mysqli_num_rows($result);
                                while($userRow = mysqli_fetch_assoc($result)){
                                $firstname = $userRow['f_name'];
                              } echo  $firstname; ?></td>

                             <td class="taskNameHover" ><?php echo $taskname; ?></td>
                             <td name="noOfOntime">
                                  <?php
                                       $StartDateSelected = new DateTime($todayWeekly);
                                       $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                       $startDAY=  $StartDateSelected->format('D'); 
                                     
                                     
                                      //  if ($startDAY == 'Mon') {
                                      // //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                      //  $startDATE = $StartDateSelected->format('Y-m-d');
                                        
                                      //    }
                                      //    else if($startDAY == 'Sun'){
                                      //      $StartDateSelected->modify('next monday');
                                      //     //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                      //      $startDATE = $StartDateSelected->format('Y-m-d');
                                     
                                      //    }
                                      //    else{
                                      //     $StartDateSelected->modify('last monday');
                                      //     // $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                      //     $startDATE = $StartDateSelected->format('Y-m-d');
                                     
                                      //    }
                                      
                                        
                                    // (optional) for the updated question
                                    
                                     $DateNowAndToday = new DateTime($todayEndWeekly);  
                                     $endDATE =  $DateNowAndToday->format('Y-m-d');
                                    //  $endDATE = $DateNowAndToday->format('W');
                                    //  echo "week".$startDATE;
                                    //  echo "week".$endDATE;
                                    

                                      $countWeekly = "SELECT  COUNT(finishedtask.score) as TotalNumberOf1 FROM finishedtask INNER JOIN usertask ON finishedtask.taskID=usertask.usertaskID WHERE finishedtask.taskID = '$userTaskID' AND  finishedtask.score = '1' AND finishedtask.sched_Type = 'weekly' AND usertask.ended = false AND  finishedtask.realDate BETWEEN '$startDATE' AND '$endDATE' ;";
                                      $result = mysqli_query($con, $countWeekly);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                      }
                                      echo $totalNumberOfScore1;
                                      $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                  ?>
                             </td>
                             <td name="noOfLate">
                             <?php
                                     
                                     $StartDateSelected = new DateTime($todayWeekly);
                                     $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                     $startDAY=  $StartDateSelected->format('D'); 
                                   
                                   
                                     if ($startDAY == 'Mon') {
                                    //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                     $startDATE =  $StartDateSelected->format('W'); 
                                      
                                       }
                                       else if($startDAY == 'Sun'){
                                         $StartDateSelected->modify('next monday');
                                        //  $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                         $startDATE = $StartDateSelected->format('W');
                                   
                                       }
                                       else{
                                        $StartDateSelected->modify('last monday');
                                        // $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                        $startDATE =  $StartDateSelected->format('W'); 
                                   
                                       }
                                       $DateNowAndToday = new DateTime($todayEndWeekly);  
                                       //  $endDATE =  $DateNowAndToday->format('Y-m-d');
                                       $endDATE = $DateNowAndToday->format('W');
                                     $countWeekly = "SELECT COUNT(score) as TotalNumberOfp5 FROM `finishedtask` WHERE `taskID` = '$userTaskID' AND  `score` = '0.5' AND `sched_Type` = 'weekly' AND  `weekNumber` BETWEEN '$startDATE' AND '$endDATE';"; //kunin ang first monday date na pipiliin
                                      $result = mysqli_query($con, $countWeekly);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                        $totalNumberOfScore1 = $userRow['TotalNumberOfp5'];
                                      }
                                     echo $totalNumberOfScore1;
                                     $totalNumberOfScore1 = $totalNumberOfScore1 * 0.5;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                      // echo $TotalPointsEarned;
                                 ?>        

                             </td>
                             <td name="totalEarnedPoints"> <?php echo $TotalPointsEarned; ?></td>
                             <td name="targetPoints">
                                       <?php 
                                        $StartDateSelected = new DateTime($todayWeekly);
                                        $startDATE =  $StartDateSelected->format('Y-m-d'); 
                                      $DateNowAndToday = new DateTime($todayEndWeekly);  
                                        $endDATE =  $DateNowAndToday->format('Y-m-d');

                                               $selectTarget = "SELECT COUNT(FinishedTaskID) as 'target' FROM `finishedtask` WHERE taskID = '$userTaskID' AND `realDate` BETWEEN '$startDATE' and '$endDATE';";
                                               $resultTarget = mysqli_query($con, $selectTarget);
                                               while($userRow = mysqli_fetch_assoc($resultTarget)){
                                                $target = $userRow['target'];
                                               }
//                                                    $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$userTaskID';"; //kunin ang first monday date na pipiliin
//                                                    $result = mysqli_query($con, $selectDateAdded);
//                                                    while($userRow = mysqli_fetch_assoc($result)){
//                                                      $dateAdded = $userRow['dateAdded'];
//                                                      $targetDate = $userRow['targetDate'];
               
                                                   
// // echo  date('Y-m-d', strtotime($dateAdded)) .' '.date('Y-m-d', strtotime($targetDate)) ."<br>";
// // echo  date('Y-m-d', strtotime($todayWeekly)) .' '.date('Y-m-d', strtotime($todayEndWeekly)) ."<br>";
                                                   
//                                                    $dateAdded = date($dateAdded);
//                                                    $targetDate = date($targetDate);
               
//                                                      $START = date('Y-m-d', strtotime($todayWeekly));
//                                                      $END = date('Y-m-d', strtotime($todayEndWeekly));
//                                                        if($START < $dateAdded){
//                                                          $startDATE = $dateAdded;
//                                                        }
//                                                      if($END > $targetDate){
//                                                            $endDATE = $targetDate;
//                                                        }
//                                                       }

//                         $start = new DateTime(date('Y-m-d', strtotime($startDATE)));
//                         $end = new DateTime(date('Y-m-d', strtotime($endDATE)));
//                         // otherwise the  end date is excluded (bug?)
//                         $end->modify('+1 day');
//                         // echo date('F j, Y');
//                         $interval = $end->diff($start);
                        
//                         // total days
//                         $days = $interval->days;
//                         // echo $days;
//                         // create an iterateable period of date (P1D equates to 1 day)
//                         $period = new DatePeriod($start, new DateInterval('P1D'), $end);
                        
//                         // best stored as array, so you can add more than one
//                         // $holidays = array('2022-07-15');
//                         include ("./holidays.php");

//                         $weekNo ="";
//                         $NumberOfWeeksToDone = 0;
//                         foreach($period as $dt) {
//                             $curr = $dt->format('W');
//                             $currMonth = $dt->format('F');
//                             $currYear = $dt->format('Y');
//                             $currs = $dt->format('D');
                          
//                             if ($currs == 'Sat' || $currs == 'Sun') {
//                               $finalDiffs--;
//                               }
//                         else if (in_array($dt->format('Y-m-d'), $holidays)) {
//                                               $finalDiffs--;
//                                               }

//                             else if($curr==$weekNo){
//                               echo null;
//                             }
//                             else{
//                               // echo $curr;
//                               // echo "<br>";
//                               $NumberOfWeeksToDone++;
//                               $weekNo = $curr;
//                             }
//                           }
//                           // echo $NumberOfWeeksToDone;
//                             $finalDiffs = $NumberOfWeeksToDone;
//                             if($END < $dateAdded){
//                               $finalDiffs = 0;
//                           }
                            echo $target;
                            // echo $finalDiffs;



                                        // $todayss="2022-07-01";            
                                        // $ends = new DateTime(date('Y-m-d', strtotime($endDATE)));
                                        // $starts = new DateTime(date('Y-m-d', strtotime($startDATE)));
                                        // // otherwise the  end date is excluded (bug?)
                                        // $eme = $starts->format('D');
                                        //       if($eme == "Sat"){
                                        //         $starts->modify('-1 day');

                                        //       }
                                        //       else if( $eme =="Sun"){
                                        //         $starts->modify('-2 day');
                                        //       }
                                        //       // $starts->modify('+1 day');
                                        // $end = new DateTime();
                                        // $intervals = $ends->diff($starts);
                                        // $finalDiffs = $intervals->days;
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
                                        // echo $finalDiffs;
                                    ?>



                             </td>
                             <td>
                             <?php 
                              // echo $TotalPointsEarned;
                              // echo $finalDiffs;
                              if($TotalPointsEarned ==0 ||$target ==0 ){
                                $TotalPercentage = 0;
                              }
                              else{
                                $TotalPercentage = ($TotalPointsEarned / $target)* 100;
                              }
                               ?> 
                              <div class="progress" style="height: 30px">
                             <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                        style="width:<?php echo round($TotalPercentage, 2).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <?php echo round($TotalPercentage, 2).'%'; ?> 
                                       
                                      </div>
                                      </div></td>
                             </tr>
                             <?php
                        $sn++; }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataProgWeeky; ?>
                        </td>
                         </tr>
                          <?php
                          // echo "No data found";
    }                     ?>       
                        </tbody>
                      </table>
                        
                      </div>
                    </div>