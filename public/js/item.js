$(document).on('click', '.editItem', function(event) {
    event.stopPropagation();
    var $btn = $(this).button('loading');
    // business logic...
    $.ajax({
        url: "/edit",
        method: "post",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {itemId: $(this).data('item-id')},
        success: function(data) {
            $('#editItem').html(data);
            $('#editItem').find('.bfh').each(function() {
                if ($(this).hasClass('bfh-datepicker')) {
                    $(this).bfhdatepicker($(this).data());
                } else if ($(this).hasClass('bfh-countries')) {
                    $(this).bfhcountries($(this).data());
                }
            });
            if ($('#editItem').find('input[name="sold"]').is(':checked')) {
                $('#editItem').find('.collapseSoldItem').collapse('show');
            }
            $('#editItem').collapse('show');
            $btn.button('reset');
        }
    });
});

$(document).on('click', '.deleteItem', function(event) {
    event.stopPropagation();
    if (!confirm('Are you sure?')) {
        return false;
    }
    var $btn = $(this).button('loading');
    // business logic...
    $.ajax({
        url: "/delete",
        method: "delete",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {itemId: $(this).data('item-id')},
        dataType: "JSON",
        success: function(data) {
            if (data.itemId != undefined) {
                $('#item_'+data.itemId).remove();
            }
            $btn.button('reset');
        }
    });
});