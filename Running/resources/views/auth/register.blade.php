<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Running-享受健康生活</title>
    <link href="{{ URL::asset('dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/css/mycss.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('//cdn.bootcss.com/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ URL::asset('dist/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="{{url('/')}}" style="font-size: 30px;color: #4ECE5C;font-weight: bolder;">Running</a>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div class="width-1230" style="background:	#4ECE5C;height: 5px;">

</div>
<div class="container-fluid width-1230" style="height: 828px;">
    <div class="container" style="padding: 20px 0px 20px 0px;width: 1200px;">
        <div style="margin-top: 40px;margin-bottom: 30px">
            <h1 ><a href="{{url('/')}}" style="color: #4ECE5C;font-size: 50px;text-decoration: none">Running</a><small style="color: #D9D9D9;">享受健康生活</small></h1>
        </div>
        <hr style="border: 1px solid #A3B27A;">
        <div class="container-fluid">
            <div class="left col-sm-7 col-xs-7 container" style="height: 600px;padding: 10px 0 50px 0">
                {!! Form::open(['class'=>'form-horizontal'],['url'=>'auth/register']) !!}
                {!! csrf_field() !!}
                <div class="form-group">
                    {!! Form::label('','注册帐号',['class'=>'col-sm-12 col-xs-12','style'=>'font-size: 22px']) !!}
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'用户名']) !!}
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'邮箱']) !!}
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">

                    <div class="col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'密码']) !!}
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">

                    <div class="col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1">
                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'确认密码']) !!}
                    </div>
                </div>
                <div class="form-group" style="margin-top: 30px">
                    <div class="col-sm-offset-1 col-sm-6 col-xs-6 col-xs-offset-1">
                        {!! Form::submit('注册',['class'=>'btn btn-primary','style'=>'width: 326px']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="right col-sm-5 col-xs-5 container" style="height: 600px;border-left: 1px solid #A3B27A;padding: 50px 0 50px 0;">
                <div class="col-sm-offset-1 col-sm-8 col-xs-offset-1 col-xs-8" style="font-size: 14px;color: white">
                    已有帐号?<a href="{{url('auth/login')}}">[立即登录]</a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="bottom width-1230" style="background: #212121 ;padding: 10px;">
    <div class="container">
        <div class="left col-sm-6 col-xs-6">
            <p>Copyright 2016-2021 NanJing University</p>
        </div>
        <div class="right col-sm-6 col-xs-6">
            <p>南京市汉口路22号，南京大学软件学院 </p>
        </div>
    </div>

</div>

</body>
</html>