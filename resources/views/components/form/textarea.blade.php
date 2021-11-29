@props(['name'])
<div class="mb-6">
    <label for="{{ $name }}" class="block m-2 uppercase font-bold text-xs text-gray-900">{{ ucwords($name) }}</label>
    <textarea
    name="{{ $name }}"
    id="{{ $name }}"
    class="border border-gray-400 rounded-xl w-full p-2">
    {{ $slot ?? old($name) }}
    </textarea>
    @error($name)
        <p class="error-msg">{{$message}}</p>
    @enderror
</div>