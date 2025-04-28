<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
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

        thead {
            color: blue;
        }

    </style>
</head>
<body>

    <header>
        @include('layout.nav')
    </header>
    
    <center>
        <h2>Categories List</h2>
        <table>
            <thead>
                <tr>
                    <th>Category name</th>
                    <th>Category type</th>
                    <th>Category Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr>
                        <th>{{ $c['name'] }}</th>
                        <th>{{ $c['type'] }}</th>
                        <th>{{ $c['price'] }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>

    <footer>
        @include('layout.footer')
    </footer>

</body>
</html>
    
