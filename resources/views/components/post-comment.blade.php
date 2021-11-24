@props(['comment'])

<article class="flex border-card my-4">
    <div class="flex-shrink-0">
        <img class="rounded-xl border border-indigo-200" width="80" height="80" src="https://i.pravatar.cc/80?u={{ $comment->author->id }}" alt="avatar">
    </div>
    <div class="text-justify ml-4">
        <header class="mb-4">
            <h3 class="text-xl font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">
                Posted
                <time>
                    {{ $comment->post->created_at->diffforHumans() }}
                </time>
            </p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>