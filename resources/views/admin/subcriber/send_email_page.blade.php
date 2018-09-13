@extends('layouts.new-master', ['currentPage' => 'send-email'])
@section('page-title', 'Gửi email quảng cáo')
@section('active-active-send-email','active')
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
                        <a class="nav-link" href="#tab3" data-toggle="tab" role="tab" aria-controls="tab3"
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
                                                <li>{{$receiver->email}}</li>
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
                                                <input type="checkbox" name="products"
                                                       id="{{$item->id}}"/>{{$item->name}}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel">

                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="button" class="btn btn-info btn-wd btn-next pull-right">Next</button>
                <button type="button" class="btn btn-info btn-wd btn-finish pull-right" onclick="onFinishWizard()"
                        style="display: none;">Finish
                </button>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>

    <script type="text/javascript">

    </script>
@endsection