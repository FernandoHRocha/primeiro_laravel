@props(['post'])
<article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 items-center lg:flex">
        <a class="flex-1 lg:mr-8" href="{{ $post->path }}">
            <img src="{{ $post->thumbnail }}" alt="Blog Post illustration" class="mx-auto rounded-xl">
        </a>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-buttom :category="$post->category" />
                    <a 
                    class="px-3 py-1 border border-indigo-400 rounded-full text-indigo-400 text-xs uppercase font-semibold"
                    style="font-size: 10px">
                        {{ $post->count_comments }} participações
                    </a>
                    <a
                    class="px-3 py-1 border border-indigo-400 rounded-full text-indigo-400 text-xs uppercase font-semibold"
                    style="font-size: 10px">
                        {{ $post->views }} vizualizações
                    </a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ $post->path }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                            {{ $post->status }} em <time>{{ $post->posted }}</time>
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
                    <img src="https://i.pravatar.cc/80?u={{ $post->author->id }}" alt="Lary avatar" class="rounded-xl">
                    <div class="ml-3">
                        <a href="/?author={{ $post->author->slug }}">
                            <h5 class="font-bold text-indigo-700">{{ $post->author->name }}</h5>
                        </a>
                        <h6>Membro da Comuna</h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="{{ $post->path }}"
                    class="transition-colors duration-300 text-xs font-semibold text-white hover:bg-gray-900 bg-indigo-800 rounded-full py-2 px-8"
                    >Ler Mais</a>
                </div>
            </footer>
        </div>
    </div>
</article>