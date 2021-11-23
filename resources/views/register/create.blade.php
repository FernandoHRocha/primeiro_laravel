<x-layout>
    <section class="px-6 py-8 mt-8">
        <main class="max-w-xl mx-auto mt-10 bg-indigo-100 p-6 border border-indigo-200 rounded-xl flex flex-row">
            <div class="relative -left-40">
                <img src="/images/black_scratch_logo.jpeg" class="rounded-xl" alt="Shooting House Scratch">
            </div>
            <form action="/register" method="POST" class="mt-2 mx-5 w-full relative -left-40">
                @csrf
                <div class="mb-8">
                    <label class="text-xl text-center font-bold">
                        Cadastro
                    </label>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Nome
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Senha
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-white text-gray-900 rounded py-2 px-4 hover:bg-indigo-500 hover:text-white">Cadastrar</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>