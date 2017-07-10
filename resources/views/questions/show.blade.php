@extends('layouts.app')
@include('vendor.ueditor.assets')
@section('content')

<div class="container">
    <div class="row">
    
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-body">
                        <ul class="pager">
                            @foreach($question->topics as $topic)
                                <li class="previous">
                                    <a href="#">
                                        {{ $topic->name }}
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
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center>
                        <h4>这个问题</h4>
                        <h2>{{ $question->following_count }}</h2>
                        <h4>关注者</h4>
                    </center>
                    
                </div>
                <div class="panel-body">
                    <center>
                        <question-follow-button question="{{ $question->id }}" user="{{ Auth::id() }}">
                        </question-follow-button>              
                        <a href="#container" class="btn btn-primary">
                            编写答案
                        </a>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$question->answers_count}} 个答案
                </div>
                                 
                <div class="panel-body">
                    <div class="panel-body">
                        @foreach($question->answers as $answer)
                            <div class="panel-body">
                                <div class="col-xs-2">
                                        <img src="{{ $answer->user->avatar }}" 
                                            alt="{{ $answer->user->name }}"
                                            style="width: 60px;"><br>      
                                </div>
                                <div class="col-xs-7">
                                    <h4 class="media-heading">
                                        <a href="/user/{{ $answer->user->name }}">
                                            {{ $answer->user->name }}
                                        </a>
                                    </h4>
                                    {!! $answer->body !!}
                                    {!! $answer->updated_at !!} <br>
                                    <user-vote-button answer="{{ $answer->id }}" me="{{ Auth::id() }}" count="{{ $answer->votes_count }}"></user-vote-button>
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
                                    <center><button class="btn btn-success " type="submit">提交答案</button></center>
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
                        <span><h3>关于提问者</h3></span>                            
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
                            <span><h4>提问</h4></span><span><h4>{{$question->user->questions_count}}</h4></span>
                        </center>
                    </div>
                    <div class="col-xs-6">
                        <center>
                            <span><h4>回答</h4></span><span><h4>{{$question->user->answers_count}}</h4></span>
                        </center>
                    </div>
                    @if($question->user_id != Auth::id())
                    <div class="media-body">
                        <h4 class="media-heading">
                            <center>
                                    <user-follow-button user="{{$question->user_id}}" me="{{Auth::id()}}">
                                    </user-follow-button>
                                    <send-message user="{{$question->user_id}}" me="{{Auth::id()}}"></send-messag>
                            </center>
                        </h4>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
