{{ csrf_field() }}
<input type="hidden" name="item_id" value="{{$item->id}}" />
<div class="form-group">
    <label class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
        <input class="form-control" type="text" name="name" value="{{$item->name}}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Cost</label>
    <div class="col-sm-6">
        <input type="text" name="cost" class="form-control" value="{{$item->cost}}"/>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Price</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="price" value="{{$item->price}}"/>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        <div class="checkbox">
            <label data-toggle="collapse" data-target=".collapseSoldItem[data-field-type='{{$formType}}']">
                <input type="checkbox" name="sold" value="1"
                       @if (!empty($item->sold_at))
                           checked="checked"
                       @endif
                />Did it get Sold?
            </label>
        </div>
    </div>
</div>
<div class="collapse collapseSoldItem" data-field-type="{{$formType}}">
    <div class="form-group">
        <label class="col-sm-2 control-label">Sold Price</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="sold_price" value="{{$item->sold_price}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Shipping Cost</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="shipping_cost" value="{{$item->shipping_cost}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Shipping Price</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="shipping_price" value="{{$item->shipping_price}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Shipping Date</label>
        <div class="bfh-datepicker col-sm-6 bfh" data-name="shipping_at" data-icon="" data-date="{{$item->shipping_at}}"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Sold Date</label>
        <div class="bfh-datepicker col-sm-6 bfh" data-name="sold_at" data-icon="" data-date="{{$item->sold_at}}"></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">City</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="city" value="{{$item->city}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">State</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="state" value="{{$item->state}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">ZipCode</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="zipcode" value="{{$item->zipcode}}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Country</label>
        <div class="col-sm-6">
            <select type="text" class="form-control bfh-countries bfh"
                    @if (!empty($item->country_code)) data-country="{{$item->country_code}}"
                    @else data-country="US"
                    @endif
                    name="country" ></select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
        <input type="submit" class="btn btn-default">
    </div>
</div>