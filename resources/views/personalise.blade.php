@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ action('ProductsController@personalise_add_attributes') }}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6" name="placeForAttrName">

                        </div>
                        <div class="col-md-6" name="placeForAttrType">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success btn-block" onclick="addAttribute()">Add new attribute</button>
                            <button type="submit" class="btn btn-primary btn-block">Confirm attributes</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
            </div>

        </div>
    </div>
@endsection
