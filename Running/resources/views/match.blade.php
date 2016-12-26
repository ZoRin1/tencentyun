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
    <link href="{{ URL::asset('dist/css/daterangepicker.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('//cdn.bootcss.com/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ URL::asset('dist/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/myjs.js') }}"></script>
    <script src="{{ URL::asset('dist/js/home.js') }}"></script>
    <script src="{{ URL::asset('dist/js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/daterangepicker.js') }}"></script>
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
                <li ><a href="{{url('/home#home')}}">首页</a></li>
                <li ><a href="{{url('/sport#mysport')}}">运动</a></li>
                <li class="active"><a href="{{url('/match#Arena')}}">竞赛</a></li>
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
    <div class="container" style="padding: 20px 0px 20px 0px;width: 1200px; ">
        <div class="left col-sm-3 col-xs-3" >
            <div style=" height: 290px;padding-top: 20px" >
                <a href="{{url('/home#home')}}">
                    <img src="{{url::asset('img/head/'.$information['headimg'])}}" class="img-thumbnail shadow-border" style="height: 230px;width: 240px">
                </a>
            </div>

            <a href="{{url('/home#home')}}">
                <p style="color: #699000;font-size: 20px;">{{$information['name']}}
                    @if($information['sex']=='male')
                        <span class="glyphicon glyphicon-user" style="color: #2aabd2;margin-left: 15px"></span>
                    @else
                        <span class="glyphicon glyphicon-user" style="color: #FF7CB6;margin-left: 15px"></span>
                    @endif
                </p></a>
            <div style="height: 30px;line-height: 30px">
                <div style="font-size: 18px;color: #FFA200;display: inline;float: left;margin-bottom: 0;">胜率</div>
                <div style="font-size: 30px;font-weight: bold;color: #FFA200;display: inline;float: left;margin-left: 20px">{{$winning}}%</div>
            </div>

            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-stacked" role="tablist" id="mytab">
                    <button role="presentation" class="myli btn " style="font-size: 20px;background-color: #FFA200;width: 100%;height: 50px;"><a href="#Launch_competition" role="tab" data-toggle="tab" class="match_a">发起竞赛</a></button>
                    <hr style="margin-top:0;width:100%;border: 1px solid  #A2A2A2;">
                    <li role="presentation" class="myli"><a class="my_a" href="#Arena" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-time tabsicon"></span>竞技场</a></li>
                    <li role="presentation" class="myli"><a class="my_a" href="#mine" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-star tabsicon"></span>我的竞赛</a></li>
                    <hr style="margin-top:0;width:100%;border: 1px solid  #A2A2A2;">
                    <li role="presentation" class="myli"><a class="my_a" href="#Single" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-minus-sign tabsicon"></span>单人PK</a></li>
                    <li role="presentation" class="myli"><a class="my_a" href="#Many" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-plus-sign tabsicon"></span>多人竞赛</a></li>
                    <li role="presentation" class="myli"><a class="my_a" href="#target" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-flag tabsicon"></span>目标竞赛</a></li>
                </ul>

            </div>

        </div>
        <div class="right col-sm-9 col-xs-9">
            <div class="panel panel-success shadow-border" style="margin-bottom: 5px;margin-top: 5px;border-width: 3px;">
                <div class="panel-body " style="padding: 0px 0px 0px 0px;height:auto;min-height: 900px;">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="Launch_competition" style="padding: 30px 30px 30px 30px;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#pk1" role="tab" data-toggle="tab">单人PK</a></li>
                                <li role="presentation"><a href="#pk2" role="tab" data-toggle="tab">多人竞赛</a></li>
                                <li role="presentation"><a href="#pk3" role="tab" data-toggle="tab">目标竞赛</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="pk1" style="padding: 50px 10px 50px 10px">
                                    {!! Form::open(['url'=>'/match','class'=>'form-horizontal']) !!}
                                    <div class="form-group">
                                        {!! Form::label('yundongleixing_label','运动类型',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('yundongleixing',['追踪器'],0,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('bisaileixing_label','比赛类型',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('bisaileixing',['danren'=>'单人PK'],'danren',['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('jieshao_label','竞赛介绍',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-5 col-xs-5" >
                                            {!! Form::textarea('jieshao',null,['class'=>'form-control','style'=>'width: 300px;height: 150px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('reservationtime_label','时间：',['class'=>'control-label col-sm-2 col-xs-2']) !!}
                                        <div class="input-group">
                                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                            {!! Form::text('reservationtime',null,['class'=>'form-control','id'=>'pk1_reservationtime','style'=>'width: 275px']) !!}
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#pk1_reservationtime').val((moment().add('day',1).format('YYYY-MM-DD HH:00') + ' - ' + moment().add('day',2).format('YYYY-MM-DD HH:00')));
                                                $('#pk1_reservationtime').daterangepicker({
                                                    minDate: moment(),
                                                    timePicker: true,
                                                    timePickerIncrement: 60,
                                                    timePicker12Hour : false,
                                                    locale:{
                                                        applyLabel: '确认',
                                                        cancelLabel: '取消',
                                                        fromLabel: '从',
                                                        toLabel: '到',
                                                        weekLabel: 'W',
                                                        customRangeLabel: 'Custom Range',
                                                        daysOfWeek:["日","一","二","三","四","五","六"],
                                                        monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
                                                    },
                                                    format : 'YYYY-MM-DD HH:00', //控件中from和to 显示的日期格式
                                                }, function(start, end, label) {

                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('person_single_all_label','参与方式',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-10 col-xs-10" >
                                            <label class="radio-inline">
                                                {!! Form::radio('person_single_all','all',true) !!}所有人
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-2 col-xs-offset-2 col-xs-2">
                                            {!! Form::submit('建立竞赛',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::button('取消',['class'=>'btn btn-default','onClick'=>'location.reload();']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="pk2" style="padding: 50px 10px 50px 10px">
                                    {!! Form::open(['url'=>'/match','class'=>'form-horizontal']) !!}
                                    <div class="form-group">
                                        {!! Form::label('yundongleixing_label','运动类型',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('yundongleixing',['追踪器'],0,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('bisaileixing_label','比赛类型',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('bisaileixing',['duoren'=>'多人竞赛'],'duoren',['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('number_label','比赛人数上限',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('number',['3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8'],8,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('jieshao_label','竞赛介绍',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-5 col-xs-5" >
                                            {!! Form::textarea('jieshao',null,['class'=>'form-control','style'=>'width: 300px;height: 150px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('reservationtime_label','时间：',['class'=>'control-label col-sm-2 col-xs-2']) !!}
                                        <div class="input-group">
                                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                            {!! Form::text('reservationtime',null,['class'=>'form-control','id'=>'pk2_reservationtime','style'=>'width: 275px']) !!}
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#pk2_reservationtime').val((moment().add('day',1).format('YYYY-MM-DD HH:00') + ' - ' + moment().add('day',2).format('YYYY-MM-DD HH:00')));
                                                $('#pk2_reservationtime').daterangepicker({
                                                    minDate: moment(),
                                                    timePicker: true,
                                                    timePickerIncrement: 60,
                                                    timePicker12Hour : false,
                                                    locale:{
                                                        applyLabel: '确认',
                                                        cancelLabel: '取消',
                                                        fromLabel: '从',
                                                        toLabel: '到',
                                                        weekLabel: 'W',
                                                        customRangeLabel: 'Custom Range',
                                                        daysOfWeek:["日","一","二","三","四","五","六"],
                                                        monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
                                                    },
                                                    format : 'YYYY-MM-DD HH:00', //控件中from和to 显示的日期格式
                                                }, function(start, end, label) {

                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('person_single_all_label','参与方式',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-10 col-xs-10" >
                                            <label class="radio-inline">
                                                {!! Form::radio('person_single_all','all',true) !!}所有人
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-2 col-xs-offset-2 col-xs-2">
                                            {!! Form::submit('建立竞赛',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::button('取消',['class'=>'btn btn-default','onClick'=>'location.reload();']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <div role="tabpanel" class="tab-pane fade " id="pk3" style="padding: 50px 10px 50px 10px">
                                    {!! Form::open(['url'=>'/match','class'=>'form-horizontal']) !!}
                                    <div class="form-group">
                                        {!! Form::label('yundongleixing_label','运动类型',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('yundongleixing',['追踪器'],0,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('bisaileixing_label','比赛类型',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('bisaileixing',['mubiao'=>'目标竞赛'],'mubiao',['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('number_label','比赛人数上限',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-3 col-xs-3">
                                            {!! Form::select('number',['2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8'],8,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('mubiao_label','目标',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-5 col-xs-5">
                                            {!! Form::text('mubiao',"20000",['class'=>'form-control','style'=>'float:left;width:173px']) !!}<span style="margin-left: 20px">步</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('jieshao_label','竞赛介绍',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-5 col-xs-5" >
                                            {!! Form::textarea('jieshao',null,['class'=>'form-control','style'=>'width: 300px;height: 150px;']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('reservationtime_label','时间：',['class'=>'control-label col-sm-2 col-xs-2']) !!}
                                        <div class="input-group">
                                            <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                            {!! Form::text('reservationtime',null,['class'=>'form-control','id'=>'pk3_reservationtime','style'=>'width: 275px']) !!}
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#pk3_reservationtime').val((moment().add('day',1).format('YYYY-MM-DD') + ' - ' + moment().add('day',2).format('YYYY-MM-DD')));
                                                $('#pk3_reservationtime').daterangepicker({
                                                    minDate: moment(),
                                                    timePicker: false,
                                                    locale:{
                                                        applyLabel: '确认',
                                                        cancelLabel: '取消',
                                                        fromLabel: '从',
                                                        toLabel: '到',
                                                        weekLabel: 'W',
                                                        customRangeLabel: 'Custom Range',
                                                        daysOfWeek:["日","一","二","三","四","五","六"],
                                                        monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
                                                    },
                                                    format : 'YYYY-MM-DD', //控件中from和to 显示的日期格式
                                                }, function(start, end, label) {

                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('person_single_all_label','参与方式',['class'=>'col-sm-2 col-xs-2 control-label']) !!}
                                        <div class="col-sm-10 col-xs-10" >
                                            <label class="radio-inline">
                                                {!! Form::radio('person_single_all','all',true) !!}所有人
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-2 col-xs-offset-2 col-xs-2">
                                            {!! Form::submit('建立竞赛',['class'=>'btn btn-primary']) !!}
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            {!! Form::button('取消',['class'=>'btn btn-default','onClick'=>'location.reload();']) !!}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Arena" style="padding: 30px 30px 30px 30px;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Arena_zhuizongqi" role="tab" data-toggle="tab">追踪器</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="Arena_zhuizongqi" style="padding: 50px 10px 50px 10px">
                                    <ul class="match_ul">
                                        @foreach($match_all as $match)

                                        <a href="{{url('match/'.$match['id'])}}" class="match_li_a">
                                            <li class="match_li">
                                                <div class="match_li_title">{{$match['content']}}</div>
                                                <div class="match_li_top" >
                                                    <div class="match_li_div" style="width: 10%">
                                                        <div class="match_li_div_head">参与人数</div>
                                                        <div class="match_li_div_body"><strong>{{$match['join_num']}}/{{$match['maxNum']}}</strong></div>
                                                    </div>
                                                    <div class="match_li_div" style="width: 10%">
                                                        <div class="match_li_div_head">运动类型</div>
                                                        <div class="match_li_div_body"><strong>Run</strong></div>
                                                    </div>
                                                    <div class="match_li_div" style="width: 30%">
                                                        @if($match['state']=='ready')
                                                            <div class="match_li_div_head">离竞赛开始还有</div>
                                                            <div class="match_li_div_body">
                                                                <strong>{{$match['day']}}</strong>
                                                                天
                                                                <strong>{{$match['hour']}}</strong>
                                                                小时
                                                                <strong>{{$match['minute']}}</strong>
                                                                分
                                                            </div>
                                                        @elseif($match['state']=='ing')
                                                            <div class="match_li_div_head">离竞赛结束还有</div>
                                                            <div class="match_li_div_body" style="color: #FF6600">
                                                                <strong>{{$match['day']}}</strong>
                                                                天
                                                                <strong>{{$match['hour']}}</strong>
                                                                小时
                                                                <strong>{{$match['minute']}}</strong>
                                                                分
                                                            </div>
                                                        @else
                                                            <div class="match_li_div_head">竞赛已结束</div>
                                                            <div class="match_li_div_body" style="color: gray">
                                                                <strong>{{$match['day']}}</strong>
                                                                天
                                                                <strong>{{$match['hour']}}</strong>
                                                                小时
                                                                <strong>{{$match['minute']}}</strong>
                                                                分
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <div class="match_li_div">
                                                        @if($match['type']=='danren')
                                                            <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-minus-sign"></span></div>
                                                            <div class="match_li_div_body">单人PK</div>
                                                        @elseif($match['type']=='duoren')
                                                            <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-plus-sign"></span></div>
                                                            <div class="match_li_div_body">多人竞赛</div>
                                                        @else
                                                            <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-flag"></span></div>
                                                            <div class="match_li_div_body">目标竞赛</div>
                                                        @endif
                                                    </div>

                                                </div>

                                            </li>
                                        </a>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="mine" style="padding: 30px 30px 30px 30px;">

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#mine_zhuizongqi" role="tab" data-toggle="tab">我的竞赛</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="mine_zhuizongqi" style="padding: 50px 10px 50px 10px">
                                    <ul class="match_ul">
                                        @foreach($match_my as $match)
                                            <a href="{{url('match/'.$match['id'])}}" class="match_li_a">
                                                <li class="match_li">
                                                    <div class="match_li_title">{{$match['content']}}</div>
                                                    <div class="match_li_top" >
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">参与人数</div>
                                                            <div class="match_li_div_body"><strong>{{$match['join_num']}}/{{$match['maxNum']}}</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">运动类型</div>
                                                            <div class="match_li_div_body"><strong>Run</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 30%">
                                                            @if($match['state']=='ready')
                                                                <div class="match_li_div_head">离竞赛开始还有</div>
                                                                <div class="match_li_div_body">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @elseif($match['state']=='ing')
                                                                <div class="match_li_div_head">离竞赛结束还有</div>
                                                                <div class="match_li_div_body" style="color: #FF6600">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @else
                                                                <div class="match_li_div_head">竞赛已结束</div>
                                                                <div class="match_li_div_body" style="color: gray">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="match_li_div">
                                                            @if($match['type']=='danren')
                                                                <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-minus-sign"></span></div>
                                                                <div class="match_li_div_body">单人PK</div>
                                                            @elseif($match['type']=='duoren')
                                                                <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-plus-sign"></span></div>
                                                                <div class="match_li_div_body">多人竞赛</div>
                                                            @else
                                                                <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-flag"></span></div>
                                                                <div class="match_li_div_body">目标竞赛</div>
                                                            @endif
                                                        </div>

                                                    </div>

                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Single" style="padding: 30px 30px 30px 30px;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#single_zhuizongqi" role="tab" data-toggle="tab">单人PK</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="single_zhuizongqi" style="padding: 50px 10px 50px 10px">
                                    <ul class="match_ul">
                                        @foreach($match_danren as $match)

                                            <a href="{{url('match/'.$match['id'])}}" class="match_li_a">
                                                <li class="match_li">
                                                    <div class="match_li_title">{{$match['content']}}</div>
                                                    <div class="match_li_top" >
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">参与人数</div>
                                                            <div class="match_li_div_body"><strong>{{$match['join_num']}}/{{$match['maxNum']}}</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">运动类型</div>
                                                            <div class="match_li_div_body"><strong>Run</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 30%">
                                                            @if($match['state']=='ready')
                                                                <div class="match_li_div_head">离竞赛开始还有</div>
                                                                <div class="match_li_div_body">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @elseif($match['state']=='ing')
                                                                <div class="match_li_div_head">离竞赛结束还有</div>
                                                                <div class="match_li_div_body" style="color: #FF6600">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @else
                                                                <div class="match_li_div_head">竞赛已结束</div>
                                                                <div class="match_li_div_body" style="color: gray">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="match_li_div">
                                                                <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-minus-sign"></span></div>
                                                                <div class="match_li_div_body">单人PK</div>
                                                        </div>

                                                    </div>

                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="Many" style="padding: 30px 30px 30px 30px;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#Many_zhuizongqi" role="tab" data-toggle="tab">多人竞赛</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="Many_zhuizongqi" style="padding: 50px 10px 50px 10px">
                                    <ul class="match_ul">
                                        @foreach($match_duoren as $match)

                                            <a href="{{url('match/'.$match['id'])}}" class="match_li_a">
                                                <li class="match_li">
                                                    <div class="match_li_title">{{$match['content']}}</div>
                                                    <div class="match_li_top" >
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">参与人数</div>
                                                            <div class="match_li_div_body"><strong>{{$match['join_num']}}/{{$match['maxNum']}}</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">运动类型</div>
                                                            <div class="match_li_div_body"><strong>Run</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 30%">
                                                            @if($match['state']=='ready')
                                                                <div class="match_li_div_head">离竞赛开始还有</div>
                                                                <div class="match_li_div_body">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @elseif($match['state']=='ing')
                                                                <div class="match_li_div_head">离竞赛结束还有</div>
                                                                <div class="match_li_div_body" style="color: #FF6600">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @else
                                                                <div class="match_li_div_head">竞赛已结束</div>
                                                                <div class="match_li_div_body" style="color: gray">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="match_li_div">
                                                                <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-plus-sign"></span></div>
                                                                <div class="match_li_div_body">多人竞赛</div>

                                                        </div>

                                                    </div>

                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="target" style="padding: 30px 30px 30px 30px;">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#target_zhuizongqi" role="tab" data-toggle="tab">目标竞赛</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="target_zhuizongqi" style="padding: 50px 10px 50px 10px">
                                    <ul class="match_ul">
                                        @foreach($match_mubiao as $match)

                                            <a href="{{url('match/'.$match['id'])}}" class="match_li_a">
                                                <li class="match_li">
                                                    <div class="match_li_title">{{$match['content']}}</div>
                                                    <div class="match_li_top" >
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">参与人数</div>
                                                            <div class="match_li_div_body"><strong>{{$match['join_num']}}/{{$match['maxNum']}}</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 10%">
                                                            <div class="match_li_div_head">运动类型</div>
                                                            <div class="match_li_div_body"><strong>Run</strong></div>
                                                        </div>
                                                        <div class="match_li_div" style="width: 30%">
                                                            @if($match['state']=='ready')
                                                                <div class="match_li_div_head">离竞赛开始还有</div>
                                                                <div class="match_li_div_body">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @elseif($match['state']=='ing')
                                                                <div class="match_li_div_head">离竞赛结束还有</div>
                                                                <div class="match_li_div_body" style="color: #FF6600">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @else
                                                                <div class="match_li_div_head">竞赛已结束</div>
                                                                <div class="match_li_div_body" style="color: gray">
                                                                    <strong>{{$match['day']}}</strong>
                                                                    天
                                                                    <strong>{{$match['hour']}}</strong>
                                                                    小时
                                                                    <strong>{{$match['minute']}}</strong>
                                                                    分
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="match_li_div">
                                                                <div class="match_li_div_head" style="font-size: 40px;color: #98C04C"><span class="glyphicon glyphicon-flag"></span></div>
                                                                <div class="match_li_div_body">目标竞赛</div>
                                                        </div>

                                                    </div>

                                                </li>
                                            </a>
                                        @endforeach
                                    </ul>

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