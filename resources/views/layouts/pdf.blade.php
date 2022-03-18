<!doctype html>
<html lang="en" style="margin-top:2px;margin-right:35px;margin-left:10px;">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        body {
            src: url('{{ asset('/fonts/Firefly.ttf') }}');
            format('truetype');
            font-family: 'Firefly';
        }

    </style>
</head>

<body class="c-app">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-112 cold-sm-12">
                <div class="wrapper d-flex flex-column justify-content-end min-vh-100 bg-light">

                    <div class="container-fluid body flex-grow-1 px-3">
                        <main class="main">
                            <div class="container-fluid float-right">
                                @yield('content')
                            </div>
                        </main>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
