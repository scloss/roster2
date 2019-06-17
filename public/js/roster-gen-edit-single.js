var getJSON = function(url) {
  return new Promise(function(resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open('get', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status == 200) {
        resolve(xhr.response);
      } else {
        reject(status);
      }
    };
    xhr.send();
  });
};
//alert('asdf');
//var editDates = document.getElementById("editDate").value;
var urlAddress = window.location.search;
var tempDataArr = urlAddress.split("editDate=");
var urlAdd = '/roster2/public/returnRosterSingle?editDate='+tempDataArr[1];
//alert(urlAdd);

getJSON(urlAdd).then(function(data) {
    var tempData;
    for(var i=0;i<15;i++){
      tempData = data.records[i].dropbox; 
      if(tempData != ''){
        var tempDataArr = tempData.split(",");
        for(var j=0;j<tempDataArr.length;j++){
          createAutoButton(tempDataArr[j],i+1);
        }
        
      }
      
    }
    //tempData = data.records[1].dropbox; 
    //createAutoButton(tempData,1);
    //alert(tempData);
}, function(status) { 
  
});

var j=0;


$(document).ready(function(){
   $('td').hover(function() {
    var t = parseInt($(this).index()) + 1;
    $(this).parents('table').find('td:nth-child(' + t + ')').addClass('highlighted');
},
function() {
    var t = parseInt($(this).index()) + 1;
    $(this).parents('table').find('td:nth-child(' + t + ')').removeClass('highlighted');
});
});

function createAutoButton(uname,counter){
  // alert(uname);
  // alert(counter);
  var droppableBoxForUsers = 'droppableBoxForUsers'+counter;
  var name = uname;
  var dragID = name; 
  var idArr2 = dragID.split(".");
  //var prevValue = $(hiddenTextField).val(); 
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
  // var removeParentClass = ui.draggable.attr('class');
  // if(removeParentClass !='dragUser ng-binding ng-scope ui-draggable ui-draggable-handle ui-selectable'){
  //   var removeParentID = ui.draggable.attr('id');
  //             //$( "div" ).remove(removeParentID);
  //   ui.draggable.remove();
  //   var tid = document.getElementById(removeParentID).parentNode.id;
  //             //$( "div" ).remove(tid);
  //   document.getElementById(tid).remove();
  //             //tempVar = j-1;
  //             //alert(removeParentID)
  //             //$( '#'+idArr2[0]+tempVar ).remove();            
  // }  
}
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
      document.getElementById('cell10').value = saturdayEveningICX+'-evening-icx';

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

      document.getElementById("weekRosterForm").submit();
}