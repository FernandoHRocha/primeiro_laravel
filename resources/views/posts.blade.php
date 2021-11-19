<x-layout>
    <title>Larapio</title>
    <h1>Fernando <strong>Publicações</strong></h1>

    @if ( count($posts) > 0 )
        @foreach ($posts as $post)
        <article class="{{$loop->even ? 'impar' : 'par'}}">
            <h2>
                <a href="/posts/<?= $post->id; ?>">
                    {{$post->title}}
                </a>
            </h2>
            <x-button onClick="alertar('{{$post->title}}')">{{$post->created_at}}</x-button>
            <div>
                <p>{!! $post->excerpt !!}</p>
            </div>
        </article>
        @endforeach
    @else
        <h2>Nenhuma postagem foi encontrada.</h2>
        <p>Para começar a criar suas postagens, espere por uma futura atualização do sistema para realizar novas publicações.</p>
    @endif
</x-layout>