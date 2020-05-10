<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" itemprop="description" content="{{ $page->description ?? ' Ratchet is a PHP WebSocket library for serving real-time bi-directional messages between clients and server' }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css', 'assets/build') }}">
    <title>{{ $page->title ?? 'Ratchet - PHP WebSockets' }}</title>


    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="apple-touch-icon" href="/assets/images/logo.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/logo.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/logo.png">

</head>
<body>



<header class="fixed-top app-container">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
        <h1 class="h5 my-0 mr-md-auto font-weight-normal logo">
            <a href="#" class="v-center">
                <img src="/assets/images/logo.png">
                <span class="ml-2">Ratchet</span>
            </a>
        </h1>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Home</a>
            <a class="p-2 text-dark" href="#">Documentations</a>
            <a class="p-2 text-dark" href="#">API Docs</a>
            <a class="p-2 text-dark" href="#">Demo</a>
        </nav>
    </div>
</header>


<div class="app-container">

    <main role="main">
        @yield('body')
    </main>


    <footer class="pt-4 pt-md-5 border-top ml-5 mr-5 pb-5">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/assets/images/logo.png" alt="" width="32" height="32">
                <small class="mb-3 text-muted">© 2011-2017 Chris Boden</small>
                <small class="d-block">Code is published under the MIT license</small>
            </div>
            <div class="col-6 col-md offset-2">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
        </div>
    </footer>

</div>

<script src="{{ mix('js/app.js', 'assets/build') }}"></script>
</body>
</html>