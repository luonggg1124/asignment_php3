<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asignment</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">


    @vite(['resources/lib/lib/owlcarousel/assets/owl.carousel.min.css', 'resources/css/style.css', 'resources/lib/lib/easing/easing.min.js', 'resources/lib/lib/owlcarousel/owl.carousel.min.js', 'resources/lib/mail/jqBootstrapValidation.min.js', 'resources/lib/mail/contact.js', 'resources/lib/js/main.js'])

    @livewireStyles
</head>

<body>
    @livewireScripts
    {{ $slot }}

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
