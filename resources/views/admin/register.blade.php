<html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('/css/loginForm_css/login.css')}}" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{--<style>--}}
        {{--.form-group{--}}
            {{--text-align: left;--}}
        {{--}--}}
    {{--</style>--}}

</head>
<body id="LoginForm">
<div class="container">
    <h1 class="form-heading">Welcome</h1>
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Register</h2>
                <p>Please enter your information.</p>
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
            </div>
            <form id="Register" method="post">
                @csrf()
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="inputUserName" placeholder="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confirm-password" id="inputPassword" placeholder="">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="inputFullname" placeholder="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="">
                </div>
                <div class="form-group">
                    <label class="control-label" for="date">Date</label>
                    <div class="input-group">
                        <input class="form-control" id="date" name="DOB" placeholder="YYYY/MM/DD" type="text"/>
                    </div>
                </div>
                <div class="form-group" style="text-align: left">
                    <label>Gender</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="1" value="option1" checked=""> Female
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="2" value="option2"> Male
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" id="inputPhone">
                </div>
                <div class="finish-register">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href='/admin/login'>Already had account? Login here!</a>
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
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
</body>
</html>