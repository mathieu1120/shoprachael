<a data-toggle="collapse" href="#form-create-item">Add Item</a>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/" method="post" class="form-horizontal collapse" id="form-create-item">
    {{ csrf_field() }}
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="name"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Cost</label>
        <div class="col-sm-6">
            <input type="text" name="cost" class="form-control"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Price</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="price"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <div class="checkbox">
                <label data-toggle="collapse" data-target="#collapseSoldItem">
                    <input type="checkbox" name="sold" value="1"/>Did it get Sold?
                </label>
            </div>
        </div>
    </div>
    <div class="collapse" id="collapseSoldItem">
        <div class="form-group">
            <label class="col-sm-2 control-label">Sold Price</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="sold_price"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Shipping Cost</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="shipping_cost"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Shipping Price</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="shipping_price"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Shipping Date</label>
            <div class="bfh-datepicker col-sm-6" data-name="shipping_at" data-icon=""></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sold Date</label>
            <div class="bfh-datepicker col-sm-6" data-name="sold_at" data-icon=""></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">City</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="city"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">State</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="state"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">ZipCode</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="zipcode"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Country</label>
            <div class="col-sm-6">
                <select type="text" class="form-control bfh-countries" data-country="US" name="country"></select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-6">
            <input type="submit" class="btn btn-default">
        </div>
    </div>
    <hr>
</form>