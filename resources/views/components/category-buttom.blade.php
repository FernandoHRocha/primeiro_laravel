@props(['category'])
<a 
href="/categories/{{ $category->slug }}"
class="px-3 py-1 border border-indigo-400 rounded-full text-indigo-400 text-xs uppercase font-semibold"
style="font-size: 10px">
    {{ $category->name }}
</a>