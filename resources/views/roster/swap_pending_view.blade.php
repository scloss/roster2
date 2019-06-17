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
          <center><h3>Pending Swap Requests</h3></center>
        </div>
        <div class="widget-body">
          <center>
            <table style="width:70%;">
              <tr>
                <th>Swap Requester</th>
                <th>Swap Requester's Shift</th>
                <th>Swap Accepter</th>
                <th>Swap Accepter's Shift</th>
                <th>Reason</th>
                <th>Pending</th>
              </tr>
              @foreach($pendingSwapLists as $pendingSwapList)
              <tr>
                <form action="{{url('swapUpdate')}}" method="post">
                  <input type="hidden" name="firstUser" value="{{$pendingSwapList->swapRequester}}">
                  <input type="hidden" name="firstSwapDate" value="{{$pendingSwapList->swapShift1}}">
                  <input type="hidden" name="secondUser" value="{{$pendingSwapList->swapAccepter}}">
                  <input type="hidden" name="secondSwapDate" value="{{$pendingSwapList->swapShift2}}">
                  <input type="hidden" name="swap_id" value="{{$pendingSwapList->swap_row_id}}">
                  <input type="hidden" name="isApproved" value="yes">
                  <td>{{$pendingSwapList->swapRequester}}</td>
                  <td>{{$pendingSwapList->swapShift1}}</td>
                  <td>{{$pendingSwapList->swapAccepter}}</td>
                  <td>{{$pendingSwapList->swapShift2}}</td>
                  <td>{{$pendingSwapList->reason}}</td>
                  <td>
                    <input type="submit" value="Approve"><br>
                    {!! Form::token() !!}     
                </form>
                    <form action="{{url('swapUpdate')}}" method="post">
                      <input type="hidden" name="isApproved" value="no">
                      <input type="hidden" name="swap_id" value="{{$pendingSwapList->swap_row_id}}">
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

        

