<!doctype html lang="pt-br">

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
    <header>
        <nav class="px-6 py-2 md:flex md:justify-between md:items-center md:w-full bg-white fixed t-0 z-50">
            <div>
                <a href="/">
                    <img src="/images/white_logo.jpeg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>
            
            <div class="mt-8 md:mt-0">
                <a href="/" class="text-xs font-bold uppercase">Página Inicial</a>
                
                <a href="#" class="bg-indigo-700 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Acompanhe as Novidades
                </a>
            </div>
        </nav>
    </header>
    <section class="px-6 py-2">

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/presenca.jpeg" alt="" class="mx-auto -mb-6" style="width: 230px; margin-bottom:20px;">
            <h5 class="text-3xl">Mantenha-se atualizado com o nosso time.</h5>
            <p class="text-sm mt-3">Promessa de caixa de entrada limpa. Sem bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Seu endereço de email"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-indigo-400 hover:bg-indigo-700 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Acompanhar
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>