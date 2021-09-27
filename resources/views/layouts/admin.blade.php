<!DOCTYPE html>
<html lang="en">
@include('admin.partials._head')
@include('admin.partials._preload')

<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.partials._nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.partials._leftside')

        <!-- Content Wrapper. Contains page content -->
        @yield('_content')
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('admin.partials._rightside')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('admin.partials._footer')
    </div>
    <!-- ./wrapper -->
    @include('admin.partials._script')
</body>
</html>
