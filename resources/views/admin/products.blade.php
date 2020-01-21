@extends('layouts.app')


@section('content')

<div class="container">
    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Namer</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->user->name }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <a href="/myaccount/products/{{ $product->id }}">Edit</a>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>
</div>


@endsection
