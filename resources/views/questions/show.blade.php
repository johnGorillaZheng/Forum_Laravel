@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
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
        
                    {!! $question->body !!}
                    <div class="actions">
                        @if(Auth::check() && Auth::user()->owns($question))
                            <span>
                                <a href="/questions/{{ $question->id }}/edit ">
                                    编辑
                                </a>
                            </span>
                        @endif
                </div>
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