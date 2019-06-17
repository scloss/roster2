@extends($app)

@section('content')

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
    vertical-align: middle !important;
    text-align: center;
  }
  #headertr1 td:hover{
  	background-color:#3C5B9B !important;
  	color:#fff !important;
  }
  #headertr2 td:hover{
  	background-color:#00A8EC !important;
  	color:#fff !important;

  }
  #headertr3 td:hover{
  	background-color:#FF764C !important;
  	color:#fff !important;
  }
  #headertr1:hover{
  	background-color:#3C5B9B !important;
  	color:#000 !important;
  }
  #headertr2:hover{
  	background-color:#00A8EC !important;
  	color:#000 !important;

  }
  #headertr3:hover{
  	background-color:#FF764C !important;
  	color:#000 !important;
  }
  .custom-combobox {
    position: relative;
    display: inline-block;
    margin-top: 7%;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
  }
</style>
<script type="text/javascript">
  $(function() {
    $("#leaveDateFrom" ).datepicker();
    $("#leaveDateTo" ).datepicker();
    // $("#rosterDate").change(function() {
    //     var val = $(this).val();
    //     $('#rosterDateValue').text(val);
        
    // });
  });
   $(function() {
    $( "#userName" ).combobox();
    $( "#toggle" ).click(function() {
      $( "#userName" ).toggle();
    });
  });
  (function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
 
</script>

<div class="dashboard-wrapper">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="widget">            
        <div class="widget-header">
          <center><h3>User ID : {{$username}}</h3></center>
        </div>
        <div class="widget-body">
        	<center>
        		
        		<div class="container">
        			<div class="col-md-4">
        			<br>
        			<br>
              <?php
                //if($username)

               $uid = $username; 
               $url ="/roster2/public/img/profile/".$uid.".jpg";
               $val = file_exists($url);
               //echo $val;
                if($val != 1){
                  //$url ="/roster2/public/img/profile/default.jpg";
                  //echo "not found";
                }
                  ?>
                
               
        				<img src="<?php echo $url; ?>" alt="Your Image">
        			</div>
	        		<div class="col-md-8">

	        			<table class="table table-hover no-margin">
	        				<tr>
	        					<td colspan="4"><b>Total Shift</b></td>
	        				</tr>
	        				<tr>
	        					<td colspan="4"><b>{{$totalShiftCount}}</b></td>
	        				</tr>
	        				<div>
		        				<tr id="headertr1" style="background-color:#3C5B9B;color:#fff;}">
		        					<td>Day</td><td>Evening</td><td>Night</td><td>Shift Leader</td>
		        				</tr>
	        				</div>
	        				<tr>
	        					<td>{{$totalDay}}</td><td>{{$totalEvening}}</td><td>{{$totalNight}}</td><td>{{$totalShiftLeader}}</td>
	        				</tr>
	        				<div>
		        				<tr  id="headertr1" style="background-color:#00A8EC;color:#fff;">
		        					<td>Swap Made</td><td>Swap Attempt Taken</td><td>Leave Taken</td><td>Leave Attempt Taken</td>
		        				</tr>
	        				</div>
	        				<tr>
	        					<td>{{$totalSwap}}</td><td>{{$totalSwapAttempt}}</td><td>{{$totalLeave}}</td><td>{{$totalLeaveAttempt}}</td>
	        				</tr>
	        				<div>
		        				<tr id="headertr1"  style="background-color:#FF764C;color:#fff;">
		        					<td>Surveillance</td><td>Back Office</td><td>IIG</td><td>ICX</td>
		        				</tr>
	        				</div>
	        				<tr>
	        					<td>{{$totalSur}}</td><td>{{$totalBO}}</td><td>{{$totalIIG}}</td><td>{{$totalICX}}</td>
	        				</tr>
	        			</table>
	        			<br>
	        			<table style="width:50%;text-align:center;">
			              <tr>
			                <th>Your User Name</th>
			                <th>Select Month</th>
			                <th>Select Year</th>
			                <th>Submit</th>
			              </tr>
			              <tr>
			               
			                  <td>
			                    <div class="ui-widget">
			                    <form action="{{url('profile')}}" method="get">
			                      <select id="userName" name="userName">
			                        <option value="">Select one...</option>
			                        @foreach($rosterUserList as $users)
			                            <option value="{{$users->user_id}}">{{$users->user_id}}</option>
			                        @endforeach  
			                      </select>
			                    </div>
			                  </td>
			                    <input type="hidden" id="month" name="month" value="{{$month}}">
			                    <input type="hidden" id="year" name="year" value="{{$year}}"> 
			                    
			                      <td><select name="month" class="dropboxStyle">
                        <?php for($i=0;$i<count($monthListArr);$i++){

                          if($i+1 == $month){
                            ?><option value="<?php echo $i+1; ?>" selected><?php echo $monthListArr[$i]; ?></option><?php
                          }
                          else{
                            ?><option value="<?php echo $i+1; ?>"><?php echo $monthListArr[$i]; ?></option><?php
                          }
                          
                        }?>
                      </select></td>
			                      <td><select name="year" class="dropboxStyle">
                        <?php for($i=0;$i<count($yearListArr);$i++){
                          if($year == $yearListArr[$i]){
                            ?><option value="<?php echo $yearListArr[$i]; ?>" selected><?php echo $yearListArr[$i]; ?></option><?php
                          }
                          else{
                          ?><option value="<?php echo $yearListArr[$i]; ?>"><?php echo $yearListArr[$i]; ?></option><?php
                          }
                        }?>
                      </select></td>
			                  	  <td><input type="submit" value="submit"></td>	

			                
			              </tr>
			             </table> 
			             
			            {!! Form::token() !!}  
			            </form>  
	        		</div>
        		</div>
        	</center>	
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

