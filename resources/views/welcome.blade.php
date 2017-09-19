<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>堪培拉2+2联盟</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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
                        <a href="{{ url('/home') }}">首页</a>
                    @else
                        <a href="{{ url('/login') }}">登 录</a>
                        <a href="{{ url('/register') }}">注 册</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <center><img src="{{ asset('public/default/npu-logo') }}" alt=""></center>
                <div class="m-b-md">
                    <h1>
                        <span>西岳轩昂     北斗辉煌     泽被万方   化育先翔</span><br>
                        <span>巍哉学府     辈出栋梁     重德厚生   国乃盛强</span><br>
                        <span>千仞之墙     百炼之钢     缕木铄金   飞天巡洋</span><br>
                        <span>公诚勇毅     永矢勿忘     中华灿烂   工大无疆</span>
                    </h1>
                 </div>   
            </div>
        </div>
    </body>
</html>
