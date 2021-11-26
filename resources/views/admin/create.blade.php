<x-dash cabecalho="Nova Publicação">
    <main class="max-w-5xl w-full mx-auto mt-6 space-y-6 px-4">
        <form method="POST" action="/post/create" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('/storage/thumbnails/sh_rounded_logo.jpeg') }}" alt="sh rounded logo" width="150px">
                    <h2 class="border-b-2 w-full border-indigo-800 text-center pb-6 my-4">Não imponha limites à sua <strong class="text-indigo-600">Criatividade</strong> e escreva uma nova <strong class="text-indigo-600">Publicação</strong></h2>
                </div>
                
                <x-form.input name="title" />

                <x-form.input name="thumbnail" type="file"/>
                
                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />
                
                <div class="w-full mt-2 flex justify-items-start items-center">
                    <label for="category_id" class="m-2 uppercase font-bold text-xs text-gray-900">Categoria</label>
                    <select class="border w-full border-gray-400 p-2 bg-white rounded-xl" name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button class="btn-simple w-full mt-4" type="submit">Publicar Postagem</button>
            </div>
        </form>
    </main>
</x-dash>