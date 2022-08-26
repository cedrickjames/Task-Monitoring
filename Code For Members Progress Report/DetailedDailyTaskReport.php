<div class="overflow-x" name="DailyReportArea" id="DailyReportArea" style="display: <?php
                     if($dailyChecked != ""){
                      echo "block";
                    }
                    else{
                      echo "none";
                    }  ?>">
                      <div class="overflow-y" style="overflow-y: scroll; height:580px;">


                        <table class="table table-bordered" class="table datacust-datatable Table ">
                          <thead style="position: sticky; top: -1px;">
                            <tr class="table-dark text-center">
                              <th scope="col" colspan="10" style=" border-bottom: 0px">Detailed Daily Task Report</th>
                            </tr>
                            <tr class="table-info text-center" style="border-width: 0px">
                              <th scope="col" colspan="10">
                                <div class="col-sm-4" style="padding: 0; margin: 0 auto">
                                  <div class="form-group row d-flex justify-content-center">
                                    <form action="<?php $userlevel = $_SESSION['userlevel']; if($userlevel =='Leader'){?>leader.php<?php ; }else{?>admin.php<?php ;} ?>" method="POST">
                                      <label for="colFormLabelLg" class="col-form-label-lg"
                                        style="margin-right: 10px">Start</label>

                                      <input type="date" id="datepickerProgDaily"
                                        value="<?php $startDate = new DateTime($todayDaily);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>"
                                        name="datepickerProgDaily" style="margin-right: 20px" onchange="filterMonth();">
                                      <label for="colFormLabelLg" class="col-form-label-lg"
                                        style="margin-right: 10px">End</label>

                                      <input type="date" id="datepickerEndProgDaily"
                                        value="<?php $startDate = new DateTime($todayEndDaily);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>"
                                        name="datepickerEndProgDaily" onchange="filterMonth();">
                                      <button type="submit" name="submitdateProgDaily"
                                        class="btn btn-info btn-sm">Submit</button>
                                      <button type="button" class="btn btn-outline-success btn-sm"
                                        onclick="exportDataDaily()"> <i style="font-size: 20px;"
                                          class="fas fa-file-csv fa-xs"></i> Export</button>

                                      <!-- <input type="submit" name="submitdate"> -->
                                    </form>

                                  </div>
                                </div>
                              </th>
                            </tr>

                            <tr class="table-secondary text-center">
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






                          <tbody class="text-center" id="tableOfDaily">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                  if(is_array($fetchDataProg)){      
                                    $sn=1;
                                  foreach($fetchDataProg as $data){
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
                                    echo("<script>console.log('taskname : " . $taskname. "');</script>");
                                    
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

                              <td class="taskNameHover"><?php echo $taskname; ?></td>
                              <td name="noOfOntime">
                                <?php
                                     $StartDateSelected = new DateTime($todayDaily);
                                       $startDATE =  $StartDateSelected->format('Y-m-d'); 

                                     $DateNowAndToday = new DateTime($todayEndDaily);  
                                     $endDATE =  $DateNowAndToday->format('Y-m-d');

                                      $countDaily = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `taskID` = '$userTaskID' AND `score` = '1' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                                      $result = mysqli_query($con, $countDaily);
                                      while($userRow = mysqli_fetch_assoc($result)){
                                      $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                      }
                                      echo $totalNumberOfScore1;
                                      $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                  ?>
                              </td>
                              <td name="noOfLate">
                                <?php
                                     
                                     $countDaily = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `taskID` = '$userTaskID' AND `score` = '0.5' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                                     $result = mysqli_query($con, $countDaily);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                     }
                                     echo $totalNumberOfScore1;
                                     $totalNumberOfScore1 = $totalNumberOfScore1 * 0.5;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

                                 ?>

                              </td>
                              <td name="totalEarnedPoints"> <?php echo $TotalPointsEarned; ?></td>
                              <td name="targetPoints">
                                <?php 

                                    $selectDateAdded = "SELECT `dateAdded`, `targetDate` FROM `usertask` WHERE `usertaskID` = '$userTaskID';"; //kunin ang first monday date na pipiliin
                                    $result = mysqli_query($con, $selectDateAdded);
                                    while($userRow = mysqli_fetch_assoc($result)){
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
// echo $START .$startDATE;
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
                                        // $holidays = array('2012-09-07');
                                      include ("./holidays.php");
                                        
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
                                        echo $finalDiffs;
                                    ?>



                              </td>
                              <td>
                                <?php 
                              
                              $TotalPercentage = ($TotalPointsEarned / $finalDiffs)* 100; ?>
                                <div class="progress" style="height: 30px">
                                  <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                    style="width:<?php echo round($TotalPercentage).'%'; ?>  " aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <?php echo round($TotalPercentage).'%'; ?>

                                  </div>
                                </div>
                              </td>
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
                        <table style="width:100%; display: none" id="filtertable"
                          class="table datacust-datatable Table ">
                          <thead class="thead-dark">
                            <tr>
                              <th style="width:30%;">Members</th>
                              <th style="width:70%;">Progress</th>


                            </tr>
                          </thead>

                          <!-- <tbody id="tblAll" style="display: null">
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
                                    style="width:<?php echo round($percent).'%'; ?>  " aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
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
                                    style="width:<?php echo round($percentM).'%'; ?>  " aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
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
                                    style="width:<?php echo round($percentW).'%'; ?>  " aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100">
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
                                            style="width:<?php echo round($percentW).'%'; ?>  " aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100">
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
                          </tbody> -->
                        </table>
                      </div>
                    </div>