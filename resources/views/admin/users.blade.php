@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">用户管理</div>

                <div class="panel-body">
                	<div class="col-md-12" style="text-align: center;">
                		<div style="width: 2%; float: left; position: relative;">id</div>
                		<div style="width: 10%; float: left; position: relative;">用户名</div>
                		<div style="width: 30%; float: left; position: relative;">邮箱</div>
                		<div style="width: 11%; float: left; position: relative;">创建日期</div>
                		<div style="width: 11%; float: left; position: relative;">更新日期</div>
                		<div style="width: 4%; float: left; position: relative;">屏蔽</div>
                		<div style="width: 5%; float: left; position: relative;">禁言</div>
                		<div style="width: 5%; float: left; position: relative;">问题</div>
                		<div style="width: 5%; float: left; position: relative;">回答</div>
                		<div style="width: 5%; float: left; position: relative;">关注</div>
                		<div style="width: 12%; float: left; position: relative;">操作</div>             		
                	</div>
                	@foreach($users as $user)
                		@if($user->is_admin == 'F')
		                	<div class="col-md-12" style="text-align: center;">
		                		<div style="width: 2%; float: left; position: relative;">{{ $user->id }}</div>
		                		<div style="width: 10%; float: left; position: relative;">{{ $user->name }}</div>
		                		<div style="width: 30%; float: left; position: relative;">{{ $user->email }}</div>
		                		<div style="width: 11%; float: left; position: relative;">{{ $user->created_at->format('Y-m-d') }}</div>
		                		<div style="width: 11%; float: left; position: relative;">{{ $user->updated_at->format('Y-m-d') }}</div>
		                		<div style="width: 4%; float: left; position: relative;">{{ $user->is_active == 0 ? '是':'否' }}</div>
		                		<div style="width: 4%; float: left; position: relative;">{{ $user->forbid_speak == 0 ? '否':'是' }}</div>
		                		<div style="width: 5%; float: left; position: relative;">{{ $user->questions_count }}</div>
		                		<div style="width: 5%; float: left; position: relative;">{{ $user->answers_count }}</div>
		                		<div style="width: 5%; float: left; position: relative;">{{ $user->questions_count }}</div>
		                		<form action="/admin/forbid_speak/{{ $user->id }}" method='post'>
		                			<div style="width: 4%; float: left;"><button class="btn btn-xs btn-warning">禁言</button></div>
		                		</form>
		                		<form action="/admin/disactive/{{ $user->id }}" method='post'>
		                			<div style="width: 5%; float: left;"><button class="btn btn-xs btn-danger">屏蔽</button></div>	
		                		</form>
		                		<div style="width: 4%; float: left;"><button class="btn btn-xs btn-primary">密码</button></div>
		                		<hr>
		                	</div>
	                	@endif
                	@endforeach
                	<center>{{ $users->links() }}</center>
                </div>
            </div>
        </div>

        <div class="col-md-2">
        	<div class="panel panel-default">
        		<div class="panel-heading" style="text-align: center;">管理导航</div>
        		<div class="panel-body">
					<ul class="list-group" style="text-align: center;">
						<li class="list-group-item list-group-item-info">
					  		<a href="#">用户管理</a>
						</li>
						<li class="list-group-item">
							<a href="/admin/questions">问题管理</a>
						</li>
						<li class="list-group-item">
							<a href="/admin/answers">回答管理</a>
						</li>
					</ul>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
