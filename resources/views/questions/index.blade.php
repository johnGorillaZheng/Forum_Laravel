@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    问题列表
                </div>
                <div class="panel-body">
                    @foreach($questions as $question)
                        <div class="panel-body">
                            <div class="col-xs-1">
                                <a href="#">
                                    <img src="{{ $question->user->avatar }}" 
                                        alt="{{ $question->user->name }}"
                                        style="width: 40px;">
                                </a>
                            </div>
                            <div class="col-xs-8">
                                <h4 class="media-heading">
                                    <a href="/questions/{{ $question->id }}">
                                        <div>{{ $question->title }}</div>
                                    </a>

                                    <a href="/questions/{{ $question->id }}">
                                        <h6>
                                            发起人：{{ $question->user->name }}
                                                   {{ $question->created_at->format('Y-m-d') }}
                                                   &nbsp;&nbsp;&nbsp;
                                            最后回复：{{ $question->updated_at }}
                                        </h6>
                                    </a>
                                </h4>
                            </div>
                            <div class="col-xs-3">
                                <div class="thumbnail" style="background-color: #eeeeee; width: 45%;float: left;">
                                    <center>
                                        <h6>回复
                                            {{ $question->answers_count }}
                                        </h6>
                                    </center>
                                </div>
                            
                                <div class="thumbnail pull-right" style="background-color: #eeeeee; width: 45%;float: left;">
                                    <center>
                                        <h6>关注
                                            {{ $question->following_count }}                                       
                                        </h6>
                                    </center>                                   
                                </div>                             
                            </div> 
                        </div>
                        <hr>
                    @endforeach
                    <div>
                        <center>
                            {{ $questions->links() }}
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection