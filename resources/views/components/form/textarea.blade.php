@props(['name'])
<div class="mb-6">
    <label for="{{ $name }}" class="block m-2 uppercase font-bold text-xs text-gray-900">{{ ucwords($name) }}</label>
    <textarea value="{{ old($name)}}" name="{{ $name }}" id="{{ $name }}" class="border w-full p-2"></textarea>
    @error($name)
        <p class="error-msg">{{$message}}</p>
    @enderror
</div>