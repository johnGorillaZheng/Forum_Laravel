@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $question->title }}</div>

                <div class="panel-body">
	                <div class="col-md-12">
	                	<div class="col-md-2">
	                		问题描述：
	                	</div>
	                	<div class="col-md-10">
	                		{!! $question->body !!}
	                	</div>
	                </div>

					<div class="col-md-12">
	                	<div class="col-md-2">
	                		发起人：
	                	</div>
	                	<div class="col-md-10">
	                		{{ $question->user->name }}（id:{{ $question->user->id }}）
	                	</div>
	                </div>
	                <div class="col-md-12">
	                	<div class="col-md-2">
	                		回答数量：
	                	</div>
	                	<div class="col-md-10">
	                		{{ $question->answers_count }}
	                	</div>	                	
	                </div>

	                <div class="col-md-12">
	                	<div class="col-md-2">
	                		评论数量：
	                	</div>
	                	<div class="col-md-10">
	                		{{ $question->comments_count }}
	                	</div>
	                </div>

	                <div class="col-md-12">
	                	<div class="col-md-2">
	                		关注数量：
	                	</div>
	                	<div class="col-md-10">
	                		{{ $question->following_count }}
	                	</div>
	                </div>

	                <div class="col-md-12">
	                	<div class="col-md-2">
	                		更新时间：
	                	</div>
	                	<div class="col-md-10">
	                		{{ $question->updated_at }}
	                	</div>
	                </div>
	                <div class="col-md-12">	    	                	
	            		<button class="btn btn-primary">关闭评论</button>
	            		<button class="btn btn-warning">屏蔽</button>
	            		<button class="btn btn-danger">删除</button>
	                </div>
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