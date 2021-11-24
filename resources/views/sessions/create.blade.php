<x-layout>
    <section class="px-6 py-8 mt-8">
        <main class="max-w-3xl mx-auto mt-10 flex flex-row items-center">
            <img src="/images/black_scratch_logo.jpeg" class="rounded-xl relative right-20 h-80 z-10" alt="Shooting House Scratch">
            <form action="/login" method="POST" class="w-full bg-gray-100 p-8 pl-24 relative right-40 border border-indigo-200 rounded-xl flex flex-col">
                @csrf
                <div class="mb-8">
                    <label class="text-xl text-center font-bold">
                        Entrar
                    </label>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input class="border rounded-xl border-gray-400 p-2 w-full" type="email" name="email" id="email" required value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Senha
                    </label>
                    <input class="border rounded-xl border-gray-400 p-2 w-full" type="password" name="password" id="password" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                @error('login')
                        <p class="text-red-500 text-xs my-2">{{ $message }}</p>
                    @enderror
                <div class="mb-6">
                    <button type="submit" class="btn-simple w-full">Cadastrar</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>