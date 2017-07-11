@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">对话列表</div>
                    <div class="panel-body">
                        <div class="panel-body">
                            <form action="/inbox/{{$dialogId}}/store" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="body" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right">发送私信</button>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            @foreach($messages as $message)
                                @if(Auth::id() != $message->fromUser->id)
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="{{$message->fromUser->avatar}}" style="width: 50px">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                        {{$message->fromUser->name}}
                                                </a>  
                                            </h4>
                                            <p>
                                                {{$message->body}}
                                            </p>
                                            <p>
                                                发送于{{$message->created_at}}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="media">
                                        <div class="pull-right">
                                            <a href="#">
                                                <img src="{{$message->fromUser->avatar}}" style="width: 50px">
                                            </a>
                                        </div>
                                        <div class="pull-right" style="text-align: right;">
                                            <h4 class="media-heading">
                                                <a href="#">
                                                        {{$message->fromUser->name}}
                                                </a>  
                                            </h4>
                                            <p>
                                                {{$message->body}}
                                            </p>
                                            <p>
                                                发送于{{$message->created_at->format('Y-m-d')}}
                                            </p> 
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection