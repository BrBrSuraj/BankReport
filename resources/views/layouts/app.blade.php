<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    @yield('styles')
    <link rel="stylesheet" href="asset(nepali-date-picker.css)">

    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/[email protected]/dist/nepaliDatePicker.min.css" />
    <style>
        body {
            margin-left: auto;
        }

    </style>
    @livewireStyles
    @powerGridStyles
</head>
@auth

    <body class="c-app">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    @include('layouts.sidebar')

                </div>
                <div class="col-md-10 cold-sm-12">
                    <div class="wrapper d-flex flex-column justify-content-end min-vh-100 bg-light">
                        @include('layouts.header')
                        <div class="container-fluid body flex-grow-1 px-3">
                            <main class="main">
                                <div class="container-fluid float-right">
                                    @yield('content')
                                </div>

                            </main>

                        </div>
                    </div>
                    <footer class="footer">
                        <div></div>
                        <div class="ms-auto">Develop by&nbsp;<a
                                href="https://coreui.io/bootstrap/ui-components/">BRBRSuraj</a></div>
                    </footer>
                </div>
            </div>
        </div>

        </div>

        <!-- Optional JavaScript -->
        <!-- Popper.js first, then CoreUI JS -->
        @yield('javascripts')
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="asset('js/nepali-date-picker.js')"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

        <!-- after -->
        @powerGridScripts

        @livewireScripts
        @powerGridScripts

    </body>
@endauth


</html>
