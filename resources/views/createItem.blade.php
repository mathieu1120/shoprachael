@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/" method="post" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" name="name"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Cost</label>
        <div class="col-sm-10">
            <input type="text" name="cost" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="sold" value="0"/>Did it get Sold?
                </label>
            </div>
        </div>
    </div>
    <div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="price"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sold Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sold_price"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Shipping Cost</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="shipping_cost"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Shipping Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="shippig_price"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sold Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="sold_at" placeholder="mm/dd/yyyy"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default">
        </div>
    </div>
</form>
