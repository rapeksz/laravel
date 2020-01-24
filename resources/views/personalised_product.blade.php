@extends('layouts.app')

@section('content')

<div class="container">
    @include('inc.flashmessages')
    <div class="row">
        <div class="col-md-3">
            <form action="{{ action('UsersController@update_product', $product->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" name="personalised_name">
                </div>
                @foreach ($productValues as $attribute_value)
                    <div class="form-group">
                        <label>{{ ucfirst($attribute_value->attribute->name) }}</label>
                        @if($attribute_value->attribute->name == 'height' || $attribute_value->attribute->name == 'width')
                        <input type ="number" class ="form-control" value="{{ $attribute_value->value }}" name="{{ $attribute_value->attribute->name }}">
                        @else
                        <input type ="text" class ="form-control" value="{{ $attribute_value->value }}" name="{{ $attribute_value->attribute->name }}">
                        @endif
                    </div>
                @endforeach

                @if ($product->user_id == Auth::id())
                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                @endif

            </form>

            @if ($product->user_id == Auth::id())
                <form action="{{ action('UsersController@delete_product', $product->id) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                </form>
                <button type="button" class="btn btn-success btn-block" onclick="showProduct()">Preview</button>
            @endif

        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-center" name="placeForPersonalisedProduct">
                <div class="personalisedProduct" style="
                @foreach($productValues as $attribute_value)
                    @if($attribute_value->attribute->name == 'height' || $attribute_value->attribute->name == 'width' || $attribute_value->attribute->name == 'border-radius' || $attribute_value->attribute->name == 'border-width')
                        {{ $attribute_value->attribute->name }}:{{ $attribute_value->value }}px;
                    @elseif ($attribute_value->attribute->name == 'color')
                        background-{{ $attribute_value->attribute->name }}:{{ $attribute_value->value }};
                    @else
                        {{ $attribute_value->attribute->name }}:{{ $attribute_value->value }};
                    @endif
                @endforeach
                "></div>
            </div>
        </div>
    </div>
</div>

@endsection
