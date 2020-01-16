@extends('layouts.app')


@section('content')



<div class="container">
    @include('flashmessages')
    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Color</th>
                <th scope="col">Height</th>
                <th scope="col">Width</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

        @foreach ($user_products as $user_product)
            <tr>
                <th scope="row">{{ $user_product->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user_product->color }}</td>
                <td>{{ $user_product->height }}</td>
                <td>{{ $user_product->width }}</td>
                <td>
                    <a href="/myaccount/products/{{ $user_product->id }}">Edit</a>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="row">
        <div class="col-md-4">
            <a href="/product-configurator"><button type="submit" class="btn btn-success btn-block">Add new product</button></a>
        </div>
    </div>

</div>


@endsection