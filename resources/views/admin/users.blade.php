@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">用户管理</div>

                <div class="panel-body">
                	<div class="col-md-12" style="text-align: center;">
                		<div style="width: 2%; float: left;">id</div>
                		<div style="width: 10%; float: left;">用户名</div>
                		<div style="width: 30%; float: left;">邮箱</div>
                		<div style="width: 11%; float: left;">创建日期</div>
                		<div style="width: 11%; float: left;">更新日期</div>
                		<div style="width: 4%; float: left;">屏蔽</div>
                		<div style="width: 5%; float: left;">禁言</div>
                		<div style="width: 5%; float: left;">问题</div>
                		<div style="width: 5%; float: left;">回答</div>
                		<div style="width: 5%; float: left;">关注</div>
                		<div style="width: 12%; float: left;">操作</div>
                		
                	</div>
                	@foreach($users as $user)
                		@if($user->is_admin == 'F')
		                	<div class="col-md-12" style="text-align: center;">
		                		<div style="width: 2%; float: left;">{{ $user->id }}</div>
		                		<div style="width: 10%; float: left;">{{ $user->name }}</div>
		                		<div style="width: 30%; float: left;">{{ $user->email }}</div>
		                		<div style="width: 11%; float: left;">{{ $user->created_at->format('Y-m-d') }}</div>
		                		<div style="width: 11%; float: left;">{{ $user->updated_at->format('Y-m-d') }}</div>
		                		@if($user->is_hidden == 'F')
		                			<div style="width: 4%; float: left;">是</div>
		                		@else
		                			<div style="width: 4%; float: left;">否</div>
		                		@endif
		                		@if($user->close_comment == 'F')
		                			<div style="width: 4%; float: left;">是</div>
		                		@else
		                			<div style="width: 4%; float: left;">否</div>
		                		@endif
		                		<div style="width: 5%; float: left;">{{ $user->questions_count }}</div>
		                		<div style="width: 5%; float: left;">{{ $user->answers_count }}</div>
		                		<div style="width: 5%; float: left;">{{ $user->questions_count }}</div>
		                		<div style="width: 4%; float: left;"><button class="btn btn-xs btn-warning">禁言</button></div>
		                		<div style="width: 5%; float: left;"><button class="btn btn-xs btn-danger">删号</button></div>
		                		<div style="width: 4%; float: left;"><button class="btn btn-xs btn-primary">密码</button></div>
		                		<hr>
		                	</div>
	                	@endif
                	@endforeach
                </div>
            </div>
        </div>

        <div class="col-md-2">
        	<div class="panel panel-default">
        		<div class="panel-heading" style="text-align: center;">管理导航</div>
        		<div class="panel-body">
					<ul class="list-group" style="text-align: center;">
						<li class="list-group-item">
					  		<a href="#">用户管理</a>
						</li>
						<li class="list-group-item">
							<a href="/admin/contents">内容管理</a>
						</li>
					</ul>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection
