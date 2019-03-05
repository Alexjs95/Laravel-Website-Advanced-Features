@extends('layouts.forum')

@section('content')
    <br>
    <h1>Adding new post</h1>
    {!! Form::open(['action' => ['TopicPostController@store', $topic->id], 'method' => 'POST']) !!}
        <div class='form-group'>
            {{Form::label('body', 'Text for topic: ')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Enter some text...'])}}
        </div> 
        {{Form::hidden('id', $topic->id)}}
        {{Form::submit('Add message to topic', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}   
@endSection