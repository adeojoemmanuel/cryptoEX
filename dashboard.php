<?php
    session_start();
    function load($class){
        include('backend/'. $class .".php");
    }
    load('IOhander');
    $io = new IOhandler;
    if (!isset($_SESSION['userid'])){
        header("Location: login.php");
    }
    
    $idletime=60;//after 60 seconds the user gets logged out
    if (time()-$_SESSION['timestamp']>$idletime){
        session_destroy();
        session_unset();
    }else{
        $_SESSION['timestamp']=time();
    }
    //on session creation
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crypto EX</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar bg-primary">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                 <div class="brand-text brand-big"><strong>CryptoEx</strong></div>
                  <div class="brand-text brand-small"><strong>CE</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages                        -->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>Sent You Message</span>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong>Read all messages    </strong></a></li>
                  </ul>
                </li>
                <!-- Logout    -->
                <li class="nav-item"><a href="login.html" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                      <li class="active"><a href="index.html"> <i class="icon-home"></i>Dashboard</a></li>
                      <li><a href="tables.html"> <i class="icon-grid"></i>Wallets</a></li>
                      <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Transaction</a></li>
                      <li><a href="forms.html"> <i class="icon-padnote"></i>Beneficiaries </a></li>
                      <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Exchange Currency</a>
                        <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                          <li><a href="#">Bitcoin</a></li>
                          <li><a href="#">Ethereum</a></li>
                          <li><a href="#">Ripple</a></li>
                        </ul>
                      </li>
          </ul><span class="heading">Tools</span>
          <ul class="list-unstyled">
            <li> <a href="#"> <i class="icon-flask"></i>Settings </a></li>
            <li> <a href="#"> <i class="icon-screen"></i>Help </a></li>
            <li> <a href="#"> <i class="icon-mail"></i>Logout </a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>New<br>Clients</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong>25</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Work<br>Orders</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong>70</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>New<br>Invoices</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong>40</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>Open<br>Cases</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong>50</strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Dashboard Header Section    -->
          <section class="dashboard-header">
            
                <!-- Line Chart            -->
                <!DOCTYPE html>
<html>
<head>
  <title>graph</title>
  <style type="text/css">
    #chartdiv {
      width : 100%;
      height  : 500px;
    }                     
  </style>
</head>
<body>
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <!-- <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script> -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
  <div id="chartdiv"></div>                                         
</body>

<script type="text/javascript">
  var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [{
        "date": "2012-07-27",
        "value": 13
    }, {
        "date": "2012-07-28",
        "value": 11
    }, {
        "date": "2012-07-29",
        "value": 15
    }, {
        "date": "2012-07-30",
        "value": 16
    }, {
        "date": "2012-07-31",
        "value": 18
    }, {
        "date": "2012-08-01",
        "value": 13
    }, {
        "date": "2012-08-02",
        "value": 22
    }, {
        "date": "2012-08-03",
        "value": 23
    }, {
        "date": "2012-08-04",
        "value": 20
    }, {
        "date": "2012-08-05",
        "value": 17
    }, {
        "date": "2012-08-06",
        "value": 16
    }, {
        "date": "2012-08-07",
        "value": 18
    }, {
        "date": "2012-08-08",
        "value": 21
    }, {
        "date": "2012-08-09",
        "value": 26
    }, {
        "date": "2012-08-10",
        "value": 24
    }, {
        "date": "2012-08-11",
        "value": 29
    }, {
        "date": "2012-08-12",
        "value": 32
    }, {
        "date": "2012-08-13",
        "value": 18
    }, {
        "date": "2012-08-14",
        "value": 24
    }, {
        "date": "2012-08-15",
        "value": 22
    }, {
        "date": "2012-08-16",
        "value": 18
    }, {
        "date": "2012-08-17",
        "value": 19
    }, {
        "date": "2012-08-18",
        "value": 14
    }, {
        "date": "2012-08-19",
        "value": 15
    }, {
        "date": "2012-08-20",
        "value": 12
    }, {
        "date": "2012-08-21",
        "value": 8
    }, {
        "date": "2012-08-22",
        "value": 9
    }, {
        "date": "2012-08-23",
        "value": 8
    }, {
        "date": "2012-08-24",
        "value": 7
    }, {
        "date": "2012-08-25",
        "value": 5
    }, {
        "date": "2012-08-26",
        "value": 11
    }, {
        "date": "2012-08-27",
        "value": 13
    }, {
        "date": "2012-08-28",
        "value": 18
    }, {
        "date": "2012-08-29",
        "value": 20
    }, {
        "date": "2012-08-30",
        "value": 29
    }, {
        "date": "2012-08-31",
        "value": 33
    }, {
        "date": "2012-09-01",
        "value": 42
    }, {
        "date": "2012-09-02",
        "value": 35
    }, {
        "date": "2012-09-03",
        "value": 31
    }, {
        "date": "2012-09-04",
        "value": 47
    }, {
        "date": "2012-09-05",
        "value": 52
    }, {
        "date": "2012-09-06",
        "value": 46
    }, {
        "date": "2012-09-07",
        "value": 41
    }, {
        "date": "2012-09-08",
        "value": 43
    }, {
        "date": "2012-09-09",
        "value": 40
    }, {
        "date": "2012-09-10",
        "value": 39
    }, {
        "date": "2012-09-11",
        "value": 34
    }, {
        "date": "2012-09-12",
        "value": 29
    }, {
        "date": "2012-09-13",
        "value": 34
    }, {
        "date": "2012-09-14",
        "value": 37
    }, {
        "date": "2012-09-15",
        "value": 42
    }, {
        "date": "2012-09-16",
        "value": 49
    }, {
        "date": "2012-09-17",
        "value": 46
    }, {
        "date": "2012-09-18",
        "value": 47
    }, {
        "date": "2012-09-19",
        "value": 55
    }, {
        "date": "2012-09-20",
        "value": 59
    }, {
        "date": "2012-09-21",
        "value": 58
    }, {
        "date": "2012-09-22",
        "value": 57
    }, {
        "date": "2012-09-23",
        "value": 61
    }, {
        "date": "2012-09-24",
        "value": 59
    }, {
        "date": "2012-09-25",
        "value": 67
    }, {
        "date": "2012-09-26",
        "value": 65
    }, {
        "date": "2012-09-27",
        "value": 61
    }, {
        "date": "2012-09-28",
        "value": 66
    }, {
        "date": "2012-09-29",
        "value": 69
    }, {
        "date": "2012-09-30",
        "value": 71
    }, {
        "date": "2012-10-01",
        "value": 67
    }, {
        "date": "2012-10-02",
        "value": 63
    }, {
        "date": "2012-10-03",
        "value": 46
    }, {
        "date": "2012-10-04",
        "value": 32
    }, {
        "date": "2012-10-05",
        "value": 21
    }, {
        "date": "2012-10-06",
        "value": 18
    }, {
        "date": "2012-10-07",
        "value": 21
    }, {
        "date": "2012-10-08",
        "value": 28
    }, {
        "date": "2012-10-09",
        "value": 27
    }, {
        "date": "2012-10-10",
        "value": 36
    }, {
        "date": "2012-10-11",
        "value": 33
    }, {
        "date": "2012-10-12",
        "value": 31
    }, {
        "date": "2012-10-13",
        "value": 30
    }, {
        "date": "2012-10-14",
        "value": 34
    }, {
        "date": "2012-10-15",
        "value": 38
    }, {
        "date": "2012-10-16",
        "value": 37
    }, {
        "date": "2012-10-17",
        "value": 44
    }, {
        "date": "2012-10-18",
        "value": 49
    }, {
        "date": "2012-10-19",
        "value": 53
    }, {
        "date": "2012-10-20",
        "value": 57
    }, {
        "date": "2012-10-21",
        "value": 60
    }, {
        "date": "2012-10-22",
        "value": 61
    }, {
        "date": "2012-10-23",
        "value": 69
    }, {
        "date": "2012-10-24",
        "value": 67
    }, {
        "date": "2012-10-25",
        "value": 72
    }, {
        "date": "2012-10-26",
        "value": 77
    }, {
        "date": "2012-10-27",
        "value": 75
    }, {
        "date": "2012-10-28",
        "value": 70
    }, {
        "date": "2012-10-29",
        "value": 72
    }, {
        "date": "2012-10-30",
        "value": 70
    }, {
        "date": "2012-10-31",
        "value": 72
    }, {
        "date": "2012-11-01",
        "value": 73
    }, {
        "date": "2012-11-02",
        "value": 67
    }, {
        "date": "2012-11-03",
        "value": 68
    }, {
        "date": "2012-11-04",
        "value": 65
    }, {
        "date": "2012-11-05",
        "value": 71
    }, {
        "date": "2012-11-06",
        "value": 75
    }, {
        "date": "2012-11-07",
        "value": 74
    }, {
        "date": "2012-11-08",
        "value": 71
    }, {
        "date": "2012-11-09",
        "value": 76
    }, {
        "date": "2012-11-10",
        "value": 77
    }, {
        "date": "2012-11-11",
        "value": 81
    }, {
        "date": "2012-11-12",
        "value": 83
    }, {
        "date": "2012-11-13",
        "value": 80
    }, {
        "date": "2012-11-14",
        "value": 81
    }, {
        "date": "2012-11-15",
        "value": 87
    }, {
        "date": "2012-11-16",
        "value": 82
    }, {
        "date": "2012-11-17",
        "value": 86
    }, {
        "date": "2012-11-18",
        "value": 80
    }, {
        "date": "2012-11-19",
        "value": 87
    }, {
        "date": "2012-11-20",
        "value": 83
    }, {
        "date": "2012-11-21",
        "value": 85
    }, {
        "date": "2012-11-22",
        "value": 84
    }, {
        "date": "2012-11-23",
        "value": 82
    }, {
        "date": "2012-11-24",
        "value": 73
    }, {
        "date": "2012-11-25",
        "value": 71
    }, {
        "date": "2012-11-26",
        "value": 75
    }, {
        "date": "2012-11-27",
        "value": 79
    }, {
        "date": "2012-11-28",
        "value": 70
    }, {
        "date": "2012-11-29",
        "value": 73
    }, {
        "date": "2012-11-30",
        "value": 61
    }, {
        "date": "2012-12-01",
        "value": 62
    }, {
        "date": "2012-12-02",
        "value": 66
    }, {
        "date": "2012-12-03",
        "value": 65
    }, {
        "date": "2012-12-04",
        "value": 73
    }, {
        "date": "2012-12-05",
        "value": 79
    }, {
        "date": "2012-12-06",
        "value": 78
    }, {
        "date": "2012-12-07",
        "value": 78
    }, {
        "date": "2012-12-08",
        "value": 78
    }, {
        "date": "2012-12-09",
        "value": 74
    }, {
        "date": "2012-12-10",
        "value": 73
    }, {
        "date": "2012-12-11",
        "value": 75
    }, {
        "date": "2012-12-12",
        "value": 70
    }, {
        "date": "2012-12-13",
        "value": 77
    }, {
        "date": "2012-12-14",
        "value": 67
    }, {
        "date": "2012-12-15",
        "value": 62
    }, {
        "date": "2012-12-16",
        "value": 64
    }, {
        "date": "2012-12-17",
        "value": 61
    }, {
        "date": "2012-12-18",
        "value": 59
    }, {
        "date": "2012-12-19",
        "value": 53
    }, {
        "date": "2012-12-20",
        "value": 54
    }, {
        "date": "2012-12-21",
        "value": 56
    }, {
        "date": "2012-12-22",
        "value": 59
    }, {
        "date": "2012-12-23",
        "value": 58
    }, {
        "date": "2012-12-24",
        "value": 55
    }, {
        "date": "2012-12-25",
        "value": 52
    }, {
        "date": "2012-12-26",
        "value": 54
    }, {
        "date": "2012-12-27",
        "value": 50
    }, {
        "date": "2012-12-28",
        "value": 50
    }, {
        "date": "2012-12-29",
        "value": 51
    }, {
        "date": "2012-12-30",
        "value": 52
    }, {
        "date": "2012-12-31",
        "value": 58
    }, {
        "date": "2013-01-01",
        "value": 60
    }, {
        "date": "2013-01-02",
        "value": 67
    }, {
        "date": "2013-01-03",
        "value": 64
    }, {
        "date": "2013-01-04",
        "value": 66
    }, {
        "date": "2013-01-05",
        "value": 60
    }, {
        "date": "2013-01-06",
        "value": 63
    }, {
        "date": "2013-01-07",
        "value": 61
    }, {
        "date": "2013-01-08",
        "value": 60
    }, {
        "date": "2013-01-09",
        "value": 65
    }, {
        "date": "2013-01-10",
        "value": 75
    }, {
        "date": "2013-01-11",
        "value": 77
    }, {
        "date": "2013-01-12",
        "value": 78
    }, {
        "date": "2013-01-13",
        "value": 70
    }, {
        "date": "2013-01-14",
        "value": 70
    }, {
        "date": "2013-01-15",
        "value": 73
    }, {
        "date": "2013-01-16",
        "value": 71
    }, {
        "date": "2013-01-17",
        "value": 74
    }, {
        "date": "2013-01-18",
        "value": 78
    }, {
        "date": "2013-01-19",
        "value": 85
    }, {
        "date": "2013-01-20",
        "value": 82
    }, {
        "date": "2013-01-21",
        "value": 83
    }, {
        "date": "2013-01-22",
        "value": 88
    }, {
        "date": "2013-01-23",
        "value": 85
    }, {
        "date": "2013-01-24",
        "value": 85
    }, {
        "date": "2013-01-25",
        "value": 80
    }, {
        "date": "2013-01-26",
        "value": 87
    }, {
        "date": "2013-01-27",
        "value": 84
    }, {
        "date": "2013-01-28",
        "value": 83
    }, {
        "date": "2013-01-29",
        "value": 84
    }, {
        "date": "2013-01-30",
        "value": 81
    }]
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>
</html>

    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>