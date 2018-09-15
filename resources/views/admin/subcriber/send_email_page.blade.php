@extends('layouts.new-master', ['currentPage' => 'send-email'])
@section('page-title', 'Gửi email quảng cáo')
@section('show-subcriber','show')
@section('active-send-email','active')
@section('content')
    <form id="wizardForm" method="/admin/subcriber" action="post" novalidate="novalidate">
        {{csrf_field()}}
        <div class="card card-wizard">
            <div class="card-header ">
                <h3 class="card-title text-center">Gửi email quảng cáo sản phẩm</h3>
                <p class="card-category text-center">Bạn hãy nhập thông tin dưới đây</p>
            </div>
            <div class="card-body ">
                <ul class="nav nav-tabs nav-pills">
                    <li class="nav-item" style="width: 33.3333%;">
                        <a class="nav-link active" href="#tab1" data-toggle="tab" role="tab" aria-controls="tab1"
                           aria-selected="true">Thông tin gửi</a>
                    </li>
                    <li class="nav-item" style="width: 33.3333%;">
                        <a class="nav-link" href="#tab2" data-toggle="tab" role="tab" aria-controls="tab2"
                           aria-selected="true">Sản phẩm quảng cáo</a>
                    </li>
                    <li class="nav-item" style="width: 33.3333%;">
                        <a class="nav-link link-tab3" href="#tab3" data-toggle="tab" role="tab" aria-controls="tab3"
                           aria-selected="true">Nội dung email</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <p class="text-center">Please tell us more about yourself.</p>
                        <div class="row justify-content-center">
                            <div class="col-md-5 ">
                                <div class="form-group">
                                    <label class="control-label">Email người gửi</label>
                                    <input class="form-control" type="text" name="sender"
                                           placeholder="VD: farfetch@gmail.com" value="farfetch@gmail.com">
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="control-label">Email người nhận
                                        <star>*</star>
                                    </label>
                                    <div>
                                        <ul>
                                            @foreach($subcribers as $receiver)
                                                <li class="receiver"
                                                    name="{{$receiver->email}}">{{$receiver->email}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                        <h5 class="text-center">Chọn những sản phẩm mới cần quảng cáo</h5>
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="form-group">
                                    @foreach($products as $item)
                                        @if($item->isNew())
                                            <div>
                                                <input class="checkbox" type="checkbox"
                                                       id="{{$item->id}}" value="{{$item->name}}"/> {{$item->name}}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade nhan-mail" id="tab3" role="tabpanel">

                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="button" class="btn btn-info btn-wd btn-next pull-right">Tiếp theo</button>
                <button type="button" class="btn btn-info btn-wd btn-finish pull-right" style="display: none;">Gửi email
                </button>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>

    <script>

        $('.btn-next,.link-tab3').click(function (){
            var arrayName = [];
            var arrayId = [];
            var mail_content = '';
            if ($('.tab-pane.fade.show.active').attr('id') == 'tab2'){
                $('input:checkbox:checked').each(function () {
                    arrayName.push($(this).val());
                    arrayId.push($(this).attr('id'));
                });
                if (arrayId.length > 0) {
                    mail_content += '<img src="https://i.imgur.com/1GiFNsE.png" style="max-width: 70%">';
                    mail_content +=
                        '<h4>Cảm ơn bạn đã quan tâm đến cửa hàng của chúng tôi, </h4>\n' +
                        '<p>Farfetch đang có những sản phẩm ' + '<span class="text-danger">HOT ' + '<i class="fa fa-fire"></i>' + '</span>' + 'dành cho mùa thu này</p>' +
                        '<p>Bạn hãy click vào đường dẫn của những sản phẩm mới dưới đây để xem thông tin chi tiết hơn nhé !!</p>' +
                        '<ul>';
                    for (var i = 0; i < arrayName.length; i++) {
                        var link = 'http://localhost:8000/product/' + arrayId[i];
                        mail_content += '<li>' + arrayName[i] + ' : ' + 'Click vào ' + '<a href="' + link + '"> ' + 'đây' + '</a> để xem chi tiết sản phẩm</li>';
                    }
                    mail_content += '</ul>'
                    mail_content += '<img src="https://i.ytimg.com/vi/jIAM84-DjMI/maxresdefault.jpg" style="max-width: 80%">'
                }

                $('.nhan-mail').html(mail_content);
                var email = [];
                $('.receiver').each(function () {
                    email.push($(this).text());
                });
                console.log(email);
                if (mail_content.length == 0) {
                    $('.btn-finish').hide();
                }
                $('.btn-finish').click(function () {
                    if (arrayId.length > 0) {
                        $.ajax({
                            url: '/admin/send-email-2',
                            method: 'post',
                            data: {
                                email: email,
                                mail_content: mail_content,
                                '_token': $('meta[name="csrf-token"]').attr('content'),
                            },
                            success: function (resp) {
                                swal('Gửi mail thành công','Khách hàng sẽ nhận được mail ngay lập tức','success');
                            },
                            error: function () {
                                swal('Gửi mail không thành công','Đã có lỗi xảy ra','error');
                            }
                        });
                    }
                    else {
                        swal('Bạn phải chọn ít nhất một sản phẩm','Nội dung mail không được để trống','error');
                        return;
                    }
                });
            }
            ;
        })
    </script>

@endsection