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
    products_checkout.push({name: $(this).find('.checkout-name').text(), description: $(this).find('.checkout-description').val(), quantity: $(this).find('.checkout-quantity').val(), price: currency($(this).find('.checkout-price').text().replace(/,/g, "")/$(this).find('.checkout-quantity').val()/23600), sku: $(this).find('.checkout-id').val(), currency: 'USD'});
});

var total = 0;
for(var i = 0; i < products_checkout.length; i++){
    total += parseFloat(products_checkout[i].price * products_checkout[i].quantity);
    console.log(products_checkout[i].price)
}
console.log(currency(total))

$('.payment').on("click", function(){
        var ship_name = $('form[name = "order-form"] textarea[name = "ship_name"]').val();
        var ship_address = $('form[name = "order-form"] textarea[name = "ship_address"]').val();
        var ship_city = $('form[name = "order-form"] textarea[name = "ship_city"]').val();
        var ship_phone = $('form[name = "order-form"] textarea[name = "ship_phone"]').val();
        var email = $('form[name = "order-form"] textarea[name = "email"]').val();
        if(ship_name == null || ship_address == null || ship_city == null || ship_phone == null || email == null || ship_name == '' || ship_address == '' || ship_city == '' || ship_phone == '' || email == ''){
            $('.view-alert').text('Vui lòng nhập đầy đủ thông tin');
            $('.view-alert').removeClass('hidden');
            $('.order-form').removeClass('m-t-180');
            $('.order-form').addClass('m-t-30');
        }
        else{
            var shipping_address = {
                recipient_name: $('form[name = "order-form"] textarea[name = "ship_name"]').val(),
                line1: $('form[name = "order-form"] textarea[name = "ship_address"]').val(),
                city: 'San Jose',
                country_code: 'US',
                postal_code: '95131',
                phone: $('form[name = "order-form"] textarea[name = "ship_phone"]').val(),
                state: 'CA',
                email: $('form[name = "order-form"] textarea[name = "email"]').val(),
                status: $('form[name = "order-form"] input[name = "status"]:checked').val(),
            };
            localStorage.setItem('shipping_address', JSON.stringify(shipping_address));
            window.location.href = '/payment';
        }
    });

var shipping_address = JSON.parse(localStorage.getItem('shipping_address'));
$('form[name = "order-form"] textarea[name = "ship_name"]').val(shipping_address.recipient_name);
$('form[name = "order-form"] textarea[name = "ship_address"]').val(shipping_address.line1);
$('form[name = "order-form"] textarea[name = "email"]').val(shipping_address.email);
$('form[name = "order-form"] textarea[name = "ship_city"]').val(shipping_address.city);
$('form[name = "order-form"] textarea[name = "ship_phone"]').val(shipping_address.phone);
if(shipping_address.status != null){
    $('form[name = "order-form"] input[name = "status"]').prop('checked', true);
}
$('.email').text(shipping_address.email);
$('.address').text(shipping_address.line1);
$('.phone').text(shipping_address.phone);

$('.change').click(function (){
   $('.order-form').removeClass('hidden');
   $('.content-box').addClass('hidden');
   $('.payment-method').addClass('hidden');
});

$('.save-change').click(function (){
    var ship_name = $('form[name = "order-form"] textarea[name = "ship_name"]').val();
    var ship_address = $('form[name = "order-form"] textarea[name = "ship_address"]').val();
    var ship_city = $('form[name = "order-form"] textarea[name = "ship_city"]').val();
    var ship_phone = $('form[name = "order-form"] textarea[name = "ship_phone"]').val();
    var email = $('form[name = "order-form"] textarea[name = "email"]').val();
    if(ship_name == null || ship_address == null || ship_city == null || ship_phone == null || email == null || ship_name == '' || ship_address == '' || ship_city == '' || ship_phone == '' || email == ''){
        $('.view-alert').text('Vui lòng nhập đầy đủ thông tin');
        $('.view-alert').removeClass('hidden');
        $('.order-form').removeClass('m-t-180');
        $('.order-form').addClass('m-t-30');
        $('.server-alert').remove();
    }
    else {
        $('.view-alert').addClass('hidden');
        $('.order-form').removeClass('m-t-30');
        $('.order-form').addClass('m-t-180');
        $('.order-form').addClass('hidden');
        $('.content-box').removeClass('hidden');
        $('.payment-method').removeClass('hidden');
        $('.email').text($('form[name = "order-form"] textarea[name = "email"]').val());
        $('.address').text($('form[name = "order-form"] textarea[name = "ship_address"]').val());
        $('.phone').text($('form[name = "order-form"] textarea[name = "ship_phone"]').val());
        shipping_address = {
            recipient_name: $('form[name = "order-form"] textarea[name = "ship_name"]').val(),
            line1: $('form[name = "order-form"] textarea[name = "ship_address"]').val(),
            city: 'San Jose',
            country_code: 'US',
            postal_code: '95131',
            phone: $('form[name = "order-form"] textarea[name = "ship_phone"]').val(),
            state: 'CA',
            email: $('form[name = "order-form"] textarea[name = "email"]').val(),
            status: $('form[name = "order-form"] input[name = "status"]:checked').val(),
        };
        localStorage.setItem('shipping_address', JSON.stringify(shipping_address));
    }
});

// function checkout_success(){
//     $.ajax({
//         method: 'post',
//         url: '/checkout',
//         data:{
//             ship_name: shipping_address.recipient_name,
//             ship_address: shipping_address.line1,
//             ship_phone: shipping_address.phone,
//             email: shipping_address.email,
//             status: shipping_address.status,
//             _token: $('meta[name="csrf-token"]').attr('content'),
//         },
//         success: function (resp){
//             $('body').html(resp);
//         },
//         error: function () {
//         }
//     });
// }

$('.cod').click(function (){
    $('form[name = "order-form"] input[name = "payment_method"]').val('Cod');
    $('form[name = "order-form"]').submit();
});

$(document).ready(function (){
    if ($('.server-alert').length > 0){
        $('.order-form').removeClass('hidden');
        $('.order-form').removeClass('m-t-180');
        $('.order-form').addClass('m-t-30');
        $('.content-box').addClass('hidden');
        $('.payment-method').addClass('hidden');
    }
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
                        total: currency(total),
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
            $('form[name = "order-form"] input[name = "payment_method"]').val('Paypal');
            $('form[name = "order-form"]').submit();
        });
    }
}, '#paypal-button');

// $(document).ready(function (){
//     var total = 0;
//     $('.item').each(function () {
//         $(this).find('.price').text( numeral($(this).find('.price').text()).format('0,0'));
//         total += parseFloat($(this).find('.price').text().replace(/,/g, ""));
//     });
//     $('.receipt_items_total_price').text(numeral(total).format('0,0') + ' VNĐ')
//     $('.receipt_total_price').text(numeral(parseFloat($('.receipt_items_total_price').text().replace(/,/g, "").replace(' VNĐ', '')) + parseFloat($('.shipping_fee').text().replace(/,/g, "").replace(' VNĐ', ''))).format('0,0') + ' VNĐ')
// });