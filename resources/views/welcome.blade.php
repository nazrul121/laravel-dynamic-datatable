<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LibertyUI Premium Bootstrap Admin Dashboard Template</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('back/vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('back/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('back/vendors/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('back/vendors/jquery-bar-rating/fontawesome-stars.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('back/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="/storage/images/favicon.png" />
</head>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    @include('backPanel.includes.header')
   
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      @include('backPanel.includes.rightTopBar')

      <!-- partial:partials/_sidebar.html -->
      @include('backPanel.includes.leftNav')
      
      <div class="main-panel">
        <div class="content-wrapper">
           @yield('main_content')
        </div> 
       
        <!-- partial:partials/_footer.html -->
        @include('backPanel.includes.footer')
      </div>
    </div>

  </div>

  <!-- plugins:js -->
  <script src="{{asset('back/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('back/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('back/vendors/progressbar.js/progressbar.min.js')}}"></script>
  <script src="{{asset('back/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script> 
  <script src="{{asset('back/vendors/jquery-bar-rating/jquery.barrating.min.js')}}"></script>
  <script src="{{asset('back/vendors/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{asset('back/vendors/raphael/raphael.min.js')}}"></script>
  <script src="{{asset('back/vendors/morris.js/morris.min.js')}}"></script>
  <!-- End plugin js forback/ this page-->
  <!-- inject:js -->
  <script src="{{asset('back/js/off-canvas.js')}}"></script>
  <script src="{{asset('back/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('back/js/template.js')}}"></script>
  <script src="{{asset('back/js/settings.js')}}"></script>
  <script src="{{asset('back/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for thiback/s page-->
  <script src="{{asset('back/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->

  @stack('scripts')
</body>

</html>

