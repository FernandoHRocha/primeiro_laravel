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
        <p style="text-align:right">
            Written with 💓 by {{ $post->user->name }}
        </p>
    </article>
    <a href="/">Voltar</a>
</x-layout>