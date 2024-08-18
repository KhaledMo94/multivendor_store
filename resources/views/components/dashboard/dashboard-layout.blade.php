<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    <x-dashboard.header-styles />
    {{$optional_header_styles ?? ''}}
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <x-dashboard.nav-bar  />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <x-dashboard.aside />

        <!-- content-wrapper -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper px-3">
            {{ $slot }}
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
        <x-dashboard.footer />
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <x-dashboard.footer-scripts  />
    {{ $optional_footer_scripts ?? ''}}
</body>

</html>
