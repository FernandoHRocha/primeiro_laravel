<x-layout>
    <h1>Fernando  <strong>Publicações</strong></h1>
    <article>
        <h2>
            {{ $post->title }}
        </h2>
        <div>
            {!! $post->body !!}
        </div>
    </article>
    <a href="/">Voltar</a>
</x-layout>