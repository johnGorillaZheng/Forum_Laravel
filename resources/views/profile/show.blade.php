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
                    <form action="">
                        <div class="form-group">
                            <label for="changName">修改昵称</label>
                            <input type="text" name="changName" placeholder="您的新昵称" class="form-control">
                        </div>
                       
                        <div class="form-group">
                            <label for="changName">修改密码</label>
                            <div class="form-group">
                                <label for="oldPasswork">旧密码</label>
                                <input name="oldPasswork" type="password" class="form-control">
                                <label for="newPassword">新密码</label>
                                <input name="newPassword" type="password" class="form-control">
                                <label for="confirm">请确认</label>
                                <input name="confirm" type="password" class="form-control">
                            </div>
                        </div>
                        <center>
                                <button type="submit" class="btn btn-primary">修改资料</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection