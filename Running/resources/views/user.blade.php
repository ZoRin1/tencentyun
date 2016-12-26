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
    <script src="{{ URL::asset('dist/js/myjs.js') }}"></script>
    <script src="{{ URL::asset('dist/js/user.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
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
            <ul class="nav navbar-nav">
                <li><a href="{{url('/home#home')}}">首页</a></li>
                <li ><a href="{{url('/sport#mysport')}}">运动</a></li>
                <li ><a href="{{url('/match#Arena')}}">竞赛</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label" style="background: #618914;"><span style="margin-right: 6px"><img src="{{url::asset('img/head/'.$information['headimg'])}}" style="width: 16px;height: 16px;"></span>{{$information['name']}}<span class="caret" style="margin-left: 20px"></span></span></a>
                    <ul class="dropdown-menu" role="menu"  >
                        <li><a href="{{url('/user#information')}}" style="text-align: center">个人设置</a></li>
                        <li><a href="{{url('friends#following')}}" style="text-align: center">我的好友</a></li>
                        <li><a href="{{url('auth/logout')}}" style="text-align: center">退出登录</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="width-1230" style="background:	#4ECE5C;height: 5px;">
</div>
<div class="container-fluid width-1230" >
    <div class="container" style="padding: 20px 0px 20px 0px;width: 1200px;">
        <div class="left col-sm-3 col-xs-3" style="height: 830px">
                <p style="color: white;font-size: 30px;">个人设置 </p>
                <div class="row">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-stacked " role="tablist" id="mytab">

                            <li role="presentation" class="myli"><a class="my_a" href="#information" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-cog tabsicon"></span>基本信息</a></li>
                            <li role="presentation" class="myli"><a class="my_a" href="#account" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-tree-conifer tabsicon"></span>账号安全</a></li>
                        </ul>

                </div>

        </div>
        <div class="right col-sm-9 col-xs-9" style="height: 830px;">
            <div class="panel panel-success shadow-border" style="margin-bottom: 5px;margin-top: 5px;height: 820px;border-width: 3px;">
                <div class="panel-body " style="padding: 30px 30px 30px 30px;">

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="information">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#inf" role="tab" data-toggle="tab">个人资料</a></li>
                                <li role="presentation"><a href="#head" role="tab" data-toggle="tab">头像设置</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade  in active" id="inf" style="padding: 50px 10px 50px 10px">

                                    {!! Form::open(['url'=>'user/information','class'=>'form-horizontal' ]) !!}
                                    <div class="form-group">
                                        {!! Form::label('name_label','用户名',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::text('name',$information['name'],['placeholder'=>'用户名','class'=>'form-control']) !!}
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('sex_label','性别',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-5 col-xs-5">
                                            @if($information['sex']=='male')

                                            <label class="radio-inline">
                                                {!! Form::radio('sex','male','true') !!}男
                                            </label>
                                            <label class="radio-inline">
                                                {!! Form::radio('sex','female') !!}女
                                            </label>
                                                @else
                                                <label class="radio-inline">
                                                    {!! Form::radio('sex','male') !!}男
                                                </label>
                                                <label class="radio-inline">
                                                    {!! Form::radio('sex','female','true') !!}女
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('birthday_label','生日',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form:: text('year',date('Y',strtotime($information['birth'])),['class'=>'form-control','placeholder'=>'年份','id'=>'yeartext',])!!}
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::select('month',['1','2','3','4','5','6','7','8','9','10','11','12'],(int)date('m',strtotime($information['birth']))-1,['class'=>'form-control','id'=>'month_choose','onchange'=>'dayChange()']) !!}
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::select('day',['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31']
                                            ,(int)date('d',strtotime($information['birth']))-1,['id'=>'day_choose','class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('place_label','所在地',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::select('place',['广东'=>'广东','江苏'=>'江苏','浙江'=>'浙江','湖北'=>'湖北','辽宁'=>'辽宁','山东'=>'山东','四川'=>'四川','福建'=>'福建','湖南'=>'湖南','陕西'=>'陕西','江西'=>'江西','安徽'=>'安徽',
                                            '河北'=>'河北','黑龙江'=>'黑龙江','广西'=>'广西','吉林'=>'吉林','山西'=>'山西','云南'=>'云南','甘肃'=>'甘肃','贵州'=>'贵州','新疆'=>'新疆','海南'=>'海南','内蒙古'=>'内蒙古','宁夏'=>'宁夏','青海'=>'青海','西藏'=>'西藏','河南'=>'河南',
                                            '北京'=>'北京','上海'=>'上海','天津'=>'天津','重庆'=>'重庆','香港'=>'香港','澳门'=>'澳门','台湾'=>'台湾','国外'=>'国外'
                                            ],[$information['city']],['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('interest_label','兴趣',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::select('interest',['跑步'=>'跑步','登山'=>'登山','足球'=>'足球','篮球'=>'篮球','羽毛球'=>'羽毛球','乒乓球'=>'乒乓球','自行车'=>'自行车','麻将'=>'麻将','其他'=>'其他']
                                            ,[$information['interest']],['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('message_label','个性签名',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-5 col-xs-5">
                                            {!! Form::textarea('message',$information['message'],['style'=>'width: 300px;height: 150px;','class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10 col-xs-offset-2 col-xs-10">
                                            {!! Form::submit('保存',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="head">
                                    <div class="container-fluid" style="margin-top: 50px;">
                                        <div class="col-sm-5 col-sm-offset-4 col-xs-5 col-xs-offset-4">
                                            <img src="{{url::asset('img/head/'.$information['headimg'])}}" class="img-thumbnail shadow-border" style="height: 230px;width: 240px">
                                            {!! Form::open(['url'=>'/user/img', 'method' => 'post','enctype'=>'muitipart/form-data','files' => true]) !!}
                                            <div class="form-group" style="margin-top: 20px">
                                                <input  type="file" name="image">
                                                <p class="help-block">注意：头像图片只支持jpeg,jpg,png,gif,bmp格式;头像文件须小于5M;</p>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-10 col-xs-10 col-xs-offset-3">
                                                    {!! Form::submit('上传',['class'=>'btn btn-primary']) !!}
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="account">
                            <p style="font-size: 30px">帐号安全</p>
                            <hr style="border: 1px solid gainsboro">
                            <p style="font-size: 20px">修改密码</p>
                            <div class="container-fluid">
                                <div class="left col-sm-8 col-xs-8">
                                    {!! Form::open(['url'=>'/user/password', 'class'=>"form-horizontal"]) !!}
                                    <div class="form-group">
                                        {!! Form::label('oldpassword_labe','当前密码',['class'=>'col-sm-3 col-xs-3 control-label']) !!}
                                        <div class="col-sm-8 col-xs-8">
                                            {!! Form::password('oldpassword',['class'=>'form-control','placeholder'=>'当前密码']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('newpassword_labe','新密码',['class'=>'col-sm-3 col-xs-3 control-label']) !!}
                                        <div class="col-sm-8 col-xs-8">
                                            {!! Form::password('newpassword',['class'=>'form-control','placeholder'=>'新密码']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('againpassword_labe','再输一次',['class'=>'col-sm-3 col-xs-3 control-label']) !!}
                                        <div class="col-sm-8 col-xs-8">
                                            {!! Form::password('againpassword',['class'=>'form-control','placeholder'=>'再输一次']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5 col-xs-offset-3 col-xs-5">
                                            {!! Form::submit('保存',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="right col-sm-4 col-xs-4">
                                    <div class="panel panel-success shadow-border" style="height: 300px;border-width: 2px;">
                                        <div class="panel-body">
                                            <h4 style="font-weight: bolder">提示</h4>
                                            <p>为了您的帐号安全，密码设置不要过于简单，推荐使用字母与数字混合的方式。</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>
<div class="bottom width-1230" style="background: #212121 ;padding: 10px;">
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