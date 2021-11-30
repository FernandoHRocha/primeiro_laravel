<x-dash :cabecalho="'Editar a Publicação - '. $post->title">
    <main class="max-w-5xl w-full mx-auto mt-6 space-y-6 px-4">
        <form method="POST" action="/post/{{ $post->slug }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-6">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('/storage/thumbnails/sh_rounded_logo.jpeg') }}" alt="sh rounded logo" width="150px">
                    <h2 class="border-b-2 w-full border-indigo-800 text-center pb-6 my-4">Não imponha limites à sua <strong class="text-indigo-600">Criatividade</strong> e escreva uma nova <strong class="text-indigo-600">Publicação</strong></h2>
                </div>
                
                <x-form.input class="flex-1 mb-6 mr-2" name="title" :value=" old('title', $post->title) "/>

                <div class="flex mt-6">
                    <x-form.input name="thumbnail" type="file" :value=" old('thumbnail', $post->thumbnail) "/>
                    <img src="{{ $post->thumbnail }}" alt="post thumbnail" class="flex-2 max-w-xs mx-auto rounded-xl">
                </div>

                
                <x-form.textarea name="excerpt" >{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

                <x-form.textarea name="body">{{ old('body',$post->body) }}</x-form.textarea>
                
                <div class="w-full mt-2 flex justify-items-start items-center">
                    <label for="category_id" class="m-2 uppercase font-bold text-xs text-gray-900">Categoria</label>
                    <select class="border w-full border-gray-400 p-2 bg-white rounded-xl" name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button class="btn-simple w-full mt-4" type="submit">Alterar Publicação</button>
            </div>
        </form>
    </main>
</x-dash>