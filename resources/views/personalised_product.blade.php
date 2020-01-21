@extends('layouts.app')



@section('content')

<div class="container">
    @include('flashmessages')
    <div class="row">
        <div class="col-md-3">
            <form>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}">
                </div>
                @foreach ($product_attributes_option as $attribute_value)
                <div class="form-group">
                    <label>{{ ucfirst($attribute_value->attribute->name) }}</label>
                    <input type ="text" class ="form-control" value="{{ $attribute_value->value }}">
                </div>
                @endforeach
            </form>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-center" name="placeForPersonalisedProduct">
                <div class="personalisedProduct" style="
                @foreach($product_attributes_option as $attribute_value)
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
