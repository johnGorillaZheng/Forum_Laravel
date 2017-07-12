@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">用户信息
                </div>

                <div class="panel-body">
                    <user-avatar avatar="{{Auth::user()->avatar}}"></user-avatar>

                </div>

                <div class="panel-body">
                    您的昵称：
                    您的密码：
                </div>
            </div>
        </div>
    </div>
</div>
@endsection