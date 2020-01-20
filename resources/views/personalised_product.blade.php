@extends('layouts.app')



@section('content')

<div class="container">
    @include('flashmessages')
    <div class="row">
        <div class="col-md-3">
            <form>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $producto->name }}">
                </div>
                @foreach ($product_attributes_option as $value)
                <div class="form-group">
                    <label>{{ ucfirst($value->attribute->name) }}</label>
                    <input type ="text" class ="form-control" value="{{ $value->value }}">
                </div>
                @endforeach
            </form>
        </div>

        <div class="col-md-9">

        </div>
    </div>
</div>

@endsection
