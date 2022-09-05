<?php
$taskID = $data['usertaskID'];
$taskType =  $data['taskType'];

// echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
// $month = date("F");
$year = date("Y");
$weeknumberrr = weekOfMonth($_SESSION['date_string']);
// echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

if ($taskType == 'weekly'){
$dateForNow = $_SESSION['date_string'];
$date = new DateTime($dateForNow);
$week = $date->format("W");
$weekMonth = $week;
$month1 = $_SESSION['month'];
$year1 = $_SESSION['year'];

    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' AND `week` = 'week $weekMonth';";
    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
    $result = mysqli_query($con, $selectUserTask);

    $numrows = mysqli_num_rows($result);

    $don = "0";

    // if ($numrows == 1){
    //   echo 'disabled';
    //   $don = "1";
    //   // echo '<style type="text/css">#finished22 {pointer-events: none; <style>';
    //      }

                                                
         if($dateforToday > $dateTarget){
          
          if ($numrows >= 1){
            echo 'class="btn btn-outline-secondary" style="pointer-events: none; font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';

            $don = "1";
          //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
               }
               else{
            echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';

               }
               }
               else{
                if ($numrows >= 1){
                  echo 'class="btn btn-outline-secondary" style="pointer-events: none; font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';

                  $don = "1";
                //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                     }
                     else{
                        echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';
            
                           }
               }
    }
    else if($taskType == 'monthly'){
      $dateForNow = $_SESSION['date_string'];
$date = new DateTime($dateForNow);
$week = $date->format("W");
$weekMonth = $week;
      // $weekMonth = weekOfMonth($_SESSION['date_string']);
    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' ;";
    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
    $result = mysqli_query($con, $selectUserTask);

    $numrows = mysqli_num_rows($result);
    $don = "0";

    // if ($numrows == 1){
    //   echo 'disabled';

    //   $don = "1";
    // //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
    //      }

         if($dateforToday > $dateTarget){
          
          if ($numrows >= 1){
            echo 'class="btn btn-outline-secondary" style="pointer-events: none; font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';

            $don = "1";
          //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
               }
               else{
                echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';
    
                   }
               }
               else{
                if ($numrows >= 1){
                  echo 'class="btn btn-outline-secondary" style="pointer-events: none; font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';

                  $don = "1";
                //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                     }
                     else{
                        echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';
            
                           }
               }
    
    }
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

    $April = new DateTime($dateStartedFromDataBase);
    $March = new DateTime($dateTarget);
    $April =  $April->format('Y-m-d');
    $March =  $March->format('Y-m-d');

    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND  `realDate` BETWEEN '$April' AND '$March';";
      // $weekMonth = weekOfMonth($_SESSION['date_string']);
    // $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month1' AND `year` = '$year1' ;";
    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
    $result = mysqli_query($con, $selectUserTask);

    $numrows = mysqli_num_rows($result);
    $don = "0";

    // if ($numrows >= 1){
    //   echo 'disabled';

    //   $don = "1";
    // //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
    //      }
    
         
         if($dateforToday > $dateTarget){
          
          if ($numrows >= 1){
            echo 'disabled';

            $don = "1";
          //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
               }
               else{
                echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';
    
                   }
               }
               else{
                if ($numrows >= 1){
                  echo 'disabled';

                  $don = "1";
                //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
                     }
                     else{
                        echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';
            
                           }
               }
    }
    else if($taskType == 'daily'){
      $dateForNow = $_SESSION['date_string'];
$date = new DateTime($dateForNow);
$week = $date->format("W");
$weekMonth = $week;
      // $weekMonth = weekOfMonth($_SESSION['date_string']);
      $today1 = $_SESSION['today'];
    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `Date` = ' $today1';";
    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
    $result = mysqli_query($con, $selectUserTask);

    $numrows = mysqli_num_rows($result);
    $don = "0";

    // if ($numrows == 1){
    //   echo 'disabled';

    //   $don = "1";
    // //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
    //      }
         if($dateforToday > $dateTarget){
          
    if ($numrows == 1){
      echo 'disabled';

      $don = "1";
    //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
         }
         else{
            echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';

               }
         }
         else{
          if ($numrows == 1){
            echo 'disabled';

            $don = "1";
          //  echo '<style type="text/css">#finished22 {pointer-events: none;}<style>';
               }
               else{
                echo 'class="btn btn-outline-primary" style=" font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" ';
    
                   }
         }
    
    }
?> 