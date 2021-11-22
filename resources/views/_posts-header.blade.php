<header class="max-w-xl mx-auto mt-20 text-center">
    <div class="inline-flex">
        <div>
            <h1 class="text-4xl pt-4">
                Notícias <span class="text-indigo-700">Shooting House</span>
            </h1>
            <h2 class="inline-flex items-center mt-2">Por Fernando H. Rocha</h2>
        </div>
        <img src="/images/sh_rounded_logo.jpeg" alt="Shooting House rounded logo" style="width:100px; margin-left:20px;">
    </div>

    <p class="text-sm mt-14">
        Outro ano. Outra Atualização. Estamos atualizando a Shooting House com novos conteúdos.
        Vamos manter vocês informados sobre o que está acontecendo!
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category filter -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>

                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
                        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categorias' }}
                        <x-icon name="arrow down" class="absolute pointer-events-none" style="right: 12px;"/>
                    </button>
                </x-slot>

                <x-dropdown-item href='/' :active="request()->routeIs('home')">Todas</x-dropdown-item>

                @foreach($categories as $category)
                <x-dropdown-item
                href='/categories/{{$category->slug}}'
                :active="request()->is('categories/' . $category->slug)">{{ ucwords($category->name) }}</x-dropdown-item>
                @endforeach

            </x-dropdown>
        </div>

        <!-- Author filter -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>

                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
                        {{ isset($currentAuthor) ? ucwords($currentAuthor->name) : 'Autores' }}
                        <x-icon name="arrow down" class="absolute pointer-events-none" style="right: 12px;"/>
                    </button>
                </x-slot>

                <x-dropdown-item href='/' :active="request()->routeIs('home')">Todos</x-dropdown-item>

                @foreach($authors as $author)
                <x-dropdown-item
                href='/authors/{{$author->slug}}'
                :active="request()->is('authors/' . $author->slug)">{{ ucwords($author->name) }}</x-dropdown-item>
                @endforeach

            </x-dropdown>
        </div>
        

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>