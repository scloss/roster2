$(document).ready(function(){
   var locationUrl = window.location.href;
   var pos = locationUrl.indexOf("?");
   if(pos == -1){
   		var lastWord = locationUrl.split("/").splice(-1);
   }
   else{
   		var lastWordArr = locationUrl.split("?");
   		var lastWord = lastWordArr[0].split("/").splice(-1);
   }
   var menuArr = ['viewRoster','create','editRoster','leavePendingView','swapPendingView','leave','swap','profile','report'];
   for(var i=0;i<9;i++){
   		if(lastWord == menuArr[i]){
   			document.getElementById(menuArr[i]+'Id').className = "Active";
   		}
   		else{
   			try{
	   			document.getElementById(menuArr[i]+'Id').className = "dem";
	   		}
	   		catch(err){
	   			
	   		}
   		}
   }
});