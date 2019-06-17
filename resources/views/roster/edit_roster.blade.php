<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");?>
<body>

</body>
@extends($app)

@section('content')
<script src="{{asset('/js/roster-gen-edit.js')}}"></script>
<script src="{{asset('/js/bootstrap-datepicker.js')}}"></script>
<link href="{{asset('/css/roster.css')}}" rel="stylesheet">
<link href="{{asset('/css/datepicker.css')}}" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style type="text/css">
  th,tr,td{
    text-align:center;
  }
  <style>
  .box { border:1px solid black;width:50px;}
  #droppable { width: 200px; height: 30px; padding: 0.5em; float: left; margin: 10px; }
  #droppable1 { width: 200px; height: 30px; padding: 0.5em; float: left; margin: 10px; }
  td{
    border:1px solid black;
  }
</style>
<script type="text/javascript">
  $(function() {
    $("#rosterDate" ).datepicker();
    // $("#rosterDate").change(function() {
    //     var val = $(this).val();
    //     $('#rosterDateValue').text(val);
        
    // });
  });
</script>
<!-- <div id="result" style="color:red">asdf</div> -->

<div class="dashboard-wrapper">
    <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="widget">            
                  <div>
                    <div ng-app="userPool" ng-controller="userCtrl"> 
                      <div class="widget-header">
                          <div ><input type="text"  ng-model="search"  class="form-control input-lg" placeholder="               &#xF002;  Search" required="" id="searchBox" style="width:20%;"></div>
                      </div>
                      <div id="topPool" >
                          <p ng-repeat="user in user_id| filter:search" class="dragUser" value="@{{ user.user_id }}" id="@{{ user.user_id }}" onmouseover='make_draggable(this.id)'>@{{ user.user_id }}</p>
                      </div>
                    </div>
                    <input type="hidden" id="month" name="month" value="{{$month}}">
                    <input type="hidden" id="hyear" name="year" value="{{$year}}"> 
                    <br>
                    <form action="{{url('editRoster')}}" method="get">
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
                      <input type="submit" value=" Load ">
                    </form>
                      
                  </div>
                  <div class="widget-body">
                    <table class="table table-hover no-margin">
                        <tr>
                          <th rowspan="2" style="vertical-align:middle" id="thID">Day</td>
                          <th colspan="5" id="thID">Day(7:00 to 15:00)</td>
                          <th colspan="5" id="thID">Evening(15:00 to 23:00)</td>
                          <th colspan="5" id="thID">Night(23:00 to 7:00)</td>
                        </tr>
                        <tr>
                          <th id="thID">Shift Leader</td>
                          <th id="thID">Sur</td>
                          <th id="thID">BO</td>
                          <th id="thID">IIG</td>
                          <th id="thID">ICX</td>
                          <th id="thID">Shift Leader</td>
                          <th id="thID">Sur</td>
                          <th id="thID">BO</td>
                          <th id="thID">IIG</td>
                          <th id="thID">ICX</td>
                          <th id="thID">Shift Leader</td>
                          <th id="thID">Sur</td>
                          <th id="thID">BO</td>
                          <th id="thID">IIG</td>
                          <th id="thID">ICX</td>
                        </tr>
                        <tr>
                          <td>Saturday</td>
                          <td id="saturdayDayShiftLeader" class="col1">
                              <div id="draggableBoxForShiftPosition1" class="colclass">
                                <div id="droppableBoxForUsers1">
                                </div>
                                <input type="hidden" id="hiddenTextField1">
                                <!-- <button id="droppableBoxForShiftPosition1.hiddenTextField1.droppableBoxForUsers1" class="singleDeleteBtn" onClick="getBtnID(this.id)" >X</button> -->
                              </div>
                          </td>
                          <td id="saturdayDaySur" class="col2">
                              <div id="draggableBoxForShiftPosition2" class="colclass">
                                <div id="droppableBoxForUsers2">
                                </div>
                                <input type="hidden" id="hiddenTextField2">
                                
                              </div>
                          </td>
                          <td id="saturdayDayBO" class="col3">
                              <div id="draggableBoxForShiftPosition3" class="colclass">
                                <div id="droppableBoxForUsers3">
                                </div>
                                <input type="hidden" id="hiddenTextField3">
                                
                              </div>
                          </td>
                          <td id="saturdayDayIIG" class="col4">
                              <div id="draggableBoxForShiftPosition4" class="colclass">
                                <div id="droppableBoxForUsers4">
                                </div>
                                <input type="hidden" id="hiddenTextField4">
                                
                              </div>
                          </td>
                          <td id="saturdayDayICX" class="col5">
                              <div id="draggableBoxForShiftPosition5" class="colclass">
                                <div id="droppableBoxForUsers5">
                                </div>
                                <input type="hidden" id="hiddenTextField5">
                                
                              </div>
                          </td>
<!--**************************************SATURDAY EVENING*************************************************** -->
                          <td id="saturdayEveningShiftLeader" class="col6">
                              <div id="draggableBoxForShiftPosition6" class="colclass">
                                <div id="droppableBoxForUsers6">
                                </div>
                                <input type="hidden" id="hiddenTextField6">
                                
                              </div>
                          </td>
                          <td id="saturdayEveningSur" class="col7">
                              <div id="draggableBoxForShiftPosition7" class="colclass">
                                <div id="droppableBoxForUsers7">
                                </div>
                                <input type="hidden" id="hiddenTextField7">
                                
                              </div>
                          </td>
                          <td id="saturdayEveningBO" class="col8">
                              <div id="draggableBoxForShiftPosition8" class="colclass">
                                <div id="droppableBoxForUsers8">
                                </div>
                                <input type="hidden" id="hiddenTextField8">
                                
                              </div>
                          </td>
                          <td id="saturdayEveningIIG" class="col9">
                              <div id="draggableBoxForShiftPosition9" class="colclass">
                                <div id="droppableBoxForUsers9">
                                </div>
                                <input type="hidden" id="hiddenTextField9">
                                
                              </div>
                          </td>
                          <td id="saturdayEveningICX" class="col10">
                              <div id="draggableBoxForShiftPosition10" class="colclass">
                                <div id="droppableBoxForUsers10">
                                </div>
                                <input type="hidden" id="hiddenTextField10">
                               
                              </div>
                          </td>
<!--**************************************SATURDAY NIGHT*************************************************** -->
                          <td id="saturdayNightShiftLeader" class="col11">
                              <div id="draggableBoxForShiftPosition11" class="colclass">
                                <div id="droppableBoxForUsers11">
                                </div>
                                <input type="hidden" id="hiddenTextField11">
                                
                              </div>
                          </td>
                          <td id="saturdayNightSur" class="col12">
                              <div id="draggableBoxForShiftPosition12" class="colclass">
                                <div id="droppableBoxForUsers12">
                                </div>
                                <input type="hidden" id="hiddenTextField12">
                                
                              </div>
                          </td>
                          <td id="saturdayNightBO" class="col13">
                              <div id="draggableBoxForShiftPosition13" class="colclass">
                                <div id="droppableBoxForUsers13">
                                </div>
                                <input type="hidden" id="hiddenTextField13">
                                
                              </div>
                          </td>
                          <td id="saturdayNightIIG" class="col14">
                              <div id="draggableBoxForShiftPosition14" class="colclass">
                                <div id="droppableBoxForUsers14">
                                </div>
                                <input type="hidden" id="hiddenTextField14">
                                
                              </div>
                          </td>
                          <td id="saturdayNightICX" class="col15">
                              <div id="draggableBoxForShiftPosition15" class="colclass">
                                <div id="droppableBoxForUsers15">
                                </div>
                                <input type="hidden" id="hiddenTextField15">
                                
                              </div>
                          </td>

                        </tr>
           <!--***************************SUNDAY DAY***************************************** -->             
                        <tr>  
                          <td>Sunday</td>
                          <td id="sundayDayShiftLeader" class="col16">
                              <div id="draggableBoxForShiftPosition16" class="colclass">
                                <div id="droppableBoxForUsers16">
                                </div>
                                <input type="hidden" id="hiddenTextField16">
                                
                              </div>
                          </td>
                          <td id="sundayDaySur" class="col17"> 
                              <div id="draggableBoxForShiftPosition17" class="colclass">
                                <div id="droppableBoxForUsers17">
                                </div>
                                <input type="hidden" id="hiddenTextField17">
                                
                              </div>
                          </td>
                          <td id="sundayDayBO" class="col18">
                              <div id="draggableBoxForShiftPosition18" class="colclass">
                                <div id="droppableBoxForUsers18">
                                </div>
                                <input type="hidden" id="hiddenTextField18">
                                
                              </div>
                          </td>
                          <td id="sundayDayIIG" class="col19">
                              <div id="draggableBoxForShiftPosition19" class="colclass">
                                <div id="droppableBoxForUsers19">
                                </div>
                                <input type="hidden" id="hiddenTextField19">
                                
                              </div>
                          </td>
                          <td id="sundayDayICX" class="col20">
                              <div id="draggableBoxForShiftPosition20" class="colclass">
                                <div id="droppableBoxForUsers20">
                                </div>
                                <input type="hidden" id="hiddenTextField20">
                                
                              </div>
                          </td>
<!--*****************************************SUNDAY EVENING************************************************ -->
                          <td id="sundayEveningShiftLeader" class="col21">
                              <div id="draggableBoxForShiftPosition21" class="colclass">
                                <div id="droppableBoxForUsers21">
                                </div>
                                <input type="hidden" id="hiddenTextField21">
                                
                              </div>
                          </td>
                          <td id="sundayEveningSur" class="col22">
                              <div id="draggableBoxForShiftPosition22" class="colclass">
                                <div id="droppableBoxForUsers22">
                                </div>
                                <input type="hidden" id="hiddenTextField22">
                                
                              </div>
                          </td>
                          <td id="sundayEveningBO" class="col23">
                              <div id="draggableBoxForShiftPosition23" class="colclass">
                                <div id="droppableBoxForUsers23">
                                </div>
                                <input type="hidden" id="hiddenTextField23">
                                
                              </div>
                          </td>
                          <td id="sundayEveningIIG" class="col24">
                              <div id="draggableBoxForShiftPosition24" class="colclass">
                                <div id="droppableBoxForUsers24">
                                </div>
                                <input type="hidden" id="hiddenTextField24">
                                
                              </div>
                          </td>
                          <td id="sundayEveningICX" class="col25">
                              <div id="draggableBoxForShiftPosition25" class="colclass">
                                <div id="droppableBoxForUsers25">
                                </div>
                                <input type="hidden" id="hiddenTextField25">
                                
                              </div>
                          </td>
<!--**********************************************SUNDAY NIGHT******************************************* -->
                          <td id="sundayNightShiftLeader" class="col26">
                              <div id="draggableBoxForShiftPosition26" class="colclass">
                                <div id="droppableBoxForUsers26">
                                </div>
                                <input type="hidden" id="hiddenTextField26">
                                
                              </div>
                          </td>
                          <td id="sundayNightSur" class="col27">
                              <div id="draggableBoxForShiftPosition27" class="colclass">
                                <div id="droppableBoxForUsers27">
                                </div>
                                <input type="hidden" id="hiddenTextField27">
                                
                              </div>
                          </td>
                          <td id="sundayNightBO" class="col28">
                              <div id="draggableBoxForShiftPosition28" class="colclass">
                                <div id="droppableBoxForUsers28">
                                </div>
                                <input type="hidden" id="hiddenTextField28">
                                
                              </div>
                          </td>
                          <td id="sundayNightIIG" class="col29">
                              <div id="draggableBoxForShiftPosition29" class="colclass">
                                <div id="droppableBoxForUsers29">
                                </div>
                                <input type="hidden" id="hiddenTextField29">
                                
                              </div>
                          </td>
                          <td id="sundayNightICX" class="col30">
                              <div id="draggableBoxForShiftPosition30" class="colclass">
                                <div id="droppableBoxForUsers30">
                                </div>
                                <input type="hidden" id="hiddenTextField30">
                                
                              </div>
                          </td>
                        </tr>
         <!--***************************MONDAY DAY***************************************** -->                  
                        <tr>
                          <td>Monday</td>
                          <td id="mondayDayShiftLeader" class="col31">
                              <div id="draggableBoxForShiftPosition31" class="colclass">
                                <div id="droppableBoxForUsers31">
                                </div>
                                <input type="hidden" id="hiddenTextField31">
                                
                              </div>
                          </td>
                          <td id="mondayDaySur" class="col32">
                              <div id="draggableBoxForShiftPosition32" class="colclass">
                                <div id="droppableBoxForUsers32">
                                </div>
                                <input type="hidden" id="hiddenTextField32">
                                
                              </div>
                          </td>
                          <td id="mondayDayBO" class="col33">
                              <div id="draggableBoxForShiftPosition33" class="colclass">
                                <div id="droppableBoxForUsers33">
                                </div>
                                <input type="hidden" id="hiddenTextField33">
                                
                              </div>
                          </td>
                          <td id="mondayDayIIG" class="col34">
                              <div id="draggableBoxForShiftPosition34" class="colclass">
                                <div id="droppableBoxForUsers34">
                                </div>
                                <input type="hidden" id="hiddenTextField34">
                                
                              </div>
                          </td>
                          <td id="mondayDayICX" class="col35">
                              <div id="draggableBoxForShiftPosition35" class="colclass">
                                <div id="droppableBoxForUsers35">
                                </div>
                                <input type="hidden" id="hiddenTextField35">
                                
                              </div>
                          </td>
<!--****************************************MONDAY EVENING************************************************* -->
                          <td id="mondayEveningShiftLeader" class="col36">
                              <div id="draggableBoxForShiftPosition36" class="colclass">
                                <div id="droppableBoxForUsers36">
                                </div>
                                <input type="hidden" id="hiddenTextField36">
                                
                              </div>
                          </td>
                          <td id="mondayEveningSur" class="col37">
                              <div id="draggableBoxForShiftPosition37" class="colclass">
                                <div id="droppableBoxForUsers37">
                                </div>
                                <input type="hidden" id="hiddenTextField37">
                                
                              </div>
                          </td>
                          <td id="mondayEveningBO" class="col38">
                              <div id="draggableBoxForShiftPosition38" class="colclass">
                                <div id="droppableBoxForUsers38">
                                </div>
                                <input type="hidden" id="hiddenTextField38">
                                
                              </div>
                          </td>
                          <td id="mondayEveningIIG" class="col39">
                              <div id="draggableBoxForShiftPosition39" class="colclass">
                                <div id="droppableBoxForUsers39">
                                </div>
                                <input type="hidden" id="hiddenTextField39">
                                
                              </div>
                          </td>
                          <td id="mondayEveningICX" class="col40">
                              <div id="draggableBoxForShiftPosition40" class="colclass">
                                <div id="droppableBoxForUsers40">
                                </div>
                                <input type="hidden" id="hiddenTextField40">
                                
                              </div>
                          </td>
<!--********************************************MONDAY NIGHT********************************************* -->
                          <td id="mondayNightShiftLeader" class="col41">
                              <div id="draggableBoxForShiftPosition41" class="colclass">
                                <div id="droppableBoxForUsers41">
                                </div>
                                <input type="hidden" id="hiddenTextField41">
                                
                              </div>
                          </td>
                          <td id="mondayNightSur" class="col42">
                              <div id="draggableBoxForShiftPosition42" class="colclass">
                                <div id="droppableBoxForUsers42">
                                </div>
                                <input type="hidden" id="hiddenTextField42">
                                
                              </div>
                          </td>
                          <td id="mondayNightBO" class="col43">
                              <div id="draggableBoxForShiftPosition43" class="colclass">
                                <div id="droppableBoxForUsers43">
                                </div>
                                <input type="hidden" id="hiddenTextField43">
                                
                              </div>
                          </td>
                          <td id="mondayNightIIG" class="col44">
                              <div id="draggableBoxForShiftPosition44" class="colclass">
                                <div id="droppableBoxForUsers44">
                                </div>
                                <input type="hidden" id="hiddenTextField44">
                                
                              </div>
                          </td>
                          <td id="mondayNightICX" class="col45">
                              <div id="draggableBoxForShiftPosition45" class="colclass">
                                <div id="droppableBoxForUsers45">
                                </div>
                                <input type="hidden" id="hiddenTextField45">
                                
                              </div>
                          </td>
                        </tr>
    <!--***************************TUESDAY DAY***************************************** -->   
                        <tr>  
                          <td>Tuesday</td>
                          <td id="tuesdayDayShiftLeader" class="col46">
                              <div id="draggableBoxForShiftPosition46" class="colclass">
                                <div id="droppableBoxForUsers46">
                                </div>
                                <input type="hidden" id="hiddenTextField46">
                                
                              </div>
                          </td>
                          <td id="tuesdayDaySur" class="col47">
                              <div id="draggableBoxForShiftPosition47" class="colclass">
                                <div id="droppableBoxForUsers47">
                                </div>
                                <input type="hidden" id="hiddenTextField47">
                                
                              </div>
                          </td>
                          <td id="tuesdayDayBO" class="col48">
                              <div id="draggableBoxForShiftPosition48" class="colclass">
                                <div id="droppableBoxForUsers48">
                                </div>
                                <input type="hidden" id="hiddenTextField48">
                                
                              </div>
                          </td>
                          <td id="tuesdayDayIIG" class="col49">
                              <div id="draggableBoxForShiftPosition49" class="colclass">
                                <div id="droppableBoxForUsers49">
                                </div>
                                <input type="hidden" id="hiddenTextField49">
                                
                              </div>
                          </td>
                          <td id="tuesdayDayICX" class="col50">
                              <div id="draggableBoxForShiftPosition50" class="colclass">
                                <div id="droppableBoxForUsers50">
                                </div>
                                <input type="hidden" id="hiddenTextField50">
                                
                              </div>
                          </td>
<!--*************************************TUESDAY EVENING**************************************************** -->
                          <td id="tuesdayEveningShiftLeader" class="col51">
                              <div id="draggableBoxForShiftPosition51" class="colclass">
                                <div id="droppableBoxForUsers51">
                                </div>
                                <input type="hidden" id="hiddenTextField51">
                                
                              </div>
                          </td>
                          <td id="tuesdayEveningSur" class="col52">
                              <div id="draggableBoxForShiftPosition52" class="colclass">
                                <div id="droppableBoxForUsers52">
                                </div>
                                <input type="hidden" id="hiddenTextField52">
                                
                              </div>
                          </td>
                          <td id="tuesdayEveningBO" class="col53">
                              <div id="draggableBoxForShiftPosition53" class="colclass">
                                <div id="droppableBoxForUsers53">
                                </div>
                                <input type="hidden" id="hiddenTextField53">
                                
                              </div>
                          </td>
                          <td id="tuesdayEveningIIG" class="col54">
                              <div id="draggableBoxForShiftPosition54" class="colclass">
                                <div id="droppableBoxForUsers54">
                                </div>
                                <input type="hidden" id="hiddenTextField54">
                                
                              </div>
                          </td>
                          <td id="tuesdayEveningICX" class="col55">
                              <div id="draggableBoxForShiftPosition55" class="colclass">
                                <div id="droppableBoxForUsers55">
                                </div>
                                <input type="hidden" id="hiddenTextField55">
                                
                              </div>
                          </td>
<!--****************************************TUESDAY NIGHT************************************************* -->
                          <td id="tuesdayNightShiftLeader" class="col56">
                              <div id="draggableBoxForShiftPosition56" class="colclass">
                                <div id="droppableBoxForUsers56">
                                </div>
                                <input type="hidden" id="hiddenTextField56">
                                
                              </div>
                          </td>
                          <td id="tuesdayNightSur" class="col57">
                              <div id="draggableBoxForShiftPosition57" class="colclass">
                                <div id="droppableBoxForUsers57">
                                </div>
                                <input type="hidden" id="hiddenTextField57">
                                
                              </div>
                          </td>
                          <td id="tuesdayNightBO" class="col58">
                              <div id="draggableBoxForShiftPosition58" class="colclass">
                                <div id="droppableBoxForUsers58">
                                </div>
                                <input type="hidden" id="hiddenTextField58">
                               
                              </div>
                          </td>
                          <td id="tuesdayNightIIG" class="col59">
                              <div id="draggableBoxForShiftPosition59" class="colclass">
                                <div id="droppableBoxForUsers59">
                                </div>
                                <input type="hidden" id="hiddenTextField59">
                               
                              </div>
                          </td>
                          <td id="tuesdayNightICX" class="col60">
                              <div id="draggableBoxForShiftPosition60" class="colclass">
                                <div id="droppableBoxForUsers60">
                                </div>
                                <input type="hidden" id="hiddenTextField60">
                                
                              </div>
                          </td>
                        </tr>
            <!--  ***************************************WEDNESDAY DAY**********************-->            
                        <tr>  
                          <td>Wednesday</td>
                          <td id="wednesdayDayShiftLeader" class="col61">
                              <div id="draggableBoxForShiftPosition61" class="colclass">
                                <div id="droppableBoxForUsers61">
                                </div>
                                <input type="hidden" id="hiddenTextField61">
                                
                              </div>
                          </td>
                          <td id="wednesdayDaySur" class="col62">
                              <div id="draggableBoxForShiftPosition62" class="colclass">
                                <div id="droppableBoxForUsers62">
                                </div>
                                <input type="hidden" id="hiddenTextField62">
                                
                              </div>
                          </td>
                          <td id="wednesdayDayBO" class="col63">
                              <div id="draggableBoxForShiftPosition63" class="colclass">
                                <div id="droppableBoxForUsers63">
                                </div>
                                <input type="hidden" id="hiddenTextField63">
                                
                              </div>
                          </td>
                          <td id="wednesdayDayIIG" class="col64">
                              <div id="draggableBoxForShiftPosition64" class="colclass">
                                <div id="droppableBoxForUsers64">
                                </div>
                                <input type="hidden" id="hiddenTextField64">
                                
                              </div>
                          </td>
                          <td id="wednesdayDayICX" class="col65">
                              <div id="draggableBoxForShiftPosition65" class="colclass">
                                <div id="droppableBoxForUsers65">
                                </div>
                                <input type="hidden" id="hiddenTextField65">
                                
                              </div>
                          </td>
<!--***************************************WEDNESDAY EVENING************************************************** -->
                          <td id="wednesdayEveningShiftLeader" class="col66">
                              <div id="draggableBoxForShiftPosition66" class="colclass">
                                <div id="droppableBoxForUsers66">
                                </div>
                                <input type="hidden" id="hiddenTextField66">
                                
                              </div>
                          </td>
                          <td id="wednesdayEveningSur" class="col67">
                              <div id="draggableBoxForShiftPosition67" class="colclass">
                                <div id="droppableBoxForUsers67">
                                </div>
                                <input type="hidden" id="hiddenTextField67">
                                
                              </div>
                          </td>
                          <td id="wednesdayEveningBO" class="col68">
                              <div id="draggableBoxForShiftPosition68" class="colclass">
                                <div id="droppableBoxForUsers68">
                                </div>
                                <input type="hidden" id="hiddenTextField68">
                                
                              </div>
                          </td>
                          <td id="wednesdayEveningIIG" class="col69">
                              <div id="draggableBoxForShiftPosition69" class="colclass">
                                <div id="droppableBoxForUsers69">
                                </div>
                                <input type="hidden" id="hiddenTextField69">
                                
                              </div>
                          </td>
                          <td id="wednesdayEveningICX" class="col70">
                              <div id="draggableBoxForShiftPosition70" class="colclass">
                                <div id="droppableBoxForUsers70">
                                </div>
                                <input type="hidden" id="hiddenTextField70">
                                
                              </div>
                          </td>
<!--*****************************************WEDNESDAY NIGHT************************************************ -->
                          <td id="wednesdayNightShiftLeader" class="col71">
                              <div id="draggableBoxForShiftPosition71" class="colclass">
                                <div id="droppableBoxForUsers71">
                                </div>
                                <input type="hidden" id="hiddenTextField71">
                                
                              </div>
                          </td>
                          <td id="wednesdayNightSur" class="col72">
                              <div id="draggableBoxForShiftPosition72" class="colclass">
                                <div id="droppableBoxForUsers72">
                                </div>
                                <input type="hidden" id="hiddenTextField72">
                                
                              </div>
                          </td>
                          <td id="wednesdayNightBO" class="col73">
                              <div id="draggableBoxForShiftPosition73" class="colclass">
                                <div id="droppableBoxForUsers73">
                                </div>
                                <input type="hidden" id="hiddenTextField73">
                                
                              </div>
                          </td>
                          <td id="wednesdayNightIIG" class="col74">
                              <div id="draggableBoxForShiftPosition74" class="colclass">
                                <div id="droppableBoxForUsers74">
                                </div>
                                <input type="hidden" id="hiddenTextField74">
                                
                              </div>
                          </td>
                          <td id="wednesdayNightICX" class="col75">
                              <div id="draggableBoxForShiftPosition75" class="colclass">
                                <div id="droppableBoxForUsers75">
                                </div>
                                <input type="hidden" id="hiddenTextField75">
                                
                              </div>
                          </td>
                        </tr>
        <!-- *****************************THURSDAY DAY****************************-->                
                        <tr>  
                          <td>Thursday</td>
                          <td id="thursdayDayShiftLeader" class="col76">
                              <div id="draggableBoxForShiftPosition76" class="colclass">
                                <div id="droppableBoxForUsers76">
                                </div>
                                <input type="hidden" id="hiddenTextField76">
                                
                              </div>
                          </td>
                         <td id="thursdayDaySur" class="col77">
                              <div id="draggableBoxForShiftPosition77" class="colclass">
                                <div id="droppableBoxForUsers77">
                                </div>
                                <input type="hidden" id="hiddenTextField77">
                                
                              </div>
                          </td>
                          <td id="thursdayDayBO" class="col78">
                              <div id="draggableBoxForShiftPosition78" class="colclass">
                                <div id="droppableBoxForUsers78">
                                </div>
                                <input type="hidden" id="hiddenTextField78">
                                
                              </div>
                          </td>
                          <td id="thursdayDayIIG" class="col79">
                              <div id="draggableBoxForShiftPosition79" class="colclass">
                                <div id="droppableBoxForUsers79">
                                </div>
                                <input type="hidden" id="hiddenTextField79">
                                
                              </div>
                          </td>
                          <td id="thursdayDayICX" class="col80">
                              <div id="draggableBoxForShiftPosition80" class="colclass">
                                <div id="droppableBoxForUsers80">
                                </div>
                                <input type="hidden" id="hiddenTextField80">
                                
                              </div>
                          </td>
<!--******************************************THURSDAY EVENING*********************************************** -->
                          <td id="thursdayEveningShiftLeader" class="col81">
                              <div id="draggableBoxForShiftPosition81" class="colclass">
                                <div id="droppableBoxForUsers81">
                                </div>
                                <input type="hidden" id="hiddenTextField81">
                                
                              </div>
                          </td>
                          <td id="thursdayEveningSur" class="col82">
                              <div id="draggableBoxForShiftPosition82" class="colclass">
                                <div id="droppableBoxForUsers82">
                                </div>
                                <input type="hidden" id="hiddenTextField82">
                                
                              </div>
                          </td>
                          <td id="thursdayEveningBO" class="col83">
                              <div id="draggableBoxForShiftPosition83" class="colclass">
                                <div id="droppableBoxForUsers83">
                                </div>
                                <input type="hidden" id="hiddenTextField83">
                                
                              </div>
                          </td>
                          <td id="thursdayEveningIIG" class="col84">
                              <div id="draggableBoxForShiftPosition84" class="colclass">
                                <div id="droppableBoxForUsers84">
                                </div>
                                <input type="hidden" id="hiddenTextField84">
                                
                              </div>
                          </td>
                          <td id="thursdayEveningICX" class="col85">
                              <div id="draggableBoxForShiftPosition85" class="colclass">
                                <div id="droppableBoxForUsers85">
                                </div>
                                <input type="hidden" id="hiddenTextField85">
                                
                              </div>
                          </td>
<!--*****************************************THURSDAY NIGHT************************************************ -->
                          <td id="thursdayNightShiftLeader" class="col86">
                              <div id="draggableBoxForShiftPosition86" class="colclass">
                                <div id="droppableBoxForUsers86">
                                </div>
                                <input type="hidden" id="hiddenTextField86">
                                
                              </div>
                          </td>
                          <td id="thursdayNightSur" class="col87">
                              <div id="draggableBoxForShiftPosition87" class="colclass">
                                <div id="droppableBoxForUsers87">
                                </div>
                                <input type="hidden" id="hiddenTextField87">
                                
                              </div>
                          </td>
                          <td id="thursdayNightBO" class="col88">
                              <div id="draggableBoxForShiftPosition88" class="colclass">
                                <div id="droppableBoxForUsers88">
                                </div>
                                <input type="hidden" id="hiddenTextField88">
                                
                              </div>
                          </td>
                          <td id="thursdayNightIIG" class="col89">
                              <div id="draggableBoxForShiftPosition89" class="colclass">
                                <div id="droppableBoxForUsers89">
                                </div>
                                <input type="hidden" id="hiddenTextField89">
                                
                              </div>
                          </td>
                          <td id="thursdayNightICX" class="col90">
                              <div id="draggableBoxForShiftPosition90" class="colclass">
                                <div id="droppableBoxForUsers90">
                                </div>
                                <input type="hidden" id="hiddenTextField90">
                                
                              </div>
                          </td>
                        </tr>
                        <!-- *****************************FRIDAY DAY******************-->
                        <tr>  
                          <td>Friday</td>
                          <td id="fridayDayShiftLeader" class="col91">
                              <div id="draggableBoxForShiftPosition91" class="colclass">
                                <div id="droppableBoxForUsers91">
                                </div>
                                <input type="hidden" id="hiddenTextField91">
                               
                              </div>
                          </td>
                          <td id="fridayDaySur" class="col92">
                              <div id="draggableBoxForShiftPosition92" class="colclass">
                                <div id="droppableBoxForUsers92">
                                </div>
                                <input type="hidden" id="hiddenTextField92">
                                
                              </div>
                          </td>
                          <td id="fridayDayBO" class="col93">
                              <div id="draggableBoxForShiftPosition93" class="colclass">
                                <div id="droppableBoxForUsers93">
                                </div>
                                <input type="hidden" id="hiddenTextField93">
                                
                              </div>
                          </td>
                          <td id="fridayDayIIG" class="col94">
                              <div id="draggableBoxForShiftPosition94" class="colclass">
                                <div id="droppableBoxForUsers94">
                                </div>
                                <input type="hidden" id="hiddenTextField94">
                                
                              </div>
                          </td>
                          <td id="fridayDayICX" class="col95">
                              <div id="draggableBoxForShiftPosition95" class="colclass">
                                <div id="droppableBoxForUsers95">
                                </div>
                                <input type="hidden" id="hiddenTextField95">
                                
                              </div>
                          </td>
<!--*********************************************FRIDAY EVENING******************************************** -->
                          <td id="fridayEveningShiftLeader" class="col96">
                              <div id="draggableBoxForShiftPosition96" class="colclass">
                                <div id="droppableBoxForUsers96">
                                </div>
                                <input type="hidden" id="hiddenTextField96">
                                
                              </div>
                          </td>
                          <td id="fridayEveningSur" class="col97">
                              <div id="draggableBoxForShiftPosition97" class="colclass">
                                <div id="droppableBoxForUsers97">
                                </div>
                                <input type="hidden" id="hiddenTextField97">
                                
                              </div>
                          </td>
                          <td id="fridayEveningBO" class="col98">
                              <div id="draggableBoxForShiftPosition98" class="colclass">
                                <div id="droppableBoxForUsers98">
                                </div>
                                <input type="hidden" id="hiddenTextField98">
                                
                              </div>
                          </td>
                          <td id="fridayEveningIIG" class="col99">
                              <div id="draggableBoxForShiftPosition99" class="colclass">
                                <div id="droppableBoxForUsers99">
                                </div>
                                <input type="hidden" id="hiddenTextField99">
                                
                              </div>
                          </td>
                          <td id="fridayEveningICX" class="col100">
                              <div id="draggableBoxForShiftPosition100" class="colclass">
                                <div id="droppableBoxForUsers100">
                                </div>
                                <input type="hidden" id="hiddenTextField100">
                                
                              </div>
                          </td>
<!--*********************************************FRIDAY NIGHT******************************************** -->
                          <td id="fridayNightShiftLeader" class="col101">
                              <div id="draggableBoxForShiftPosition101" class="colclass">
                                <div id="droppableBoxForUsers101">
                                </div>
                                <input type="hidden" id="hiddenTextField101">
                                
                              </div>
                          </td>
                          <td id="fridayNightSur" class="col102">
                              <div id="draggableBoxForShiftPosition102" class="colclass">
                                <div id="droppableBoxForUsers102">
                                </div>
                                <input type="hidden" id="hiddenTextField102">
                                
                              </div>
                          </td>
                          <td id="fridayNightBO" class="col103">
                              <div id="draggableBoxForShiftPosition103" class="colclass">
                                <div id="droppableBoxForUsers103">
                                </div>
                                <input type="hidden" id="hiddenTextField103">
                                
                              </div>
                          </td>
                          <td id="fridayNightIIG" class="col104">
                              <div id="draggableBoxForShiftPosition104" class="colclass">
                                <div id="droppableBoxForUsers104">
                                </div>
                                <input type="hidden" id="hiddenTextField104">
                                
                              </div>
                          </td>
                          <td id="fridayNightICX" class="col105">
                              <div id="draggableBoxForShiftPosition105" class="colclass">
                                <div id="droppableBoxForUsers105">
                                </div>
                                <input type="hidden" id="hiddenTextField105">
                                
                              </div>
                          </td>
                        </tr>
                      <tbody>
                        
                      </tbody>
                    </table>
                    
                    <form action="{{url('updateRoster')}}" id="weekRosterForm" method="post">
                      <?php for($i=1;$i<106;$i++){ ?>
                        <input type="hidden" id="<?php echo 'cell'.$i; ?>" name="<?php echo 'cell'.$i; ?>" value="">
                      <?php } ?>
                      <input type="text" id="rosterDate" name="rosterDate" value="">
                      <button onClick="get_data();">Submit</button>
                      {!! Form::token() !!}
                    </form>
                  </div>
                </div>
              </div>
            </div>
</div>

<script>
  var app = angular.module('userPool', []);
  app.controller('userCtrl', function($scope, $http) {
    $http.get("/roster2/public/userList")
    .then(function (response) {$scope.user_id = response.data.records;});
  });
</script>
@endsection

        

