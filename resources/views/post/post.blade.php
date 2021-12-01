<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ $post->thumbnail }}" alt="" class="rounded-xl">

                    <div class="bg-indigo-100 block mt-4 p-4 rounded-t-xl text-gray-800 text-sm">
                        <div class="flex items-center lg:justify-center text-sm my-4">
                            <img src="https://i.pravatar.cc/80?u={{ $post->author->id }}" style="width:56px;" class="rounded" alt="SH avatar">
                            <a href="/?author={{ $post->author->slug }}" class="ml-3 text-left">
                                <h5 class="font-bold text-indigo-700">{{ $post->author->name }}</h5>
                                <h6>Membro da Comuna</h6>
                            </a>
                        </div>
                        Atualizado em <time>{{ $post->posted }}</time>
                        <br>
                        {{ $post->count_comments }} participações
                        <br>
                    </div>
                        @can('post-owner',$post)
                        <form action="/post/{{ $post->slug }}" method="POST" class="flex w-full">
                            @csrf
                            @method('DELETE')
                            <a href="{{ $post->edit_path }}" class="bg-indigo-100 flex flex-1 flex-col hover:bg-indigo-800 hover:text-white items-center p-2 rounded-b-3xl">
                                Editar
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </a>
                            <button type='submit' class="bg-indigo-100 flex flex-1 flex-col hover:bg-indigo-800 hover:text-white items-center p-2 rounded-b-3xl">
                                Excluir
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </button>
                        </form>
                        @endcan

                    
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-indigo-700">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Voltar para as postagens
                        </a>

                        <div class="space-x-2">
                            <a 
                            class="px-3 py-1 border border-indigo-400 rounded-full text-indigo-400 text-xs uppercase font-semibold"
                            style="font-size: 10px">
                                {{ $post->views }} visualizações
                            </a>
                            <x-category-buttom :category="$post->category" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose text-justify">
                        <p>
                            {!! $post->body !!}
                        </p>
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    <form action="/posts/{{ $post->slug }}/comments" method="POST" class="border-card">
                        @csrf
                        <header class="w-full">
                            @guest
                                <h2 class="my-2">Gostaria de participar?</h2>
                                <div class="flex flex-row text-center">
                                    <a href="/login" class="btn-simple w-full">Entrar</a>
                                    <a href="/register" class="btn-simple w-full">Cadastrar</a>
                                </div>

                            @else
                            <div class="flex flex-col w-full items-start">
                                <div class="flex items-center">
                                    <img class="rounded-full border border-indigo-200 mr-4" width="80" height="80" src="https://i.pravatar.cc/80?u={{ auth()->id() }}" alt="avatar">
                                    <h2 class="font-bold">Deixe seu comentário.</h2>
                                </div>
                                <div class="p-4 rounded-xl w-full">
                                    <textarea class="w-full rounded-xl p-4 focus:outline-none focus:ring" name="body" id="body" cols="30" rows="10"></textarea>
                                    @error('comment')
                                        <p class="error-msg">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex justify-evenly w-full">
                                    <button class="btn-simple w-full" type="submit">Comentar</button>
                                </div>
                            </div>
                            @endguest
                        </header>
                    </form>
                </section>

                <section class="col-span-8 col-start-5 mt-10">
                    @foreach ($comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach
                </section>
            </article>
        </main>
    </section>
</x-layout>