<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Jakarta');
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>

  @media print
  {
    #not-print-btn { display: none; }
  }

  @media print
  {
    #not-print-breadcrumbs { display:none; }
  }

  @media print
  {
    #not-print-footer { display:none; }
  }

  <?php if(Auth::guest()){ ?>
  .content-wrapper {
    margin-left: 0px;
  }
  .main-footer {
    margin-left: 0px;
  }
  <?php } else { } ?>

  </style>

  @yield('style')
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="getTime()">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PSP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <!--
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li><a href="" id="time"></a></li>
          @if (Auth::guest())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Selamat Datang <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
          </li>
          @else
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
          @endif
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @if(Auth::guest())
  @else
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="{{ url('/home') }}">
            <!--<i class="fa fa-dashboard"></i>--> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview {{ active(['year.*', 'ahp_summary']) }}">
          <a href="#">
            <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ active('year.*') }}"><a href="{{ url('year') }}">Assessment</a></li>
          </ul>
        </li>
        <li class="treeview {{ active(['alternative.*','division.*','rank_salary.*','criteria.*','criteria_comparison.*', 'create.*','update.*']) }}">
          <a href="#">
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ active('alternative.*') }}"><a href="{{ url('alternative') }}">Master Data Karyawan</a></li>
            <li class="{{ active('division.*') }}"><a href="{{ url('division') }}">Master Data Division</a></li>
            <li class="{{ active('rank_salary.*') }}"><a href="{{ url('rank_salary') }}">Master Data Rank Gaji</a></li>
            <li class="{{ active('criteria.*') }}"><a href="{{ url('criteria') }}">Master Data Criteria</a></li>
            <li class="{{ active('criteria_comparison.*') }}"><a href="{{ url('criteria_comparison') }}">Criteria Comparison</a></li>
            <li class="{{ active('criteria_comparison.*') }}"><a href="{{ url('ahp') }}">Pairwise Comparison</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  @endif

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      @yield('breadcrumb')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer id="not-print-footer" class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy;</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<!-- Sparkline -->
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<!-- datepicker -->
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>

<script type="text/javascript">

function getTime(){
  var weekday = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
  var months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

  var today = new Date();
  var day = weekday[today.getDay()];
  var date = today.getDate();
  var month = months[today.getMonth()];
  var year = today.getFullYear();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();

  // add zero if number <= 9
  m = checkTime(m);
  s = checkTime(s);
  $('#time').text(day + ", " + date + " " + month + " "+ year + " " + h+":"+m+":"+s);
  t = setTimeout(function(){getTime()},500);
}

function checkTime(i){
  if (i<10)
    {
    i="0" + i;
    }
  return i;
}
</script>

@yield('script')
</body>
</html>
