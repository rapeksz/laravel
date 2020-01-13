@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-3">

            <form action="{{ action('ProductsController@store') }}" method="post" name="productform">
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
                        value="<?php echo isset($_POST['height-picker']) ? $_POST['height-picker'] : '' ?>">
                </div>

                <div class="form-group">
                    <label for="product-width">Width</label><br>
                    <input type="number" id="width-picker" name="width-picker" class="form-control"
                        value="<?php echo isset($_POST['width-picker']) ? $_POST['width-picker'] : '' ?>">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Generate</button>

                <button type="button" class="btn btn-success btn-block" onclick="drawSquare()">Preview</button>

            </form>

        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-center" name="placeForSquare">
                @if (isset($new_product))
                    <div class="createdBox" style="height: {{ $new_product->height }}px;
                        background-color: {{ $new_product->color }}; width: {{ $new_product->width }}px">
                    </div>
                @else()

                @endif
            </div>
        </div>

    </div>
</div>

@endsection
