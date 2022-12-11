<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UOR | Group Project</title>

  <link href="/img/logo/02.png" rel="icon">
  <link href="/img/logo/02.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>
       
        @auth
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/logout" class="nav-link">Logout</a>
        </li>
        @endauth
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Messages Dropdown Menu -->
        <li class="">
          <a class="nav-link" href="/logout">
            <i class="fas fa-sign-out-alt"></i>
          </a>
          
        </li>
        <!-- Notifications Dropdown Menu -->
       
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
      <!-- Brand Logo -->
     
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if(Auth::User()->grade_id != 0)
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('uploads/profile/Auth::User()->url')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::User()->name}}</a>
          </div>
        </div>
        @endif

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          @if(Auth::User()->url != "")
          <div class="image">
            <img src="/uploads/profile/{{Auth::User()->url}}" class="img-circle elevation-2" alt="User Image" style="height:40px;width:40px;border-radius:50%;object-fit:cover">
          </div>
          @endif
          <div class="info">
            <a href="#" class="d-block">{{Auth::User()->name}}</a>
          </div>
        </div>

       

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <x-sidenav />
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color:#fff">

      @if(isset($name))
        @if($name == "userhome")
            <x-subdashboard/>
        @elseif($name == "newarticles")
            <x-newarticles/>
        @elseif($name == "articles")
            <x-articles/>
        @elseif($name == "viewarticle")
            <x-viewarticle articleid="{{$articleid}}"/>
        @elseif($name == "otherarticles")
            <x-otherarticles/>
        @elseif($name == "viewarticleadmin")
            <x-viewarticleadmin articleid="{{$articleid}}"/>
        @elseif($name == "createusers")
            <x-createusers/>
        @elseif($name == "allusers")
            <x-users/>
        @elseif($name == "subdashboard")
            <x-subdashboard/>
        @elseif($name == "viewuser")
            <x-viewuser userid="{{$userid}}"/>
        @elseif($name == "editarticle")
            <x-editarticle articleid="{{$articleid}}"/>
        @elseif($name == "rewrite")
            <x-rewrite articleid="{{$articleid}}"/>
        @elseif($name == "webarticles")
            <x-webarticles />                
        @elseif($name == "activitylog")
            <x-activitylog />    
        @elseif($name == "meeting")
            <x-meeting />  
        @elseif($name == "addmeeting")
            <x-addmeeting />  
        @elseif($name == "webapprovel")
            <x-conformation />  
        @elseif($name == "usersettings")
            <x-usersettings />  
        @elseif($name == "approveuser")
            <x-approveuser />  
        @elseif($name == "articlesettings")
            <x-articlesettings />  

            
        @endif
      @endif

      
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        Design & Develop by <a href="#" target="_blank" style="color:#000">University of Ruhuna</a>
      </div>
      <!-- Default to the left -->
      Copyright &copy;   All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap 4 -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <!-- AdminLTE App -->

  <script src="{{ asset('js/adminlte.min.js') }}"></script>

</body>

</html>