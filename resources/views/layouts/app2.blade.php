<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SISMA Ma Ali Maksum</title>
    <!-- Icons-->
    <link href="{{asset('src')}}/node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="{{asset('src')}}/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="{{asset('src')}}/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('src')}}/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('src')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('src')}}/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link href="{{asset('dt')}}/datatables.css" rel="stylesheet">

  </head>
  @guest
  <body class="app flex-row align-items-center">
  @else
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('src/img/alma.png')}}" width="50" height="50" alt="MA Ali Maksum">
        <img class="navbar-brand-minimized" src="{{asset('src/img/alma.png')}}" width="20" height="20" alt="MA Ali Maksum">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav">
        <li class="nav-item d-md-down">
          <a class="nav-link" href="{{url('pesan')}}">
            <i class="fa fa-envelope-o"></i>
            <span class="badge badge-pill badge-danger">5</span>
          </a>
        </li>
        <li class="nav-item d-md-down">
          <a class="nav-link" href="{{url('tugas')}}">
            <i class="fa fa-tasks"></i>
            <span class="badge badge-pill badge-warning">10</span>
          </a>
        </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown" style="margin-right: 15px;">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <span><i class="icon-user"></i></span>
            <img class="img-avatar" src="img/avatars/6.jpg" alt="{{Auth::user()->name}}">
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong>Account</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-bell-o"></i> Informasi
              <span class="badge badge-info">42</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-envelope-o"></i> Pesan
              <span class="badge badge-success">42</span>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-tasks"></i> Pekerjaan
              <span class="badge badge-danger">42</span>
            </a>
            <div class="dropdown-header text-center">
              <strong>Settings</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-user"></i> Profile</a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-wrench"></i> Settings</a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-usd"></i> Payments
              <span class="badge badge-secondary">42</span>
            </a>
            <div class="dropdown-header text-center">
              <strong>Logout</strong>
            </div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  <i class="fa fa-lock"></i> Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </div>
        </li>
      </ul>
  </header>
  @endguest
  <div class="app-body">
  @yield('content')
  </div>
  @guest
  @else
   <footer class="app-footer">
      <div>
        <a href="https://coreui.io">Ma Ali Maksum</a>
        <span>&copy; {{date('Y')}}</span>
      </div>
      <div class="ml-auto">
        <span>Template by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
  @endguest
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('src')}}/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('src')}}/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('src')}}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('src')}}/node_modules/pace-progress/pace.min.js"></script>
    <script src="{{asset('src')}}/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="{{asset('src')}}/node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>

    <!-- Plugins and scripts required by index view-->
    <script src="{{asset('src')}}/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="{{asset('src')}}/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <script src="{{asset('src')}}/js/main.js"></script>
    <!-- datatable -->
    <script type="text/javascript" src="{{asset('dt')}}/datatables.js"></script>
  </body>
</html>