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


    
