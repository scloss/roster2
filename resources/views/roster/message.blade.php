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
          <center><h3>Message</h3></center>
        </div>
        <div class="widget-body">
            <h3>{{$msg}}</h3>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

        

