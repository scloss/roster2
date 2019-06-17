
<html>
<head>
	<title></title>
	<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/new.css')}}" rel="stylesheet"> 
    <link href="{{asset('css/charts-graphs.css')}}" rel="stylesheet">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">

    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.11.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="{{asset('js/appHome.js')}}"></script>
    
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  
</head>
<body>
 <header>
      <a href="index-1.htm" class="logo">
        <!-- <img src="img\logo.png" alt="Logo"> -->
      </a>
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix">
          <li class="list-box user-profile">
            <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
              <?php $uid = $_SESSION['dashboard_user_id']; $url ="/roster2/public/img/profile/".$uid.".jpg";$altURL ="/roster2/public/img/profile/default.jpg";?>
                <img src="<?php echo $url; ?>" alt="Smiley face">
              <!-- <img src="img\user5.png" alt="Bluemoon User"> -->
            </a>
            <ul class="dropdown-menu server-activity">
              <li>
                <p><?php echo $_SESSION['dashboard_user_id']; ?></p>
              </li>
              <li>
                <a href="../../login_plugin/logout.php" style="color:black;font-weight:bold;">LOGOUT</a>
              </li>
              <!-- <li>
                <div class="demo-btn-group clearfix">
                  <button href="#" class="btn btn-danger">
                    
                  </button>
                </div>
              </li> -->
            </ul>
          </li>
        </ul>
      </div>
    </header>
    <!-- Header End -->

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container-fluid">
        <!-- Top Nav Start -->
        <div id='cssmenu'>
          
          <ul>
            <!-- <li>
              <a href='#'><i class="fa fa-dashboard"></i>Home</a>
            </li> -->
            <li id="viewRosterId" class='dem'>
              <a href='{{url('viewRoster')}}'>
                <i class="fa fa-align-justify"></i>
                View
              </a>
            </li>

            <li id="createId" class='dem'>
              <a href='{{url('create')}}'><i class="fa fa-bar-chart-o"></i>Create</a>
              
            </li>
            <li id="editRosterId" class='dem'>
              <a href='{{url('editRoster')}}'><i class="fa fa-bar-chart-o"></i>Edit</a>
              
            </li>
            <li id="leavePendingViewId" class='dem'>
              <a href='{{url('leavePendingView')}}'><i class="fa fa-picture-o"></i>Leave Request</a>
            </li>
            <li id="swapPendingViewId" class='dem'>
              <a href='{{url('swapPendingView')}}'><i class="fa fa-picture-o"></i>Swap Request</a>
            </li>
           
            <li id="leaveId" class='dem'>
              <a href='{{url('leave')}}'><i class="fa fa-picture-o"></i>Leave</a>
            </li>
            <li id="swapId" class='dem'>
              <a href='{{url('swap')}}'><i class="fa fa-picture-o"></i>Swap</a>
            </li>
            <li id="profileId" class='dem'>
              <a href='{{url('profile')}}'><i class="fa fa-picture-o"></i>Individual Stat</a>
            </li>
            <li id="leaveTakenId" class='dem'>
              <a href='{{url('leaveView')}}'><i class="fa fa-picture-o"></i>Leave History</a>
            </li>
            <li id="swapTakenId" class='dem'>
              <a href='{{url('swapView')}}'><i class="fa fa-picture-o"></i>Swap History</a>
            </li>
            <li id="reportId" class='dem'>
              <a href='{{url('report')}}'><i class="fa fa-calendar"></i>Reporting</a>
            </li>
            


          </ul>
         
        </div>
        @yield('content')
			<footer>
          <center><p>©SCL NOC OSS,2016</p></center>
        </footer>

      </div>
    </div>
	<!-- Scripts -->
	

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.js')}}"></script>
    
    <!-- jQuery UI JS 
    <script src="{{asset('js/jquery-ui-v1.10.3.js')}}"></script>-->

    <!-- Just Gage 
    <script src="{{asset('js/justgage/justgage.js')}}"></script>-->
    <script src="{{asset('js/justgage/raphael.2.1.0.min.js')}}"></script>

    <!-- Flot Charts
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.orderBar.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.stack.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.resize.min.js')}}"></script> -->

    <!-- Custom JS -->
    <script src="{{asset('js/menu.js')}}"></script>
    <!--<script src="{{asset('js/custom-index2.js')}}"></script>-->
    
    <script type="text/javascript">
      //ScrollUp
      $(function () {
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
      });
    </script>
</body>
</html>
