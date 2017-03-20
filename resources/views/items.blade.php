@extends('layouts.default')
@section('content')
    @include('createItem')
    <div class="container-fluid">

    @if (count($items) > 0)
        <table class="table table-striped">
            <tr>
                @foreach ($items as $item)
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->cost }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->sold_price }}</td>
                    <td>{{ $item->shipping_cost }}</td>
                    <td>{{ $item->shipping_price }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->sold_at }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                @endforeach
            </tr>
        </table>
    @endif
    </div>
@stop
