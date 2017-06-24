@extends('layouts.app')

@section('content')
@include('vendor.ueditor.assets')
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
                        <h2>{{ $question->following_count }}</h2>
                        <span>关注者</span>
                    </center>
                    
                </div>
                <div class="panel-body">
                    <center>
                        <a href="/questions/{{$question->id}}/follow" class="btn btn-default">
                            关注该问题
                        </a>
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
                                            style="width: 60px;">
                                </div>
                                <div class="col-xs-7">
                                    <h4 class="media-heading">
                                        <a href="/user/{{ $answer->user->name }}">
                                            {{ $answer->user->name }}
                                        </a>
                                    </h4>
                                    {!! $answer->body !!}
                                    {{ $answer->updated_at }}
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



    </div>
</div>



<style type="text/css" media="screen">
    .panel-body img{
        width: 100%;
    }
</style>

<script type="text/javascript">
    var ue = UE.getEditor('container',{
    toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'attachment', 'insertimage','fullscreen']
        ],
    elementPathEnabled: false,
    enableContextMenu: false,
    autoClearEmptyNode:true,
    wordCount:false,
    imagePopup:false,
    autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });    
</script>
@endsection