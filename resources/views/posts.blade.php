<x-layout>

    @include('_posts-header')


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


        <x-post-featured-card :post="$posts[0]" />

        <div class="lg:grid lg:grid-cols-2">
            @foreach($posts->skip(1) as $post )
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </main>

    {{-- <link rel="stylesheet" href="{{url('css/posts.css')}}">
    <title>Larapio</title>
    <h1>Fernando <strong>Publicações</strong></h1>

    @if ( count($posts) > 0 )
        @foreach ($posts as $post)
        <article class="{{$loop->even ? 'impar' : 'par'}}">
            <h2>
                <a href="/posts/<?= $post->slug ?>">
                    {{$post->title}}
                </a>
            </h2>
            <p>
                <a href="/authors/{{ $post->author->slug }}" style="color:white;">
                    Written with ❤ by {{ $post->author->name }}
                </a>
            </p>
            <div>
                <p>{!! $post->excerpt !!}</p>
            </div>
            <x-button onClick="alertar('Publicado em {{$post->created_at}}.')">{{$post->category->name}}</x-button>
        </article>
        @endforeach
    @else
        <h2>Nenhuma postagem foi encontrada.</h2>
        <p>Para começar a criar suas postagens, espere por uma futura atualização do sistema para realizar novas publicações.</p>
    @endif --}}
</x-layout>