$(".fa-trash").click(function () {
    var deleteId = this.id;
    if (confirm("Are you sure?")) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/collection/' + deleteId,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                swal({
                        title: 'Deleted',
                        text: 'This collection has been deleted',
                        type: 'success',
                        allowOutsideClick: true,
                        html: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $("#row-item" + deleteId).remove();
                            window.location.reload();
                        }
                    });
            },
            error: function (resp) {
                swal("Error", "Delete Failed", "error");
            }
        })
    }
});

$(".btn-quick-edit").click(function () {
    var editId = $(this).closest('.row-item').attr('id').replace('row-item-', '');
    $.ajax({
        method: 'GET',
        url: '/admin/collection/' + editId + '/quickEdit',
        data: {
            '_token': $('meta[name = "csrf-token"]').attr('content')
        },
        success: function (resp) {
            $('form[name = "quick_edit_form"] input[name = "name"]').val(resp.obj.name);
            $('form[name = "quick_edit_form"] textarea[name = "description"]').val(resp.obj.description);
            $('form[name = "quick_edit_form"] input[name = "quick-update-id"]').val(resp.obj.id);
        },
        error: function () {
            alert('error');
        }
    });
    $('#edit-modal').modal();
    return false;
});