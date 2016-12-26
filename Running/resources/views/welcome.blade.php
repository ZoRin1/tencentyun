<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Running" />
    <meta name="keywords" content="运动" />
    <meta name="keywords" content="健身" />
    <meta name="keywords" content="健身社交" />
    <meta name="description" content="运动健身社交平台" />
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

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}" style="font-size: 30px;color: #4ECE5C;font-weight: bolder;">Running</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{url('auth/login')}}"><span class="glyphicon glyphicon-log-in" style="margin-right: 10px"></span>登录</a></li>
                    <li><a href="{{url('auth/register')}}"><span class="glyphicon glyphicon-send" style="margin-right: 10px"></span>注册</a></li>
                @else
                    <li><a href="{{url('/home#home')}}"><span class="glyphicon glyphicon-send" style="margin-right: 10px"></span>首页</a></li>
                @endif


            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div style="background:	#4ECE5C;height: 5px;">
</div>
<div style="background: url('{{URL::asset('img/index.jpg')}}') no-repeat center;width: 100%;
    height: 890px;    background-size: cover;">
</div>

<!--<div class="container-fluid">
    <div class="left col-sm-10 col-xs-12">
        <div data-spy="scroll" data-target="#Scroll_nav" style="position: relative;height: 600px;overflow: auto">
            <div style="height: 600px;border-bottom: 2px solid #CCCCCC;overflow: hidden;" id="num_1"></div>
            <div style="height: 600px;border-bottom: 2px solid #CCCCCC" id="num_2"></div>
            <div style="height: 600px;" id="num_3"></div>
        </div>
    </div>
    <div class="right col-sm-2 hidden-xs">
        <div id="Scroll_nav">
            <ul class="nav nav-pills nav-stacked" role="tablist">
                <li class="myli active"><a href="#num_1"><span class="glyphicon glyphicon-tasks tabsicon"></span>
                    记录运动数据</a></li>
                <li class="myli"><a href="#num_2"><span class="glyphicon glyphicon-star-empty tabsicon"></span>
                    与你一同分享</a></li>
                <li class="myli"><a href="#num_3"><span class="glyphicon glyphicon-flag tabsicon"></span>
                    我们一起运动</a></li>
            </ul>
        </div>
    </div>
</div>-->


<div class="bottom" style="background: #212121 ;padding: 10px;">
    <div class="container">
        <div class="right col-sm-4 col-xs-4">
            <p>Copyright 2016-2021 NanJing University</p>
        </div>
        <div class="right col-sm-4 col-xs-4">
            <p>南京市汉口路22号，南京大学软件学院 </p>
        </div>
        <div class="right col-sm-4 col-xs-4">
            <p style="float: left">友情链接:</p>
            <a href="http://www.codoon.com" style="float: left;margin-left: 20px">咕咚网</a>
            <a href="http://www.baidu.com" style="float: left;margin-left: 20px">百度</a>
        </div>
    </div>

</div>

</body>
</html>