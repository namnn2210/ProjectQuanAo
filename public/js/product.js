$(document).ready(function() {
    if($('.row-item').length < 6){
        $('#loadMore').addClass('hidden');
    }
    loadMore();
});
$(".selection-2").select2({
    minimumResultsForSearch: 20,
}).on('change', function(){
    filter();
});

filterBar.noUiSlider.on('update', function( values, handle ) {
    skipValues[handle].innerHTML = Math.round(values[handle]);
});

filterBar.noUiSlider.on('set', function( values, handle ) {
    filter();
});


$('input[name = "name"]').keypress(function (e){
    if (e.which == 13){
        filter();
    }
});

function filter(){
    var sort = $(".selection-2 option:selected").val();
    var values = [
        $('#value-lower').text(),
        $('#value-upper').text(),
    ];
    var value1 = values[0];
    var value2 = values[1];
    var categoryId = window.location.href.replace('http://localhost:8000/product?categoryId=','');
    var search = $('input[name = "name"]').val();
    var bigSale = window.location.href.replace('http://localhost:8000/product?bigSale=','');
    $.ajax({
        method: 'post',
        url: '/product',
        data:{
            value1: value1,
            value2: value2,
            sort: sort,
            categoryId: categoryId,
            search: search,
            bigSale: bigSale,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp){
            var new_content = '';
            var new_items = resp.obj;
            if($.isEmptyObject(new_items)){
                new_content += '<h2>Không tìm thấy sản phẩm ';
                new_content += search + ' nào trong khoảng giá từ ';
                new_content += numeral(value1).format('0,0') + ' đến ' + numeral(value2).format('0,0');
                new_content += '</h2>';
                $('#loadMore').addClass('hidden');
                $('#example').addClass('no-product');
                $('#example').html(new_content);
            }
            else{
                for (var i in new_items){
                    new_content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 row-item" id="row-item-' + + new_items[i].id + '"' + '>';
                    new_content += '<div class="block2">';
                    new_content += '<div class="block2-img wrap-pic-w of-hidden pos-relative">';
                    new_content +=  '<span class="block2-labelsale text-danger">';
                    new_content +=  '-' + new_items[i].discount + '%';
                    new_content +=  '</span>';
                    new_content +=  '<span class="block2-labelnew">';
                    new_content +=  '<p class="hidden createDate">';
                    new_content +=  new_items[i].created_at;
                    new_content +=  '</p>';
                    new_content +=  '</span>';
                    new_content += '<img src="' + new_items[i].images.split("&")[0] + '">';
                    new_content += '<div class="block2-overlay trans-0-4">';
                    new_content += '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">';
                    new_content += '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>';
                    new_content += '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>';
                    new_content += '</a>';
                    new_content += '<div class="block2-btn-addcart w-size1 trans-0-4" id="add-cart-' + new_items[i].id + '"' + '>';
                    new_content += '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">';
                    new_content += 'Add to Cart';
                    new_content += '</button>';
                    new_content += '</div>';
                    new_content += '</div>';
                    new_content += '</div>';
                    new_content += '<div class="block2-txt p-t-20">';
                    new_content += '<a href="/product/' + new_items[i].id + '" ' + 'class="block2-name dis-block s-text3 p-b-5">';
                    new_content += new_items[i].name;
                    new_content += '</a>';
                    if(new_items[i].discount == 0){
                        new_content += '<span class="block2-price m-text6 p-r-5">';
                        new_content +=  numeral(new_items[i].price).format('0,0') + ' ' + 'VNĐ';
                        new_content += '</span>';
                    }
                    else{
                        new_content += '<span class="block2-price m-text6 p-r-5">';
                        new_content +=  numeral(new_items[i].price - (new_items[i].price * new_items[i].discount / 100)).format('0,0') + ' ' + 'VNĐ';
                        new_content += '</span>';
                        new_content += '<span class="block2-oldprice m-text7 p-r-5">';
                        new_content +=  numeral(new_items[i].price).format('0,0') + ' ' + 'VNĐ';
                        new_content += '</span>';
                    }
                    new_content += '</div>';
                    new_content += '</div>';
                    new_content += '</div>';
                }
                $('#example').html(new_content);
                if($('.row-item').length < 6){
                    $('#loadMore').addClass('hidden');
                }
                else{
                    $('#loadMore').removeClass('hidden');
                }
                $('.block2-labelsale:contains("-0%")').remove();
                $('.block2-labelnew').each(function () {
                    var sqlDateStr = $(this).text();
                    sqlDateStr = sqlDateStr.replace(/:| /g,"-");
                    var YMDhms = sqlDateStr.split("-");
                    var sqlDate = new Date();
                    sqlDate.setFullYear(parseInt(YMDhms[0]), parseInt(YMDhms[1])-1,
                        parseInt(YMDhms[2]));
                    sqlDate.setHours(parseInt(YMDhms[3]), parseInt(YMDhms[4]),
                        parseInt(YMDhms[5]), 0/*msValue*/);
                    var current_date = new Date();
                    var diff = new Date(current_date - sqlDate);
                    var days  = diff/1000/60/60/24;
                    if(days > 7){
                        $(this).remove();
                    }
                });

                loadMore();
            }
        },
        error: function () {
            alert('fail');
        }
    });
}

function loadMore() {
    $(".row-item").slice(0, 6).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".row-item:hidden").slice(0, 6).slideDown();
        if ($(".row-item:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('#example').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
}

$('a[href=#top]').click(function () {
    $('#example').animate({
        scrollTop: 0
    }, 600);
    return false;
});


