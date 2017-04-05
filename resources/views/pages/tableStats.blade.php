<table class="table">
    <tr>
        <th>Cost</th>
        <th>Price</th>
        <th>Sold Price</th>
        <th>Shipping Cost</th>
        <th>Shipping Price</th>
    </tr>
    @if (!empty($tableStats))
        <tr>
            <td>{{ $tableStats['cost'] }}</td>
            <td>{{ $tableStats['price'] }}</td>
            <td>{{ $tableStats['sold_price'] }}</td>
            <td>{{ $tableStats['shipping_cost'] }}</td>
            <td>{{ $tableStats['shipping_price'] }}</td>
        </tr>
    @endif
</table>
