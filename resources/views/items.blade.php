@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <h1>Inventory</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('createItem')
        <div id="editItem" class="collapse"></div>
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
