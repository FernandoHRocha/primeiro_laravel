<x-dash cabecalho="Visão Geral">
    <div>
        <h2>{{ count($posts) }} Postagens</h2>
        <ul>
            @foreach ($categories as $category)
                <li class="py-4">
                    <a href="/?author={{ auth()->user()->slug }}&category={{$category->slug}}">
                        <h2>{{ count($posts->where('category_id',$category->id)) }} {{ $category->name }}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div>
        <h2>{{ $comments }} Participações</h2>
    </div>
</x-dash>