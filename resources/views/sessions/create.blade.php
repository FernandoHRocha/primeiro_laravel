<x-layout>
    <section class="px-6 py-8 mt-8">
        <main class="max-w-3xl mx-auto mt-10 flex flex-row items-center">
            <img src="/images/black_scratch_logo.jpeg" class="rounded-xl relative right-20 h-80 z-10" alt="Shooting House Scratch">
            <form action="/login" method="POST" class="w-full bg-gray-100 p-8 pl-24 relative right-40 border border-indigo-200 rounded-xl flex flex-col">
                @csrf
                <div class="mb-8">
                    <label class="text-xl text-center font-bold">
                        Acesse sua Conta
                    </label>
                </div>
                <x-form.input name="email"/>

                <x-form.input name="password" type="password" msg="Senha"/>
                
                @error('login')
                        <p class="text-red-500 text-xs my-2">{{ $message }}</p>
                    @enderror
                <div class="mb-6">
                    <button type="submit" class="btn-simple w-full">Acessar</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>