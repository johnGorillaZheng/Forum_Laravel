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
    </div>
</div>


<style type="text/css" media="screen">
    .panel-body img{
        width: 100%;
    }
</style>
@endsection