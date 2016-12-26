<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
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
                <ul class="nav nav-pills nav-stacked">
                    <button class="myli btn " style="font-size: 20px;background-color: #FFA200;width: 100%;height: 50px;"><a href="{{url('/match#Launch_competition')}}" class="match_a">发起竞赛</a></button>
                    <hr style="margin-top:0;width:100%;border: 1px solid  #A2A2A2;">
                    <li class="myli"><a class="my_a" href="{{url('/match#Arena')}}"><span class="glyphicon glyphicon-time tabsicon"></span>竞技场</a></li>
                    <li class="myli"><a class="my_a" href="{{url('/match#mine')}}" ><span class="glyphicon glyphicon-star tabsicon"></span>我的竞赛</a></li>
                    <hr style="margin-top:0;width:100%;border: 1px solid  #A2A2A2;">
                    <li class="myli"><a class="my_a" href="{{url('/match#Single')}}" ><span class="glyphicon glyphicon-minus-sign tabsicon"></span>单人PK</a></li>
                    <li class="myli"><a class="my_a" href="{{url('/match#Many')}}" ><span class="glyphicon glyphicon-plus-sign tabsicon"></span>多人竞赛</a></li>
                    <li class="myli"><a class="my_a" href="{{url('/match#target')}}" ><span class="glyphicon glyphicon-flag tabsicon"></span>目标竞赛</a></li>
                </ul>

            </div>

        </div>
        <div class="right col-sm-9 col-xs-9">
            <div class="panel panel-success shadow-border" style="margin-bottom: 5px;margin-top: 5px;border-width: 3px;">
                <div class="panel-body " style="padding: 30px 30px 30px 30px;height: 1200px;">
                    @if($match_inf['type']=='danren')
                        <p style="font-size: 30px;color: #709E18;float: left">单人PK{{"  ".$match_inf['join_num'].'/'.$match_inf['maxNum']}}</p>
                    @elseif($match_inf['type']=='duoren')
                        <p style="font-size: 30px;color: #709E18;float: left">多人竞赛{{"  ".$match_inf['join_num'].'/'.$match_inf['maxNum']}}</p>
                    @else
                        <p style="font-size: 30px;color: #709E18;float: left">目标竞赛{{"  ".$match_inf['join_num'].'/'.$match_inf['maxNum']}}</p>
                    @endif

                    <div>
                        @if($match_inf['state']=='end')
                            <button class="btn btn-success" style="float: right;font-size: 20px" disabled="true">已结束</button>
                        @elseif($match_inf['isjoin'])
                            <button class="btn btn-success" style="float: right;font-size: 20px" id="joinButton" match_id="{{$match_inf['id']}}">退出</button>
                        @elseif($match_inf['join_num']==$match_inf['maxNum'])
                            <button class="btn btn-success" style="float: right;font-size: 20px" disabled="true">人数已满</button>
                        @else
                            <button class="btn btn-success" style="float: right;font-size: 20px"  id="joinButton"  match_id="{{$match_inf['id']}}">立即加入</button>
                        @endif
                    </div>
                    <hr style="margin-top:0;width:100%;border: 1px solid  #A2A2A2;">
                    <div>
                        @foreach($match_inf['join_inf'] as $join_inf)
                            <div class="matchInformation_head_div">
                                <a href="{{url('home/'.$join_inf['email'].'#home')}}">
                                    <img class="img-rounded" src="{{url::asset('img/head/'.$join_inf['headimg'])}} " style="width: 50px;height: 50px">
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="panel" style="margin-bottom: 5px;margin-top: 30px;height:300px;background: #EEEEEE">
                        <div class="panel-body ">
                            <div>
                                <div style="font-size: 50px;height: 100px;display: inline;color: #619D2A;margin-right: 10px">
                                    <span class="glyphicon glyphicon-time"></span>
                                </div>
                                @if($match_inf['state']=='ready')
                                    离比赛开始还有
                                    @elseif($match_inf['state']=='ing')
                                    离比赛结束还有
                                    @else
                                    竞赛已结束
                                    @endif
                                <div style="color: #FF6600;display: inline;height: 100px;line-height: 100px">
                                    <strong style="font-size: 30px">{{$match_inf['day']}}</strong>
                                    天
                                    <strong style="font-size: 30px">{{$match_inf['hour']}}</strong>
                                    小时
                                    <strong style="font-size: 30px">{{$match_inf['minute']}}</strong>
                                    分
                                </div>
                                <small style="color: gray">{{$match_inf['start']." 至 ".$match_inf['end']}}</small>
                            </div>
                            <div>
                                <div style="font-size: 50px;height: 100px;float:left;color: #619D2A;">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </div>
                                <div style="float:left;width:700px;height: 180px;margin-left: 20px">
                                    {{$match_inf['content']}}
                                </div>
                            </div>
                        </div>
                    </div>
                        <p style="font-size: 20px;margin-top: 20px">
                            @if($match_inf['state']=='end')
                                竞赛战果
                            @else
                                当前战况
                            @endif
                        </p>
                        <div style="float: left">

                            <ul style="list-style:none;padding: 0 0 0 0;">
                                @for($i=1;$i<=count($match_inf['rank']);$i++)
                                    <li style="height: 50px;margin-top: 20px">
                                        <div style="float: left;line-height: 50px;margin-right: 20px;font-weight: bold;font-size: 30px">{{$i}}</div>
                                        <div style="float: left;margin-right: 20px">
                                            <a href="{{url('home/'.$match_inf['rank'][$i-1]['email'].'#home')}}">
                                                <img class="img-rounded" src="{{url::asset('img/head/'.$match_inf['rank'][$i-1]['headimg'])}} " style="width: 50px;height: 50px">
                                            </a>
                                        </div>
                                        <div style="float: left;margin-right: 20px;">
                                            <div style="height: 20px;line-height: 20px;"><a href="{{url('home/'.$match_inf['rank'][$i-1]['email'].'#home')}}" style="color: #619D2A;">{{$match_inf['rank'][$i-1]['name']}}</a></div>
                                            @if($match_inf['type']=='mubiao')
                                                @if($i==1)
                                                    <div class="img-rounded" style="width: 180px;background: #FFA200;height: 30px;line-height: 30px;font-size: 24px;color: white"><p style="float: right">{{$match_inf['rank'][$i-1]['steps']}}步</p></div>
                                                @elseif($i==2)
                                                    <div class="img-rounded" style="width: 150px;background: #FFA200;height: 30px;line-height: 30px;font-size: 24px;color: white"><p style="float: right">{{$match_inf['rank'][$i-1]['steps']}}步</p></div>
                                                @else
                                                    <div class="img-rounded" style="width: 120px;background: #FFA200;height: 30px;line-height: 30px;font-size: 24px;color: white"><p style="float: right">{{$match_inf['rank'][$i-1]['steps']}}步</p></div>
                                                @endif

                                            @else
                                                @if($i==1)
                                                    <div class="img-rounded" style="width: 180px;background: #FFA200;height: 30px;line-height: 30px;font-size: 24px;color: white"><p style="float: right">{{$match_inf['rank'][$i-1]['distance']}}公里</p></div>
                                                @elseif($i==2)
                                                    <div class="img-rounded" style="width: 150px;background: #FFA200;height: 30px;line-height: 30px;font-size: 24px;color: white"><p style="float: right">{{$match_inf['rank'][$i-1]['distance']}}公里</p></div>
                                                @else
                                                    <div class="img-rounded" style="width: 120px;background: #FFA200;height: 30px;line-height: 30px;font-size: 24px;color: white"><p style="float: right">{{$match_inf['rank'][$i-1]['distance']}}公里</p></div>
                                                @endif
                                            @endif
                                        </div>
                                    </li>
                                @endfor

                            </ul>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#joinButton').click(function (){
            $.ajax({
                type: 'POST',
                url: 'join',
                data: { match_id : $(this).attr('match_id')},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success:function(data){
                    if(data.refresh==1){
                        self.location='match#Arena';
                    }else{
                        location.reload(true);
                    }
                }
            });


        });
    });
</script>
</html>