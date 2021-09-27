<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ _file('project/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ _file('project/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ _file('project/admin/dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert -->
<script src="{{ _file('project/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
{!! _alert() !!}

@yield('_script')