<div>
    <form class="form-inline" method="post" action="/search">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" style="display:block !important" id="name" name="name" value="{{$request->input('name')}}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" style="display:block !important" id="location" name="location" value="{{$request->input('location')}}">
        </div>
        <div class="form-group">
            <label>Shipping Date</label>
            <div class="bfh-datepicker" data-name="shipping_at" data-icon=""></div>
        </div>
        <div class="form-group">
            <label>Sold Date</label>
            <div class="bfh-datepicker " data-name="sold_at" data-icon=""></div>
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox" name="sold" value="1"> Sold
            </label>
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
</div>