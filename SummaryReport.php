<?php
    session_start();

    require './dompdf/vendor/autoload.php';

    include("./connection.php");

    use Dompdf\Dompdf;
$userLevel =  $_SESSION['userlevel'];

// $x = $_SESSION['period'];
// $y = $_SESSION['dateCount'] - 1;
// $fromDate = date_create($_SESSION['period'][0]);
// $toDate = date_create($_SESSION['period'][$y]);
$db= $con;

$tableName="usertask";
$username =  $_SESSION['username'];
$columns= ['usertaskID', 'taskName','taskCategory','taskType','taskArea'];
$fetchDataSummary = fetchDataSummary($db, $tableName, $columns, $username);

function fetchDataSummary($db, $tableName, $columns, $username){
  if(empty($db)){
   $msg= "Database connection error";
  }elseif (empty($columns) || !is_array($columns)) {
   $msg="columns Name must be defined in an indexed array";
  }elseif(empty($tableName)){
    $msg= "Table Name is empty";
 }else{
 $columnName = implode(", ", $columns);
 $Department = $_SESSION['userDept'];

 

  $query = "SELECT * FROM `users` WHERE `Department` = '$Department' AND userlevel='PIC' ORDER BY username ASC;";


//  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
//  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
 $result = $db->query($query);
 if($result== true){ 
  if ($result->num_rows > 0) {
     $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
     $msg= $row;
  } else {
     $msg= "No Data Found"; 
  }
 }else{
   $msg= mysqli_error($db);
 }
 }
 return $msg;
 }


$todaySummary = $_SESSION['dateStarted'];
$todayEndSummary = $_SESSION['dateEnded'];

$todayMonthly = date('F j, Y', strtotime($todaySummary));
$todayEndMonthly = date('F j, Y', strtotime($todayEndSummary));

 
$html = '   <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Summary Report</title>
            </head>
            <body>
                <div>
          
                <h5 style="margin: 0; padding: 0;">Summary Report for Task Monitoring</h5>
                <h5 style="margin: 0; padding: 0;">Date from '.$todayMonthly.' to '.$todayEndMonthly.'</h5>



                    
                   
                </div>
                <table style="margin-top: 20px; width: 100%; text-align: center; border-collapse: collapse;">
                    <thead>
                        <tr style="font-size: 11px; border: 1px solid black; font-size: 12px;">
                        <th class="table-light" scope="col" colspan="2" style=" border: 1px solid black;"> </th>

                        <th   scope="col" colspan="2" style=" border: 1px solid black;">Daily</th>
                        <th  scope="col" colspan="2" style=" border: 1px solid black;">Weekly</th>
                        <th  scope="col" colspan="2" style=" border: 1px solid black;">Monthly</th>
                        <th  scope="col" colspan="2" style=" border: 1px solid black;">Annual</th>

                        </tr>
                        
                        <tr class="table-dark text-center" >
                        <th style=" border: 1px solid black;" >#</th>
                        <th style=" border: 1px solid black;" >In charge</th>
                        <th style=" border: 1px solid black;" >No. of ontime (1pt)</th>
                        <th  style=" border: 1px solid black;">No. of late (0.5pt)</th>
                        <th style=" border: 1px solid black;" >No. of ontime (1pt)</th>
                        <th style=" border: 1px solid black;"  >No. of late (0.5pt)</th>
                        <th style=" border: 1px solid black;"  >No. of ontime (1pt)</th>
                        <th style=" border: 1px solid black;" >No. of late (0.5pt)</th>
                        <th  style=" border: 1px solid black;"  >No. of ontime (1pt)</th>
                        <th style=" border: 1px solid black;"  >No. of late (0.5pt)</th>
            
<!-- find -->
                      </tr>
                    </thead>
                    <tbody>
                    
                  ';

                  
                  if(is_array($fetchDataSummary)){      
                    $sn=1;
                  foreach($fetchDataSummary as $data){

                    $PIC = $data['f_name'];
                    $UserID = $data['userid'];
                     $username = $data['username'];
                    $TotalPointsEarned = 0;
                    // echo("<script>console.log('taskname : " . $taskname. "');</script>");
                    
                    $html .= '
                    <tr style=" border: 1px solid black;"  class="table-dark text-center">
                    <td style=" border: 1px solid black;" class="table-light">'.$sn.'</td>
                    <td style=" border: 1px solid black;" class="table-light">'.$PIC.'</td>
                    <td style=" border: 1px solid black;" name="noOfOnTimeDaily" class="table-light">';
                    $StartDateSelected = new DateTime($todaySummary);
                    $startDATE =  $StartDateSelected->format('Y-m-d'); 

                  $DateNowAndToday = new DateTime($todayEndSummary);  
                  $endDATE =  $DateNowAndToday->format('Y-m-d');

                   $countSummary = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '1' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                   $result = mysqli_query($con, $countSummary);
                   while($userRow = mysqli_fetch_assoc($result)){
                   $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                   }
                   $html .= ''.$totalNumberOfScore1 .'';

                   $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
  $html .= '    
               </td>
  
               <td style=" border: 1px solid black;" name="noOfLateDaily" class="table-light">
                 ';
                 $StartDateSelected = new DateTime($todaySummary);
                 $startDATE =  $StartDateSelected->format('Y-m-d'); 

               $DateNowAndToday = new DateTime($todayEndSummary);  
               $endDATE =  $DateNowAndToday->format('Y-m-d');

                $countSummary = "SELECT COUNT(score) as TotalNumberOf1 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '0.5' AND `sched_Type` = 'daily' AND  `realDate` BETWEEN '$startDATE' AND '$endDATE';";
                $result = mysqli_query($con, $countSummary);
                while($userRow = mysqli_fetch_assoc($result)){
                $totalNumberOfScore1 = $userRow['TotalNumberOf1'];
                }
                $html .= ''. $totalNumberOfScore1 .'';
                $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
                $html .= '  
    </td>




           <td style=" border: 1px solid black;" class="table-light" name="noOfOntimeWeekly">';

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
          $html .= ' '. $totalNumberOfScore1.'';
          
          $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

          $html .= '      </td>
  
   
          <td style=" border: 1px solid black;" class="table-light" name="noOfLateWeekly">
        ';
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
              $html .= ' '. $totalNumberOfScore1.'';
              $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
              $html .= '
     </td>

          <td  style=" border: 1px solid black;" class="table-light" name="noOfMonthly">
          ';
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
              $html .= ' '.$totalNumberOfScore1.'';
              $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
          
              $html .= ' 
          </td>
          
          <td style=" border: 1px solid black;" class="table-light" name="noOfLateMonthly">
          ';
          
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
    $html .= ' '.$totalNumberOfScore1.'';
    $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;
    $html .= ' 
</td>
<td  style=" border: 1px solid black;" class="table-light" name="noOfAnnual">
';

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
   $html .= ' '.$totalNumberOfScore1.'';
   $TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

   $html .= ' 
</td>
<td style=" border: 1px solid black;" class="table-light" name="noOfLateAnnual">
';
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
$todayAnnual = date('F j, Y', strtotime($April));
$todayEndAnnual = date('F j, Y', strtotime($March));
$April = new DateTime($todayAnnual);  $April =  $April->format('Y-m-d');
$March = new DateTime($todayEndAnnual);  $March =  $March->format('Y-m-d');

$countAnnual = "SELECT COUNT(score) as TotalNumberOfp5 FROM `finishedtask` WHERE `in_charge` = '$username' AND  `score` = '0.5' AND `sched_Type` = 'annual' AND   `realDate` BETWEEN '$April' AND '$March';"; 
$result = mysqli_query($con, $countAnnual);
while($userRow = mysqli_fetch_assoc($result)){
 $totalNumberOfScore1 = $userRow['TotalNumberOfp5'];
}
$html .= ''.$totalNumberOfScore1.'';
// $totalNumberOfScore1 = $totalNumberOfScore1 * 0.5;
$TotalPointsEarned = $TotalPointsEarned + $totalNumberOfScore1;

$html .= ' 
</td>
</tr>
';
                    $sn++;}
                }
                else{
                    $html .= '
                <tr>
                <td colspan="8">';
                $html .= ' '.$fetchDataSummary.''; 
                 $html .= '
                </td>
                </tr>
                ';
                $html .= 'No data found';
                }     
    $html .= '    
                    </tbody>
                    </table>
                    ';


                    $html .='
                    <table style=" margin-top: 20px; width: 100%; text-align: center; border-collapse: collapse;">
                        
                    <thead  class="text-center">

                        <tr class="table-dark" style="border: 1px solid black;">
                        <th class="table-light" style="border: 1px solid black;">#</th>

                          <th class="table-light" style="border: 1px solid black;">In charge</th>
                          <th class="table-light" style="border: 1px solid black;">Total No of ontime (1pt)</th>
                          <th class="table-light" style="border: 1px solid black;">Total No. of Late (0.5pt)</th>
                          <th class="table-light" style="border: 1px solid black;">Total points earned</thcess>
                          <th class="table-light" style="border: 1px solid black;">Target points</th>
                          <th class="table-light" style="border: 1px solid black;">Progress</th>

                        </tr>
                     

                        
                        </thead>
                        <tbody  class="table-dark text-center">
';
             

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
                              $html .='
                              <tr style="border: 1px solid black;" class="table-dark text-center">
                              <td style="border: 1px solid black;" class="table-light"> '.$sn.'</td>
                              <td style="border: 1px solid black;" class="table-light">'.$PIC.'</td>
                              
                              <td style="border: 1px solid black;"class="table-light">';
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
          
                                          
          
          
          
                                             $html .=''. $TotalPointsOntimeEarned.'';
                                             $html .='  </td>
          
                          <td style="border: 1px solid black;"class="table-light">';     
                          
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
            

            $html .=''. $TotalPointsLateEarned.''; 
                
                
            $html .='</td>
            <td  style="border: 1px solid black;"class="table-light">';
            
            $TotalPointsEarnedForSelectedDate = $TotalPointsOntimeEarned + ($TotalPointsLateEarned *0.5);
            $html .=''.$TotalPointsEarnedForSelectedDate.'';
            $html .=' </td>


  <td  style="border: 1px solid black;"class="table-light">';
  
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
     // echo $finalDiffs;
     // echo " ";
     if($END < $dateAdded){
      $finalDiffs = 0;
  }
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

            $START = date('Y-m-d', strtotime($todaySummary));
            $END = date('Y-m-d', strtotime($todayEndSummary));
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
// $holidays = array('2022-07-15');
include ("./holidays.php");

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
if($END < $dateAdded){
  $finalDiffs = 0;
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
// $holidays = array('2022-07-15');
include ("./holidays.php");

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
if($END < $dateAdded){
  $finalDiffs = 0;
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
    $html .=''.$TARGETPOINTS.'';
    // echo $noOfDailyTask + $noOfWeeklyTask + $noOfMonthlyTask ;
    $html .='</td>';
    $html.='
  <td style="border: 1px solid black;" class="table-dark text-center"> ';  
  if($TotalPointsEarnedForSelectedDate == 0 || $TARGETPOINTS==0){
    $TotalPercentage=0;
  }
  else{
  $TotalPercentage = ($TotalPointsEarnedForSelectedDate / $TARGETPOINTS)* 100;
    
  }
 //  echo round($TotalPercentage).'%';
 $html .=''.round($TotalPercentage).'%'; 
             $html .='
           


</td>



</tr>
';
$sn++;     

}}else{ 
     $html .='
<tr style="border: 1px solid black;">
 <td colspan="8">
';
$html .=''. $fetchDataSummary.'';
$html .='
</td>
</tr>
';
$html .='No data found';
}                    
$html .='     
</tbody>

            
                    </table>
                    ';

                   
    
$html .= '  </body>
            </html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('Summary-Report.pdf', ['Attachment' => 0]);
?>