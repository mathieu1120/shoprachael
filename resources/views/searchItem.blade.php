<a data-toggle="collapse" href="#form-search-item">Search Item</a>
<div id="form-search-item" class="collapse">
    <form class="form-inline mt-10" method="post" action="/search">
        {{ csrf_field() }}
        <div class="mt-10">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" style="display:block !important" name="name"
                       value="{{$search->name}}">
            </div>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label for="name">State (2 letters)</label>
                <input type="text" class="form-control" style="display:block !important" name="state"
                       value="{{$search->state}}">
            </div>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label for="location">Country</label>
                <select type="text" class="form-control bfh-countries bfh"
                        @if (!empty($search->country_code)) data-country="{{$search->country_code}}"
                        @else data-country=""
                        @endif
                        name="country" ></select>
            </div>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label>Created Date From</label>
                <div class="bfh-datepicker" data-name="created_at_from" data-icon=""
                     data-date="{{$search->created_at_from}}"></div>
            </div>
            <div class="form-group">
                <label>Created Date To</label>
                <div class="bfh-datepicker" data-name="created_at_to" data-icon=""
                     data-date="{{$search->created_at_to}}"></div>
            </div>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label>Shipping Date From</label>
                <div class="bfh-datepicker" data-name="shipping_at_from" data-icon=""
                     data-date="{{$search->shipping_at_from}}"></div>
            </div>
            <div class="form-group">
                <label>Shipping Date To</label>
                <div class="bfh-datepicker" data-name="shipping_at_to" data-icon=""
                     data-date="{{$search->shipping_at_to}}"></div>
            </div>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <label>Sold Date From</label>
                <div class="bfh-datepicker " data-name="sold_at_from" data-icon=""
                     data-date="{{$search->sold_at_from}}"></div>
            </div>
            <div class="form-group">
                <label>Sold Date To</label>
                <div class="bfh-datepicker " data-name="sold_at_to" data-icon=""
                     data-date="{{$search->sold_at_to}}"></div>
            </div>
        </div>

        <div class="mt-10">
            <label>
                <input type="checkbox" name="sold" value="1"
                       @if (!empty($search->sold))
                       checked="checked"
                       @endif
                > Sold
            </label>
        </div>
        <div class="mt-10">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Search</button>
            </div>
        </div>
    </form>
</div>