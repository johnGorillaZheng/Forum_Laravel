@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">消息通知</div>

                    <div class="panel-body">
                        @foreach($messages as $key => $messageGroup)
                            <div class="media {{$messageGroup->first()->shouldAddUnreadClass() ? 'unread':''}}">
                                <div class="media-left">
                                    <a href="#">
                                        @if(Auth::id() == $key)
                                            <img src="{{$messageGroup->first()->fromUser->avatar}}" style="width: 40px">
                                        @else
                                            <img src="{{$messageGroup->first()->toUser->avatar}}" style="width: 40px">
                                        @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="/inbox/{{$messageGroup->last()->dialog_id}}">
                                            @if(Auth::id() == $key)
                                                {{$messageGroup->last()->fromUser->name}}
                                                @if($messageGroup->last()->has_read == 'F')
                                                    <small>朕已阅</small>
                                                @else
                                                    <small>朕未看</small>
                                                @endif
                                            @else
                                                {{$messageGroup->last()->toUser->name}}
                                                @if($messageGroup->last()->has_read == 'F')
                                                    <small>对方未读</small>
                                                @else
                                                    <small>对方已读</small>
                                                @endif
                                            @endif
                                        </a>  
                                    </h4>
                                    <p>
                                        <a href="/inbox/{{$messageGroup->last()->dialog_id}}">
                                            {{ Auth::id() == $key?"对方":"我" }}：{{$messageGroup->last()->body}}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection