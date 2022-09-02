
                    <div class="overflow-x" name="AnnualReportArea" id="annualReportArea" style="display: <?php
                    if($annualChecked != ""){
                     echo "block";
                   }
                   else{
                     echo "none";
                   }  ?>">
                     <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 

                    
                     <table class="table table-bordered" class="table datacust-datatable Table ">
                       <thead  style="position: sticky; top: -1px;">
                         <tr class="table-dark text-center">
                           <th scope="col" colspan="10" style=" border-bottom: 0px">Detailed Annually Task Report</th>
                         </tr>
                         <tr class="table-light text-center" style="border-width: 0px" >
                           <th scope="col" colspan="10">
                             <div class="col-sm-4" style="padding: 0; margin: 0 auto" >
                         <div class="form-group row d-flex justify-content-center" >
                         <form action="<?php $userlevel = $_SESSION['userlevel']; if($userlevel =='Leader'){?>leader.php<?php ; }else if($userlevel =='PIC'){?>userDashBoard.php<?php ; }else{?>admin.php<?php ;} ?>" method = "POST" >
           <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">Start</label>
           
           <input type="date" id="datepickerProgAnnual" value="<?php $startDate = new DateTime($todayAnnual);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>" name="datepickerProgAnnual" style="margin-right: 20px" onchange="filterMonth();">
           <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
           
           <input type="date" id="datepickerEndProgAnnual" value="<?php $endDate = new DateTime($todayEndAnnual);  $endDate =  $endDate->format('Y-m-d'); echo $endDate ?>" name="datepickerEndProgAnnual" onchange="filterMonth();">
           <button type="submit" name="submitdateProgAnnual" class="btn btn-info btn-sm">Submit</button>
           <button type="button" class="btn btn-outline-success btn-sm" onclick="exportDataAnnual()"> <i style="font-size: 20px;"class="fas fa-file-csv fa-xs"></i> Export</button>
                        
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
                         
                         
                        
                  
                         
                        
                       <tbody class="text-center" id="tableOfAnnual">
                       <?php
                             $color1 = "#f9f9f9;";
                             $color2 = "white";
                             $color = "";
                                 if(is_array($fetchDataProgAnnual)){      
                                   $sn=1;
                                 foreach($fetchDataProgAnnual as $data){
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

                            <td class="taskNameHover" ><?php echo $taskname; ?></td>
                            <td name="noOfOntime">
                                 <?php
                                     
                                     $April = new DateTime($todayAnnual);  $April =  $April->format('Y-m-d');
                                     $March = new DateTime($todayEndAnnual);  $March =  $March->format('Y-m-d');

                                     $countAnnual = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `taskID` = '$userTaskID' AND `score` = '1' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';";
                                     $result = mysqli_query($con, $countAnnual);
                                     while($userRow = mysqli_fetch_assoc($result)){
                                     $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                                     }
                                     echo $totalNumberOfScore1;
                                     $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                                 ?>
                            </td>
                            <td name="noOfLate">
                            <?php
                                    
                                    $April = new DateTime($todayAnnual);  $April =  $April->format('Y-m-d');
                                    $March = new DateTime($todayEndAnnual);  $March =  $March->format('Y-m-d');

                                    $countAnnual = "SELECT COUNT(score) as TotalNumberOfp5 FROM `finishedtask` WHERE `taskID` = '$userTaskID' AND  `score` = '0.5' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';"; 
                                     $result = mysqli_query($con, $countAnnual);
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
                            <td name="targetPoints">1</td>
                            <td>
                            <?php 
                             // echo $TotalPointsEarned;
                             // echo $finalDiffs;
                             $TotalPercentage = ($TotalPointsEarned / 1)* 100; ?> 
                             <div class="progress" style="height: 30px">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                       style="width:<?php echo round($TotalPercentage).'%'; ?>  " aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                       <?php echo round($TotalPercentage).'%'; ?> 
                                      
                                     </div>
                                     </div></td>
                            </tr>
                            <?php
                       $sn++; }}else{ ?>
                           <tr>
                             <td colspan="8">
                         <?php echo $fetchDataProgAnnual; ?>
                       </td>
                        </tr>
                         <?php
                         echo "";
   }                     ?>       
                       </tbody>
                     </table>
                       
                     </div>
                   </div>