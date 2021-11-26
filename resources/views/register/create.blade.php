<x-layout>
    <section class="px-6 py-8 mt-8">
        <main class="flex flex-row items-center mt-10 mx-auto">
            <img src="/images/black_scratch_logo.jpeg" class="h-80 relative left-20 rounded-xl z-10" alt="Shooting House Scratch">
            <form action="/register" method="POST" class="bg-gray-100 border border-indigo-200 flex flex-col p-8 pl-24 rounded-xl w-1/2">
                @csrf
                <div class="mb-8">
                    <label class="text-xl text-center font-bold">
                        Cadastro
                    </label>
                </div>

                <x-form.input name="name" msg="nome"/>

                <x-form.input name="email"/>

                <x-form.input name="password" type="password" msg="Senha"/>

                <div class="mb-6">
                    <button type="submit" class="btn-simple w-full">Cadastrar</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>