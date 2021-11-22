@props(['post'])
<article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="/images/black_scratch_logo.jpeg" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-buttom :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                            Publicado <time>{{ $post->created_at->diffForHumans() }}</time>
                        </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <a href="/authors/{{ $post->author->slug }}">
                            <h5 class="font-bold text-indigo-700">{{ $post->author->name }}</h5>
                        </a>
                        <h6>Membro da Comuna</h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                    class="transition-colors duration-300 text-xs font-semibold bg-indigo-100 hover:bg-indigo-200 rounded-full py-2 px-8"
                    >Ler Mais</a>
                </div>
            </footer>
        </div>
    </div>
</article>