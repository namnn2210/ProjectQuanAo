$(document).ready(function () {
   var url = window.location.href.replace('http://127.0.0.1:8000','');
   if(url == '/view-cart'){
        $('div.header-wrapicon2').remove();
        $('span.linedivide1').remove();
   }
});

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
                var price = $('#row-item-'+ new_items[i].product.id + ' .block2-price').text()
                new_content += '<li class="header-cart-item">';
                new_content += '<div class="header-cart-item-img">';
                new_content += '<img src="' + new_items[i].product.images.split('&')[0] + '" alt="IMG">';
                new_content += '</div>';
                new_content += '<div class="header-cart-item-txt">';
                new_content += '<a href="#" class="header-cart-item-name">';
                new_content += new_items[i].product.name;
                new_content += '</a>';
                new_content += '<span class="header-cart-item-info">';
                new_content += new_items[i].quantity + ' x ' + price;
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
            var quantity = $('header-cart-item-info').text();
            // $('header-cart-item-info').text(quantity + price);
            $('#header-cart-total').text(new_total_money);
            swal('Thao tác thành công!', 'Sản phẩm đã được thêm vào giỏ hàng!', 'success');
        },
        error: function (error) {
            swal('Thao tác thất bại', JSON.parse(error.responseText).msg);
        }
    });
}

$('.btn-num-product-up').click(function () {
   updateCart();
});

$('.btn-num-product-down').click(function () {
    updateCart();
});

$('.btn-update-cart').click(function () {
    window.location.reload();
});

function updateCart(){
    var products = [
        {name: "_token", value: $('meta[name="csrf-token"]').attr('content')},
        {name: "_method",value: "PUT"}
    ];
    $('.num-product').each(function () {
        products.push({name: $(this).attr('name'), value: $(this).val()});
    });
    $.ajax({
        method: 'post',
        url: '/update-cart',
        data: products,
        success: function (resp){
            var new_items = resp.shopping_cart.items;
            var new_total_money = resp.shopping_cart.total_money;
            var new_content = '';
            for (var i in new_items){
                var itemClass = 'item-' + new_items[i].product.id;
                $('.num-product.' + itemClass).val(new_items[i].quantity);
                $('.' + itemClass).text(numeral(new_items[i].quantity * new_items[i].product.dicountPrice).format('0,0') + ' VNĐ');
            }
            $('.total_price').text(new_total_money);
        },
        error: function () {
            alert('error');
        }
    });
}

