@extends('layouts.app')


@section('content')



<div class="container">
    @include('flashmessages')
    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Product name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

        @if(isset($user_products))
        @foreach ($user_products as $user_product)
            <tr>
                <th scope="row">{{ $user_product->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user_product->name }}</td>
                <td>
                    <a href="/myaccount/products/{{ $user_product->id }}"><button class="btn btn-primary btn-block">Edit</button></a>
                </td>
                <td>
                    <form action="{{ action('UsersController@delete_product', $user_product->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>

    </table>

    <div class="row">
        <div class="col-md-4">
            <a href="/personalised-product"><button type="submit" class="btn btn-success btn-block">Add new product</button></a>
        </div>
    </div>

</div>


@endsection
