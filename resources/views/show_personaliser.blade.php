@extends('layouts.app')

@section('content')

<div class="container">
    @include('flashmessages')
    <div class="row">

        {{-- Place for our form with parametres --}}
        <div class="col-md-3">
            @if(isset($myarray))
            <form action="{{ action('ProductsController@personalise_create_update') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="personalised_name">
                    </div>
                @foreach ($myarray as $key => $value)
                    <div class="form-group">
                        <label>{{ ucfirst($key) }}</label>

                        {{-- CHANGE TYPES ! --}}
                        <input type="{{ strtolower($value) }}" class="form-control" name="{{ strtolower($key) }}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary btn-block">Generate</button>
                <button type="button" class="btn btn-success btn-block" onclick="showProduct()">Preview</button>
            </form>
            @else
                {{--  --}}
            @endif

            @if (isset($my))
            <form>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{ $product_name }}" class="form-control">
                </div>
                @foreach ($my as $key => $value)
                <div class="form-group">
                    <label>{{ ucfirst($key) }}</label>
                    <input type="
                    @if ($key =='height' || $key =='width' || $key == 'border-radius' || $key == 'border-width')
                        integer
                    @else
                        string
                    @endif
                    " class="form-control" value="{{ $value }}" name="{{ $key }}">
                </div>
                @endforeach
            </form>
            <a href="/personalised-product"><button class="btn btn-primary btn-block">Add new product</button></a>
            <button type="button" class="btn btn-success btn-block" onclick="showProduct()">Preview</button>
            @endif

        </div>

        {{-- Place for our product --}}
        <div class="col-md-9">
            <div class="d-flex justify-content-center" name="placeForPersonalisedProduct">
            {{-- Show generated product when its parametres are set in array --}}
            @if (isset($my))
                <div class="personalisedProduct" style="
                @foreach ($my as $key => $value)
                    @if($key == 'height' || $key == 'width' || $key == 'border-radius' || $key == 'border-width')
                        {{ $key }}:{{ $value }}px;
                    @elseif ($key == 'color')
                        background-{{ $key }}:{{ $value }};
                    @else
                        {{ $key }}:{{ $value }};
                    @endif
                @endforeach
                ">
                </div>
            @endif
            </div>
        </div>

    </div>
</div>

@endsection
