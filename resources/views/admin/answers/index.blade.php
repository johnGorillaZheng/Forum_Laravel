@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">主页</div>

                <div class="panel-body">
                
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
						<li class="list-group-item">
							<a href="/admin/questions">问题管理</a>
						</li>
						<li class="list-group-item list-group-item-info">
							<a href="#">回答管理</a>
						</li>
					</ul>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection