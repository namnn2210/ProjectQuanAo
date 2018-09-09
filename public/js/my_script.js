$(document).ready(function () {
   var url = window.location.href.replace('http://127.0.0.1:8000','');
   if(url == '/view-cart'){
        $('div.header-wrapicon2').remove();
        $('span.linedivide1').remove();
   }
});

$(document).on('click', '.block2-btn-addcart' ,function(){
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


$('.btn-cart-num-up').click(function () {
   updateCart();
});

$('.btn-cart-num-down').click(function () {
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
                $('h4').text(new_total_money);
            }
            $('.total_price').text(new_total_money);
        },
        error: function () {
            alert('error');
        }
    });
}


$('.fa-close').click(function () {
    var deleteId = $(this).closest('.table-row').attr('id').replace('item-', '');
    if(confirm("Are you sure?")){
        $.ajax({
            method: 'post',
            url: '/remove-item',
            data:{
                id: deleteId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                $("#item-" + deleteId).remove();
            },
            error: function (resp) {
                swal("Error", "Delete Failed", "error");
            }
        })
    }
});

function currency(x) {
    return Number.parseFloat(x).toFixed(2);
}

var products_checkout = [];
$('.table-row').each(function () {
    products_checkout.push({name: $(this).find('.checkout-name').text(), description: $(this).find('.checkout-description').val(), quantity: $(this).find('.checkout-quantity').val(), price: currency($(this).find('.checkout-price').text().replace(/,/g, "")/23600), sku: $(this).find('.checkout-id').val(), currency: 'USD'});
});
Array.prototype.sum = function (prop) {
    var total = 0;
    for ( var i = 0; i < this.length; i++) {
        total += parseFloat(this[i][prop])
    }
    return total;
};
var total = currency(products_checkout.sum("price"));

products_checkout.price;
    $('.payment').on("click", function(){
         var shipping_address = {
            recipient_name: $('form[name = "order-form"] textarea[name = "name"]').val(),
            line1: $('form[name = "order-form"] textarea[name = "address"]').val(),
            city: 'San Jose',
            country_code: 'US',
            postal_code: '95131',
            phone: $('form[name = "order-form"] textarea[name = "phone"]').val(),
            state: 'CA',
            email: $('form[name = "order-form"] textarea[name = "email"]').val(),
            status: $('form[name = "order-form"] input[name = "status"]:checked').val(),
        };
        localStorage.setItem('shipping_address', JSON.stringify(shipping_address));
        window.location.href = '/payment';
    });

var shipping_address = JSON.parse(localStorage.getItem('shipping_address'));
$('.email').text(shipping_address.email);
$('.address').text(shipping_address.line1);
$('.phone').text(shipping_address.phone);

$('.change').click(function (){
   $('.form').removeClass('hidden');
   $('.content-box').addClass('hidden');
   $('.payment-method').addClass('hidden');
    $('form[name = "order-form"] textarea[name = "name"]').val(shipping_address.recipient_name);
    $('form[name = "order-form"] textarea[name = "address"]').val(shipping_address.line1);
    $('form[name = "order-form"] textarea[name = "email"]').val(shipping_address.email);
    $('form[name = "order-form"] textarea[name = "city"]').val(shipping_address.city);
    $('form[name = "order-form"] textarea[name = "phone"]').val(shipping_address.phone);
    $('form[name = "order-form"] input[name = "status"]').val(shipping_address.status);
    if($('form[name = "order-form"] input[name = "status"]').val() == 1){
        $('form[name = "order-form"] input[name = "status"]').prop('checked', true);
    }
});

$('.save-change').click(function (){
    $('.form').addClass('hidden');
    $('.content-box').removeClass('hidden');
    $('.payment-method').removeClass('hidden');
    $('.email').text($('form[name = "order-form"] textarea[name = "email"]').val());
    $('.address').text( $('form[name = "order-form"] textarea[name = "address"]').val());
    $('.phone').text($('form[name = "order-form"] textarea[name = "phone"]').val());
    shipping_address = {
        recipient_name: $('form[name = "order-form"] textarea[name = "name"]').val(),
        line1: $('form[name = "order-form"] textarea[name = "address"]').val(),
        city: 'San Jose',
        country_code: 'US',
        postal_code: '95131',
        phone: $('form[name = "order-form"] textarea[name = "phone"]').val(),
        state: 'CA',
        email: $('form[name = "order-form"] textarea[name = "email"]').val(),
        status: $('form[name = "order-form"] input[name = "status"]').val(),
    };
    localStorage.setItem('shipping_address', JSON.stringify(shipping_address));
});

function checkout_success(){
    $.ajax({
        method: 'post',
        url: '/checkout',
        data:{
            ship_name: shipping_address.recipient_name,
            ship_address: shipping_address.line1,
            ship_phone: shipping_address.phone,
            email: shipping_address.email,
            status: shipping_address.status,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function () {
            alert('thanks');
        },
        error: function () {
            alert('xxxx');
        }
    });
}

$('.cod').click(function () {
    checkout_success();
});
paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'AYpIzlebp5E_20oD8ZnKDW00rQqc9SK9w7_rvBNninBVLtU21rlWfHj5SL6ir6Id_OUwwptQoxlKDq75',
        production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'large',
        color: 'black',
        shape: 'pill',
    },
    // Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: total,
                        currency: 'USD',
                    },
                    payment_options: {
                        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                    },
                    soft_descriptor: 'ECHI5786786',
                    item_list: {
                        items: products_checkout,
                        shipping_address: {
                            recipient_name: shipping_address.recipient_name,
                            line1: shipping_address.line1,
                            city: 'San Jose',
                            country_code: 'US',
                            postal_code: '95131',
                            phone: shipping_address.phone,
                            state: 'CA',
                        }
                    }
                }]
            });
        },
    payment_options: {
        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
    },
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(){
            checkout_success();
        });
    }
}, '#paypal-button');