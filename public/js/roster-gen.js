var j=0;
function getBtnID(id){
     var idArr = id.split(".");
     var lastDivId = idArr[2];
     var textDivId = idArr[1];
     document.getElementById(lastDivId).lastChild.remove();
     var textValue = document.getElementById(textDivId).value;
     var lastIndex = textValue.lastIndexOf(",");
     textValue = textValue.substring(0, lastIndex);
     document.getElementById(textDivId).setAttribute('value',textValue);
}

function make_draggable(id){
    var idArr2 = id.split(".");
    $( '#'+idArr2[0]+'\\.'+idArr2[1] ).draggable({
      revert:"invalid",
      helper:"clone"
    });
    $( '#'+idArr2[0]+'\\.'+idArr2[1] ).selectable();

  }

function make_draggable_without_clone(id){
    //var idArr2 = id.split(".");
    $( '#'+id).draggable({
      revert:"invalid"
    });
}

$(function() {   
    var i=1;
    var tempDivId;
    $('.colclass').each(function() {
      var col = '.col'+i;
      var draggableBoxForShiftPosition = "#draggableBoxForShiftPosition"+i;
      var droppableBoxForUsers = 'droppableBoxForUsers'+i;
      var hiddenTextField = '#hiddenTextField'+i;

      $(col).droppable({
        drop: function( event, ui ) {
            var dragID = ui.draggable.attr('value'); 
            var idArr2 = dragID.split(".");
            var prevValue = $(hiddenTextField).val(); 
            var idDiv = document.createElement('div');
            j++;
            idDiv.setAttribute('id',"div_"+idArr2[0]+j);
            idDiv.setAttribute('class','buttonStyle1');
            var btn = document.createElement("p");
            var t = document.createTextNode(idArr2[0]);
            btn.setAttribute('value',dragID);
            btn.setAttribute('class','buttonStyle');
            btn.setAttribute('id',idArr2[0]+j);
            btn.appendChild(t);
            btn.addEventListener("mouseover",function(){
                make_draggable_without_clone(btn.getAttribute('id') );          
            });
            var btn2 = document.createElement("button");
            var t2 = document.createTextNode('x');
            btn2.setAttribute('value','x');
            btn2.setAttribute('class','buttonStyle2');
            btn2.setAttribute('id',idArr2[0]+j);
            tempDivId =idArr2[0]+j; 
            btn2.appendChild(t2);
            btn2.addEventListener("click",function(){
                $( "div" ).remove( '#div_'+btn2.getAttribute('id') );
            });    
            var divId = document.getElementById(droppableBoxForUsers);
            idDiv.appendChild(btn);
            idDiv.appendChild(btn2)
            divId.appendChild(idDiv);
            var removeParentClass = ui.draggable.attr('class');
            if(removeParentClass !='dragUser ng-binding ng-scope ui-draggable ui-draggable-handle ui-selectable'){
              var removeParentID = ui.draggable.attr('id');
              //$( "div" ).remove(removeParentID);
              ui.draggable.remove();
              var tid = document.getElementById(removeParentID).parentNode.id;
              //$( "div" ).remove(tid);
              document.getElementById(tid).remove();
              //tempVar = j-1;
              //alert(removeParentID)
              //$( '#'+idArr2[0]+tempVar ).remove();            
            }     
        }
      });
      //$( "div" ).remove(tempDivId);
    i++;
    
    });
    

});


function get_data(){

    
    var saturdayDayShiftLeader =''; 
      $("#saturdayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayDayShiftLeader ==''){
            saturdayDayShiftLeader = tempPValue;
          }
          else{
            saturdayDayShiftLeader = saturdayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell1').value = saturdayDayShiftLeader+'-day-shift_leader';
    var saturdayDaySur =''; 
      $("#saturdayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayDaySur ==''){
            saturdayDaySur = tempPValue;
          }
          else{
            saturdayDaySur = saturdayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell2').value  = saturdayDaySur+'-day-sur';
    var saturdayDayBO =''; 
      $("#saturdayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayDayBO ==''){
            saturdayDayBO = tempPValue;
          }
          else{
            saturdayDayBO = saturdayDayBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell3').value  = saturdayDayBO+'-day-bo';
    var saturdayDayIIG =''; 
      $("#saturdayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayDayIIG ==''){
            saturdayDayIIG = tempPValue;
          }
          else{
            saturdayDayIIG = saturdayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell4').value  = saturdayDayIIG+'-day-iig';
    var saturdayDayICX =''; 
      $("#saturdayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayDayICX ==''){
            saturdayDayICX = tempPValue;
          }
          else{
            saturdayDayICX = saturdayDayICX+','+tempPValue;
          } 
        }
      });  
      $cell5 = saturdayDayICX;
document.getElementById('cell5').value  = saturdayDayICX+'-day-icx';

/***********************************Sunday***********************************/



      var sundayDayShiftLeader =''; 
      $("#sundayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayDayShiftLeader ==''){
            sundayDayShiftLeader = tempPValue;
          }
          else{
            sundayDayShiftLeader = sundayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell16').value  = sundayDayShiftLeader+'-day-shift_leader';
    var sundayDaySur =''; 
      $("#sundayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayDaySur ==''){
            sundayDaySur = tempPValue;
          }
          else{
            sundayDaySur = sundayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell17').value  = sundayDaySur+'-day-sur';
    var sundayDayBO =''; 
      $("#sundayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayDayBO ==''){
            sundayDayBO = tempPValue;
          }
          else{
            sundayDayBO = sundayDayBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell18').value  = sundayDayBO+'-day-bo';
    var sundayDayIIG =''; 
      $("#sundayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayDayIIG ==''){
            sundayDayIIG = tempPValue;
          }
          else{
            sundayDayIIG = sundayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell19').value  = sundayDayIIG+'-day-iig';
    var sundayDayICX =''; 
      $("#sundayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayDayICX ==''){
            sundayDayICX = tempPValue;
          }
          else{
            sundayDayICX = sundayDayICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell20').value  = sundayDayICX+'-day-icx';
/***********************************Monday***********************************/


      var mondayDayShiftLeader =''; 
      $("#mondayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayDayShiftLeader ==''){
            mondayDayShiftLeader = tempPValue;
          }
          else{
            mondayDayShiftLeader = mondayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell31').value  = mondayDayShiftLeader+'-day-shift_leader';
    var mondayDaySur =''; 
      $("#mondayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayDaySur ==''){
            mondayDaySur = tempPValue;
          }
          else{
            mondayDaySur = mondayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell32').value  = mondayDaySur+'-day-sur';
    var mondayDayBO =''; 
      $("#mondayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayDayBO ==''){
            mondayDayBO = tempPValue;
          }
          else{
            mondayDayBO = mondayDayBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell33').value  = mondayDayBO+'-day-bo';
    var mondayDayIIG =''; 
      $("#mondayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayDayIIG ==''){
            mondayDayIIG = tempPValue;
          }
          else{
            mondayDayIIG = mondayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell34').value  = mondayDayIIG+'-day-iig';
    var mondayDayICX =''; 
      $("#mondayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayDayICX ==''){
            mondayDayICX = tempPValue;
          }
          else{
            mondayDayICX = mondayDayICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell35').value  = mondayDayICX+'-day-icx';
/***********************************Tuesday***********************************/



      var tuesdayDayShiftLeader =''; 
      $("#tuesdayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayDayShiftLeader ==''){
            tuesdayDayShiftLeader = tempPValue;
          }
          else{
            tuesdayDayShiftLeader = tuesdayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell46').value  = tuesdayDayShiftLeader+'-day-shift_leader';
    var tuesdayDaySur =''; 
      $("#tuesdayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayDaySur ==''){
            tuesdayDaySur = tempPValue;
          }
          else{
            tuesdayDaySur = tuesdayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell47').value  = tuesdayDaySur+'-day-sur';
    var tuesdayDayBO =''; 
      $("#tuesdayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayDayBO ==''){
            tuesdayDayBO = tempPValue;
          }
          else{
            tuesdayDayBO = tuesdayDayBO+','+tempPValue;
          } 
        }
      }); 
    document.getElementById('cell48').value  = tuesdayDayBO+'-day-bo';
    var tuesdayDayIIG =''; 
      $("#tuesdayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayDayIIG ==''){
            tuesdayDayIIG = tempPValue;
          }
          else{
            tuesdayDayIIG = tuesdayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell49').value  = tuesdayDayIIG+'-day-iig';
    var tuesdayDayICX =''; 
      $("#tuesdayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayDayICX ==''){
            tuesdayDayICX = tempPValue;
          }
          else{
            tuesdayDayICX = tuesdayDayICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell50').value  = tuesdayDayICX+'-day-icx';



/***********************************Wednesday***********************************/




      var wednesdayDayShiftLeader =''; 
      $("#wednesdayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayDayShiftLeader ==''){
            wednesdayDayShiftLeader = tempPValue;
          }
          else{
            wednesdayDayShiftLeader = wednesdayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell61').value  = wednesdayDayShiftLeader+'-day-shift_leader';
    var wednesdayDaySur =''; 
      $("#wednesdayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayDaySur ==''){
            wednesdayDaySur = tempPValue;
          }
          else{
            wednesdayDaySur = wednesdayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell62').value  = wednesdayDaySur+'-day-sur';
    var wednesdayDayBO =''; 
      $("#wednesdayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayDayBO ==''){
            wednesdayDayBO = tempPValue;
          }
          else{
            wednesdayDayBO = wednesdayDayBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell63').value  = wednesdayDayBO+'-day-bo';
    var wednesdayDayIIG =''; 
      $("#wednesdayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayDayIIG ==''){
            wednesdayDayIIG = tempPValue;
          }
          else{
            wednesdayDayIIG = wednesdayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell64').value  = wednesdayDayIIG+'-day-iig';
    var wednesdayDayICX =''; 
      $("#wednesdayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayDayICX ==''){
            wednesdayDayICX = tempPValue;
          }
          else{
            wednesdayDayICX = wednesdayDayICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell65').value  = wednesdayDayICX+'-day-icx';

/***********************************Thursday***********************************/


      var thursdayDayShiftLeader =''; 
      $("#thursdayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayDayShiftLeader ==''){
            thursdayDayShiftLeader = tempPValue;
          }
          else{
            thursdayDayShiftLeader = thursdayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell76').value  = thursdayDayShiftLeader+'-day-shift_leader';
    var thursdayDaySur =''; 
      $("#thursdayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayDaySur ==''){
            thursdayDaySur = tempPValue;
          }
          else{
            thursdayDaySur = thursdayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell77').value  = thursdayDaySur+'-day-sur';
    var thursdayDayBO =''; 
      $("#thursdayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayDayBO ==''){
            thursdayDayBO = tempPValue;
          }
          else{
            thursdayDayBO = thursdayDayBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell78').value  = thursdayDayBO+'-day-bo';
    var thursdayDayIIG =''; 
      $("#thursdayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayDayIIG ==''){
            thursdayDayIIG = tempPValue;
          }
          else{
            thursdayDayIIG = thursdayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell79').value  = thursdayDayIIG+'-day-iig';
    var thursdayDayICX =''; 
      $("#thursdayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayDayICX ==''){
            thursdayDayICX = tempPValue;
          }
          else{
            thursdayDayICX = thursdayDayICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell80').value  = thursdayDayICX+'-day-icx';



/***********************************Friday***********************************/






      var fridayDayShiftLeader =''; 
      $("#fridayDayShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayDayShiftLeader ==''){
            fridayDayShiftLeader = tempPValue;
          }
          else{
            fridayDayShiftLeader = fridayDayShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell91').value  = fridayDayShiftLeader+'-day-shift_leader';
    var fridayDaySur =''; 
      $("#fridayDaySur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayDaySur ==''){
            fridayDaySur = tempPValue;
          }
          else{
            fridayDaySur = fridayDaySur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell92').value  = fridayDaySur+'-day-sur';
    var fridayDayBO =''; 
      $("#fridayDayBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayDayBO ==''){
            fridayDayBO = tempPValue;
          }
          else{
            fridayDayBO = fridayDayBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell93').value  = fridayDayBO+'-day-bo';
    var fridayDayIIG =''; 
      $("#fridayDayIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayDayIIG ==''){
            fridayDayIIG = tempPValue;
          }
          else{
            fridayDayIIG = fridayDayIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell94').value  = fridayDayIIG+'-day-iig';
    var fridayDayICX =''; 
      $("#fridayDayICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayDayICX ==''){
            fridayDayICX = tempPValue;
          }
          else{
            fridayDayICX = fridayDayICX+','+tempPValue;
          } 
        }
      });        
      document.getElementById('cell95').value  = fridayDayICX+'-day-icx';


/*************************************************/
/**************************************************/



    var saturdayEveningShiftLeader =''; 
      $("#saturdayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayEveningShiftLeader ==''){
            saturdayEveningShiftLeader = tempPValue;
          }
          else{
            saturdayEveningShiftLeader = saturdayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell6').value = saturdayEveningShiftLeader+'-evening-shift_leader';
    var saturdayEveningSur =''; 
      $("#saturdayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayEveningSur ==''){
            saturdayEveningSur = tempPValue;
          }
          else{
            saturdayEveningSur = saturdayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell7').value = saturdayEveningSur+'-evening-sur';
    var saturdayEveningBO =''; 
      $("#saturdayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayEveningBO ==''){
            saturdayEveningBO = tempPValue;
          }
          else{
            saturdayEveningBO = saturdayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell8').value = saturdayEveningBO+'-evening-bo';
    var saturdayEveningIIG =''; 
      $("#saturdayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayEveningIIG ==''){
            saturdayEveningIIG = tempPValue;
          }
          else{
            saturdayEveningIIG = saturdayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell9').value = saturdayEveningIIG+'-evening-iig';
    var saturdayEveningICX =''; 
      $("#saturdayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayEveningICX ==''){
            saturdayEveningICX = tempPValue;
          }
          else{
            saturdayEveningICX = saturdayEveningICX+','+tempPValue;
          } 
        }
      });  
      document.getElementById('cell10').value = saturdayEveningICX+'-evening-icx';;


/***********************************Sunday***********************************/



      var sundayEveningShiftLeader =''; 
      $("#sundayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayEveningShiftLeader ==''){
            sundayEveningShiftLeader = tempPValue;
          }
          else{
            sundayEveningShiftLeader = sundayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
    document.getElementById('cell21').value = sundayEveningShiftLeader+'-evening-shift_leader';
    var sundayEveningSur =''; 
      $("#sundayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayEveningSur ==''){
            sundayEveningSur = tempPValue;
          }
          else{
            sundayEveningSur = sundayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell22').value = sundayEveningSur+'-evening-sur';
    var sundayEveningBO =''; 
      $("#sundayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayEveningBO ==''){
            sundayEveningBO = tempPValue;
          }
          else{
            sundayEveningBO = sundayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell23').value = sundayEveningBO+'-evening-bo';
    var sundayEveningIIG =''; 
      $("#sundayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayEveningIIG ==''){
            sundayEveningIIG = tempPValue;
          }
          else{
            sundayEveningIIG = sundayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell24').value = sundayEveningIIG+'-evening-iig';
    var sundayEveningICX =''; 
      $("#sundayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayEveningICX ==''){
            sundayEveningICX = tempPValue;
          }
          else{
            sundayEveningICX = sundayEveningICX+','+tempPValue;
          } 
        }
      }); 
    document.getElementById('cell25').value = sundayEveningICX+'-evening-icx'; 
/***********************************Monday***********************************/


      var mondayEveningShiftLeader =''; 
      $("#mondayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayEveningShiftLeader ==''){
            mondayEveningShiftLeader = tempPValue;
          }
          else{
            mondayEveningShiftLeader = mondayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell36').value  = mondayEveningShiftLeader+'-evening-shift_leader';
    var mondayEveningSur =''; 
      $("#mondayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayEveningSur ==''){
            mondayEveningSur = tempPValue;
          }
          else{
            mondayEveningSur = mondayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell37').value  = mondayEveningSur+'-evening-sur';
    var mondayEveningBO =''; 
      $("#mondayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayEveningBO ==''){
            mondayEveningBO = tempPValue;
          }
          else{
            mondayEveningBO = mondayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell38').value  = mondayEveningBO+'-evening-bo';
    var mondayEveningIIG =''; 
      $("#mondayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayEveningIIG ==''){
            mondayEveningIIG = tempPValue;
          }
          else{
            mondayEveningIIG = mondayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell39').value  = mondayEveningIIG+'-evening-iig';
    var mondayEveningICX =''; 
      $("#mondayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayEveningICX ==''){
            mondayEveningICX = tempPValue;
          }
          else{
            mondayEveningICX = mondayEveningICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell40').value  = mondayEveningICX+'-evening-icx';
/***********************************Tuesday***********************************/



      var tuesdayEveningShiftLeader =''; 
      $("#tuesdayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayEveningShiftLeader ==''){
            tuesdayEveningShiftLeader = tempPValue;
          }
          else{
            tuesdayEveningShiftLeader = tuesdayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell51').value  = tuesdayEveningShiftLeader+'-evening-shift_leader';
    var tuesdayEveningSur =''; 
      $("#tuesdayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayEveningSur ==''){
            tuesdayEveningSur = tempPValue;
          }
          else{
            tuesdayEveningSur = tuesdayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell52').value  = tuesdayEveningSur+'-evening-sur';
    var tuesdayEveningBO =''; 
      $("#tuesdayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayEveningBO ==''){
            tuesdayEveningBO = tempPValue;
          }
          else{
            tuesdayEveningBO = tuesdayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell53').value  = tuesdayEveningBO+'-evening-bo';
    var tuesdayEveningIIG =''; 
      $("#tuesdayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayEveningIIG ==''){
            tuesdayEveningIIG = tempPValue;
          }
          else{
            tuesdayEveningIIG = tuesdayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell54').value  = tuesdayEveningIIG+'-evening-iig';
    var tuesdayEveningICX =''; 
      $("#tuesdayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayEveningICX ==''){
            tuesdayEveningICX = tempPValue;
          }
          else{
            tuesdayEveningICX = tuesdayEveningICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell55').value  = tuesdayEveningICX+'-evening-icx';



/***********************************Wednesday***********************************/




      var wednesdayEveningShiftLeader =''; 
      $("#wednesdayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayEveningShiftLeader ==''){
            wednesdayEveningShiftLeader = tempPValue;
          }
          else{
            wednesdayEveningShiftLeader = wednesdayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell66').value  = wednesdayEveningShiftLeader+'-evening-shift_leader';
    var wednesdayEveningSur =''; 
      $("#wednesdayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayEveningSur ==''){
            wednesdayEveningSur = tempPValue;
          }
          else{
            wednesdayEveningSur = wednesdayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell67').value  = wednesdayEveningSur+'-evening-sur';
    var wednesdayEveningBO =''; 
      $("#wednesdayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayEveningBO ==''){
            wednesdayEveningBO = tempPValue;
          }
          else{
            wednesdayEveningBO = wednesdayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell68').value  = wednesdayEveningBO+'-evening-bo';
    var wednesdayEveningIIG =''; 
      $("#wednesdayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayEveningIIG ==''){
            wednesdayEveningIIG = tempPValue;
          }
          else{
            wednesdayEveningIIG = wednesdayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell69').value  = wednesdayEveningIIG+'-evening-iig';
    var wednesdayEveningICX =''; 
      $("#wednesdayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayEveningICX ==''){
            wednesdayEveningICX = tempPValue;
          }
          else{
            wednesdayEveningICX = wednesdayEveningICX+','+tempPValue;
          } 
        }
      }); 

      document.getElementById('cell70').value  = wednesdayEveningICX+'-evening-icx';
/***********************************Thursday***********************************/


      var thursdayEveningShiftLeader =''; 
      $("#thursdayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayEveningShiftLeader ==''){
            thursdayEveningShiftLeader = tempPValue;
          }
          else{
            thursdayEveningShiftLeader = thursdayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell81').value  = thursdayEveningShiftLeader+'-evening-shift_leader';
    var thursdayEveningSur =''; 
      $("#thursdayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayEveningSur ==''){
            thursdayEveningSur = tempPValue;
          }
          else{
            thursdayEveningSur = thursdayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell82').value  = thursdayEveningSur+'-evening-sur';
    var thursdayEveningBO =''; 
      $("#thursdayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayEveningBO ==''){
            thursdayEveningBO = tempPValue;
          }
          else{
            thursdayEveningBO = thursdayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell83').value  = thursdayEveningBO+'-evening-bo';
    var thursdayEveningIIG =''; 
      $("#thursdayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayEveningIIG ==''){
            thursdayEveningIIG = tempPValue;
          }
          else{
            thursdayEveningIIG = thursdayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell84').value  = thursdayEveningIIG+'-evening-iig';
    var thursdayEveningICX =''; 
      $("#thursdayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayEveningICX ==''){
            thursdayEveningICX = tempPValue;
          }
          else{
            thursdayEveningICX = thursdayEveningICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell85').value  = thursdayEveningICX+'-evening-icx';



/***********************************Friday***********************************/






      var fridayEveningShiftLeader =''; 
      $("#fridayEveningShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayEveningShiftLeader ==''){
            fridayEveningShiftLeader = tempPValue;
          }
          else{
            fridayEveningShiftLeader = fridayEveningShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell96').value  = fridayEveningShiftLeader+'-evening-shift_leader';
    var fridayEveningSur =''; 
      $("#fridayEveningSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayEveningSur ==''){
            fridayEveningSur = tempPValue;
          }
          else{
            fridayEveningSur = fridayEveningSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell97').value  = fridayEveningSur+'-evening-sur';
    var fridayEveningBO =''; 
      $("#fridayEveningBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayEveningBO ==''){
            fridayEveningBO = tempPValue;
          }
          else{
            fridayEveningBO = fridayEveningBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell98').value  = fridayEveningBO+'-evening-bo';
    var fridayEveningIIG =''; 
      $("#fridayEveningIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayEveningIIG ==''){
            fridayEveningIIG = tempPValue;
          }
          else{
            fridayEveningIIG = fridayEveningIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell99').value  = fridayEveningIIG+'-evening-iig';
    var fridayEveningICX =''; 
      $("#fridayEveningICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayEveningICX ==''){
            fridayEveningICX = tempPValue;
          }
          else{
            fridayEveningICX = fridayEveningICX+','+tempPValue;
          } 
        }
      });        
      document.getElementById('cell100').value  = fridayEveningICX+'-evening-icx';




/*************************************************/
/**************************************************/



    var saturdayNightShiftLeader =''; 
      $("#saturdayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayNightShiftLeader ==''){
            saturdayNightShiftLeader = tempPValue;
          }
          else{
            saturdayNightShiftLeader = saturdayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell11').value =  saturdayNightShiftLeader+'-night-shift_leader';
    var saturdayNightSur =''; 
      $("#saturdayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayNightSur ==''){
            saturdayNightSur = tempPValue;
          }
          else{
            saturdayNightSur = saturdayNightSur+','+tempPValue;
          } 
        }
      });
    document.getElementById('cell12').value =  saturdayNightSur+'-night-sur';
    var saturdayNightBO =''; 
      $("#saturdayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayNightBO ==''){
            saturdayNightBO = tempPValue;
          }
          else{
            saturdayNightBO = saturdayNightBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell13').value =  saturdayNightBO+'-night-bo';
    var saturdayNightIIG =''; 
      $("#saturdayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayNightIIG ==''){
            saturdayNightIIG = tempPValue;
          }
          else{
            saturdayNightIIG = saturdayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell14').value =  saturdayNightIIG+'-night-iig';
    var saturdayNightICX =''; 
      $("#saturdayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(saturdayNightICX ==''){
            saturdayNightICX = tempPValue;
          }
          else{
            saturdayNightICX = saturdayNightICX+','+tempPValue;
          } 
        }
      });  
      document.getElementById('cell15').value =  saturdayNightICX+'-night-icx';


/***********************************Sunday***********************************/



      var sundayNightShiftLeader =''; 
      $("#sundayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayNightShiftLeader ==''){
            sundayNightShiftLeader = tempPValue;
          }
          else{
            sundayNightShiftLeader = sundayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell26').value = sundayNightShiftLeader+'-night-shift_leader';
    var sundayNightSur =''; 
      $("#sundayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayNightSur ==''){
            sundayNightSur = tempPValue;
          }
          else{
            sundayNightSur = sundayNightSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell27').value = sundayNightSur+'-night-sur';
    var sundayNightBO =''; 
      $("#sundayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayNightBO ==''){
            sundayNightBO = tempPValue;
          }
          else{
            sundayNightBO = sundayNightBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell28').value = sundayNightBO+'-night-bo';
    var sundayNightIIG =''; 
      $("#sundayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayNightIIG ==''){
            sundayNightIIG = tempPValue;
          }
          else{
            sundayNightIIG = sundayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell29').value = sundayNightIIG+'-night-iig';
    var sundayNightICX =''; 
      $("#sundayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(sundayNightICX ==''){
            sundayNightICX = tempPValue;
          }
          else{
            sundayNightICX = sundayNightICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell30').value = sundayNightICX+'-night-icx';
/***********************************Monday***********************************/


      var mondayNightShiftLeader =''; 
      $("#mondayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayNightShiftLeader ==''){
            mondayNightShiftLeader = tempPValue;
          }
          else{
            mondayNightShiftLeader = mondayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell41').value  = mondayNightShiftLeader+'-night-shift_leader';
    var mondayNightSur =''; 
      $("#mondayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayNightSur ==''){
            mondayNightSur = tempPValue;
          }
          else{
            mondayNightSur = mondayNightSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell42').value  = mondayNightSur+'-night-sur';
    var mondayNightBO =''; 
      $("#mondayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayNightBO ==''){
            mondayNightBO = tempPValue;
          }
          else{
            mondayNightBO = mondayNightBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell43').value  = mondayNightBO+'-night-bo';
    var mondayNightIIG =''; 
      $("#mondayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayNightIIG ==''){
            mondayNightIIG = tempPValue;
          }
          else{
            mondayNightIIG = mondayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell44').value  = mondayNightIIG+'-night-iig';
    var mondayNightICX =''; 
      $("#mondayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(mondayNightICX ==''){
            mondayNightICX = tempPValue;
          }
          else{
            mondayNightICX = mondayNightICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell45').value  = mondayNightICX+'-night-icx';
/***********************************Tuesday***********************************/



      var tuesdayNightShiftLeader =''; 
      $("#tuesdayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayNightShiftLeader ==''){
            tuesdayNightShiftLeader = tempPValue;
          }
          else{
            tuesdayNightShiftLeader = tuesdayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell56').value  = tuesdayNightShiftLeader+'-night-shift_leader';
    var tuesdayNightSur =''; 
      $("#tuesdayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayNightSur ==''){
            tuesdayNightSur = tempPValue;
          }
          else{
            tuesdayNightSur = tuesdayNightSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell57').value  = tuesdayNightSur+'-night-sur';
    var tuesdayNightBO =''; 
      $("#tuesdayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayNightBO ==''){
            tuesdayNightBO = tempPValue;
          }
          else{
            tuesdayNightBO = tuesdayNightBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell58').value  = tuesdayNightBO+'-night-bo';
    var tuesdayNightIIG =''; 
      $("#tuesdayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayNightIIG ==''){
            tuesdayNightIIG = tempPValue;
          }
          else{
            tuesdayNightIIG = tuesdayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell59').value  = tuesdayNightIIG+'-night-iig';
    var tuesdayNightICX =''; 
      $("#tuesdayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(tuesdayNightICX ==''){
            tuesdayNightICX = tempPValue;
          }
          else{
            tuesdayNightICX = tuesdayNightICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell60').value  = tuesdayNightICX+'-night-icx';



/***********************************Wednesday***********************************/




      var wednesdayNightShiftLeader =''; 
      $("#wednesdayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayNightShiftLeader ==''){
            wednesdayNightShiftLeader = tempPValue;
          }
          else{
            wednesdayNightShiftLeader = wednesdayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell71').value  = wednesdayNightShiftLeader+'-night-shift_leader';
    var wednesdayNightSur =''; 
      $("#wednesdayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayNightSur ==''){
            wednesdayNightSur = tempPValue;
          }
          else{
            wednesdayNightSur = wednesdayNightSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell72').value  = wednesdayNightSur+'-night-sur';
    var wednesdayNightBO =''; 
      $("#wednesdayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayNightBO ==''){
            wednesdayNightBO = tempPValue;
          }
          else{
            wednesdayNightBO = wednesdayNightBO+','+tempPValue;
          } 
        }
      }); 
  document.getElementById('cell73').value  = wednesdayNightBO+'-night-bo';
    var wednesdayNightIIG =''; 
      $("#wednesdayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayNightIIG ==''){
            wednesdayNightIIG = tempPValue;
          }
          else{
            wednesdayNightIIG = wednesdayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell74').value  = wednesdayNightIIG+'-night-iig';
    var wednesdayNightICX =''; 
      $("#wednesdayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(wednesdayNightICX ==''){
            wednesdayNightICX = tempPValue;
          }
          else{
            wednesdayNightICX = wednesdayNightICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell75').value  = wednesdayNightICX+'-night-icx';

/***********************************Thursday***********************************/


      var thursdayNightShiftLeader =''; 
      $("#thursdayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayNightShiftLeader ==''){
            thursdayNightShiftLeader = tempPValue;
          }
          else{
            thursdayNightShiftLeader = thursdayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell86').value  = thursdayNightShiftLeader+'-night-shift_leader';
    var thursdayNightSur =''; 
      $("#thursdayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayNightSur ==''){
            thursdayNightSur = tempPValue;
          }
          else{
            thursdayNightSur = thursdayNightSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell87').value  = thursdayNightSur+'-night-sur';
    var thursdayNightBO =''; 
      $("#thursdayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayNightBO ==''){
            thursdayNightBO = tempPValue;
          }
          else{
            thursdayNightBO = thursdayNightBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell88').value  = thursdayNightBO+'-night-bo';
    var thursdayNightIIG =''; 
      $("#thursdayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayNightIIG ==''){
            thursdayNightIIG = tempPValue;
          }
          else{
            thursdayNightIIG = thursdayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell89').value  = thursdayNightIIG+'-night-iig';
    var thursdayNightICX =''; 
      $("#thursdayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(thursdayNightICX ==''){
            thursdayNightICX = tempPValue;
          }
          else{
            thursdayNightICX = thursdayNightICX+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell90').value  = thursdayNightICX+'-night-icx';



/***********************************Friday***********************************/






      var fridayNightShiftLeader =''; 
      $("#fridayNightShiftLeader p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayNightShiftLeader ==''){
            fridayNightShiftLeader = tempPValue;
          }
          else{
            fridayNightShiftLeader = fridayNightShiftLeader+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell101').value  = fridayNightShiftLeader+'-night-shift_leader';
    var fridayNightSur =''; 
      $("#fridayNightSur p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayNightSur ==''){
            fridayNightSur = tempPValue;
          }
          else{
            fridayNightSur = fridayNightSur+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell102').value  = fridayNightSur+'-night-sur';
    var fridayNightBO =''; 
      $("#fridayNightBO p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayNightBO ==''){
            fridayNightBO = tempPValue;
          }
          else{
            fridayNightBO = fridayNightBO+','+tempPValue;
          } 
        }
      }); 
      document.getElementById('cell103').value  = fridayNightBO+'-night-bo';
    var fridayNightIIG =''; 
      $("#fridayNightIIG p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayNightIIG ==''){
            fridayNightIIG = tempPValue;
          }
          else{
            fridayNightIIG = fridayNightIIG+','+tempPValue;
          } 
        }
      });
      document.getElementById('cell104').value  = fridayNightIIG+'-night-iig';
    var fridayNightICX =''; 
      $("#fridayNightICX p").each(function(e){ 
        var tempPValue = $(this).attr("value");
        if(tempPValue != ''){
          if(fridayNightICX ==''){
            fridayNightICX = tempPValue;
          }
          else{
            fridayNightICX = fridayNightICX+','+tempPValue;
          } 
        }
      });  
      document.getElementById('cell105').value  = fridayNightICX+'-night-icx';
      //var sundayArr;
      document.getElementById("weekRosterForm").submit();

}

// if($(hiddenTextField).val() != ''){
          //   $(hiddenTextField).val(prevValue+','+dragID);
          // }
          // else{
          //   $(hiddenTextField).val(dragID);
          // } 


          //ui.draggable.draggable('option','revertDuration',0); 
            //alert(removeParentID); 

// var removeParentID = $(this).closest("div").attr("id")
          // alert(removeParentID);
          // document.getElementById(removeParentID).lastChild.remove();            

//$('#'+dragID).remove();
             //alert( '#'+idArr2[0]+'\\.'+idArr2[1]);


//ui.draggable.draggable('option','revertDuration',0); 
          // btn.onclick = make_buttn_draggable(dragID);


    // $('.square').draggable({
    
    // });
    // $('#canvas').droppable({
    //     drop: function (e, ui) {
    //         $(ui.draggable).clone().appendTo($(this));
    //     }
    // })
// function jq( myid ) {
 
//     return "#" + myid.replace( /(:|\.|\[|\]|,)/g, "\\$1" );
 
// }
  // var showmen = 'showmen.barua';
  //   $( '#390' ).draggable({
  //     revert:"valid",
  //     helper:"clone"
  //   });
  //   $( '#390' ).selectable();
  //   $("#raihan.parvez").draggable({
  //     revert:"valid",
  //     helper:"clone"
  //   });
  //   $( "#raihan.parvez" ).selectable();
    // $( ".colclass" ).draggable({
    //   appendTo: "body",
    //   cursor: "move",
    //   helper: 'clone',
    //   revert: "invalid"
    // });
    // $("#saturdayDayShiftLeader").droppable({
    //    tolerance: "intersect",
    //     accept: ".colclass",
    //   drop: function( event, ui ) {
    //     $(this).append($(ui.draggable))
    //  }
    // });
    // $("#sundayDayShiftLeader").droppable({
    //    tolerance: "intersect",
    //     accept: ".colclass",
    //   drop: function( event, ui ) {
    //     $(this).append($(ui.draggable))
    //  }
    // });
    // $("#evening").droppable({
    //    tolerance: "intersect",
    //     accept: ".colclass",
    //   drop: function( event, ui ) {
    //     $(this).append($(ui.draggable));
    //     //alert($('#evening > div').length);
    //  }
    // });
    // $( "#droppable" ).droppable({
    //   drop: function( event, ui ) {
    //       var dragID = ui.draggable.attr('id');
    //       var prevValue = $('#textField').val()+dragID;
    //       $('#textField').val(prevValue+',')
    // //   }
    // });


    //$( '#'+idArr2[0]+'\\.'+idArr2[1] ).selectable();
    // alert('#'+idArr2[0]+'\\.'+idArr2[1] );

        //alert('sundayShiftLeader : '+sundayShiftLeader);

      // alert('#'+idArr2[0]+'\\.'+idArr2[1] );   
    //   var weekDayArr = ["saturday","sunday","monday","tuesday","wednesday","thursday","friday"];
    // var timeArr = ["Day","Evening","Night"];
    // var positionArr = ["ShiftLeader","Sur","BO","IIG","ICX"];
    // var count =0;
    // for(var i=0;i<weekDayArr.length;i++){
    //   for(var j=0;j<timeArr.length;j++){
    //     for(var k=0;k<positionArr.length;k++){
    //       //var weekDayArr[i]+timeArr[j]+positionArr[k] = '';
    //       //var  ;
    //       eval("var " + weekDayArr[i]+timeArr[j]+positionArr[k] + "=''");

    //       //alert(tempVar);
    //       tempVar =  weekDayArr[i]+timeArr[j]+positionArr[k];
    //       // var weekDayArr[i]+timeArr[j]+positionArr[k] =''; 
    //       $("#"+tempVar+" p").each(function(e){ 
    //         var tempPValue = $(this).attr("value");
    //         if(tempPValue != ''){
    //           if(tempVar ==''){
    //             tempVar = tempPValue;
    //           }
    //           else{
    //             tempVar = tempVar+','+tempPValue;
    //           } 
    //         }
    //         if(count != '3'){
    //           alert(tempVar);
    //           count++;
    //         }
    //       });

    //     }
    //   }
    // }