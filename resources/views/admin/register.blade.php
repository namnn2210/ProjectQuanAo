<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('/css/loginForm_css/login.css')}}" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body id="LoginForm">
<div class="container">
    <h1 class="form-heading">Welcome</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Đăng ký</h2>
                <p>Điền những thông tin cần thiết để đăng ký tài khoản.</p>
                @if($errors->any())
                    <div class="alert alert-danger">
                        Vui lòng nhập đầy đủ các thông tin.
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                        <div></div>
                        <a href='/admin/login'>Trở về trang chủ</a>
                    </div>

                @endif
            </div>
            <form id="Register" method="post" >
                @csrf()
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="inputUserName" placeholder="">
                </div>
                @if($errors->get('username'))
                    <div class="alert-danger">
                        @foreach($errors->get('username') as $err)
                            {{$err}}
                            @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="">
                </div>
                @if($errors->get('email'))
                    <div class="alert-danger">
                        @foreach($errors->get('email') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="">
                </div>
                @if($errors->get('password'))
                    <div class="alert-danger">
                        @foreach($errors->get('password') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label>Nhập lại Password</label>
                    <input type="password" class="form-control" name="confirm-password" id="inputPassword" placeholder="">
                </div>
                @if($errors->get('confirm-password'))
                    <div class="alert-danger">
                        @foreach($errors->get('confirm-password') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label>Họ và Tên</label>
                    <input type="text" class="form-control" name="full_name" id="inputFullname" placeholder="">
                </div>
                @if($errors->get('full_name'))
                    <div class="alert-danger">
                        @foreach($errors->get('full_name') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="">
                </div>
                @if($errors->get('address'))
                    <div class="alert-danger">
                        @foreach($errors->get('address') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label" for="date">Ngày sinh</label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="DOB" placeholder="YYYY/MM/DD" type="text"/>
                    </div>
                </div>
                @if($errors->get('DOB'))
                    <div class="alert-danger">
                        @foreach($errors->get('DOB') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="form-group" style="text-align: left">
                    <label>Giới tính</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="1" value="option1" checked=""> Nữ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="2" value="option2"> Nam
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" id="inputPhone">
                </div>
                @if($errors->get('phone'))
                    <div class="alert-danger">
                        @foreach($errors->get('phone') as $err)
                            {{$err}}
                        @endforeach
                    </div>
                @endif
                <div class="finish-register">
                    <button type="submit" class="btn btn-primary" id="btn-submit">Đăng ký</button>
                    <a href='/admin/login'>Bạn đã có tài khoản? Đăng nhập ở đây!</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    document.getElementById("btn-submit")
        .addEventListener("click",function () {
            confirm("bạn có chắc chứ?");
        })

    $(document).ready(function(){
        var date_input=$('input[name="DOB"]'); //our date input has the name "date"
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: 'body',
            todayHighlight: true,
            autoclose: true,
        });
    })
</script>
</body>
</html>