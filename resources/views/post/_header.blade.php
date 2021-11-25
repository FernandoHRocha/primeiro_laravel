<header class="max-w-xl mx-auto mt-20 text-center">
    <div class="inline-flex">
        <div>
            <h1 class="text-4xl pt-4">
                Notícias <span class="text-indigo-700">Shooting House</span>
            </h1>Por
            <h2 class="inline-flex items-center mt-2"><strong> Fernando H. Rocha</strong></h2>
        </div>
        <img src="/images/sh_rounded_logo.jpeg" alt="Shooting House rounded logo" style="width:100px; margin-left:20px;">
    </div>

    <p class="text-sm mt-14">
        Ano novo, novas atualizações, e a Shooting House continua crescendo e trazendo novos conteúdos.
    </p>
    <p class="text-sm">
        Vamos manter você informados sobre o que está acontecendo!
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category filter -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-category-dropdown />
        </div>

        <!-- Author filter -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-author-dropdown />
        </div>
        

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/" class="mb-0">
                <input
                    type="text"
                    name="search"
                    placeholder="Pesquise ..."
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}">
                @if (request('category'))
                    <input type="hidden" name="category" class="invisible h-0 w-0" value="{{ request('category') }}">                    
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" class="invisible h-0 w-0" value="{{ request('author') }}">                    
                @endif
            </form>
        </div>
    </div>
</header>