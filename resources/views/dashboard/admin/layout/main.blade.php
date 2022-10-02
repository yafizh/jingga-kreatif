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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="icon" type="image/png" href="/images/favicon.png" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/styles/trix.css">
    <script type="text/javascript" src="/scripts/trix.js"></script>

    <style>
        .small-td {
            width: 1%;
            white-space: nowrap;
        }

        .bg-primary {
            background-color: #ff5100 !important;
        }

        aside .active {
            background-color: #ff5100 !important;
            color: white !important;
        }

        .card-primary .card-header {
            background-color: #ff5100 !important;
        }

        .page-item.active .page-link {
            color: #fff !important;
            background-color: #ff5100 !important;
            border-color: #ff5100 !important;
        }

        .page-link {
            color: #ff5100 !important;
            background-color: #fff !important;
            border: 1px solid #dee2e6 !important;
        }

        .page-link:hover {
            color: #fff !important;
            background-color: #ff5100 !important;
            border-color: #ff5100 !important;
        }

        .btn-primary {
            border-color: #ff5100;
            background-color: #ff5100 !important;
        }

        .btn-primary:hover {
            border-color: #e64900;
            background-color: #e64900 !important;
        }

        .navbar-brand:hover,
        .navbar-nav .nav-item a:hover {
            color: #ff5100 !important;
        }
    </style>
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
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <!-- Admin LTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

</body>

</html>
