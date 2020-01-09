@extends('layouts.app')


@section('content')



<div class="container">
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
        @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->user['name'] }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->height }}</td>
                <td>{{ $product->width }}</td>
                {{-- Update button - form --}}
                <td>
                    <a href="/admin/product/{{ $product->id }}">Edit</a>
                </td>

            </tr>
        @endforeach
        </tbody>

    </table>
</div>


@endsection