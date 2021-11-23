<x-dropdown>

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categorias' }}
            <x-icon name="arrow down" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="{{ http_build_query(request()->except('category')) != ''  ? '?'.http_build_query(request()->except(['category','page'])) : '/'}}" :active="request()->routeIs('home')">Todas</x-dropdown-item>

    @foreach($categories as $category)
    <x-dropdown-item
    href="{{ http_build_query(request()->except('category')) ? '/?'.http_build_query(request()->except(['category','page'])).'&category='.$category->slug : '/?category='.$category->slug }}"
    :active="request()->is('categories/' . $category->slug)">{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach

</x-dropdown>