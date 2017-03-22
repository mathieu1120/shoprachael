@extends('layouts.default')
@section('content')
    <div class="container-fluid">
        <h1>Inventory</h1>
        @include('createItem')
        @include('searchItem')
        @if (count($items) > 0)
            <div class="mt-10">
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Sold Price</th>
                        <th>Sold At</th>
                        <th>Created At</th>
                    </tr>
                    @foreach ($items as $item)
                        <tr data-toggle="collapse" data-target="#collapse_info_{{$item->id}}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->sold_price }}</td>
                            <td>{{ $item->sold_at > 0 ? date('m/d/y', strtotime($item->sold_at)) : '-' }}</td>
                            <td>{{date('m/d/y', strtotime($item->created_at))}}</td>
                        </tr>
                        <tr class="collapse" id="collapse_info_{{$item->id}}">
                            <td colspan="7">
                                <table class="table">
                                    <tr>
                                        <th class="pull-right">Shipping Date</th>
                                        <td>{{$item->shipping_at > 0 ? date('m/d/y', strtotime($item->shipping_at)) : '-' }}</td>
                                        <th class="pull-right">Shipping Cost</th>
                                        <td>{{ $item->shipping_cost }}</td>
                                        <th class="pull-right">Shipping Price</th>
                                        <td>{{ $item->shipping_price }}</td>
                                        <th class="pull-right">Location</th>
                                        <td>{{$item->city}}, {{$item->state}} {{$item->zipcode}}
                                            - {{$item->country_code}}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
@stop
