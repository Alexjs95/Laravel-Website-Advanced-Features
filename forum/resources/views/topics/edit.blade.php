@extends('layouts.forum')

@section('content')
    <br>
    <h1>Edit topic</h1>
    {!! Form::open(['action' => ['TopicController@update', $topic->id], 'method' => 'POST']) !!}
        <div class='form-group'>
            {{Form::label('title', 'Topic Title: ')}}
            {{Form::text('title', $topic->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div> 
        <div class='form-group'>
            {{Form::label('body', 'Text for topic: ')}}
            {{Form::textarea('body', $topic->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Enter some text...'])}}
        </div> 
        {{Form::hidden('_method', 'PUT')}}

        {{Form::submit('Update topic', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}   
@endSection