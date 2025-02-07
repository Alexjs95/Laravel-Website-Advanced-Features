@extends('layouts.forum')

@section('content')
    <br>
    <a href="{{ action('TopicController@index') }}" class="btn btn-secondary">Back to topics</a>

    @if(!Auth::guest())        <!-- if the user is not a guest then show edit/delete buttons -->
        @if(Auth::user()->id == $topic->user_id)    <!-- only enable the edit/delete buttons if the current user is the topic owner -->
            <a href="{{ action('TopicController@edit', $topic->id) }}" class="btn btn-secondary"> Edit topic</a>
            <br><br>
            {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete topic', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    <br>

    <div class="card card-body bg-light">
        <h1>{{$topic->title}}</h1>
        <h4>{!!$topic->body!!}</h4>      <!-- double !! to parse html -->
        @if($topic->image != 'noimage.png')
            <img height="200" width="200" src="{{ URL::to('/') }}/storage/images/{{ $topic->image }}" />
        @endif

    </div>  <br><br>



    @if(!Auth::guest())        <!-- if the user is not a guest then show add new message button -->
        <a href="{{ action('TopicPostController@create', $topic->id) }}" class="btn btn-secondary">Add new post to topic</a>
        <br><br>
    @endif

    @if (count($posts) > 0) 
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <h4>{!!$post->body!!}</h4>
                <small>added on {{$post->created_at}} by {{$post->user->name}}</small>
            </div>
            <br>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found<p>
    @endif


    <hr><small>Topic created on {{$topic->created_at}} by {{$topic->user->name}}</small>

@endSection
