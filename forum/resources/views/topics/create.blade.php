@extends('layouts.forum')

@section('content')
    <br>
    <h1>Create new topic</h1>
    {!! Form::open(['action' => 'TopicController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class='form-group'>
            {{Form::label('title', 'Topic Title: ')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div> 
        <div class='form-group'>
            {{Form::label('body', 'Text for topic: ')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Enter some text...'])}}
        </div>

        @if (count($purchases) > 0)
            <div class="form-group">
                {{Form::file('image')}}
            </div>
        @else
            <p>To add images to your topics please visit your dashboard and purchase perk.</p>
        @endif


{{Form::submit('Save topic', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}   
@endSection
