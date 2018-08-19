$(".fa-trash").click(function () {
    var deleteId = this.id;
    if(confirm("Are you sure?")){
        $.ajax({
            method: 'DELETE',
            url: '/admin/product/' + deleteId,
            data: {
                '_token' : $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                swal({
                        title: 'Deleted',
                        text: 'This product has been deleted',
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
        url: '/admin/product/' + editId + '/quickEdit',
        data: {
            '_token' : $('meta[name = "csrf-token"]').attr('content')
        },
        success: function (resp) {
            $('form[name = "quick_edit_form"] input[name = "price"]').val(resp.obj.price);
            var images_list = resp.obj.images.split("&");
            for(var i = 0; i < images_list.length - 1; i++){
                $($.parseHTML('<img>')).attr('src', images_list[i]).appendTo($('.preview_images'));
            }
        },
        error: function () {
            alert('error');
        }
    });
    $('#edit-modal').modal();
    $('#edit-modal').on('hide.bs.modal' , function () {
        $('.preview_images').empty();
    });
    return false;
});

$(function() {
    var imagesPreview = function(input, display_images) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $($.parseHTML('<img>')).attr('src', e.target.result).appendTo(display_images);
                    $("img").addClass("preview_image");
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#add_images').on('change', function() {
        $('.preview_images').empty();
        imagesPreview(this, 'div.preview_images');
    });
});