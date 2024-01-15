@extends('components.layout')

@section('content')
    <article>
        <h1>
            {{$post->title}}
        </h1>
        <p>
           By: <a href="/users/{{$post->user->username}}">{{$post->user->name}}</a> <br>
            <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            {!! $post->body!!}
        </div>
    </article>
    <a href="/">Go Back</a>
@endsection
