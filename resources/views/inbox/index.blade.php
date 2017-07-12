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
                                        <a href="#">
                                            @if(Auth::id() == $key)
                                                {{$messageGroup->first()->fromUser->name}}
                                            @else
                                                {{$messageGroup->first()->toUser->name}}
                                            @endif
                                        </a>  
                                    </h4>
                                    <p>
                                        <a href="/inbox/{{$messageGroup->last()->dialog_id}}">
                                            {{$messageGroup->last()->body}}
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