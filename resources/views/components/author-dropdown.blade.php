<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
            {{ isset($currentAuthor) ? ucwords($currentAuthor->name) : 'Autores' }}
            <x-icon name="arrow down" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="{{ http_build_query(request()->except('author')) != ''  ? '?'.http_build_query(request()->except('author')) : '/'}}" :active="request()->routeIs('home')">Todos</x-dropdown-item>

    @foreach($authors as $author)
    <x-dropdown-item
    href="{{ http_build_query(request()->except('author')) ? '/?'.http_build_query(request()->except('author')).'&author='.$author->slug : '/?author='.$author->slug }}"
    :active="request()->is('authors/' . $author->slug)">{{ ucwords($author->name) }}</x-dropdown-item>
    @endforeach

</x-dropdown>