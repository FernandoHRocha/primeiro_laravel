<x-layout>
    <h1>Fernando  <strong>Publicações</strong></h1>
    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <a href="/categories/{{ $post->category->slug }}">
            <x-button>
                {{ $post->category->name }}
            </x-button>
        </a>
        <div>
            <p>{!! $post->body !!}</p>
        </div>
    </article>
    <a href="/">Voltar</a>
</x-layout>