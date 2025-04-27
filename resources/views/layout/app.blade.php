<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'laravel course')</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #f5f7fa;
        }

        header,
        footer {
            background: #0d6efd;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        header a {
            text-decoration: none;
            color: white;
            margin: 0 20px;
        }

        main {
            max-width: 960px;
            margin: 2rem auto;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 2px 6px #ccc;
        }

        table {
            width: 100%;
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

    </style>
</head>
<body>
    

    <center>

        <header>
            @include('layout.nav')
        </header>
        
        <main>
            @yield('content', 'the page is empty')
        </main>


        <footer>
            @include('layout.footer')
        </footer>
        
    </center>




</body>
</html>
