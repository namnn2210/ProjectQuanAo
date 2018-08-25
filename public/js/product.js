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

$('#filter').click(function (){
    filter();
});

$('input[name = "name"]').keypress(function (e) {
    if (e.which == 13){
        filter();
    }
});

function filter() {
    var sort = $(".selection-2 option:selected").val();
    var values = [
        $('#value-lower').text(),
        $('#value-upper').text(),
    ];
    var value1 = values[0];
    var value2 = values[1];
    var categoryId = window.location.href.replace('http://127.0.0.1:8000/product?categoryId=','');
    var search = $('input[name = "name"]').val();
    $.ajax({
        method: 'post',
        url: '/san-pham-test',
        data:{
            value1: value1,
            value2: value2,
            sort: sort,
            categoryId: categoryId,
            search: search,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp) {
            var new_content = '';
            var new_items = resp.obj;
            if($.isEmptyObject(new_items)){
                new_content += '<h1>Không thấy sản phẩm nào</h1>'
                $('#loadMore').addClass('hidden');
                $('#example').html(new_content);
            }
            else{
                for (var i in new_items){
                    new_content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 row-item">';
                    new_content += '<div class="block2">';
                    new_content += '<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">';
                    new_content += '<img src="' + new_items[i].images.split('&')[0] + '">';
                    new_content += '<div class="block2-overlay trans-0-4">';
                    new_content += '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">';
                    new_content += '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>';
                    new_content += '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>';
                    new_content += '</a>';
                    new_content += '<div class="block2-btn-addcart w-size1 trans-0-4">';
                    new_content += '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">';
                    new_content += 'Add to Cart';
                    new_content += '</button>';
                    new_content += '</div>';
                    new_content += '</div>';
                    new_content += '</div>';
                    new_content += '<div class="block2-txt p-t-20">';
                    new_content += '<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">';
                    new_content += new_items[i].name;
                    new_content += '</a>';
                    new_content += '<span class="block2-price m-text6 p-r-5">';
                    new_content += '$' +  new_items[i].price;
                    new_content += '</span>';
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

