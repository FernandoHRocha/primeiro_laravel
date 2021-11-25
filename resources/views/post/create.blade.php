<x-layout>
    <main class="max-w-5xl w-full mx-auto mt-6 lg:mt-20 space-y-6 px-4">
        <form method="POST" action="/post/create">
            @csrf
            <div class="mb-6 border-card">
                <h2 class="w-full text-right border-b-2 border-indigo-800 pb-2 mb-4">Não imponha limites à sua <strong class="text-indigo-600">Criatividade</strong> e escreva uma nova <strong class="text-indigo-600">Publicação</strong></h2>
                
                <label for="title" class="block m-2 uppercase font-bold text-xs text-gray-900">Título</label>
                <input type="text" value="{{ old('title')}}" name="title" id="title" class="border w-full p-2">
                @error('title')
                    <p class="error-msg">{{$message}}</p>
                @enderror
                
                <label for="excerpt" class="block m-2 uppercase font-bold text-xs text-gray-900">Resumo</label>
                <textarea name="excerpt" id="excerpt" class="border w-full p-2">{{ old('excerpt')}}</textarea>
                @error('excerpt')
                    <p class="error-msg">{{$message}}</p>
                @enderror
                
                <label for="body" class="block m-2 uppercase font-bold text-xs text-gray-900">Corpo</label>
                <textarea name="body" id="body" class="border w-full p-2">{{ old('body')}}</textarea>
                @error('body')
                    <p class="error-msg">{{$message}}</p>
                @enderror
                
                <div class="w-full mt-2 flex justify-items-start items-center">
                    <label for="category_id" class="m-2 uppercase font-bold text-xs text-gray-900">Categoria</label>
                    <select class="border w-full border-indigo-100 p-2 bg-white rounded-xl" name="category_id" id="category_id">    
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button class="btn-simple w-full mt-4" type="submit">Publicar Postagem</button>
            </div>
        </form>
    </main>
</x-layout>