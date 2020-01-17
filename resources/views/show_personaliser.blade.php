@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <form action="{{ action('ProductsController@personalise_create_update') }}" method="post">
                {{ csrf_field() }}
                @if(isset($myarray))
                    @foreach ($myarray as $key => $value)
                        <div class="form-group">
                            <label>{{ ucfirst($key) }}</label>
                            <input type="{{ $value }}" class="form-control" name="{{ strtolower($key) }}">
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary btn-block">Generate</button>
                @else
                @endif
            </form>
        </div>

        <div class="col-md-9">
            @if (isset($my))
                <div class="d-flex justify-content-center align-items-center" style="
                /* JS wyswietlajacy preview  zamiast Larvy */
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

@endsection
