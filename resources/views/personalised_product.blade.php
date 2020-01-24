@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form>
                <div class="form-group">
                    <label>{{ $product->name }}</label>
                </div>
                @foreach ($getAttributes as $attribute)
                <div class="form-group">
                    <label>{{ ucfirst($attribute->name) }}</label>
                    <select name="{{ $attribute->name }}" class="form-control">
                    @foreach($attribute->attribute_option as $option)
                        <option>{{ $option->value }}</option>
                    @endforeach
                    </select>
                </div>
                @endforeach
            </form>
            <button type="input" class="btn btn-primary btn-block" onclick="addPreview()">Preview</button>
        </div>

        <div class="col-md-9">
            <div name="placeForPersonalisedProduct">
            </div>
        </div>
    </div>
</div>

@endsection


@endsection
