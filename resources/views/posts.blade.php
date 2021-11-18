@extends('layout')

@section('content')
<head>
    <title>Larapio</title>
</head>
<body>
    <h1>Fernando <strong>Publicações</strong></h1>
    @foreach ($posts as $post)
        <article class="{{$loop->even ? 'impar' : 'par'}}">
            <h2>
                <a href="/posts/<?= $post->slug; ?>">
                    {{$post->title}}
                </a>
            </h2>
            <h5>{{$post->date}}</h5>
            <div>
                {!! $post->body !!}
            </div>
        </article>
    @endforeach
</body>

@endsection