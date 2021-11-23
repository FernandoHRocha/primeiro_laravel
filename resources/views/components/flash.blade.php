@if (session()->has('success'))
<div>
    <p
    x-data="{ show: true }"
    x-init=" setTimeout(() => show = false, 4000)"
    x-show=" show "
    class="bg-indigo-600 bottom-0 fixed inset-x-1/3 p-2 py-6 rounded-t-2xl text-center text-white text-xl z-100">
        {{ session('success') }}
    </p>
</div>
@endif