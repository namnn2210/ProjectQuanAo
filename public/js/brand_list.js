$(".fa-trash").click(function () {
    var deleteId = this.id;
    if (confirm("Are you sure?")) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/brand/' + deleteId,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                swal({
                        title: 'Deleted',
                        text: 'This category has been deleted',
                        type: 'success',
                        allowOutsideClick: true,
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
        url: '/admin/brand/' + editId + '/quickEdit',
        data: {
            '_token': $('meta[name = "csrf-token"]').attr('content')
        },
        success: function (resp) {
            $('form[name = "quick_edit_form"] textarea[name = "description"]').val(resp.obj.description);
            $('form[name = "quick_edit_form"] input[name = "quick-update-id"]').val(resp.obj.id);
            $('form[name = "quick_edit_form"] input[name = "name"]').val(resp.obj.name);
            $('form[name = "quick_edit_form"] input[name = "country"]').val(resp.obj.country);
            var image = resp.obj.logo;
            $($.parseHTML('<img>')).attr('src', image).appendTo($('.preview_images'));

        },
        error: function () {
            alert('error');
        }
    });
    $('#edit-modal').modal();
    $('#edit-modal').on('hide.bs.modal', function () {
        $('.preview_images').empty();
    });
    return false;
});

$(function () {
    var imagesPreview = function (input, display_images) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $($.parseHTML('<img>')).attr('src', e.target.result).appendTo(display_images);
                    $("img").addClass("preview_image");
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#add_images').on('change', function () {
        $('.preview_images').empty();
        imagesPreview(this, 'div.preview_images');
    });

    $(':reset').click(function () {
        $('.preview_images').empty();
    });
    $('input').keyup(function () {
        var $th = $(this);
        $th.val($th.val().replace(/[^a-zA-Z0-9-" "]/g, function () {
            $('p').text('Please only use number and text');
            return '';
        }));
    });
    if ($(".alert-success")[0]) {
        swal({
                title: 'Updated',
                text: 'Brand information updated into dababase',
                type: 'success',
                allowOutsideClick: true,
            },
            function (isConfirm) {
                if (isConfirm) {
                    window.location.href = '/admin/brand';
                }
            });
    }
});