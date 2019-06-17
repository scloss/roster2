<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Roster View</title>
<link rel="stylesheet" type="text/css" href="admin_view_css/admin_view.css">
</head>

<body>
<div class="wrapper">
<center style="color:white"><h1>Date:{{$today}}</h1></center>

	<br>
	<br>

  <center style="color:white"><h3>Morning</h3></center>
  
  <div class="table">

    <div class="row header">
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Phone
      </div>
      <div class="cell">
        Address
      </div>
      <div class="cell">
        Area
      </div>
    </div>

    @foreach($morning_address as $row)

    <div class="row">
      <div class="cell" data-title="Name">
        {{ $row->emp_name }}
      </div>
      <div class="cell" data-title="Age">
        {{ $row->phone }}
      </div>
      <div class="cell" data-title="Occupation">
        {{ $row->address }}
      </div>
      <div class="cell" data-title="Location">
        {{ $row->area }}
      </div>
    </div>

    @endforeach
  </div>

  <center style="color:white"><h3>Evening</h3></center>
  
  <div class="table">
    
    <div class="row header green">
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Phone
      </div>
      <div class="cell">
        Address
      </div>
      <div class="cell">
        Area
      </div>      
    </div>

     @foreach($evening_address as $row)

    <div class="row">
      <div class="cell" data-title="Name">
        {{ $row->emp_name }}
      </div>
      <div class="cell" data-title="Age">
        {{ $row->phone }}
      </div>
      <div class="cell" data-title="Occupation">
        {{ $row->address }}
      </div>
      <div class="cell" data-title="Location">
        {{ $row->area }}
      </div>
    </div>

    @endforeach     
  </div>
  
  <center style="color:white"><h3>Night</h3></center>
  <div class="table">
    
    <div class="row header blue">
      <div class="cell">
        Name
      </div>
      <div class="cell">
        Phone
      </div>
      <div class="cell">
        Address
      </div>
      <div class="cell">
        Area
      </div>
    </div>

    @foreach($night_address as $row)

    <div class="row">
      <div class="cell" data-title="Name">
        {{ $row->emp_name }}
      </div>
      <div class="cell" data-title="Age">
        {{ $row->phone }}
      </div>
      <div class="cell" data-title="Occupation">
        {{ $row->address }}
      </div>
      <div class="cell" data-title="Location">
        {{ $row->area }}
      </div>
    </div>

    @endforeach  
    
  </div>
  
</div>	


</body>

</html>