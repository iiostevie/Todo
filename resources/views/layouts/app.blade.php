<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Week1 Practice –– Task List
        </title>

        <!-- CSS And JavaScript -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .container {
                max-width: 300px;
            }
        </style>
    </head>


    <body>
        @show
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
            </nav>
        </div>

        <!-- special Blade directive that specifies where all child pages that extend the layout can inject their own content -->
        @yield('content')

    </body>

</html>
