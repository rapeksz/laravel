@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-3">

            <form action="{{ action('AdminController@update_product', $show_product) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="product-color">Color</label>
                    <input type="text" class="form-control" placeholder="#" name="color-picker">
                </div>

                <div class="form-group">
                    <label for="product-height">Height</label>
                    <select class="form-control" id="product-height" name="height-picker">
                        <option>100</option>
                        <option>120</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product-width">Width</label>
                    <select class="form-control" id="product-width" name="width-picker">
                        <option>100</option>
                        <option>120</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block">Update product</button>

            </form>

            <form action="{{ action('AdminController@delete_product', $show_product) }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-block">Delete product</button>
                </div>
            </form>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-center">
                    <div class="created-product" style="height:{{ $show_product->height }}px;
                        background-color:{{ $show_product->color }}; width: {{ $show_product->width }}px">
                    </div>
            </div>
        </div>

    </div>
</div>

@endsection
