<table class="table table-hover">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Price</th>
        <th>Sold Price</th>
        <th>Sold At</th>
        <th>Created At</th>
        <th></th>
    </tr>
    @foreach ($items as $item)
        <tr id="item_{{$item->id}}" data-toggle="collapse" data-target="#collapse_info_{{$item->id}}">
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->cost }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->sold_price }}</td>
            <td>{{ $item->sold_at > 0 ? date('m/d/y', strtotime($item->sold_at)) : '-' }}</td>
            <td>{{date('m/d/y', strtotime($item->created_at))}}</td>
            <td><button type="button"
                        data-item-id="{{$item->id}}"
                        class="btn btn-default btn-sm editItem"
                        data-loading-text="WAIT..."
                ><span class="glyphicon glyphicon-edit"></span></button>
                <button type="button"
                        data-item-id="{{$item->id}}"
                        class="btn btn-default btn-sm deleteItem"
                        data-loading-text="WAIT..."
                ><span class="glyphicon glyphicon-trash"></span></button>
            </td>
        </tr>
        <tr class="collapse" id="collapse_info_{{$item->id}}">
            <td colspan="7">
                <ul>
                    <li><strong>Shipping Date:</strong> {{$item->shipping_at > 0 ? date('m/d/y', strtotime($item->shipping_at)) : '-' }}</li>
                    <li><strong>Shipping Cost:</strong> {{ $item->shipping_cost }}</li>

                    <li><strong>Shipping Price:</strong> {{ $item->shipping_price }}</li>
                    <li><strong>Location:</strong> {{$item->city}}
                        , {{$item->state}} {{$item->zipcode}}
                        - {{$item->country_code}}</li>
                </ul>
            </td>
        </tr>
    @endforeach
</table>
