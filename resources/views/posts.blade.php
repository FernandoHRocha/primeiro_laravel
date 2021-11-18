<x-layout>
    <title>Larapio</title>
    <h1>Fernando <strong>Publicações</strong></h1>
    @foreach ($posts as $post)
    <article class="{{$loop->even ? 'impar' : 'par'}}">
        <h2>
            <a href="/posts/<?= $post->slug; ?>">
                {{$post->title}}
            </a>
        </h2>
        <x-button onClick="alertar('{{$post->title}}')">{{$post->date}}</x-button>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    @endforeach
</x-layout>