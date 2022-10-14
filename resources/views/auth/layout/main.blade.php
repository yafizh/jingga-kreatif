<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title_page }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <style>
        .card-primary.card-outline {
            border-top-color: #F15A24;
        }

        .btn-primary:visited,
        .btn-primary:active {
            border-color: #ea480e !important;
            background-color: #ea480e !important;
        }

        .btn-primary:hover {
            border-color: #f05016;
            background-color: #f05016;
        }

        .btn-primary:focus,
        .btn-primary,
        .primary {
            border-color: #F15A24;
            background-color: #F15A24;
        }

        .btn-primary {
            border-color: #ff5100;
            background-color: #ff5100 !important;
        }

        .btn-primary:hover {
            border-color: #e64900;
            background-color: #e64900 !important;
        }

        #btn-login:hover {
            background-color: #ff5100;
            color: white;
        }

        .navbar-brand:hover,
        .navbar-nav .nav-item a:hover {
            color: #ff5100 !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
    @yield('content')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    @if ($title_page === 'Lupa Password')
        <script>
            document.querySelector('form').addEventListener('submit', async function(e) {
                e.preventDefault();
                document.querySelector('p.d-none').classList.remove('d-none');
                this.classList.add('d-none');
                const response = await fetch(
                    `${window.location.origin}/forgot-password/${document.querySelector('input[name="email"]').value}`, {
                        method: 'POST',
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]')
                                .value,
                        },
                    }
                ).then((response) => response.json());
            });
        </script>
    @endif
</body>

</html>
