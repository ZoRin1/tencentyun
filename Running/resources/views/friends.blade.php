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
    <div class="container" style="padding: 20px 0px 20px 0px;width: 1200px;">
        <div class="left col-sm-3 col-xs-3">
            <p style="font-size: 30px;color: white">好友关系 </p>
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-stacked" role="tablist" id="mytab">
                    <li role="presentation" class="myli"><a href="#following" class="my_a" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-heart-empty tabsicon"></span>关注</a></li>
                    <li role="presentation" class="myli"><a href="#follower" class="my_a" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-eye-open tabsicon"></span>粉丝</a></li>
                </ul>
            </div>

        </div>
        <div class="right col-sm-9 col-xs-9">
            <div class="panel panel-success shadow-border" style="margin-bottom: 5px;margin-top: 5px;border-width: 3px;">
                <div class="panel-body " style="padding: 30px 30px 30px 30px;height:auto;min-height: 800px;">

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="following">
                            <p style="font-size: 30px">全部关注 <small>{{$followings_num}}</small></p>
                            <hr style="border: 1px solid gainsboro">
                            <div class="container-fluid">
                                <ul class="friendul">
                                    @foreach($following_arrs as $following_arr)
                                    <div class="col-sm-4 col-xs-4 ">
                                        @if($following_arr['sex']=='male')
                                        <li class="friendli_male shadow-border">
                                            <div class="left col-sm-3 col-xs-3 friendli_left">
                                                <a href="{{url('home/'.$following_arr['email'].'#home')}}">
                                                    <img src="{{url::asset('img/head/'.$following_arr['headimg'])}}" class="friendli_head_img img-circle">
                                                </a>

                                            </div>
                                            <div class="right col-sm-9 col-xs-9 friendli_right">
                                                <a href="{{url('home/'.$following_arr['email'].'#home')}}">
                                                    <div class="friendli_name">{{$following_arr['name']}}</div>
                                                </a>
                                                <div class="friendli_div">
                                                    所在地: {{$following_arr['city']}}
                                                </div>
                                                <div class="friendli_div">
                                                    兴趣: {{$following_arr['interest']}}
                                                </div>
                                                <div class="friendli_div" >
                                                    @if($following_arr['isEachOther'])
                                                    <a class="btn btn-default btn-follow" href="#following" email="{{$following_arr['email']}}">已互相关注</a>
                                                        @else
                                                        <a class="btn btn-default btn-follow" href="#following" email="{{$following_arr['email']}}">取消关注</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                            @else
                                            <li class="friendli_female shadow-border">
                                                <div class="left col-sm-3 col-xs-3 friendli_left">
                                                    <a href="{{url('home/'.$following_arr['email'].'#home')}}">
                                                        <img src="{{url::asset('img/head/'.$following_arr['headimg'])}}" class="friendli_head_img img-circle">
                                                    </a>
                                                </div>
                                                <div class="right col-sm-9 col-xs-9 friendli_right">
                                                    <a href="{{url('home/'.$following_arr['email'].'#home')}}">
                                                        <div class="friendli_name">{{$following_arr['name']}}</div>
                                                    </a>
                                                    <div class="friendli_div">
                                                        所在地: {{$following_arr['city']}}
                                                    </div>
                                                    <div class="friendli_div">
                                                        兴趣: {{$following_arr['interest']}}
                                                    </div>
                                                    <div class="friendli_div" >
                                                        @if($following_arr['isEachOther'])
                                                            <a class="btn btn-default btn-follow" href="#following" email="{{$following_arr['email']}}">已互相关注</a>
                                                        @else
                                                            <a class="btn btn-default btn-follow" href="#following" email="{{$following_arr['email']}}">取消关注</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    </div>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="follower">
                            <p style="font-size: 30px">全部粉丝 <small>{{$followers_num}}</small></p>
                            <hr style="border: 1px solid gainsboro">
                            <div class="container-fluid" >
                                <ul class="friendul">
                                    @foreach($follower_arrs as $follower_arr)
                                        <div class="col-sm-4 col-xs-4 ">
                                            @if($follower_arr['sex']=='male')
                                                <li class="friendli_male shadow-border">
                                                    <div class="left col-sm-3 col-xs-3 friendli_left">
                                                        <a href="{{url('home/'.$follower_arr['email'].'#home')}}" >
                                                            <img src="{{url::asset('img/head/'.$follower_arr['headimg'])}}" class="friendli_head_img img-circle">
                                                        </a>

                                                    </div>
                                                    <div class="right col-sm-9 col-xs-9 friendli_right">
                                                        <a href="{{url('home/'.$follower_arr['email'].'#home')}}">
                                                            <div class="friendli_name">{{$follower_arr['name']}}</div>
                                                        </a>
                                                        <div class="friendli_div">
                                                            所在地: {{$follower_arr['city']}}
                                                        </div>
                                                        <div class="friendli_div">
                                                            兴趣: {{$follower_arr['interest']}}
                                                        </div>
                                                        <div class="friendli_div" >
                                                            @if($follower_arr['isEachOther'])
                                                                <a class="btn btn-default btn-follow" href="#follower" email="{{$follower_arr['email']}}">已互相关注</a>
                                                            @else
                                                                <a class="btn btn-default btn-follow" href="#follower" email="{{$follower_arr['email']}}">关注</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @else
                                                <li class="friendli_female shadow-border">
                                                    <div class="left col-sm-3 col-xs-3 friendli_left">
                                                        <a href="{{url('home/'.$follower_arr['email'].'#home')}}">
                                                            <img src="{{url::asset('img/head/'.$follower_arr['headimg'])}}" class="friendli_head_img img-circle">
                                                        </a>

                                                    </div>
                                                    <div class="right col-sm-9 col-xs-9 friendli_right">
                                                        <a href="{{url('home/'.$follower_arr['email'].'#home')}}">
                                                            <div class="friendli_name">{{$follower_arr['name']}}</div>
                                                        </a>
                                                        <div class="friendli_div">
                                                            所在地: {{$follower_arr['city']}}
                                                        </div>
                                                        <div class="friendli_div">
                                                            兴趣: {{$follower_arr['interest']}}
                                                        </div>
                                                        <div class="friendli_div" >
                                                            @if($follower_arr['isEachOther'])
                                                                <a class="btn btn-default btn-follow" href="#follower" email="{{$follower_arr['email']}}">已互相关注</a>
                                                            @else
                                                                <a class="btn btn-default btn-follow" href="#follower" email="{{$follower_arr['email']}}">关注</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </div>
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
        $(".btn-follow").click(function(){
            var email=$(this).attr('email');
            $.ajax({
                type: 'POST',
                url: 'friends/following',
                data: { email : email},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
                location.reload(true);

        });
    });
</script>
</html>