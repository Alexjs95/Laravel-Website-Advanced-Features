@extends('layouts.forum')

@section('content')
    <br>
    <h1>Topics</h1>

    {!! Form::open(['action' => 'TopicController@search', 'method' => 'GET']) !!}
        <div class="form-group">
            {{ Form::label('search', 'Search by Author:')}}
            {{ Form::text('search', '') }}
            {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
            <a href="{{ action('TopicController@index') }}">Reset Search</a>
        </div>
    {!! Form::close() !!}

    {!! Form::open(['action' => 'TopicController@filter', 'method' => 'GET']) !!}
        <div class="form-group">
            {{ Form::select('size', array(''=>'','Newest' => 'Newest', 'Oldest' => 'Oldest'), '1') }}
            {{ Form::submit('Filter', ['class' => 'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}

    @if (count($topics) > 0)
        @foreach ($topics as $topic)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-10">
                        <h4><a href="{{ action('TopicController@show', $topic->id) }}">{{$topic->title}}</a></h4>
                    </div>

                    <div class="col-md-2">

                        @if ($replyCount->contains('topic_id', $topic->id))
                            @foreach ($replyCount as $replies)
                                @if ($replies->topic_id == $topic->id)
                                    @if ($replies->total == 1)
                                        <h5><a href="{{ action('TopicController@show', $topic->id) }}">{{$replies->total}} Reply</a></h5>
                                    @else
                                        <h5><a href="{{ action('TopicController@show', $topic->id) }}">{{$replies->total}} Replies</a></h5>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <h5><a href="{{ action('TopicController@show', $topic->id) }}">0 Replies</a></h5>
                        @endif
                    </div>
                </div>

                <small>created on {{$topic->created_at}} by {{$topic->user['name']}}</small>
            </div>
            <br>
        @endforeach
        {{$topics->links()}}
    @else
        <p>No topics found<p>
    @endif

@endSection
