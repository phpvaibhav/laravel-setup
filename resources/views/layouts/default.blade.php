<!DOCTYPE html>
<html lang="en">
<head>
 @include('includes.head')
</head>
<body id="page-top" data-base-url="{{url('/')}}">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
        @include('includes.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         @include('includes.header')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            @if(Session::has('success'))
              <div class="alert alert-success">
              {{Session::get('success')}}
              </div>
            @endif
            @if(Session::has('fail'))
              <div class="alert alert-danger">
              {{Session::get('fail')}}
              </div>
            @endif
            @yield('content')
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
          @include('includes.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  @include('includes.foot')

</body>

</html>
