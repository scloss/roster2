@extends($app)

@section('content')
<script src="{{asset('/js/bootstrap-datepicker.js')}}"></script>
<!-- <script src="{{asset('/js/jquery.dataTables.min.js')}}"></script> -->
<link href="{{asset('/css/roster.css')}}" rel="stylesheet">
<link href="{{asset('/css/datepicker.css')}}" rel="stylesheet">
<!-- <link href="{{asset('/css/jquery.dataTables.min.css')}}" rel="stylesheet"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
<style type="text/css">
  td,th{
    padding:2% !important;
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
<div class="dashboard-wrapper">
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="widget"> 
        <div class="widget-header">
        </div> 
        <div class="widget-body"> 
            <center>
            <table style="width:50%;text-align:center;margin-top:2%;">
              <tr>
                <!-- <th>Your User Name</th> -->
                <th>Leave Date From</th>
                <th>Leave Date To</th>
                <th>Reason</th>
                <th>Leave Type</th>
                <th>Leave Taken This Year</th>
                <th>Submit</th>

              </tr>
              <tr>
                <form action="{{url('leaveRequested')}}" method="post">
                  <!-- <td>
                    <div class="ui-widget">
                    <input type="hidden" name="userName"></input>
                      <select id="userName" name="userName" >
                        <option value="">Select one...</option>
                        @foreach($rosterUserList as $users)
                            <option value="{{$users->user_id}}">{{$users->user_id}}</option>
                        @endforeach  
                      </select>
                    </div>
                  </td> -->
                  <td><input type="text" id="leaveDateFrom" name="leaveDateFrom" value=""></td>
                  <td><input type="text" id="leaveDateTo" name="leaveDateTo" value=""></td>
                  <td><textarea rows="4" cols="50" id="leaveReason" name="leaveReason" value=""></textarea></td>
                  <td>
                      <select name="leaveType">
                        <option value="roster">Roster</option>
                        <option value="general">General</option>
                       </select> 
                  </td>
                  <td>{{$leaveCount}}</td>
                  <td><input type="submit" value="submit"></td>
              </tr>
             </table>
             </center> 
             
            {!! Form::token() !!}  
            </form>   
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
</script>

@endsection