<script type="text/javascript">


</script>
<body>

</body>
@extends($app)

@section('content')
<script src="{{asset('/js/roster-gen-edit-single.js')}}"></script>
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
  // $(function() {
  //   $("#rosterDate" ).datepicker();
  //   // $("#rosterDate").change(function() {
  //   //     var val = $(this).val();
  //   //     $('#rosterDateValue').text(val);
        
  //   // });
  // });
</script>
<!-- <div id="result" style="color:red">asdf</div> -->
<div class="dashboard-wrapper">
    <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="widget">            
                  <div>
                    <div ng-app="userPool" ng-controller="userCtrl"> 
                      <div class="widget-header">
                          <input type="text"  ng-model="search"  class="form-control input-lg" placeholder="               &#xF002;  Search" required="" id="searchBox" >
                      </div>
                      <div id="topPool" >
                          <p ng-repeat="user in user_id| filter:search" class="dragUser" value="@{{ user.user_id }}" id="@{{ user.user_id }}" onmouseover='make_draggable(this.id)'>@{{ user.user_id }}</p>
                      </div>
                    </div>

                      
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
                          <td>{{$editDate}}</td>
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

                      <tbody>
                        
                      </tbody>
                    </table>
                    
                    <form action="{{url('updateSingleRoster')}}" id="weekRosterForm" method="post">
                      <?php for($i=1;$i<16;$i++){ ?>
                        <input type="hidden" id="<?php echo 'cell'.$i; ?>" name="<?php echo 'cell'.$i; ?>" value="">
                      <?php } ?>
                      <input type="hidden" id="editDate" name="editDate" value="{{$editDate}}">
                      <input type="hidden" id="shift_id" name="shift_id" value="{{$shift_id}}">
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

        

