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
            $('form[name = "quick_edit_form"] input[name = "quick-update-id"]').val(resp.obj.id);
            $('form[name = "quick_edit_form"] input[name = "name"]').val(resp.obj.name);
            $('form[name = "quick_edit_form"] select').val(resp.obj.category_id);
            $('form[name = "quick_edit_form"] select').val(resp.obj.brand_id);
            $('form[name = "quick_edit_form"] textarea[name = "description"]').val(resp.obj.description);
            var images_list = resp.obj.images.split("&");
            for(var i = 0; i < images_list.length - 1; i++){
                $($.parseHTML('<div>')).attr('class', 'img-wrap' + ' ' + 'wrap-' + [i]).appendTo($('.preview_images'));
                $($.parseHTML('<span>')).attr('class', 'delete-img').appendTo($('.wrap-' + [i]));
                $('.delete-img').text('x');
                $($.parseHTML('<img>')).attr('src', images_list[i]).appendTo($('.wrap-' + [i]));
                var remain_images =  $('.img-wrap').children('img').map(function(){
                    return $(this).attr('src') + '&'
                }).get();
                $('form[name = "quick_edit_form"] input[name = "remain-images"]').val(remain_images);
            }
        },
        error: function () {
            alert('error');
        }
    });
    $('#edit-modal').modal();
    $('#edit-modal').on('hide.bs.modal' , function (){
        $('.preview_images').empty();
        $(this).find('form').trigger('reset');
    });
    return false;
});

$(function() {
    var imagesPreview = function(input, display_images) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $($.parseHTML('<img>')).attr('src', e.target.result).appendTo(display_images);
                    $("img").addClass("preview_image");
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#add_images').on('change', function(){
        imagesPreview(this, 'div.preview_images');
    });
});

$('input').keyup(function(){
    var $th = $(this);
    $th.val( $th.val().replace(/[^a-zA-Z0-9-" "]/g, function(){
        $('p').text('Please only use number and text');
        return '';
    }));
});

if($(".alert-success")[0]){
    swal({
            title: 'Updated',
            text: 'Product information updated into dababase',
            type: 'success',
            allowOutsideClick: true,
        },
        function (isConfirm) {
            if (isConfirm) {
                window.location.href = '/admin/product';
            }
        });
}

$(document).on('click','.delete-img',function(){
    $(this).closest('.img-wrap').remove();
    var remain_images =  $('.img-wrap').children('img').map(function(){
        return $(this).attr('src') + '&'
    }).get();
    $('form[name = "quick_edit_form"] input[name = "remain-images"]').val(remain_images.join(''));
});
