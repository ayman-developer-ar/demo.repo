{{-- 

@extends('layout.app')

@section('title', 'Products')

@section('content')

    <h2>Products List</h2>
    <table>
        <thead>
            <tr>
                <th>Product name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <th>{{ $p['name'] }}</th>
                    <th>{{ $p['price'] }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
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
        <h2>Products List</h2>
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <th>{{ $p['name'] }}</th>
                        <th>{{ $p['price'] }}</th>
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
    
