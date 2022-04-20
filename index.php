<?php
  session_start();
  include ("./connection.php");
  $db= $con;
$tableName="usertask";
    if(!isset( $_SESSION['connected'])){
    

      header("location: signin.php");
  
      // 
    }

$message = ''; 

if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    echo("<script>console.log('FILE NAME: " .$newFileName . "');</script>");
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'pdf');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
      echo("<script>console.log('FILE LOCATION: " .$dest_path . "');</script>");
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}

$_SESSION['message'] = $message;

    if(isset($_GET['Finish'])){
      $date_string= date("Y-m-d");
    echo("<script>console.log('Week: " . weekOfMonth($date_string) . "');</script>");
    $taskID = $_GET['Finish'];
    echo("<script>console.log('USer Task Id: " .$taskID . "');</script>");

    // $sqlinsert = "INSERT INTO `finishedtask`(`userid`, `username`, `taskName`, `taskCategory`, `taskType`) VALUES ('$resultUserId1','$enteredUserName','$taskname','$taskCategory','$taskType');";
    $selectUserTask = "SELECT * FROM `usertask` WHERE usertaskID = '$taskID' LIMIT 1";
                $result = mysqli_query($con, $selectUserTask);
                
                while($userRow = mysqli_fetch_assoc($result)){
            
                  $usertaskID = $userRow['usertaskID'];
                  $taskType = $userRow['taskType'];
                  $taskCategory = $userRow['taskCategory'];
                  $taskName = $userRow['taskName'];
                  $incharge = $userRow['username'];
              }
              $today = date("F j, Y");
              $month = date("F");
              $year = date("Y");
              $week = 'week '.weekOfMonth($date_string);

    $sqlinsert = "INSERT INTO `finishedtask`(`FinishedTaskID`, `taskID`, `Date`, `task_Name`, `in_charge`, `sched_Type`, `month`, `week`, `attachments`, `year`) VALUES ('','$usertaskID',' $today','$taskName','$incharge',' $taskType','$month','$week','sample', $year);";
    mysqli_query($con, $sqlinsert);


    }






    
    // $_SESSION['username'] = $username;
    // echo "User: " .$_SESSION['username']. "."  ;
    // echo "<script>console.log('$_SESSION['username']')</script>";
    echo("<script>console.log('USER: " .$_SESSION['username'] . "');</script>");
    echo("<script>console.log('USER: " .$_SESSION['userlevel'] . "');</script>");
    // echo("<script>console.log('as,fjhaekjlh');</script>");
    $today = date("F j, Y"); 
    $date_string= date("Y-m-d");
    $username =  $_SESSION['username'];
    echo("<script>console.log('USER: " .$username . "');</script>");

    $columns= ['usertaskID', 'taskName','taskCategory','taskType'];
    $fetchData = fetch_data($db, $tableName, $columns, $username);


    function fetch_data($db, $tableName, $columns, $username){
      if(empty($db)){
       $msg= "Database connection error";
      }elseif (empty($columns) || !is_array($columns)) {
       $msg="columns Name must be defined in an indexed array";
      }elseif(empty($tableName)){
        $msg= "Table Name is empty";
     }else{
     $columnName = implode(", ", $columns);
     $query = "SELECT * FROM `usertask`  WHERE `username` = '$username';";
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

     function weekOfMonth($qDate) {
      $dt = strtotime($qDate);
      $day  = date('j',$dt);
      $month = date('m',$dt);
      $year = date('Y',$dt);
      $totalDays = date('t',$dt);
      $weekCnt = 1;
      $retWeek = 0;
      for($i=1;$i<=$totalDays;$i++) {
          $curDay = date("N", mktime(0,0,0,$month,$i,$year));
          if($curDay==7) {
              if($i==$day) {
                  $retWeek = $weekCnt+1;
              }
              $weekCnt++;
          } else {
              if($i==$day) {
                  $retWeek = $weekCnt;
              }
          }
      }
      return $retWeek;
  }
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1.0">

    <title>Main Page</title>

     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
     <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="design_files/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="design_files/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="./js/bootstrap.min.js"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="">
    
  <link rel="stylesheet" href="fontawesome-free-5.15.3-web/fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="design_files/css/MainPageStyle.css">
<link rel="stylesheet" href="design_files/css/ListOfMembersStyle.css">


<script type="text/javascript" src="./js/jquery.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

<!-- <script type="text/javascript" src="./js/node_modules/jquery/dist/jquery.slim.min.js"></script> -->

</head>
    <body>
      <div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#"> <img src="design_files/images/GloryPhLogo.jpg" alt="..." height="40">&nbsp;MIS Monitoring App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
             data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li> -->
                
                <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    Option
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown"  style="right: 0; left: auto;">
                  <a class="dropdown-item" id="btn-addAdmin" href="./signup.php" >Register User</a>
                  <a class="dropdown-item" id="btn-addAdmin" href="./addTask.php" >Add Task</a>
                  <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalAdmin'>Add Admin</a>
                  <a class="dropdown-item" id="btn-addAdmin" href="#"data-toggle='modal' data-target='#modalRemoveAdmin'>Remove Admin</a>
                  <a class="dropdown-item" id="btn-logout" href="./logout.php">Logout</a>


                    
                   
                  </div>
                </li>
                
              </ul>
            </div>
          </nav>
        </div>
        <div class="modal fade" id="modalRemoveAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Remove Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="passwordform" style="width: 100%; padding: 10px; border: 0;" >
                  <div class="form-group">
                    <ul id="adminList">
                      <!-- <li>CEdrick</li>
                      <li>CEdrick</li>
                      <li>CEdrick</li> -->
  
                    </ul>
                  </div>
                  <div class="form-group">
                    <label  for="message-text" class="col-form-label">Enter email</label>
                      <input  type="text"class="form-control"   id="inputRemoveAdmin" >
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick =" RemoveAdmin();" class="btn btn-primary" data-dismiss="modal">Remove</button>
            
               </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="passwordform" style="width: 100%; padding: 10px; border: 0;" >
                  <div class="form-group">
                    <ul id="adminList2">
                      <!-- <li>CEdrick</li>
                      <li>CEdrick</li>
                      <li>CEdrick</li> -->
  
                    </ul>
                  </div>      
                  <div class="form-group">
                   
                    <label  for="message-text" class="col-form-label">Enter email</label>
                    <input  type="text"class="form-control"   id="inputAdmin" >
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick =" addAdmin();" class="btn btn-primary" data-dismiss="modal">Add</button>
            
               </div>
            </div>
          </div>
        </div>

        <div class="parent">
          <div class="wrapper">
         
          <div class="row" style= "margin-right: 0px " >
          <div class="col">
            <h3 style=" margin: 20px">  <i style="font-size: 30px;" class="fas fa-user"></i>  <?php echo $_SESSION['f_name'] ?> <?php echo $_SESSION['l_name'] ?>
             <span  class="float-right"> <?php echo $_SESSION['userlevel'] ?> </span>  
            </h3>
          </div>
          <div class="col">
            <h3 style=" margin: 20px" class="float-right"> <?php echo $today ?> Week <?php echo weekOfMonth($date_string) ?></h3>
          </div>

          <div class="container p-30" id="TableListOfMembers"; style="position: relative;  height: fit-content;">
        <div class="row">
            <div class="col-md-12 main-datatable"> 
                <div class="card_body">
                    <div class="row d-flex ">
                        <div class="col-sm-3 createSegment"> 
                         <h3>Task</h3> 
                        </div>
                        <div class="col-sm-6 add_flex">
                            <div class="form-group searchInput">
                                <select class="custom-select" id="inputGroupSelect01" onchange="getSelectValue();">
                                    <option  disabled selected hidden>Search by</option>
                                    
                                    <option value="2">Task Name</option>
                                    <option value="3">Type</option>
                                    <option value="3">Category</option>
                                    <option value="4">Status</option>
                                  </select>
                                <!-- <label for="email">Search:</label> -->
                                <input type="search" class="form-control" id="filterbox" placeholder=" " >
                            </div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:400px;"> 
                        <table style="width:100%;" id="filtertable" class="table datacust-datatable Table">
                            <thead  class="thead-dark">
                                <tr>
                                    <th style="min-width:50px;">No.</th>
                                    <th style="width:30%;" >Task Name</th>
                                    <th style="min-width:100px;" >Type</th>
                                    <th style="min-width:100px;" >Category</th>
                                    <th style="min-width:100px;">Status</th>
                                    <th style="min-width:200px; text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="TaskTable">
                            <?php
                                  if(is_array($fetchData)){      
                                  $sn=1;
                                  foreach($fetchData as $data){
                            ?>
                             <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $data['taskName']??''; ?></td>
                                <td><?php echo $data['taskType']??''; ?></td>
                                <td><?php echo $data['taskCategory']??''; ?></td>
                              <!-- <td>
                                
                              <span class="mode mode_on">Done</span></td>
                              <td> -->
                              <td> <?php
                                $taskID = $data['usertaskID'];
                                $taskType =  $data['taskType'];

                      // echo("<script>console.log('emmeeeememem: " . $taskID. "');</script>");
                      $month = date("F");
                      $year = date("Y");
                      $weeknumberrr = weekOfMonth($date_string);
                      // echo("<script>console.log('hahahah: " .$weeknumberrr. "');</script>");

                      if ($taskType == 'weekly'){
                        $weekMonth = weekOfMonth($date_string);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' AND `week` = 'week $weekMonth';";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    if ($numrows == 1){
                                      echo '<span id = "doneORnot" class="mode mode_on">DONE</span>';
                                         }
                                    
                                    }
                                    else{
                                      $weekMonth = weekOfMonth($date_string);
                                    $selectUserTask = "SELECT * FROM finishedtask WHERE taskID = '$taskID' AND `month` = '$month' AND `year` = '$year' ;";
                                    // SELECT week FROM `finishedtask` WHERE `taskID` = '23';
                                    $result = mysqli_query($con, $selectUserTask);

                                    $numrows = mysqli_num_rows($result);
                                    if ($numrows == 1){
                                      echo '<span class="mode mode_on">DONE</span>';
                                         }
                                    
                                    }
                                 ?></td>
                                 <td>
                                <div class="row">
                                  <div class="col">
                                      <input type="file" name="uploadedFile<?php echo $data['usertaskID'] ?>" class="form-control" style="width: 180px; height: 30px; font-size: 10px; padding-top:0px" id="file<?php echo $data['usertaskID'] ?>" title=" Select ">
                                    
                                  </div>
                                  <div class="col">
                                      <!-- <a type="button" class="btn btn-outline-primary" style="font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" onclick="sendNotification();sendNotificationAgri()">  Finish</button> -->
                                      <a href="index.php?Finish=<?php echo $data['usertaskID'] ?>" id= "finished<?php echo $data['usertaskID'] ?>"  onclick = "clickFinished()"class="btn btn-outline-primary" style="font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a>
                                    </div>
                                </div>
                              </td>

                                <!-- <td><?php echo $data['taskCategory']??''; ?></td> -->
                              
                             </tr>
                             <?php
                            $sn++;}}else{ ?>
                            <tr>
                              <td colspan="8">
                          <?php echo $fetchData; ?>
                        </td>
                          <tr>
                          <?php
    }?>
                            <!-- Sample Content -->
                            <!-- <tr>
                              <th>1</th>
                              <td>GPSS - Server (Backup & Functionality)</td>
                              <td>Weekly</td>
                              <td><span class="mode mode_on">Done</span></td>
                              <td>
                                <div class="row">
                                  <div class="col">
                                      <input type="file" class="form-control" style="width: 180px; height: 30px; font-size: 10px; padding-top:0px" id="form4docs" title=" Select ">
                                    
                                  </div>
                                  <div class="col"> -->
                                      <!-- <a type="button" class="btn btn-outline-primary" style="font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" onclick="sendNotification();sendNotificationAgri()">  Finish</button> -->
                                      <!-- <a href="#" class="btn btn-outline-primary" style="font-size: 15px; padding: 3px; height: 25px;width:60px; margin:0 auto;" >Finish</a>
                                    </div>
                                </div>
                              </td>
                            </tr> -->
                              
                            </tbody>
                        </table>
                      </div>
                    </div>

                    <form method="POST" action="index.php" enctype="multipart/form-data">
    <div class="upload-wrapper">
      <span class="file-name">Choose a file...</span>
      <label for="file-upload">Browse<input type="file" id="file-upload" name="uploadedFile"></label>
    </div>
 
    <input type="submit" id = "uploadsample" name="uploadBtn" value="Upload" />
  </form>
                </div>
            </div>
        </div>
      </div>


      </div>
          </div> 
      
          <!-- <h1> </h1> -->
        
</div>
  
      <script>


function clickFinished(){
    document.getElementById("uploadsample").click();
}



        function getSelectValue()
{
    var e = document.getElementById("inputGroupSelect01");
  
    var text=e.options[e.selectedIndex].text;//get the selected option text
    if(text=='Task Name'){

        let filterInput = document.getElementById('filterbox');
        filterInput.addEventListener('keyup',function(){
            let filterValue=document.getElementById('filterbox').value;
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[1];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
            
        }
        
        );
        
    }
    
    else if (text=='Type'){

        let filterInput = document.getElementById('filterbox');
        filterInput.addEventListener('keyup',function(){
            let filterValue=document.getElementById('filterbox').value;
            var table = document.getElementById('TaskTable');
            let tr = table.querySelectorAll('tr');
            
            for(let index=0; index < tr.length;index++){
                let val = tr[index].getElementsByTagName('td')[2];
                if(val.innerHTML.indexOf(filterValue)> -1){
                    tr[index].style.display='';
        
                }
                else{
                    tr[index].style.display='none';
                }
            }
            
        }
        
        );
    }
    else if (text=='Category'){

let filterInput = document.getElementById('filterbox');
filterInput.addEventListener('keyup',function(){
    let filterValue=document.getElementById('filterbox').value;
    var table = document.getElementById('TaskTable');
    let tr = table.querySelectorAll('tr');
    
    for(let index=0; index < tr.length;index++){
        let val = tr[index].getElementsByTagName('td')[3];
        if(val.innerHTML.indexOf(filterValue)> -1){
            tr[index].style.display='';

        }
        else{
            tr[index].style.display='none';
        }
    }
    
}

);
}
    else if (text=='Status'){

let filterInput = document.getElementById('filterbox');
filterInput.addEventListener('keyup',function(){
    let filterValue=document.getElementById('filterbox').value;
    var table = document.getElementById('TaskTable');
    let tr = table.querySelectorAll('tr');
    
    for(let index=0; index < tr.length;index++){
        let val = tr[index].getElementsByTagName('td')[4];
        if(val.innerHTML.indexOf(filterValue)> -1){
            tr[index].style.display='';

        }
        else{
            tr[index].style.display='none';
        }
    }
    
}

);
}
}
getSelectValue();
        </script>
    </body>
</html>