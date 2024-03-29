<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jingga Kreatif</title>
    {{-- Custom Bootstrap 5.2 --}}
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/landing/main.css">
    @if ($active === 'home')
        <link rel="stylesheet" href="/styles/landing/portfolio.css">
    @elseif ($active === 'vendor')
        <link rel="stylesheet" href="/styles/landing/vendor.css">
    @elseif ($active === 'crew')
        <link rel="stylesheet" href="/styles/landing/crew.css">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    @include('landing.partials.navbar')
    @yield('content')
    @include('landing.partials.footer')
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    @if ($active === 'vendor')
        <script src="/scripts/landing/vendor.js"></script>
    @endif
</body>

</html>
