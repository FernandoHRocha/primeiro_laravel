@props(['trigger'])
<div x-data="{ show: false }">

    <div @click="show = ! show" @click.away="show = false">
        {{ $trigger }}
    </div>
    
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded w-full z-50" style="display: none">
        {{ $slot }}
    </div>
</div>