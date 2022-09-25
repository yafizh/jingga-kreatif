<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/styles/trix.css">
    <script type="text/javascript" src="/scripts/trix.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('dashboard.admin.partials.navbar')

        @include('dashboard.admin.partials.sidebar')

        @yield('content')

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

</body>

</html>
