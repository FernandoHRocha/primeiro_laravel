@props(['post'])

<article
    {{ $attributes->merge(['class'=> "transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}>
    <div class="py-6 px-5">
        <div>
            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-buttom :category="$post->category" />
                    <a 
                    class="px-3 py-1 border border-indigo-400 rounded-full text-indigo-400 text-xs uppercase font-semibold"
                    style="font-size: 10px">
                        {{ $post->count_comments }} participações
                    </a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        {{ $post->status }} em <time>{{ $post->posted }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/black_scratch_logo.jpeg" style="width:56px;" alt="SH avatar" class="rounded">
                    <div class="ml-3">
                        <a href="/?author={{ $post->author->slug }}">
                            <h5 class="font-bold text-indigo-700">{{ $post->author->name }}</h5>
                        </a>
                        <h6>Membro da Comuna</h6>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs text-white font-semibold hover:bg-gray-900 bg-indigo-800 rounded-full py-2 px-8"
                    >Ler Mais</a>
                </div>
            </footer>
        </div>
    </div>
</article>