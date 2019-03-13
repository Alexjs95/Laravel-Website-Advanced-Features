@extends('layouts.forum')

@section('content')
    <div class="jumbotron text-center">
        <h1>Games Discussion Forum</h1>
        <p></p>
        <p>
<!--            <a class="btn btn-primary btn-lg" href="/assignment-1-laravel-Alexjs95/forum/public/login" role="button"> Login </a>-->
            <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button"> Login </a>
            <a class="btn btn-success btn-lg" href="{{ route('register') }}" role="button"> Register </a>
        </p>        
@endsection
