@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <h1>Inventory</h1>
        @include('createItem')
        <br>
        @include('searchItem')
        <br>
        @if (count($items) > 0)
            <div class="mt-10">
                @include('pages/items')
            </div>
        @endif
        <br>
        @include('pages/statsItem')
    </div>
@stop
