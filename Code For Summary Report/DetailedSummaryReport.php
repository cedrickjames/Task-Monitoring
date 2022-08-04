<div class="overflow-x">
                      <div class="overflow-y" style="overflow-y: scroll; height:580px;"> 
                      <table class="table table-bordered" class="table datacust-datatable Table ">
                        <thead  style="position: sticky; top: -1px;">
                        <tr class="table-dark text-center" style="border-width: 0px" >
                            <th scope="col" colspan="10">
                              <div class="col-sm-4" style="padding: 0; margin: 0 auto" >
                          <div class="form-group row d-flex justify-content-center" >
                          <form action="leader.php" method = "POST" >
                          <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">Start</label>
                          
                          <input type="date" id="datepickerProgWeekly" value="<?php $startDate = new DateTime($todayWeekly);  $startDATE =  $startDate->format('Y-m-d'); echo $startDATE ?>" name="datepickerProgWeekly" style="margin-right: 20px" onchange="filterMonth();">
                          <label for="colFormLabelLg" class="col-form-label-lg" style="margin-right: 10px">End</label>
                          
                          <input type="date" id="datepickerEndProgWeekly" value="<?php $endDate = new DateTime($todayEndWeekly);  $endDate =  $endDate->format('Y-m-d'); echo $endDate ?>" name="datepickerEndProgWeekly" onchange="filterMonth();">
                          <button type="submit" name="submitdateProgWeekly" class="btn btn-info btn-sm">Submit</button>
                          <button type="button" class="btn btn-outline-success btn-sm" onclick="exportData()"> <i style="font-size: 20px;"class="fas fa-file-csv fa-xs"></i> Export</button>
                                      
                          <!-- <input type="submit" name="submitdate"> -->
                          </form>
                        
                      </div></div> </th>
                          </tr>
                          <tr class="table-dark">
                          <th class="table-light" scope="col" colspan="2" style=" border-bottom: 0px"> </th>

                            <th  class="table-info" scope="col" colspan="2" style=" border-bottom: 0px">Daily</th>
                            <th class="table-warning" scope="col" colspan="2" style=" border-bottom: 0px">Weekly</th>
                            <th class="table-success" scope="col" colspan="2" style=" border-bottom: 0px">Monthly</th>


                          </tr>
                       

                          <tr class="table-dark text-center" >
                              <th class="table-light">#</th>
                              <th class="table-light">In charge</th>
                              <th class="table-info">No. of ontime (1pt)</th>
                              <th class="table-info">No. of late (0.5pt)</th>
                              <th class="table-warning">No. of ontime (1pt)</th>
                              <th class="table-warning">No. of late (0.5pt)</th>
                              <th class="table-success" >No. of ontime (1pt)</th>
                              <th class="table-success">No. of late (0.5pt)</th>
                  
<!-- find -->
                            </tr>
                          </thead>
                          <tbody>


                          </tbody>

                          <br>
                          <br>
                            <tr class="table-dark text-center" >
                              <th class="table-light">#</th>
                              <th class="table-light">In charge</th>
                              <th class="table-info">No. of ontime (1pt)</th>
                              <th class="table-info">No. of late (0.5pt)</th>
                              <th class="table-warning">Total Points Earned</th>
                              <th class="table-warning">Target Points</th>
                              <th class="table-success" >Progress</th>
                             
                  
<!-- find -->
                            </tr>
                            <tbody>


</tbody>
                   
                          
                         
                        
                      </table>
                      </div>
                    </div>