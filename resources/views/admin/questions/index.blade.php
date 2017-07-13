@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">主页</div>

                <div class="panel-body">
				    <div class="col-md-12" style="text-align: center;">
                		<div style="width: 2%; float: left;">id</div>
                		<div style="width: 10%; float: left;">题目</div>
                		<div style="width: 30%; float: left;">内容</div>
                		<div style="width: 11%; float: left;">创建日期</div>
                		<div style="width: 11%; float: left;">更新日期</div>
                		<div style="width: 5%; float: left;">回答</div>
                		<div style="width: 5%; float: left;">评论</div>
                		<div style="width: 5%; float: left;">关注</div>
                		<div style="width: 5%; float: left;">屏蔽</div>
                		<div style="width: 7%; float: left;">关闭评论</div>
                		<div style="width: 7%; float: left;">操作</div>             		
                	</div>
                @foreach($questions as $question)
					<div class="col-md-12" style="text-align: center;">
                		<div style="width: 2%; float: left;">{{ $question->id }}</div>
                		<div style="width: 10%; float: left; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                		{!! $question->title !!}</div>
                		<div style="width: 30%; float: left; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                		{!! $question->body !!}</div>
                		<div style="width: 11%; float: left;">{{ $question->created_at->format('Y-m-d') }}</div>
                		<div style="width: 11%; float: left;">{{ $question->updated_at->format('Y-m-d') }}</div>
                		<div style="width: 5%; float: left;">{{ $question->answers_count }}</div>
                		<div style="width: 5%; float: left;">{{ $question->comments_count }}</div>
                		<div style="width: 5%; float: left;">{{ $question->following_count }}</div>
                		<div style="width: 5%; float: left;">{{ $question->is_hidden == 'F' ? '否':'是' }}</div>
                		<div style="width: 7%; float: left;">{{ $question->is_hidden == 'F' ? '否':'是' }}</div>
                		<div style="width: 7%; float: left;">
                			<a href="/admin/question/{{ $question->id }}">
                				<span class="glyphicon glyphicon-search"></span>细节
                			</a>
                		</div>
                	</div>
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
					  		<a href="/admin/users">用户管理</a>
						</li>
						<li class="list-group-item list-group-item-info">
							<a href="#">问题管理</a>
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