@extends('layouts.app')


@section('content')

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Email</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <form action="{{ action('AdminController@delete_user', $user->id) }}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="/admin/user/{{ $user->id }}"><button type="submit" class="btn btn-primary btn-block">Edit</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <a href="/admin/users/create"><button type="submit" class="btn btn-success">Add new user</button>
</div>

@endsection
