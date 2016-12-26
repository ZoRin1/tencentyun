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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ URL::asset('//cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ URL::asset('//cdn.bootcss.com/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <script src="{{ URL::asset('dist/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/myjs.js') }}"></script>
    <script src="{{ URL::asset('dist/js/home.js') }}"></script>

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
                <li class="active"><a href="{{url('/home#home')}}">首页</a></li>
                <li ><a href="{{url('/sport#mysport')}}">运动</a></li>
                <li ><a href="{{url('/match#Arena')}}">竞赛</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label" style="background: #618914;"><span style="margin-right: 6px"><img src="{{url::asset('img/head/'.$information['headimg'])}}" style="width: 16px;height: 16px;"></span>{{$user['name']}}<span class="caret" style="margin-left: 20px"></span></span></a>
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

                            <a href="{{url('/user#information')}}">
                                <img src="{{url::asset('img/head/'.$information['headimg'])}}" class="img-thumbnail shadow-border" style="height: 230px;width: 240px">
                            </a>

                    </div>

                    <div  style="height: 100px;">
                        <a href="{{url('/user#information')}}">
                            <p style="color: #699000;font-size: 20px;">{{$user['name']}}
                                @if($information['sex']=='male')
                                <span class="glyphicon glyphicon-user" style="color: #2aabd2;margin-left: 15px"></span>
                                    @else
                                    <span class="glyphicon glyphicon-user" style="color: #FF7CB6;margin-left: 15px"></span>
                                    @endif
                            </p>
                        </a>
                        <div id="huizhang">
                            <span class="glyphicon glyphicon glyphicon-usd" style="color: #EBB512;"
                                             data-toggle="tooltip" data-placement="bottom" title="账户余额：0"></span>
                            <span class="glyphicon glyphicon-map-marker" style="color: #EBB512;margin-left: 10px"
                                             data-toggle="tooltip" data-placement="bottom" title={{"所在地：".$information['city']}}></span>
                            <a href="{{url('/sport#mysport')}}">
                                <span class="glyphicon glyphicon-fire" style="color: #EBB512;margin-left: 10px"
                                      data-toggle="tooltip" data-placement="bottom" title={{"累计消耗：".$fire_total."千卡"}}></span>
                            </a>
                            <a href="{{url('/friends#following')}}"><span class="glyphicon glyphicon-heart-empty" style="color: #EBB512;margin-left: 10px"
                                             data-toggle="tooltip" data-placement="bottom" title={{"关注的人：".$followings_total}}></span></a>
                            <a href="{{url('/friends#follower')}}"><span class="glyphicon glyphicon-eye-open" style="color: #EBB512;margin-left: 10px"
                                             data-toggle="tooltip" data-placement="bottom" title={{"粉丝：".$followers_total}}></span></a>
                        </div>
                    </div>
                    <div  style="width:100%;height: 160px;">
                        <p style="font-size: 15px;font-weight: bolder;color: white">个性签名</p>
                        <p style="font-size: 18px;word-break: break-all;color: #699000;">{{$information['message']}}</p>

                    </div>

                    <p style="font-size: 18px;color: #709E18">Running 享受健康生活</p>
                    <hr style="margin-top:0;width:100%;border: 1px solid  #A2A2A2;">
                    <div class="row">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills nav-stacked" role="tablist" id="mytab">
                                <li role="presentation" class="myli"><a class="my_a" href="#home" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-home tabsicon"></span>首页</a></li>
                                <li role="presentation" class="myli"><a class="my_a" href="#moment" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-refresh tabsicon"></span>朋友圈</a></li>
                                <li role="presentation" class="myli"><a class="my_a" href="#activity" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-bell tabsicon"></span>活动</a></li>
                            </ul>

                    </div>

            </div>
            <div class="right col-sm-9 col-xs-9">
                <div class="panel panel-success shadow-border" style="margin-bottom: 5px;margin-top: 5px;border-width: 3px;">
                    <div class="panel-body " style="padding: 0px 0px 0px 0px;height: auto;min-height: 1100px;">

                        <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade" id="home">
                                    <div id="carousel-example-generic" class="carousel slide shadow-border" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active">
                                                <img src="img/activity_1.jpg" alt="..." style="width: 100%;height: 500px;">
                                                <div class="carousel-caption">
                                                    Running
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/activity_2.jpg" alt="..." style="width: 100%;height: 500px;">
                                                <div class="carousel-caption">
                                                    Running
                                                </div>
                                            </div>

                                            <div class="item">
                                                <img src="img/activity_3.jpg" alt="..." style="width: 100%;height: 500px;">
                                                <div class="carousel-caption">
                                                    Running
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <div style="padding: 80px 30px 0px 30px;width: 100%">
                                        <p style="font-size: 30px">您在Running的运动总量</p>
                                        <hr style="border: 1px solid gainsboro">
                                        <ul style="list-style-type: none;padding: 0 0 0 0;height: 56px;">
                                            <li style="float: left;width: 268px;">
                                                <div class="fl ico ico_juli"></div>
                                                <div class="fl" style="color: #E0B02E;margin-left: 30px;">
                                                    <div >
                                                        累积运动距离
                                                    </div>
                                                    <div>
                                                        <strong style="font-size: 36px">{{$distance_total}}</strong>公里
                                                    </div>
                                                </div>
                                            </li>
                                            <li style="float: left;width: 268px;">
                                                <div class="fl ico ico_shijian"></div>
                                                <div class="fl" style="color: #E0B02E;margin-left: 30px;">
                                                    <div >
                                                        累积运动次数
                                                    </div>
                                                    <div>
                                                        <strong style="font-size: 36px">{{$times_total}}</strong>次
                                                    </div>
                                                </div>
                                            </li>
                                            <li style="float: left;width: 268px;">
                                                <div class="fl ico ico_reliang"></div>
                                                <div class="fl" style="color: #E0B02E;margin-left: 30px;">
                                                    <div >
                                                        累积燃烧热量
                                                    </div>
                                                    <div>
                                                        <strong style="font-size: 36px">{{$fire_total}}</strong>大卡
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div style="height: 20px;width: 100%"></div>
                                        <p style="font-size: 30px">这些运动量可以</p>
                                        <hr style="border: 1px solid gainsboro">
                                        <div >
                                            <div class="fl" style="width: 25%;height: 250px;background-color: #F1CC7E;color:white;font-size: 20px">
                                                <div style="height: 30px;width: 100%"></div>
                                                <div class="ico ico_paodao" style="margin-left: 48px">
                                                    <div style="height: 30px;width: 100%"></div>
                                                </div>
                                                <div style="height: 30px;width: 100%"></div>

                                                <div style="width: 100%;text-align: center;">
                                                    绕环形跑道（圈）
                                                </div>
                                                <div style="height: 20px;width: 100%"></div>
                                                <div style="width: 100%;text-align: center;font-weight: bold;font-size: 50px">
                                                    {{$distance_total*2.5}}
                                                </div>
                                            </div>
                                            <div class="fl" style="width: 25%;height: 250px;background-color: #B0B0B0;color:white;font-size: 20px">
                                                <div style="height: 30px;width: 100%"></div>
                                                <div class="ico ico_feirou" style="margin-left: 48px">
                                                    <div style="height: 30px;width: 100%"></div>
                                                </div>
                                                <div style="height: 30px;width: 100%"></div>

                                                <div style="width: 100%;text-align: center;">
                                                    消耗肥肉（公斤）
                                                </div>
                                                <div style="height: 20px;width: 100%"></div>
                                                <div style="width: 100%;text-align: center;font-weight: bold;font-size: 50px">
                                                    {{round($fire_total/9300,2)}}
                                                </div>
                                            </div>
                                            <div class="fl" style="width: 25%;height: 250px;background-color: #F1CC7E;color:white;font-size: 20px">
                                                <div style="height: 30px;width: 100%"></div>
                                                <div class="ico ico_jiayou" style="margin-left: 48px">
                                                    <div style="height: 30px;width: 100%"></div>
                                                </div>
                                                <div style="height: 30px;width: 100%"></div>

                                                <div style="width: 100%;text-align: center;">
                                                    省93#汽油（升）
                                                </div>
                                                <div style="height: 20px;width: 100%"></div>
                                                <div style="width: 100%;text-align: center;font-weight: bold;font-size: 50px">
                                                    {{round($fire_total/8022,2)}}
                                                </div>
                                            </div>
                                            <div class="fl" style="width: 25%;height: 250px;background-color: #B0B0B0;color:white;font-size: 20px">
                                                <div style="height: 30px;width: 100%"></div>
                                                <div class="ico ico_dian" style="margin-left: 48px">
                                                    <div style="height: 30px;width: 100%"></div>
                                                </div>
                                                <div style="height: 30px;width: 100%"></div>

                                                <div style="width: 100%;text-align: center;">
                                                    60W灯泡亮（小时）
                                                </div>
                                                <div style="height: 20px;width: 100%"></div>
                                                <div style="width: 100%;text-align: center;font-weight: bold;font-size: 50px">
                                                    {{round($fire_total*4.182/(3600*0.06),2)}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="moment" >
                                    <div class="panel panel-default ">
                                        <div class="panel-body " style="padding: 0px 0px 0px 0px;">
                                            {!! Form::open(['url'=>'/home/public']) !!}
                                            {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'说点什么吧......','style'=>'width: 90%;height: 150px;float: left;display: inline;margin-right: 1px;font-size: 18px;']) !!}
                                            {!! Form::submit('发表',['class'=>'btn btn-warning','style'=>'width: 85px;float: left;display: inline;height: 150px']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>

                                    @foreach($show_moments as $show_moment)
                                        <div class="panel panel-default " >
                                            <div class="panel-body" style="padding: 0px 0px 0px 0px;">
                                                @if($show_moment['sex']=='male')
                                                    <div class="dongtai-head-male">
                                                        <a href="{{url('/home/'.$show_moment['email']."#home")}} ">
                                                            <img src="{{url::asset('img/head/'.$show_moment['headimg'])}}" class="dongtai-head-img img-thumbnail shadow-border" style="height: 50px;width: 50px">
                                                        </a>
                                                        <div >
                                                            <a href="{{url('/home/'.$show_moment['email']."#home")}}"  style="height: 38px; line-height:38px;font-size: 18px;color: white ">
                                                                {{$show_moment['name']}}
                                                            </a>
                                                        </div>
                                                        <div style="height: 22px; line-height:20px;font-size: 14px;color: white  ">{{$show_moment['created_at']}}</div>
                                                    </div>
                                                    @else
                                                    <div class="dongtai-head-female">
                                                        <a href="{{url('/home/'.$show_moment['email']."#home")}}">
                                                            <img src="{{url::asset('img/head/'.$show_moment['headimg'])}}" class="dongtai-head-img img-thumbnail shadow-border" style="height: 50px;width: 50px">
                                                        </a>
                                                        <div >
                                                            <a href="{{url('/home/'.$show_moment['email']."#home")}}" style="height: 38px; line-height:38px;font-size: 18px;color: white ">
                                                                {{$show_moment['name']}}
                                                            </a>
                                                        </div>
                                                        <div style="height: 22px; line-height:20px;font-size: 14px;color: white  ">{{$show_moment['created_at']}}</div>
                                                    </div>
                                                @endif

                                                <div class="dongtai-content">
                                                   {{$show_moment['content']}}
                                                </div>
                                                <div class="dongtai-btn" >
                                                    @if($show_moment['islike']==0)
                                                        <button class="btn dongtai-btn-like" moment_id="{{$show_moment['moment_id']}}"><span class="glyphicon glyphicon-thumbs-up" style="margin-right: 5px"></span><span>赞</span>（<span>{{$show_moment['like_num']}}</span>）</button>
                                                    @else
                                                        <button class="btn dongtai-btn-like" moment_id="{{$show_moment['moment_id']}}"><span class="glyphicon glyphicon-thumbs-up" style="margin-right: 5px"></span><span>取消赞</span>（<span>{{$show_moment['like_num']}}</span>）</button>
                                                    @endif
                                                    @if($show_moment['email']==$user['email'])
                                                    <button class="btn dongtai-btn-delete" moment_id="{{$show_moment['moment_id']}}"><span class="glyphicon glyphicon-trash" style="margin-right: 5px"></span><span>删除</span></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="activity">
                                            <div style="width: 80%;margin:30px 10% 0px 10%;">
                                                <p style="font-size: 30px">精彩活动</p>
                                                <hr style="border: 1px solid gainsboro">
                                            </div>

                                            <div class="panel" style="height: 300px;width: 60%;margin-left: 20%">
                                                <div class="panel-body shadow-border" style="padding: 0px 0px 0px 0px;">
                                                    <a href="#activity"><img src="img/activity_1.jpg" style="height: 100%;width: 100%"></a>
                                                </div>
                                            </div>
                                            <div class="panel" style="height: 300px;width: 60%;margin-left: 20%">
                                                <div class="panel-body shadow-border" style="padding: 0px 0px 0px 0px;">
                                                    <a href="#activity"><img src="img/activity_2.jpg" style="height: 300px;width: 100%"></a>
                                                </div>
                                            </div>
                                            <div class="panel" style="height: 300px;width: 60%;margin-left: 20%">
                                                <div class="panel-body shadow-border" style="padding: 0px 0px 0px 0px;">
                                                    <a href="#activity"><img src="img/activity_3.jpg" style="height: 300px;width: 100%"></a>
                                                </div>
                                            </div>
                                            <div class="panel" style="height: 300px;width: 60%;margin-left: 20%">
                                                <div class="panel-body shadow-border" style="padding: 0px 0px 0px 0px;">
                                                    <a href="#activity"><img src="img/activity_4.png" style="height: 300px;width: 100%"></a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".dongtai-btn-like").click(function(){

        if ( $(this).find('span').eq(1).text()=='赞'){
            $(this).find('span').eq(1).text("取消赞");
            var num=$(this).find('span').eq(2).text();
            $(this).find('span').eq(2).text(Number(num)+1);
        }else{
            $(this).find('span').eq(1).text("赞");
            var num=$(this).find('span').eq(2).text();
            $(this).find('span').eq(2).text(Number(num)-1);
        }
            var moment_id=$(this).attr('moment_id');
            $.ajax({
                type: 'POST',
                url: 'home/like',
                data: { moment_id : moment_id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        });
        $(".dongtai-btn-delete").click(function(){
            var moment_id=$(this).attr('moment_id');
            $.ajax({
                type: 'POST',
                url: 'home/delete',
                data: { moment_id : moment_id},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success:function(data){
                    location.reload(true);
                }
            });

        });
    });

</script>
</html>