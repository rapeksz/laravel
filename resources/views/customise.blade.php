@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-3">
            <form action="{{ action('ProductsController@customise_store') }}" method="post">
                {{ csrf_field() }}

                {{-- NAME --}}
                <div class="form-group">
                    <label for="customised_name_input">Product name</label>
                    <input type="text" class="form-control" id="customised_name_input"
                        name="customised_name_input">
                </div>

                {{-- HEIGHT --}}
                <div class="form-group">
                    <label for="attribute_height_value">Height</label>
                    <input type="number" class="form-control" id="attribute_height_value"
                        name="attribute_height_value" min="10" max="500">
                </div>

                {{-- WIDTH --}}
                <div class="form-group">
                    <label for="attribute_width_value">Width</label>
                    <input type="number" class="form-control" id="attribute_width_value"
                        name="attribute_width_value" min="10" max="500">
                </div>

                {{-- COLOR --}}
                <div class="form-group">
                    <label for="attribute_color_value">Color</label>
                    <input type="text" class="form-control" id="attribute_color_value"
                        name="attribute_color_value" placeholder="#">
                </div>

                {{-- BORDER --}}
                <div class="form-group">
                    <label for="attribute_border_value">Border width</label>
                    <input type="number" class="form-control" id="attribute_border_value"
                        name="attribute_border_value" min="1">
                </div>

                {{-- BORDER COLOR --}}
                <div class="form-group">
                    <label for="attribute_bordercolor_value">Border color</label>
                    <input type="text" class="form-control" id="attribute_bordercolor_value"
                        name="attribute_bordercolor_value" placeholder="#">
                </div>

                {{-- BORDER RADIUS --}}
                <div class="form-group">
                    <label for="attribute_borderradius_value">Border radius</label>
                    <input type="number" class="form-control" id="attribute_borderradius_value"
                        name="attribute_borderradius_value" min="0" max="100">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Customise</button>

            </form>

                <button type="button" class="btn btn-success btn-block" onclick="drawForm()">Preview</button>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-center" name="placeForForm">
                @if (isset($data))
                    <div class="customisedBox" style="height: {{ $customised_height_value->value }}px;
                        width: {{ $customised_width_value->value }}px; background-color:{{ $customised_color_value->value }};
                        border-width: {{ $customised_border_value }}px; border-style: solid;
                        border-color: {{ $customised_bordercolor_value->value }};
                        border-radius: {{ $customised_borderradius_value->value }}px">
                    </div>
                @else
                    {{--  --}}
                @endif
            </div>
        </div>

    </div>
</div>

@endsection
