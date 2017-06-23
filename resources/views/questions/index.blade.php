@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    问题列表
                </div>
                <div class="panel-body">
                    @foreach($questions as $question)
                        <div class="panel-body">
                            
                                <div class="col-xs-2">
                                    <a href="">
                                        <img src="{{ $question->user->avatar }}" 
                                            alt="{{ $question->user->name }}"
                                            style="width: 75px;">
                                    </a>
                                </div>
                                <div class="col-xs-10">
                                    <h4 class="media-heading">
                                        <a href="/questions/{{ $question->id }}">
                                            <div>{{ $question->title }}</div>
                                            <h4></h4>
                                            <h6>更新于：{{ $question->updated_at }}</h6>
                                        </a>
                                    </h4>
                                </div> 
                            
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css" media="screen">
    .panel-body img{
        width: 100%;
    }
</style>
@endsection