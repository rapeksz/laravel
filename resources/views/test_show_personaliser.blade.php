@extends('layouts.app')

@section('content')

<div class="container">
    @include('inc.flashmessages')
    <div class="row">
        <div class="col-md-3">
            @if(isset($newArray))
                <form action="{{ action('ProductsController@test_personalise') }}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="personalised_name">
                        </div>
                        @foreach ($newArray as $key => $value)
                            <div class="form-group" name="{{ strtolower($key) }}">
                                <label>{{ ucfirst($key) }}</label>
                                <input type="{{ strtolower($value) }}" class="form-control" name="{{ strtolower($key) }}[]">
                                <button type="button" class="btn btn-light btn-block" name="{{ strtolower($key) }}" id="{{ strtolower($key) }}" onclick="addInput(this.id)">Add new value</button>
                            </div>
                        @endforeach
                    <button type="submit" class="btn btn-primary btn-block">Generate</button>
                </form>
            @else
                {{--  --}}
            @endif
        </div>
    <div class="col-md-9">
    </div>
</div>

@endsection
