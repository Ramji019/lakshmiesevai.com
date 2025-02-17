<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Title -->
  <title>Lakshmiesevsi.com</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}" />

  <!-- Plugins File -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/introjs.min.css') }}" />

  <!-- Master Stylesheet [If you remove this CSS file, your file will be broken undoubtedly.] -->
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader-book">
      <div class="inner">
        <div class="left"></div>
        <div class="middle"></div>
        <div class="right"></div>
      </div>
      <ul>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
  </div>
  <!-- /Preloader -->

  <!-- Choose Layout -->
  <div class="choose-layout-area">
    <div class="setting-trigger-icon" id="settingTrigger">
      <i class="ti-settings"></i>
    </div>
    <div class="choose-layout" id="chooseLayout">
      <div class="quick-setting-tab">
        <div class="widgets-todo-list-area">
          <h4 class="todo-title">Todo List:</h4>
          <form id="form-add-todo" class="form-add-todo">
            <input type="text" id="new-todo-item" class="new-todo-item form-control" name="todo"
              placeholder="Add New" />
            <input type="submit" id="add-todo-item" class="add-todo-item" value="+" />
          </form>

          <form id="form-todo-list">
            <ul id="flaptToDo-list" class="todo-list">

            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
  <div class="flapt-page-wrapper">
    <!-- Sidemenu Area -->
    <div class="flapt-sidemenu-wrapper">
      <!-- Desktop Logo -->
      <div class="flapt-logo">
        <a href="{{ url('/dashboard') }}"><img class="desktop-logo" src="{{ asset('assets/img/logo/lak.png') }}" alt="Desktop Logo" />
          <img class="small-logo" src="{{ asset('assets/img/logo/lak.png') }}" alt="Mobile Logo" /></a>
      </div>

      <!-- Side Nav -->
      @include('layouts.sidebar')
    </div>

    <!-- Page Content -->
    <div class="flapt-page-content">
      <!-- Top Header Area -->
      @include('layouts.header')

      <!-- Main Content Area -->
      <div class="main-content introduction-farm">

        @yield('content')

        <!-- Footer Area -->
        @include('layouts.footer')
      </div>
    </div>
  </div>

  <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

  <!-- Must needed plugins to the run this Template -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/default-assets/setting.js') }}"></script>
  <script src="{{ asset('assets/js/default-assets/scrool-bar.js') }}"></script>
  <script src="{{ asset('assets/js/todo-list.js') }}"></script>

  <!-- Active JS -->
  <script src="{{ asset('assets/js/default-assets/active.js') }}"></script>

  <!-- These plugins only need for the run this page -->
  <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard-custom.js') }}"></script>
  @stack('page_scripts')
</body>

</html>
