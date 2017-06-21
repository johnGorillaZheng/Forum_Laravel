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
                        <div class="panel-">
                            <div class="col-md-2">
                                <a href="">
                                    <img src="{{ $question->user->avatar }}" 
                                        alt="{{ $question->user->name }}"
                                        style="width: 75px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="/questions/{{ $question->id }}">
                                        {{ $question->title }}
                                    </a>

                                </h4>
                            </div>
                        </div>
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