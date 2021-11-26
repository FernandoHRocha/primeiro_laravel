@props(['name','type' => 'text', 'msg' => $name])
<div class="mb-6">
    <label for="{{ $name }}" class="block m-2 uppercase font-bold text-xs text-gray-900">{{ ucwords($msg) }}</label>
    <input type="{{$type}}" value="{{ old( $name )}}" name="{{ $name }}" id="{{ $name }}" class="border border-gray-400 rounded-xl {{ $type == 'file' ? 'bg-white' : '' }} w-full p-2">
    @error($name)
        <p class="error-msg">{{$message}}</p>
    @enderror
</div>