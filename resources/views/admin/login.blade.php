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
                <h2>Đăng nhập trang Admin</h2>
                <p>Nhập tên đăng nhập và mật khẩu</p>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </div>
            @endif
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <form action="login" method="POST">
                @csrf()
                <div class="form-group">
                    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" name="password"
                           placeholder="Password">
                </div>

                {{--<div class="forgot">--}}
                    {{--<a href="reset.html">Quên mật khẩu?</a>--}}
                {{--</div>--}}

                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                <p></p>
                <a href='/admin/register/'>Tạo tài khoản</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>