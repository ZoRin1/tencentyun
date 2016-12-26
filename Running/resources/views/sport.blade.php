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
    <script src="{{ URL::asset('dist/js/radialIndicator.min.js') }}"></script>
    <script src="{{ URL::asset('dist/js/echarts.js') }}"></script>
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
                <li class="active"><a href="{{url('/sport#mysport')}}">运动</a></li>
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
        <div class="left col-sm-3 col-xs-3" style="height: 900px">
            <p style="color: white;font-size: 30px;">健康管理 </p>
            <div class="row">
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-stacked " role="tablist" id="mytab">

                    <li role="presentation" class="myli"><a class="my_a" href="#mysport" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-time tabsicon"></span>我的运动</a></li>
                    <li role="presentation" class="myli"><a class="my_a" href="#track" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-fire tabsicon"></span>健身追踪</a></li>
                </ul>

            </div>

        </div>
        <div class="right col-sm-9 col-xs-9" style="height: 900px;">
            <div class="panel panel-success shadow-border" style="margin-bottom: 5px;margin-top: 5px;height: 890px;border-width: 3px;">
                <div class="panel-body " style="padding: 30px 30px 30px 30px;">

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="mysport">
                            <p style="font-size: 30px">您本周的健康状况<small>步数:<font style="font-weight: bold">{{$week_step}}</font>步  距离:<font style="font-weight: bold">{{$week_distance}}</font> km</small></p>
                            <hr style="border: 1px solid gainsboro">
                            <div id="step_indicatorContainer" style="float: left;width: 50%" weekstep="{{$week_step}}" >
                            </div>
                            <script type="text/javascript">
                                var week_step=$('#step_indicatorContainer').attr('weekstep');
                                var v=parseFloat(week_step)/700;
                                $('#step_indicatorContainer').radialIndicator({
                                    radius:100,
                                    barBgColor: '#FFE3AC',
                                    barColor: '#FFA200',
                                    barWidth: 20,
                                    roundCorner : true,
                                    fontSize:20,
                                    format: function (value) {
                                                return '步数目标完成:'+value+'%';
                                            }

                                        });
                                var radialObj = $('#step_indicatorContainer').data('radialIndicator');
                                //now you can use instance to call different method on the radial progress.
                                //like
                                radialObj.animate(v);
                            </script>
                            <div id="distance_indicatorContainer" style="float: left;width: 50%" weekdistance="{{$week_distance}}">
                            </div>
                            <script type="text/javascript">
                                var week_distance=$('#distance_indicatorContainer').attr('weekdistance');
                                var v=parseFloat(week_distance)*2;

                                $('#distance_indicatorContainer').radialIndicator({
                                    radius:100,
                                    barBgColor: '#FFE3AC',
                                    barColor: '#FFA200',
                                    barWidth: 20,
                                    roundCorner : true,
                                    fontSize:20,
                                    format: function (value) {
                                        return '距离目标完成:'+value+'%';
                                    }

                                });
                                var radialObj = $('#distance_indicatorContainer').data('radialIndicator');
                                //now you can use instance to call different method on the radial progress.
                                //like
                                radialObj.animate(v);
                            </script>
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
                            <div>
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
                        <div role="tabpanel" class="tab-pane fade" id="track">
                            <p style="font-size: 30px">健康追踪</p>
                            <hr style="border: 1px solid gainsboro">
                            <pre style="width: 300px;font-size: 16px">周目标 : 步数  70000 距离  50 Km</pre>
                            <div class="panel panel-success " style="background-color: #F3F3F3;height: 650px;">
                                <div class="panel-body" >

                                    <div id="run_data_charts" style="width: 770px;height: 620px;"></div>
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
    $.ajax({
        type: 'POST',
        url: 'sport',
        async:false,
        data: {},
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success:function(data){
            // 基于准备好的dom，初始化echarts实例
            var chart=document.getElementById('run_data_charts');
            var myChart = echarts.init(chart);
            // 指定图表的配置项和数据
            var date =data.date;
            var value=data.distance;
            var value2=data.step;

            var option = {
                title: {
                    text: '运动记录'
                },
                tooltip: {
                    trigger: 'axis',

                },
                legend: {
                    data:['distance(公里)', 'step(步数)'],


                },
                grid:{
                    right:'15%'
                },
                xAxis: {
                    data: date
                },
                yAxis: [{
                    type:'value',
                    splitLine: {
                        show: false
                    }
                },
                    {
                        type:'value',
                        splitLine: {
                            show: false
                        },

                    }
                ],
                toolbox: {
                    left: 'right',
                    feature: {
                        saveAsImage: {}
                    }
                },
                dataZoom: [
                    {start:90},
                    {
                        type: 'inside'
                    },
                    {
                        start: 0,
                        end: 10,
                        handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                        handleSize: '80%',
                        handleStyle: {
                            color: '#fff',
                            shadowBlur: 3,
                            shadowColor: 'rgba(0, 0, 0, 0.6)',
                            shadowOffsetX: 2,
                            shadowOffsetY: 2
                        }
                    }],
                visualMap: [{
                    top: '10%',
                    right: 0,
                    seriesIndex: 0,
                    pieces: [{
                        gt: 0,
                        lte: 1,
                        color: '#096'
                    }, {
                        gt: 1,
                        lte: 3,
                        color: '#ffde33'
                    }, {
                        gt: 3,
                        lte: 5,
                        color: '#ff9933'
                    }, {
                        gt: 5,
                        lte: 8,
                        color: '#cc0033'
                    }, {
                        gt: 8,
                        lte: 10,
                        color: '#660099'
                    }, {
                        gt: 10,
                        color: '#7e0023'
                    }],
                    outOfRange: {
                        color: '#999'
                    },

                }],
                series: [{
                    name: 'distance(公里)',
                    type: 'line',
                    data: value,
                    markLine: {
                        silent: true,
                        data: [{
                            yAxis: 2
                        }, {
                            yAxis: 5
                        }, {
                            yAxis: 10
                        }]
                    }
                },{
                    name: 'step(步数)',
                    type: 'bar',
                    data: value2,
                    yAxisIndex:1,

                    itemStyle:{
                        normal:{
                            color:'#4ECE5C'
                        }
                    },

                }]};

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        }
    });

</script>
</html>