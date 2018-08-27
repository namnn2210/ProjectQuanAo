$('.block2-btn-addcart').click(function(){
    var product_id = $(this).attr('id').replace('add-cart-', '');
    var quantity = 1;
    addCart(quantity, product_id);
});

$('.btn-addcart-product-detail').click(function(){
    var product_id = $(this).attr('id').replace('add-cart-', '');
    var quantity = $('.num-product').val();
    addCart(quantity, product_id);
});

function addCart(quantity, product_id) {
    $.ajax({
        url: '/add-to-cart',
        method: 'post',
        data: {
            id: product_id,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            var new_count = resp.shopping_cart.count;
            var new_total_money = resp.shopping_cart.total_money;
            var new_items = resp.shopping_cart.items;
            var new_content = '';
            for (var i in new_items) {
                new_content += '<li class="header-cart-item">';
                new_content += '<div class="header-cart-item-img">';
                new_content += '<img src="' + new_items[i].product.images.split('&')[0] + '" alt="IMG">';
                new_content += '</div>';
                new_content += '<div class="header-cart-item-txt">';
                new_content += '<a href="#" class="header-cart-item-name">';
                new_content += new_items[i].product.name;
                new_content += '</a>';
                new_content += '<span class="header-cart-item-info">';
                new_content += new_items[i].quantity + ' x ' + new_items[i].product.dicountPriceString;
                new_content += '</span>';
                new_content += '</div>';
                new_content += '</li>';
            }
            if(new_count == undefined){
                $('.header-icons-noti').text(1);
            }else{
                $('.header-icons-noti').text(new_count);
            }
            $('#header-cart-wrapitem').html(new_content);
            $('#header-cart-total').text(new_total_money);
            swal('Thao tác thành công!', 'Sản phẩm đã được thêm vào giỏ hàng!', 'success');
        },
        error: function (error) {
            swal('Thao tác thất bại', JSON.parse(error.responseText).msg);
        }
    });
}


$('.btn-update-cart').click(function () {
   var form_data = $('form[name = "update-cart-form"]').serializeArray();
   $.ajax({
       url: '/update-cart',
       method: 'post',
       data: form_data,
       success: function (resp) {
           // swal('Success!', 'Cập nhập giỏ hàng thành công!', 'success');
           window.location.reload();
       },
       error: function () {
         alert('error');
       }
   })
});