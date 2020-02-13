<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Font Awesomes -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Custom Styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">

</head>
<body>

    <div id="app">

        <nav-bar></nav-bar>

        <main role="main" class="container main-content">

            @yield('content')
            
        </main>

        <custom-footer></custom-footer>

    </div>

    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
