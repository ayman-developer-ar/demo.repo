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

</body>
</html>
    
