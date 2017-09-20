<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>堪培拉2+2联盟</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" class="button btn btn-primary"><h4>首页</h4></a>
                    @else
                        <a href="{{ url('/login') }}" class="btn btn-primary" role="button" style="color: white;"><h5>登 录</h5></a>
                        <a href="{{ url('/register') }}" class="btn btn-primary" role="button" style="color: white;"><h5>注 册</h5></a>
                    @endif
                </div>
            @endif

            <div class="content">
                <center><img src="{{ url('/image/default/npu-logo.png') }}" alt=""></center>
                    <div class="col-sm-6 col-xs-12"><h1>西岳轩昂     北斗辉煌</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>泽被万方     化育先翔</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>巍哉学府     辈出栋梁</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>重德厚生     国乃盛强</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>千仞之墙     百炼之钢</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>缕木铄金     飞天巡洋</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>公诚勇毅     永矢勿忘</h1></div>
                    <div class="col-sm-6 col-xs-12"><h1>中华灿烂     工大无疆</h1></div>
            </div>
        </div>
    </body>
</html>
