<x-dash cabecalho="Visão Geral">
    <div>
        <h2>{{ auth()->user()->post_count }} Postagens</h2>
        <ul>
            @foreach (App\Models\Category::all() as $category)
                <li class="py-4">
                    <a href="/?author={{ auth()->user()->slug }}&category={{$category->slug}}">
                        <h2>{{ auth()->user()->posts()->where('category_id',$category->id)->count() }} {{ $category->name }}</h2>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-dash>