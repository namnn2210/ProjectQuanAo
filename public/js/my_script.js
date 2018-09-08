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

var total = $('.checkout-price').text();
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
                        items: [
                            {
                                name: 'Giày Balenciaga',
                                description: 'Brown hat.',
                                quantity: '1',
                                price: '630,000',
                                sku: '1',
                                currency: 'USD'
                            },
                            {
                                name: 'Balo Saint Laurent',
                                description: 'Black handbag.',
                                quantity: '1',
                                price: '1,312,000',
                                sku: 'product34',
                                currency: 'USD'
                            },
                            {
                                name: 'Balo Fendi',
                                description: 'Black handbag.',
                                quantity: '1',
                                price: '712,000',
                                sku: 'product35',
                                currency: 'USD'
                            }
                            ],
                        shipping_address: {
                            recipient_name: 'Brian Robinson',
                            line1: '4th Floor',
                            line2: 'Unit #34',
                            city: 'San Jose',
                            country_code: 'US',
                            postal_code: '95131',
                            phone: '011862212345678',
                            state: 'CA'
                        }
                    }
                }]
            });
        },
    payment_options: {
        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            window.alert('Thank you for your purchase!');
        });
    }
}, '#paypal-button');

// // Set up a payment
// payment: function(data, actions) {
//     return actions.payment.create({
//         transactions: [{
//             amount: {
//                 total: '30.11',
//                 currency: 'USD',
//                 details: {
//                     subtotal: '30.00',
//                     tax: '0.07',
//                     shipping: '0.03',
//                     handling_fee: '1.00',
//                     shipping_discount: '-1.00',
//                     insurance: '0.01'
//                 }
//             },
//             description: 'The payment transaction description.',
//             custom: '90048630024435',
//             //invoice_number: '12345', Insert a unique invoice number
//             payment_options: {
//                 allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
//             },
//             soft_descriptor: 'ECHI5786786',
//             item_list: {
//                 items: [
//                     {
//                         name: 'hat',
//                         description: 'Brown hat.',
//                         quantity: '5',
//                         price: '3',
//                         tax: '0.01',
//                         sku: '1',
//                         currency: 'USD'
//                     },
//                     {
//                         name: 'handbag',
//                         description: 'Black handbag.',
//                         quantity: '1',
//                         price: '15',
//                         tax: '0.02',
//                         sku: 'product34',
//                         currency: 'USD'
//                     }],
//                 shipping_address: {
//                     recipient_name: 'Brian Robinson',
//                     line1: '4th Floor',
//                     line2: 'Unit #34',
//                     city: 'San Jose',
//                     country_code: 'US',
//                     postal_code: '95131',
//                     phone: '011862212345678',
//                     state: 'CA'
//                 }
//             }
//         }],
//         note_to_payer: 'Contact us for any questions on your order.'
//     });
// },