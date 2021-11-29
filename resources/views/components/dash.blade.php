@props(['cabecalho'])
<x-layout>
    <section class="py-8 max-w-6xl mx-auto">
        <h1 class="text-lg font-bold mb-4 mt-20 pb-2 border-b border-gray-800 text-indigo-800">
            {{ $cabecalho }}
        </h1>
        <div class="flex">
            <aside class="w-48 text-right">
                <h4 class="font-semibold p-4 mb-4">Opções</h4>
                <ul>
                    <li class="py-4 border-b border-indigo-100 pr-4 {{request()->is('dashboard') ? 'bg-indigo-200' : ''}} hover:bg-indigo-200">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li class="py-4 border-b border-indigo-100 pr-4 {{request()->is('post/edit') ? 'bg-indigo-200' : ''}} hover:bg-indigo-200">
                        <a href="/post/list">Ver Publicações</a>
                    </li>
                    <li class="py-4 border-b border-indigo-100 pr-4 {{request()->is('post/create') ? 'bg-indigo-200' : ''}} hover:bg-indigo-200">
                        <a href="/post/create">Criar Publicação</a>
                    </li>
                </ul>
            </aside>
            <main class="flex-1 border-card">
                {{ $slot }}
            </main>
        </div>
    </section>
</x-layout>