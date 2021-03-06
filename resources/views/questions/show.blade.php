@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')

<div class="container">
    <div class="row">
    
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <ul class="pager">
                            @foreach($topics as $topic)
                                <li class="previous">
                                    <a href="#">
                                        {{ $topic->topic_name }}
                                    </a>                            
                                </li>
                            @endforeach
                        </ul>
                        <h3>{{ $question->title }}</h3>
                    </div>
       
                    <div class="panel-body">
                        {!! $question->body !!}
                    </div>
                    <div class="panel-body">
                        @if(Auth::check() && Auth::user()->owns($question))
                            <span style="float: left;width: 55px">
                                <a href="/questions/{{ $question->id }}/edit ">
                                    <button class="btn btn-link">
                                        编辑<span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                </a>
                            </span>
                            <form action="/questions/{{ $question->id }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-link">
                                    删除<span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>                  
                        @endif
                        <comments type="question" 
                                  model="{{ $question->id }}"
                                  count="{{ $question->comments_count }}"
                                  me="{{ Auth::id() }}">
                        </comments>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>
                        <h4>这个帖子</h4>
                        <h2>{{ $question->following_count }}</h2>
                        <h4>关注者</h4>
                    </center>
                    
                </div>
                <div class="panel-body" style="padding-bottom: 10px;">
                    <center>
                        <question-follow-button question="{{ $question->id }}" user="{{ Auth::id() }}">
                        </question-follow-button>              
                        <a href="#container" class="btn btn-primary">
                            跟帖
                        </a>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$question->answers_count}} 个回复
                </div>
                                 
                <div class="panel-body">
                    <div class="panel-body">
                        @foreach($answers as $answer)
                            <div class="panel-body">
                                <div class="col-xs-2">
                                    <img src="{{ $answer->user->avatar }}" 
                                            alt="{{ $answer->user->name }}"
                                            style="width: 60px;">  
                                </div>
                                <div class="col-xs-7">
                                    <h4 class="media-heading">
                                        <a href="/user/{{ $answer->user->name }}">
                                            {{ $answer->user->name }}
                                        </a>
                                    </h4>
                                    <div>
                                        {!! $answer->body !!}
                                        {!! $answer->updated_at !!}   
                                    </div>

                                    <div style="height: 25px; margin-top: 5px;">
                                        <user-vote-button answer="{{ $answer->id }}" 
                                                      me="{{ Auth::id() }}" 
                                                      count="{{ $answer->votes_count }}"
                                                      style="float: left;">
                                        </user-vote-button>
                                        <comments type="answer" 
                                              model="{{ $answer->id }}"
                                              count="{{ $answer->comments_count }}"
                                              me="{{ Auth::id() }}">
                                        </comments> 
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    @if(Auth::check())
                        <div class="panel-body">
                            <form action="/questions/{{$question->id}}/answer " method="post">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label for="body">回答:</label>
                                    <script id="container" name="body" style="height: 120px" type="text/plain"></script>
                                </div>
                                    <center><button class="btn btn-success " type="submit">提交</button></center>
                            </form>
                        </div>
                    @else
                        <center>
                            <a href="/login" class="btn btn-primary btn-block">请登陆</a>
                        </center>    
                    @endif
                </div>
            </div>
        </div> 

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>
                        <span><h3>关于发帖者</h3></span>                            
                        <a href="">
                            <div>
                                <img width="80px" src="{{ $question->user->avatar }}" alt="{ $question->user->name }}">
                            </div>    
                                <span><h3>{{$question->user->name}}</h3></span>
                        </a>
                        <span><h4>{{ $question->user->followers_count }}人关注此人</h4></span>
                    </center>

                </div>
                <div class="panel-body">
                    <div class="col-xs-6">
                        <center>
                            <span><h4>发帖</h4></span>
                            <span><h4>{{$question->user->questions_count}}</h4></span>
                            @if($question->user_id != Auth::id())  
                                <span style="height: 30px;">                          
                                    <user-follow-button user="{{$question->user_id}}" me="{{Auth::id()}}">
                                    </user-follow-button>
                                </span>
                            @endif
                        </center>
                    </div>
                    <div class="col-xs-6">
                        <center>
                            <span><h4>回复</h4></span><span><h4>{{$question->user->answers_count}}</h4></span>
                            @if($question->user_id != Auth::id())
                                <span style="height: 30px;">
                                    <send-message user="{{$question->user_id}}" me="{{Auth::id()}}">
                                    </send-message>
                                </span>
                            @endif
                        </center>
                    </div>
                    <div class="col-xs-12" style="height: 10px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
