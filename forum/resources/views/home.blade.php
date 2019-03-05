@extends('layouts.forum')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/assignment-1-laravel-Alexjs95/forum/public/topics/create" class="btn btn-primary"> Create topic</a>
                    <br><br><h3> Owned topics </h3>
                    @if(count($topics) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th> Title </th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($topics as $topic)
                                <tr>
                                    <td> {{$topic->title}} </td>
                                    <td><a href="/assignment-1-laravel-Alexjs95/forum/public/topics/{{$topic->id}}/edit" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['TopicController@destroy', $topic->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete topic', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p> No topics found </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
