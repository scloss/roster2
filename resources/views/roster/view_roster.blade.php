<?php 
$session_userid1 = $_SESSION['dashboard_user_id'];
$session_useridArr = explode('.', $session_userid1);
$session_userid = $session_useridArr[0];
//echo $session_userid;
?>
@extends($app)

@section('content')
<script src="{{asset('/js/bootstrap-datepicker.js')}}"></script>
<!-- <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script> -->
<link href="{{asset('/css/roster.css')}}" rel="stylesheet">
<link href="{{asset('/css/datepicker.css')}}" rel="stylesheet">
<!-- <link href="{{asset('/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript">
//   $(document).ready(function() {
//     $('#example').DataTable({
//       "pagingType": "full_numbers"
//     });
// } );
</script>
<style type="text/css">
  #thID {
    text-align:center;
  }
  td{
    text-align:center;
  }
</style>

<div class="dashboard-wrapper">
    <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="widget"> 
                	
                		 <div class="widget-header">
                     <center><h3>Roster of {{$monthListArr[$month-1]}}, {{$year}}</h3></center>
					       <!--  <input type="text"  ng-model="search"  class="form-control input-lg" placeholder="                 Search" required="" id="searchBox" > -->
					           </div>
                     <br>
                     <div class="widget-body">
                  <form action="{{url('viewRoster')}}" method="get">
                      <select name="month" class="dropboxStyle">
                        <?php for($i=0;$i<count($monthListArr);$i++){

                          if($i+1 == $month){
                            ?><option value="<?php echo $i+1; ?>" selected><?php echo $monthListArr[$i]; ?></option><?php
                          }
                          else{
                            ?><option value="<?php echo $i+1; ?>"><?php echo $monthListArr[$i]; ?></option><?php
                          }
                          
                        }?>
                      </select>
                      <select name="year" class="dropboxStyle">
                        <?php for($i=0;$i<count($yearListArr);$i++){
                          if($year == $yearListArr[$i]){
                            ?><option value="<?php echo $yearListArr[$i]; ?>" selected><?php echo $yearListArr[$i]; ?></option><?php
                          }
                          else{
                          ?><option value="<?php echo $yearListArr[$i]; ?>"><?php echo $yearListArr[$i]; ?></option><?php
                          }
                        }?>
                      </select>
                      <select name="viewType" class="dropboxStyle">
                        <?php if($viewType == 'weekly'){
                            ?><option value="weekly" selected>Weekly</option><option value="monthly" >Monthly</option><?php
                          } 
                          else{
                            ?><option value="weekly" >Weekly</option><option value="monthly" selected>Monthly</option><?php
                          }
                          ?>
                      </select>
                      <input type="submit" value=" Load " id="load_full_month">
                    </form>
                    <?php if($isExists == true) {?>
                    <table id="example" class="table table-hover no-margin" ng-app="rosterPool" ng-controller="rosterCtrl">
                        <tr>
                          <th rowspan="2" style="vertical-align:middle; background:#BBDFFF;border:1px solid #fff !important;color:#000;" id="thID">Day</th>
                          <th colspan="5" id="thID" style="background:#A2C573;border:1px solid #fff !important;">Day(7:00 to 15:00)</th>
                          <th colspan="5" id="thID" style="background:#CAC185;border:1px solid #fff !important;">Evening(15:00 to 23:00)</th>
                          <th colspan="5" id="thID" style="background:#CDA9F5;border:1px solid #fff !important;">Night(23:00 to 7:00)</th>
                          @if($app == 'app')
                            <th rowspan="2" style="vertical-align:middle" id="thID">EDIT</th>
                          @endif
                        </tr>
                        <tr>
                          <th id="thID" style="background:#A2C573; border:1px solid #fff !important;">Shift Leader</th>
                          <th id="thID" style="background:#A2C573;border:1px solid #fff !important;">Sur</th>
                          <th id="thID" style="background:#A2C573;border:1px solid #fff !important;">BO</th>
                          <th id="thID" style="background:#A2C573;border:1px solid #fff !important;">IIG</th>
                          <th id="thID" style="background:#A2C573;border:1px solid #fff !important;">ICX</th>
                          <th id="thID" style="background:#CAC185;border:1px solid #fff !important;">Shift Leader</th>
                          <th id="thID" style="background:#CAC185;border:1px solid #fff !important;">Sur</th>
                          <th id="thID" style="background:#CAC185;border:1px solid #fff !important;">BO</th>
                          <th id="thID" style="background:#CAC185;border:1px solid #fff !important;">IIG</th>
                          <th id="thID" style="background:#CAC185;border:1px solid #fff !important;">ICX</th>
                          <th id="thID" style="background:#CDA9F5;border:1px solid #fff !important;">Shift Leader</th>
                          <th id="thID" style="background:#CDA9F5;border:1px solid #fff !important;">Sur</th>
                          <th id="thID" style="background:#CDA9F5;border:1px solid #fff !important;">BO</th>
                          <th id="thID" style="background:#CDA9F5;border:1px solid #fff !important;">IIG</th>
                          <th id="thID" style="background:#CDA9F5;border:1px solid #fff !important;">ICX </th>
                        </tr>
                       	<?php $count =0; $loopCount = 0;?>
                       	<?php for($j=0;$j<$numOfDays;$j++){ ?>
                       		<tr>
                       		<form action="{{ url('editSingleView') }}" method="get">
                            {!! Form::token() !!}
                       		<?php for($i=0;$i<16;$i++){ 
                              if($i == 0){
                                  $dateOnlyArr = explode('<br>', $shiftArray[$count]);
                                  $dateOnly = $dateOnlyArr[0];
                                ?><input type="hidden" id="editDate" name="editDate" value="<?php echo $dateOnly; ?>">
                                <td style="background:#BBDFFF;border:1px solid #fff !important;color:#000;"><h5><b><?php 
                                if($shiftArray[$count]=='s'){
                                  echo "mojumdar";
                                }
                                else{
                                  echo $shiftArray[$count];
                                }             
                                $count++; 
                                ?></b></h5></td><?php
                              }
                              else{ 
                                if($i>0 && $i<6){
                                ?>
                                <td style="background-color:#A2C573"><?php 
                                    if (preg_match('/,/',$shiftArray[$count])){
                                        $strArr = explode(",",$shiftArray[$count]);
                                        for($k=0;$k<count($strArr);$k++){
                                          if($strArr[$k] == $session_userid){
                                          ?><div class="dragUser" style="background:#F5F3A9;"><?php 
                                          if($strArr[$k]=='s'){
                                            echo "mojumdar";
                                          }
                                          else{
                                            echo $strArr[$k];
                                          }
                                          ?></div><?php
                                          }
                                          else{
                                            ?><div class="dragUser" ><?php 
                                            if($strArr[$k]=='s'){
                                              echo "mojumdar";
                                            }
                                            else{
                                              echo $strArr[$k];
                                            }
                                            ?></div><?php
                                          }
                                        }
                                    }
                                    else{
                                      if($shiftArray[$count] == $session_userid){
                                      ?><div class="dragUser" style="background:#F5F3A9;"><?php 
                                      if($shiftArray[$count]=='s'){
                                        echo "mojumdar";
                                      }
                                      else{
                                        echo $shiftArray[$count];
                                      }
                                      ?></div><?php
                                      }
                                      else{
                                        ?><div class="dragUser"><?php 
                                        if($shiftArray[$count]=='s'){
                                          echo "mojumdar";
                                        }
                                        else{
                                          echo $shiftArray[$count];
                                        }
                                        ?></div><?php
                                      }
                                    }
                                    $count++; 
                                    ?></td><?php
                                }
                                elseif($i>5 && $i<11){
                                  ?>
                                <td style="background-color:#CAC185"><?php  
                                    if (preg_match('/,/',$shiftArray[$count])){
                                        $strArr = explode(",",$shiftArray[$count]);
                                        for($k=0;$k<count($strArr);$k++){
                                          if($strArr[$k] == $session_userid){
                                          ?><div class="dragUser"><?php 
                                          if($strArr[$k]=='s'){
                                            echo "mojumdar";
                                          }
                                          else{
                                            echo $strArr[$k];
                                          }
                                          ?></div><?php
                                          }
                                          else{
                                            ?><div class="dragUser" ><?php 
                                            if($strArr[$k]=='s'){
                                              echo "mojumdar";
                                            }
                                            else{
                                              echo $strArr[$k];
                                            } 
                                            ?></div><?php
                                          }
                                        }
                                    }
                                    else{
                                      if($shiftArray[$count] == $session_userid){
                                      ?><div class="dragUser" style="background:#F5F3A9;"><?php 
                                      if($shiftArray[$count]=='s'){
                                        echo "mojumdar";
                                      }
                                      else{
                                        echo $shiftArray[$count];
                                      }
                                      ?></div><?php
                                      }
                                      else{
                                        ?><div class="dragUser"><?php 
                                        if($shiftArray[$count]=='s'){
                                          echo "mojumdar";
                                        }
                                        else{
                                          echo $shiftArray[$count];
                                        }
                                        ?></div><?php
                                      }
                                    }
                                    $count++; 
                                    ?></td><?php
                                }
                                else{
                                  ?><td style="background-color:#CDA9F5"><?php 
                                    if (preg_match('/,/',$shiftArray[$count])){
                                        $strArr = explode(",",$shiftArray[$count]);
                                        for($k=0;$k<count($strArr);$k++){
                                          if($strArr[$k] == $session_userid){
                                          ?><div class="dragUser" style="background:#F5F3A9;"><?php 
                                          if($strArr[$k]=='s'){
                                            echo "mojumdar";
                                          }
                                          else{
                                            echo $strArr[$k];
                                          }
                                          ?></div><?php
                                          }
                                          else{
                                            ?><div class="dragUser"><?php 
                                            if($strArr[$k]=='s'){
                                              echo "mojumdar";
                                            }
                                            else{
                                              echo $strArr[$k];
                                            }
                                            ?></div><?php
                                          }
                                        }
                                    }
                                    else{
                                      if($shiftArray[$count] == $session_userid){
                                      ?><div class="dragUser" style="background:#F5F3A9;"><?php 
                                      if($shiftArray[$count]=='s'){
                                        echo "mojumdar";
                                      }
                                      else{
                                        echo $shiftArray[$count];
                                      }
                                      ?></div><?php
                                      }
                                      else{
                                        ?><div class="dragUser"><?php 
                                        if($shiftArray[$count]=='s'){
                                          echo "mojumdar";
                                        }
                                        else{
                                          echo $shiftArray[$count];
                                        }
                                        ?></div><?php
                                      }
                                    }
                                    $count++; 
                                    ?></td><?php
                                }
                              }
                            ?>	
                       		<?php } ?>
                          
                            @if($app == 'app')
                            <td>
                              <input type="submit" value="EDIT">
                            </td>
                            @endif
                            
                          
                          </form>
                       		</tr>
                       	<?php } ?>
                       
					    <!-- <tr>
					    	<td></td>
					    	
					        <td ng-repeat="x in user" >
					        	@{{x.shift_member}}
					        </td>					   
					    </tr> -->
					</table> 
          <?php } 
          else{
            ?><h3>No Roster Created For this Month</h3><?php 
          }
          ?>
				</div>
        </div>  
			</div>	
	</div>
</div>


<script>
//   var app = angular.module('rosterPool', []);
//   app.controller('rosterCtrl', function($scope, $http) {
//     $http.get("http://localhost:8080/roster2/public/viewRosterData")
//     .then(function (response) {$scope.users = response.data.records;});
//   });
$( document ).ready(function() {
    console.log( "ready!" );
    // document.getElementById("load_full_month").click();
});

</script>

@endsection