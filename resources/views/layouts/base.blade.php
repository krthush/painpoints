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

        <div class="container mb-4">
          <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
              <div class="col-4 pt-1">
                <a class="blog-header-logo text-dark" href="#">Pain Points</a>
              </div>
              <div class="col-4 d-flex justify-content-end align-items-center">
                <nav class="nav d-flex justify-content-between">
                  <a class="p-2 text-muted" href="#">Problems</a>
                  <a class="p-2 text-muted" href="#">Solutions/Ideas</a>
                  <a class="p-2 text-muted" href="#">About</a>
                </nav>
              </div>
            </div>
          </header>
        </div>

        <main role="main" class="container">

            @yield('content')
            
        </main>

        <footer class="blog-footer">
          <p> Problems and Solutions page built for emit by <a href="https://github.com/krthush">Thush</a>.</p>
          <p>
            <a href="#">Back to top</a>
          </p>
        </footer>

    </div>

    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
