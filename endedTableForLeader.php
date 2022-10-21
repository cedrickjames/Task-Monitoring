<div class="tab-pane fade show <?php echo $EndedActive; ?>" id="ENDED" style="height: 90%;  background-color: none" role="tabpanel" aria-labelledby="task-tab">
  
          <div class="container p-30 " id="TableListOfMembersEnded";  style="position: relative;  height: fit-content;padding-top: 0; max-width: 100%">
        <div class="ms-1 shadow row" >
            <div class="shadow col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-1 createSegment"> 
                         <h3>Task</h3> 
                        </div>
                        
                        <div class="col-sm-4" style="padding: 0;">
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="leader.php" method = "POST" >
                            
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">Start</label>
            
            <input type="date" id="datepickerEnded" value="<?php $startDate = new DateTime($today);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>" name="datepickerEnded" style="margin-right: 20px" >
            <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
            
            <input type="date" id="datepickerEndEnded" value="<?php $EndDate = new DateTime($todayEnd); $endDATE =  $EndDate->format('Y-m-d'); echo $endDATE ?>" name="datepickerEndEnded" onchange="filterMonth();">
          <button type="submit" name="submitdateEnded" class="btn btn-info btn-sm" onclick="submitDate();">Submit</button>
            <button type="button" class="btn btn-outline-success btn-sm" onclick="exportData()"> <i style="font-size: 20px;"class="fas fa-file-csv fa-xs"></i> Export</button>
                         
            <!-- <input type="submit" name="submitdate"> -->
            </form>
           
        </div></div>
                        
                        <div class="col-sm-7 add_flex" style="padding: 0">
                        <div class="col-sm-6" style="padding: 0" >
                        <fieldset class="row mb-3" style="margin-top: 25px;  font-size: 12pt; margin-bottom: 0px;">
                            <div class="form-check" style="padding: 0px">
                                   
                                    <div class="form-check form-check-inline" style="margin-left: 10px; ">
                                        <input class="form-check-input"  type="radio" name="checkDoneEnded" id="checkDoneEnded" onclick="FilterSchedEnded();"> <!--Update for October 7 2022-->
                                            <label  class="form-check-label" for="checkPIC">
                                             Monthly
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDoneEnded" id="checkDoneEnded" onclick="FilterSchedEnded();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Daily
                                            </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDoneEnded" id="checkDoneEnded" onclick="FilterSchedEnded();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Weekly
                                            </label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDoneEnded" id="checkDoneEnded" onclick="FilterSchedEnded();">
                                            <label  class="form-check-label" for="checkPIC">
                                             Annual
                                            </label>
                                     </div>
                                     <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="checkDoneEnded" id="checkDoneEnded" checked onclick="FilterSchedEnded();">
                                            <label class="form-check-label" for="checkPIC">
                                             All
                                            </label>
                                    </div>
                                   
                                  
                             </div>
                        </fieldset>
                    </div>
                            <div class="form-group searchInput" >
                                <select class="custom-select" id="inputGroupSelect01Ended" onchange="getSelectValueEnded();"style="display: none">
                                    <option  disabled selected hidden>Search by</option>
                                    <option value="1">Area</option>
                                    <option value="2">Task Name</option>
                                    <option value="4">Type</option>
                                    <option value="3">In charge</option>
                                    <option value="0">Category</option>
                                    
                                  </select>
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterboxEnded" placeholder=" "onkeyup="getSelectValueEnded();" >
                            </div>
                        </div> 
                    </div>
                    <form action="leader.php" method = "POST">
                    <!-- <input type="submit" name="submitSelected" value="End Task"> -->
                    <!-- <input type="date" id="dateForEnd2" value="<?php $EndDate = new DateTime($todayEnd); $endDATE =  $EndDate->format('Y-m-d'); echo $endDATE ?>" name="dateForEnd" >
          
                    <button type="submit" id = "submitSelected2" name="submitSelected" class="btn btn-outline-success btn-sm" style="margin-bottom: 2px">  End Task</button>
                    <button type="submit" id = "deleteSelected2" name="deleteSelected" class="btn btn-outline-danger btn-sm" style="margin-bottom: 2px">  Delete</button> -->


                    <div class="overflow-x">
    <div class="overflow-y overflow-x" style="overflow-y: scroll;overflow-x: scroll; height:580px;"> 
                   

<!-- 
<table id="table"></table> -->
                        
                      <table class="table table-striped " style="width:  100%" id="filtertableMain" class="table datacust-datatable Table ">
                            <thead  class="thead-primary" style="position: sticky;top: -1px;">
                               
                            
                            <tr id="topLeftEnded" class="table-dark table-bordered text-center" >
                                    <!-- <th style="min-width:15px;"></th> -->
                                    <th style="min-width:15px;">No.</th>
                                    <th style="width:200px;"  >In charge</th>
                                    <th style="width:200px;" >Task Name</th>
                                    <th style="min-width:40px;">Area</th>
                                    <th style="min-width:50px;">Category</th>
                                    <th style="width:180px;"  >Type</th>



                                    <?php 
                                    $date = new DateTime($today);
                                    $dateEnd = new DateTime($todayEnd);
                                    // $dateEnd = new DateTime('2022-08-31');
                                    $selectedMonth = $date->format("M");
                                    $yearoftheDay = $date->format("o");
                                    $yearoftheDaylast = $dateEnd->format("o");

                                    // echo $yearoftheDay;
                                    $selectedEndMonth = $dateEnd->format("M");
                                                                       
                                   $DateTodayNow = $dateEnd->format('Y-m-d');
                                   $StartDateSelected = $date->format('Y-m-d');

                                    $fDateOfTheMonth = new DateTime($StartDateSelected);
                                    // echo "First day of the month: ";
                                    $fday =   $fDateOfTheMonth->format('Y-m-d');
                                    $lDateOfTheMonth = new DateTime($DateTodayNow);
                                    // echo "last day of the month: ";
                                    $lday = $lDateOfTheMonth->format('Y-m-d');
                                    // echo "<br>";
                                  $start = new DateTime($fday);
                                  $end = new DateTime($lday);
                                  
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
                                  // $holidays = array('2022-07-15');
                                  $weekNo ="";
                                  $countColumns = 6;
                                  foreach($period as $dt) {
                                      $curr = $dt->format('W');
                                      if($curr==$weekNo){
                                        echo null;
                                      }
                                      else{
                                        $countColumns++;
                                  

                                        ?><th style='min-width:150px;' >Week <?php echo $curr?></th><?php
                                        // echo "<th style='width:240px;' >Week $curr</th>";
                                        // echo $curr;
                                        // echo "\n";
                                        $weekNo = $curr;
                                      }
                                  }
                                  
                                    ?>
                                    <input id="countColumnEnded" disabled style="display: none;" name="countColumnName" value="<?php echo $countColumns ?>">
                                    <!-- <th style="width:8%;" >W1</th>
                                    <th style="width:8%;" >W2</th>
                                    <th style="width:8%;" >W3</th>
                                    <th style="width:8%;" >W4</th>
                                    <th style="width:8%;" >W5</th>
                                    <th style="width:8%;" >W6</th> -->
                                    

                                </tr>
                            </thead>
                            <tbody class="text-center" id="TaskTableEnded">
                            <?php
                              $color1 = "#f9f9f9;";
                              $color2 = "white";
                              $color = "";
                                  if(is_array($fetchDataForEnded)){      
                                    $sn=1;
                                  foreach($fetchDataForEnded as $data){
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
                                    $dateStarted = $data['dateAdded'];
                                    $dateTarget = $data['targetDate'];




                                    // echo("<script>console.log('taskname : " . $taskname. "');</script>");
                                    
                              //  echo("<script>console.log('USER: " .$data['usertaskID'] . "');</script>");

                            ?>
                             
                             <!-- onclick= "PassTaskData('<?php //echo $data['usertaskID']; ?>')" -->
                             <!-- <tr  data-toggle='modal' data-target='#modalAdmin'> -->
                             <tr class="ewan2" >
                             <!-- <input id="btn-passdata" class="btn-signin" name="sbtlogin" type="submit" value="Login" style="margin: auto;" disabled> -->
                             <!-- <td><input type="checkbox" value="<?php echo $data['usertaskID']; ?>" name="id[]" onclick=ShowEndTaskButton()></td> -->
                             <td >
                               
                               <?php echo $sn; ?></td>
                               <td><?php $fname= $data['username'];    $sql1 = "SELECT * FROM `users` WHERE username = '$fname';";
        $result = mysqli_query($con, $sql1);
        $numrows = mysqli_num_rows($result);
        while($userRow = mysqli_fetch_assoc($result)){
         $firstname = $userRow['f_name'];
         $lastname = $userRow['l_name'];

      } echo  $firstname.' ';
      echo  $lastname;  ?></td>
                              <td class="taskNameHover" onclick= "clickpassdata('<?php echo $taskUser?>','<?php echo $taskArea?>','<?php echo $userTaskID?>', '<?php echo $taskname?>','<?php echo $taskCategory?>', '<?php echo $taskType?>', '<?php echo $dateStarted?>', '<?php echo $dateTarget?>' )" data-toggle='modal' data-target='#modalAdmin'><?php echo $data['taskName']; ?></td>
                               <td><?php echo $data['taskArea']; ?></td>
                                <td><?php echo $data['taskCategory']; ?></td>
                                <td><?php echo $data['taskType']??''; ?></td>

                                <!-- start of new code -->
                               <?php 
                                      
                                      $date = new DateTime($today);
                                    //   $date = new DateTime('2022-06-01');

                                      $dateEnd = new DateTime($todayEnd);
                                    //   $dateEnd = new DateTime('2022-08-31');


                                      $selectedMonth = $date->format("M");
                                      $selectedEndMonth = $dateEnd->format("M");
                                    //   echo $selectedEndMonth;
                                    $yearoftheDay = $date->format("o");
                                    $yearoftheDaylast = $dateEnd->format("o");

                                    $DateNowAndToday =  $dateEnd->format('Y-m-d');
                                    $StartDateSelected = $date->format('Y-m-d');
                                    $fDateOfTheMonth = new DateTime($StartDateSelected);
                                    // echo "First day of the month: ";
                                    $fday =   $fDateOfTheMonth->format('Y-m-d');
                                    $lDateOfTheMonth = new DateTime($DateNowAndToday);
                                    // echo "last day of the month: ";
                                    
                                    $lday = $lDateOfTheMonth->format('Y-m-d');
                                    // echo $lday;
                                    // echo "<br>";
                                    // echo $fday;
                                    // echo " ";
                                    // echo $lday;
                                  $start = new DateTime($fday);
                                  $end = new DateTime($lday);
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
                                  // $holidays = $holidaysArray;

                                  $weekNo ="";
                   

                                  foreach($period as $dt) {
                                      $curr = $dt->format('W');
                                      $day = $dt->format('Y-m-d');

                                      $monthOfThisDate=$dt->format('F');
                                      $yearOfThisDate=$dt->format('o');

                                      if($curr==$weekNo){
                                        echo null;
                                      }
                                      else{
                                        // echo "<th style='width:8%;' >Week $curr</th>";
                                       
                                        // echo $curr;
                                        // echo " ";
                                        // echo $day;
                                   $taskID = $data['usertaskID'];
                                   $taskType = $data['taskType'];
                                   if($taskType == "daily" || $taskType == "others"){ // update for october 07 2022
                                    ?>
                                    <td style='width:240px;'><?php
                                    //  echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");

                                      // $datePicker = $_POST['datepicker'];
                                      // $month= date('F', strtotime($datePicker));
                                      // $year =date('Y', strtotime($datePicker));



                                      $selectUserTask1 = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$monthOfThisDate' AND `year` = '$yearOfThisDate' AND `week` = 'week $curr' ORDER BY `FinishedTaskID` DESC LIMIT 1 ";

                                         // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                         $result1 = mysqli_query($con, $selectUserTask1);
                                         $weekNumber = '';
                                         while($userRow = mysqli_fetch_assoc($result1)){
                                     
                                           $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $date = $userRow['Date'];

                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         $reason = $userRow['reason'];
                                         $action = $userRow['action'];
                                         $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                         $pointReceived = $userRow['score'];
                                         $DateSubmitted = $userRow['DateSubmitted'];
                                         $dateN =  date('n-d', strtotime($DateSubmitted));
                                          $timestamp = $userRow['timestamp'];


                                        //  echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                        $noOfDays = $userRow['noOfDaysLate'];
                                               }
                                               if ($weekNumber == "week $curr" ){
     
                                                $weeknumber = $weekNumber;

                                                if($noOfDays >= 1){
                                                  // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  // echo '<span class="mode mode_late"><a class="dropdown-toggle dropdown_icon" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a><ul class="dropdown-menu dropdown_more"><li><a href="#"><i class="fas fa-users fa-w-18 fa-fw fa-lg"></i>Profile</a></li></ul></span>';
                                                  
                                                  if($isCheckedByLeader){
                                                    ?>
                                                    <!-- <span class="mode mode_late_checkedByLeader"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span> -->

                                                    <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                     <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                     <?php
                                                  }
                                                  
                                                  
                                                 
                                                }
                                                else if ($noOfDays <= 0){
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  if($isCheckedByLeader){
                                                    ?>
                                                    <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-point="<?php echo $pointReceived?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-point="<?php echo $pointReceived?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    <?php
                                                  }
                                                  
                                                }
                                                    // echo("<script>console.log('ok');</script>");
          
                                                   }
                                              //  //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                              ?> </td><?php
                                            }
                                   else if($taskType == "annual"){
                                    ?>
                                <?php
 // code for annual
 $dateOfNow = new DateTime($today);
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


     $selectUserTasks = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND  `realDate` BETWEEN '$April' AND '$March';";
     // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
     $result = mysqli_query($con, $selectUserTasks);

     $numrows = mysqli_num_rows($result);
     $don = "0";
     while($userRow = mysqli_fetch_assoc($result)){
       $noOfDays = $userRow['noOfDaysLate'];
       $isLate = $userRow['isLate'];
       $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         $reason = $userRow['reason'];
                                         $action = $userRow['action'];
                                         $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                         $pointReceived = $userRow['score'];
                                         $timestamp = $userRow['timestamp'];
                                         $DateSubmitted = $userRow['DateSubmitted'];

   }
   if ($numrows >= 1){
    if($isLate){
      if($isCheckedByLeader){
        ?>
        <td style='width:240px; background-color:  #ff4800;'>
    <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
      </td>
     <?php
      }
      else{
        ?>
            <td style='width:240px; background-color:  #ff8000;'>

        <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
      </td>
         <?php
      }
    }
    else{
      if($isCheckedByLeader){

        ?>
        <td style='width:240px; background-color: #00b7ff;'>

        <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
          </td>
          <?php

       }
       else{
        ?>
            <td  colspan="1" style='width:240px; background-color: #09922d'>
        <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>"  data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
       </td>
          <?php
       }
    }
    $don = "1";
  //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
       }
       else{
        ?>
        <td  colspan="1" style='width:240px;'>
   </td> <?php
       }
       ?> <?php
//end of code for annual
                                  }
                                   else{
                                    ?>
                                    <td style='width:240px;'><?php
                                     //echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                                    //  $month = date("F");
                                    //  $year = date("Y");
     
                                         $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$monthOfThisDate' AND `year` = '$yearOfThisDate';";
                                         // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                         $result = mysqli_query($con, $selectUserTask);
                                         $weekNumber = '';
                                         while($userRow = mysqli_fetch_assoc($result)){
                                     
                                           $weekNumber = $userRow['week'];
                                           $fileloc =  $userRow['attachments'];
                                           $time = $userRow['timestamp'];
                                           $finishedtaskID = $userRow['FinishedTaskID'];
                                           $date = $userRow['Date'];
                                         $dateN =  date('n-d', strtotime($date));
                                         $noOfDays = $userRow['noOfDaysLate'];
                                         $reason = $userRow['reason'];
                                         $action = $userRow['action'];
                                         $isCheckedByLeader = $userRow['isCheckedByLeader'];
                                         $pointReceived = $userRow['score'];
                                         $DateSubmitted = $userRow['DateSubmitted'];
                                        //  $dateN =  date('n-d', strtotime($DateSubmitted));
                                          $timestamp = $userRow['timestamp'];
                                         //echo("<script>console.log('testingFinished: ".$finishedtaskID."');</script>");
                                       
                                               
                                               if ($weekNumber == "week $curr" ){
     
                                                $weeknumber = $weekNumber;

                                                if($noOfDays >= 2){

                                                  if($isCheckedByLeader){
                                                    ?>
                                                <span class="mode mode_late_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a  style = "color: white" href="#" data-late="1" data-datesubmitted="<?php echo $DateSubmitted ." ". $timestamp ?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>

                                                 <?php
                                                  }
                                                  else{
                                                    ?>
                                                    <span class="mode mode_late"><a style = "color: white" href="#" data-late="1" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>"  data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
    
                                                     <?php
                                                  }
                                                  // echo '<span class="mode mode_late"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                  
                                                }
                                                else if ($noOfDays <= 1){
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                 if($isCheckedByLeader){

                                                  ?>
                                                  <span class="mode mode_on_checkedByLeader" data-toggle="tooltip" data-placement="top" title="checked by leader"><a style = "color: white" href="#" data-late="0" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>"  data-point="<?php echo $pointReceived?>" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    
                                                    <?php

                                                 }
                                                 else{
                                                  ?>
                                                  <span class="mode mode_on"><a style = "color: white" href="#" data-late="0" data-location="<?php echo $fileloc?>" data-taskid="<?php echo $finishedtaskID?>" data-datesubmitted="<?php echo $DateSubmitted ." ".  $timestamp ?>" data-point="<?php echo $pointReceived?>" data-reason="<?php echo $reason?>" data-action="<?php echo $action?>"  data-toggle='modal' data-target='#reasonModalUpdate'><?php echo $dateN ?></a></span>
                                                    
                                                    <?php
                                                 }
                                                
                                                }
                                                  // echo '<span class="mode mode_on"><a style = "color: white" href="'.$fileloc.'"> '.$dateN.'</a></span>';
                                                    // //echo("<script>console.log('ok');</script>");
          
                                                   }
                                                  }
                                                  ?> </td><?php
                                               //echo("<script>console.log('testing:".$weekNumber."');</script>");
                                   }                       
                                   
                                ?>
                                        <?php
                                        // echo $curr;
                                        // echo "\n";
                                        $weekNo = $curr;
                                        
                                      }
                                  }
                                    ?>

                                    <!-- End of new code -->
      
                             <?php
                        $sn++; }}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchDataForEnded; ?>
                        </td>
                         </tr>
                          <?php
                          echo "";
    }                     ?>                   
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <!--  -->
                    
                </form>
                </div>
            </div>
        </div>
      </div>
      </div>