@props(['trigger'])
<div x-data="{ show: false }" class="relative">

    <div @click="show = ! show" @click.away="show = false">
        {{ $trigger }}
    </div>
    
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded border border-gray-400 w-full z-10 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>