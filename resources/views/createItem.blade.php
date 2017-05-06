<a data-toggle="collapse" href="#form-create-item">Add Item</a>

<form action="/" method="post" class="form-horizontal collapse" id="form-create-item" data-type="create">
    @include('includes/formItem', ['formType' => 'create', 'item' => new App\Items()])
    <hr>
</form>