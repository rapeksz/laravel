@extends('layouts.app')

@section('content')
<div class="container">
    @include('flashmessages')
    <div class="row">
        <div class="col-md-4">
            <form action="{{ action('AdminController@create_user_db') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="newuser_name">Name</label>
                    <input type="text" class="form-control" name="newuser_name" id="newuser_name">
                </div>

                <div class="form-group">
                    <label for="newuser_email">Email</label>
                    <input type="text" class="form-control" name="newuser_email" id="newuser_email">
                </div>

                <div class="form-group">
                    <label for="newuser_password">Password</label>
                    <input type="password" class="form-control" name="newuser_password" id="newuser_password">
                </div>

                <button type="submit" class="btn btn-success btn-block">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
