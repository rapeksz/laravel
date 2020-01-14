@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-3">

            <form action="{{ action('AdminController@update_product', $product) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="product-color">Color</label>
                    <select class="form-control" id="color-picker-one" name="color-picker" onchange="disableForms()">
                        <option selected>Choose color</option>
                        <option>yellow</option>
                        <option>red</option>
                        <option>blue</option>
                    </select>

                    <input type="text" id="color-picker-two" placeholder="#" name="color-picker" class="form-control"
                        onchange="disableForms()">
                </div>

                <div class="form-group">
                    <label for="product-height">Height</label><br>
                    <input type="number" id="height-picker" name="height-picker" class="form-control"
                        value="{{ $product->height }}">
                </div>

                <div class="form-group">
                    <label for="product-width">Width</label><br>
                    <input type="number" id="width-picker" name="width-picker" class="form-control"
                        value="{{ $product->width }}">
                </div>

                <button type="submit" class="btn btn-success btn-block">Update</button>

            </form>

                <form action="{{ action('AdminController@delete_product', $product) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-block">Delete product</button>
                    </div>
                </form>

            <button type="button" class="btn btn-primary btn-block" onclick="drawSquare()">Preview</button>

        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-center" name="placeForSquare">
                    <div class="createdBox" style="height:{{ $product->height }}px;
                        background-color:{{ $product->color }}; width: {{ $product->width }}px">
                    </div>
            </div>
        </div>

    </div>
</div>

@endsection
