@extends($app)

@section('content')
<script src="{{asset('/js/bootstrap-datepicker.js')}}"></script>
<link href="{{asset('/css/roster.css')}}" rel="stylesheet">
<link href="{{asset('/css/datepicker.css')}}" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="{{ asset('/js/jquery.table2excel.js') }}"></script>
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
    padding:5px;
    min-width:100px;
  }

  .custom-combobox {
    position: relative;
    display: inline-block;
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
  function exportExcel(){
          $("#report_table").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "excelFile",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
          });
          //alert('asdf');
        }
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
          <center><h3>Roster of {{$monthListArr[$month-1]}}, {{$year}}</h3></center>
        </div>
        <div class="widget-body">
        	<center>
        		
        		<div class="container">
        		<table style="width:50%;text-align:center;">
			              <tr>
			                <th>Select Month</th>
			                <th>Select Year</th>
			                <th>Submit</th>
			              </tr>
			              <tr>
                      <input type="hidden" id="month" name="month" value="{{$month}}">
                          <input type="hidden" id="year" name="year" value="{{$year}}">
			                    <form action="{{url('report')}}" method="get">			                      			                 
			                     
			                    
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
                  <br>
        		<table id="report_table">
        			<tr>
        				<td>Name</td><td>Total Shift</td><td>Day</td><td>Evening</td><td>Night</td><td style="background:#4f5c91;color:#fff;">Swap Made</td><td>Swap Rejected</td><td>Leave Taken</td><td style="background:#4f5c91;color:#fff;">Leave Duration</td><td>Leave Rejected</td>
        			</tr>
        		
        			@foreach($userLists as $userList)
        				<tr>
        					<td>{{$userList->user_id}}</td><td>{{$totalShiftCountArr[$userList->user_id]}} + {{$totalHolidayArr[$userList->user_id]}}H</td><td>{{$totalDayArr[$userList->user_id]}}</td><td>{{$totalEveningArr[$userList->user_id]}}</td><td>{{$totalNightArr[$userList->user_id]}}</td><td style="background:#4f5c91;color:#fff;">{{$totalSwapArr[$userList->user_id]}}</td><td>{{$totalSwapAttemptArr[$userList->user_id]}}</td><td >{{$totalLeaveArr[$userList->user_id]}}</td><td style="background:#4f5c91;color:#fff;">{{$totalLeaveDurationArr[$userList->user_id]}}</td><td>{{$totalLeaveAttemptArr[$userList->user_id]}}</td>
        				</tr>
        			@endforeach
              <tr>
                <td colspan="10"><button onclick="exportExcel()" class="btn" >Export</button></td>
              </tr>
        		</table>
        		</div>
        	</center>	
        </div>
      </div>
    </div>
  </div>
</div>


@endsection