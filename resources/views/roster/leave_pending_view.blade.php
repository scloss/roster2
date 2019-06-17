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
        <div class="widget-header">
          <center><h3>Pending Leave Requests</h3></center>
        </div>
        <div class="widget-body">
          <center>
            <table style="width:70%;">
              <tr>
                <th>Leave Requester</th>
                <th>Leave Date From</th>
                <th>Leave Date To</th>
                <th>Reason</th>
                <th>Leave Taken This Year</th>
                <th>Pending</th>

              </tr>
              @foreach($pendingLeaveLists as $pendingLeaveList)
              <tr>
                <form action="{{url('leaveUpdate')}}" method="post">
                  <input type="hidden" name="userName" value="{{$pendingLeaveList->leave_requester}}">
                  <input type="hidden" name="leaveDateFrom" value="{{$pendingLeaveList->leave_date_from}}">
                  <input type="hidden" name="leaveDateTo" value="{{$pendingLeaveList->leave_date_to}}">
                  <input type="hidden" name="leave_id" value="{{$pendingLeaveList->leave_row_id}}">
                  <input type="hidden" name="leaveType" value="{{$pendingLeaveList->leave_type}}">
                  <input type="hidden" name="isApproved" value="yes">
                  <td>{{$pendingLeaveList->leave_requester}}</td>
                  <td>{{$pendingLeaveList->leave_date_from}}</td>
                  <td>{{$pendingLeaveList->leave_date_to}}</td>
                  <td>{{$pendingLeaveList->reason}}</td>
                  <td>{{$pendingLeaveList->leave_time}}</td>
                  <td>
                    <input type="submit" value="Approve"><br>
                    {!! Form::token() !!}     
                </form>
                    <form action="{{url('leaveUpdate')}}" method="post">
                      <input type="hidden" name="isApproved" value="no">
                      <input type="hidden" name="leave_id" value="{{$pendingLeaveList->leave_row_id}}">
                      <input type="hidden" name="leaveType" value="{{$pendingLeaveList->leave_type}}">
                      <input type="submit" value="Reject">
                    {!! Form::token() !!} 
                    </form>
                  </td>  
                  
              </tr>
              @endforeach
            </table>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

        

