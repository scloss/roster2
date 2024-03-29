<html>
<head>
	<title></title>
	<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/new.css')}}" rel="stylesheet"> 
    <link href="{{asset('css/charts-graphs.css')}}" rel="stylesheet">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css">

    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','http://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-40304444-1', 'iamsrinu.com');
      ga('send', 'pageview');

    </script>
</head>
<body>
 <header>
      <a href="index-1.htm" class="logo">
        <img src="img\logo.png" alt="Logo">
      </a>
      <div class="pull-right">
        <ul id="mini-nav" class="clearfix">
          <li class="list-box hidden-xs">
            <a href="#" data-toggle="modal" data-target="#modalMd">
              <span class="text-white">Code</span> <i class="fa fa-code"></i>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-danger" id="myModalLabel5">Coding Style </h4>
                  </div>
                  <div class="modal-body">
                    <img src="img\documentation.png" alt="Esquare Admin">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-box dropdown">
            <a id="drop5" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-film"></i>
            </a>
            <span class="info-label info-bg">9+</span>
            <ul class="dropdown-menu stats-widget clearfix">
              <li>
                <h5 class="text-success">$37895</h5>
                <p>Revenue <span class="text-success">+2%</span></p>
                <div class="progress progress-mini">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
              </li>
              <li>
                <h5 class="text-warning">47,892</h5>
                <p>Downloads <span class="text-warning">+39%</span></p>
                <div class="progress progress-mini">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (warning)</span>
                  </div>
                </div>
              </li>
              <li>
                <h5 class="text-danger">28214</h5>
                <p>Uploads <span class="text-danger">-7%</span></p>
                <div class="progress progress-mini">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (danger)</span>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          <li class="list-box dropdown">
            <a id="drop5" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-calendar"></i>
            </a>
            <span class="info-label success-bg">6</span>
            <ul class="dropdown-menu server-activity">
              <li>
                <p><i class="fa fa-flag text-info"></i> Pending request<span class="time">3 hrs</span></p>
              </li>
              <li>
                <p><i class="fa fa-fire text-warning"></i> Server Crashed<span class="time">3mins</span></p>
              </li>
              <li>
                <p><i class="fa fa-user text-success"></i> 3 New users<span class="time">1 min</span></p>
              </li>
              <li>
                <p><i class="fa fa-bell text-danger"></i>9 pending requests<span class="time">5 min</span></p>
              </li>
              <li>
                <p><i class="fa fa-plane text-info"></i> Performance<span class="time">25 min</span></p>
              </li>
              <li>
                <p><i class="fa fa-envelope text-warning"></i>12 new emails<span class="time">25 min</span></p>
              </li>
              <li>
                <p><i class="fa fa-cog icon-spin text-success"></i> Location settings<span class="time">4 hrs</span></p>
              </li>
            </ul>
          </li>
          <!-- <li class="list-box user-profile">
            <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
              <img src="img\user5.png" alt="Bluemoon User">
            </a>
            <ul class="dropdown-menu server-activity">
              <li>
                <p><i class="fa fa-cog text-info"></i> Account Settings</p>
              </li>
              <li>
                <p><i class="fa fa-fire text-warning"></i> Payment Details</p>
              </li>
              <li>
                <div class="demo-btn-group clearfix">
                  <a href="#" data-original-title="" title="">
                    <i class="fa fa-facebook fa-lg icon-rounded info-bg"></i>
                  </a>
                  <a href="#" data-original-title="" title="">
                    <i class="fa fa-twitter fa-lg icon-rounded twitter-bg"></i>
                  </a>
                  <a href="#" data-original-title="" title="">
                    <i class="fa fa-linkedin fa-lg icon-rounded linkedin-bg"></i>
                  </a>
                  <a href="#" data-original-title="" title="">
                    <i class="fa fa-pinterest fa-lg icon-rounded danger-bg"></i>
                  </a>
                  <a href="#" data-original-title="" title="">
                    <i class="fa fa-google-plus fa-lg icon-rounded success-bg"></i>
                  </a>
                </div>
              </li>
              <li>
                <div class="demo-btn-group clearfix">
                  <button href="#" class="btn btn-danger">
                    Logout
                  </button>
                </div>
              </li>
            </ul>
          </li> -->
        </ul>
      </div>
    </header>
    <!-- Header End -->

    <!-- Main Container start -->
    <div class="dashboard-container">

      <div class="container">
        <!-- Top Nav Start -->
        <div id='cssmenu'>
          <ul>
            <li class='active'>
              <a href='#'><i class="fa fa-dashboard"></i>Dashboards</a>
              <ul>
                 <li><a href='index-1.htm'>Dashboard</a></li>
                 <li><a href='index2.htm'>Dashboard V2</a></li>
                 <li><a href='index3.htm'>Dashboard V3</a></li>
              </ul>
            </li>
            <li>
              <a href="forms.htm">
                <i class="fa fa-align-justify"></i>
                Forms
              </a>
            </li>
            <li class=''>
              <a href='#'><i class="fa fa-bar-chart-o"></i>Graphs</a>
              <ul>
                 <li><a href='flot.htm'>Flot Graphs</a></li>
                 <li><a href='graphs.htm'>Google Graph</a></li>
                 <li><a href='vector-maps.htm'>Vector Maps</a></li>
              </ul>
            </li>
            <li class=''>
              <a href='#'><i class="fa fa-flask"></i>UI Elements</a>
              <ul>
                 <li><a href='ui-elements.htm'>UI Elements</a></li>
                 <li><a href='panels.htm'>Panels</a></li>
                 <li><a href='notifications.htm'>Notifications</a></li>
                 <li><a href='icons.htm'>Icons</a></li>
              </ul>
            </li>
            <li class=''>
              <a href='#'><i class="fa fa-dashboard"></i>Extras</a>
              <ul>
                <li><a href='#'>Blog</a>
                  <ul>
                    <li><a href='blog.htm'>Blog</a></li>
                    <li><a href='blog-full-page.htm'>Blog Full Page</a></li>
                  </ul>
                </li>
                <li><a href='edit-profile.htm'>Edit Profile</a></li>
                <li><a href='invoice.htm'>Invoice</a></li>
                <li><a href='default.htm'>default</a></li>
                <li><a href='#'>Submenu</a>
                  <ul>
                    <li><a href='#'>Sub Product</a></li>
                    <li><a href='#'>Sub Product</a></li>
                    <li><a href='#'>Sub Product</a></li>
                  </ul>
                </li>
                <li><a href='login.htm'>Login</a></li>
                <li><a href='help.htm'>Help</a></li>
                <li><a href='404.htm'>404</a></li>
                <li><a href='500.htm'>500</a></li>
              </ul>
            </li>
            <li class=''>
              <a href='#'><i class="fa fa-table"></i>Tables</a>
              <ul>
                 <li><a href='tables.htm'>Tables</a></li>
                 <li><a href='pricing.htm'>Pricing Plan</a></li>
                 <li><a href='timeline.htm'>Timeline</a></li>
              </ul>
            </li>
            <li>
              <a href="media.htm">
                <i class="fa fa-picture-o"></i>
                Media
              </a>
            </li>
            <li class="hidden-sm">
              <a href="calendar.htm">
                <i class="fa fa-calendar"></i>
                Calendar
              </a>
            </li>
            <li class="hidden-sm">
              <a href="typography.htm">
                <i class="fa fa-font"></i>
                Typography
              </a>
            </li>
          </ul>
        </div>
        @yield('content')
			<footer>
          <p>© BlueMoon 2013-15</p>
        </footer>

      </div>
    </div>
	<!-- Scripts -->
	
<script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.js')}}"></script>
    
    <!-- jQuery UI JS -->
    <script src="{{asset('js/jquery-ui-v1.10.3.js')}}"></script>

    <!-- Just Gage -->
    <script src="{{asset('js/justgage/justgage.js')}}"></script>
    <script src="{{asset('js/justgage/raphael.2.1.0.min.js')}}"></script>

    <!-- Flot Charts -->
    <script src="{{asset('js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.orderBar.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.stack.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.resize.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{asset('js/menu.js')}}"></script>
    <script src="{{asset('js/custom-index2.js')}}"></script>
    
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
