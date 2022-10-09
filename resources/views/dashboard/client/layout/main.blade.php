<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jingga Kreatif</title>
    @if ($active == 'vendor' || $active == 'setting.theme-vendor')
        <link rel="stylesheet" href="/styles/vendor.css">
    @elseif ($active == 'meeting')
        <link rel="stylesheet" href="/styles/meeting.css">
    @endif
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="/styles/dashboard.css">
    <link rel="stylesheet" href="/styles/navbar.css">
    <link rel="stylesheet" href="/styles/sidebar.css">
    <link rel="stylesheet" href="/styles/mobile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    @include('dashboard.client.partials.sidebar')
    <main class="d-flex flex-column align-items-center">
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/scripts/helper.js"></script>
    @if ($active == 'vendor')
        <script src="/scripts/vendor.js"></script>
    @elseif ($active == 'setting.theme-vendor')
        <script src="/scripts/client/edit_vendor.js"></script>
    @elseif ($active == 'registration')
        <script src="/scripts/registration.js"></script>
    @elseif ($active == 'setting.client')
        <script src="/scripts/client/edit_client.js"></script>
    @elseif ($active == 'groom' || $active == 'bride' || $active == 'setting.newlywed')
        <script src="/scripts/newlywed.js"></script>
    @elseif ($active == 'payment')
        <script src="/scripts/payment.js"></script>
    @elseif ($active == 'meeting')
        <script src="/scripts/meeting.js"></script>
    @endif
</body>

</html>
