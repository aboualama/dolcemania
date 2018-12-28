@extends('layouts.backend')

@section('content')

    <h1 style="text-transform: capitalize;">{{$order->client->company_name}} Order NO: {{$order->id}}</h1>

    <table class="datatable table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>price</th>
            <th>quanity</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $index=>$product)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->qty_1}}</td>
                <td>{{ $product->qty_1 * $product->price  }}</td>
            </tr>
        @endforeach
        <tr>
            <th colspan="4">Total</th>
            <th>{{$total}} </th>
        </tr>
        </tbody>
    </table>


@endsection


