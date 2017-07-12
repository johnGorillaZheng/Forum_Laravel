@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">用户信息
                </div>

                <div class="panel-body">
                    <h4>修改头像</h4>
                    <user-avatar avatar="{{Auth::user()->avatar}}"></user-avatar>
                </div>

                <div class="panel-body">
                    <h4>修改个人资料</h4>
                    <form action="/user_profile/change_name" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="chang_name" class="col-md-4 control-label">修改昵称</label>
                            <div class="col-md-6">
                                <input type="text" name="chang_name" placeholder="您的新昵称" class="form-control">
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">修改资料</button>
                        </center>
                    </form>
                    <h4>修改密码</h4>
                    <form action="/user_profile/password_change" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="old_password" class="col-md-4 control-label">旧密码</label>
                            <div class="col-md-6">
                                <input name="old_password" type="password" class="form-control" required placeholder="请输入原密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="col-md-4 control-label">新密码</label>
                            <div class="col-md-6">
                                <input name="new_password" type="password" class="form-control" required placeholder="请输入新密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation" class="col-md-4 control-label">请确认</label>
                            <div class="col-md-6">
                                <input name="new_password_confirmation" type="password" class="form-control" required placeholder="请确认新密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <center>
                                <button type="submit" class="btn btn-primary">修改密码</button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection