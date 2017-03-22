<div>
    <form class="form-inline mt-10" method="post" action="/search">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" style="display:block !important" id="name" name="name"
                   value="{{$request->input('name')}}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" style="display:block !important" id="location" name="location"
                   value="{{$request->input('location')}}">
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label>Shipping Date From</label>
                <div class="bfh-datepicker" data-name="shipping_at_from" data-icon=""></div>
            </div>
            <div class="form-group">
                <label>Shipping Date To</label>
                <div class="bfh-datepicker" data-name="shipping_at_to" data-icon=""></div>
            </div>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label>Sold Date From</label>
                <div class="bfh-datepicker " data-name="sold_at_from" data-icon=""></div>
            </div>
            <div class="form-group">
                <label>Sold Date To</label>
                <div class="bfh-datepicker " data-name="sold_at_to" data-icon=""></div>
            </div>
        </div>

        <div class="mt-10">
            <label>
                <input type="checkbox" name="sold" value="1"> Sold
            </label>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Search</button>
            </div>
        </div>
    </form>
</div>