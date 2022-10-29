<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/styles/trix.css">
    <script type="text/javascript" src="/scripts/trix.js"></script>

    {{-- Data Tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <script src="/scripts/helper.js"></script>

    @if (in_array($active, ['finish', 'wedding', 'cancel']))
        <link rel="stylesheet" href="/styles/admin/vendor.css">
    @endif

    <style>
        :root {
            --primary-color: #f15a24;
        }

        .small-td {
            width: 1%;
            white-space: nowrap;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        aside .active {
            background-color: var(--primary-color) !important;
            color: white !important;
        }

        .card-primary .card-header {
            background-color: var(--primary-color) !important;
        }

        .card .nav .nav-link:not(.active):hover {
            color: var(--primary-color) !important;
        }

        .card .nav .nav-link.active {
            background-color: var(--primary-color) !important;
        }

        .page-item.active .page-link {
            color: #fff !important;
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        .page-link {
            color: var(--primary-color) !important;
            background-color: #fff !important;
            border: 1px solid #dee2e6 !important;
        }

        .page-link:hover {
            color: #fff !important;
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }

        .btn-primary {
            border-color: var(--primary-color);
            background-color: var(--primary-color) !important;
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            border-color: var(--primary-color);
            background-color: var(--primary-color) !important;
            color: #fff;
        }

        .btn-primary:hover {
            border-color: #e64900;
            background-color: #e64900 !important;
        }

        .navbar-brand:hover,
        .navbar-nav .nav-item a:hover {
            color: var(--primary-color) !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('dashboard.admin.partials.navbar')

        @include('dashboard.admin.partials.sidebar')

        @yield('content')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <!-- Admin LTE -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $('#dataTable').DataTable({
            "aaSorting": [],
            "ordering": false
        });
    </script>
</body>

</html>
