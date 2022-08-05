<?php if(isset($_POST['submitdateProgDaily'])){
    $datePickerDaily = $_POST['datepickerProgDaily'];
  $datePickerEndDaily = $_POST['datepickerEndProgDaily'];
 
 
     $monthDaily = date('F', strtotime($datePickerDaily));
     $monthEndDaily = date('F', strtotime($datePickerEndDaily));
 
     $yearDaily = date('Y', strtotime($datePickerDaily));
     $yearEndDaily = date('Y', strtotime($datePickerEndDaily));
 
     $todayDaily = date('F j, Y', strtotime($datePickerDaily));
     $todayEndDaily = date('F j, Y', strtotime($datePickerEndDaily));
 
 
     $datePickergetDaily = $datePickerDaily;
     $datePickergetEndDaily = $datePickerEndDaily;
 
     $date_stringDaily= date('Y-m-d', strtotime($datePickergetDaily));
     $date_stringEndDaily= date('Y-m-d', strtotime($datePickergetEndDaily));
 
     
     
   $dateToPassDaily = date('Y-m-d', strtotime($datePickerDaily));
   $dateToPassEndDaily = date('Y-m-d', strtotime($datePickerEndDaily));
 
   $dailyfocus = "true";
 
    
   $date = new DateTime($todayDaily);
    $dateEnd = new DateTime($todayEndDaily);

    $DateNowAndToday =  $dateEnd->format('Y-m-d');
    $StartDateSelected = $date->format('Y-m-d');


    $TaskActive = "";
    $MembersActive = "active";

    $dailyChecked = "checked";
    $weeklyChecked = "";
    $monthlyChecked = "";

    
     }
     ?>