<tr>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="flex items-center">
        <div class="flex-shrink-0 h-10 w-10">
          <img class="h-10 w-10 rounded-full" src="{{ $post->thumbnail }}" alt="">
        </div>
        <div class="ml-4">
          <div class="text-sm font-medium w-max-md text-gray-900">
            {{$post->title}}
          </div>
          <div class="text-sm text-gray-500">
            {{$post->posted}}
          </div>
        </div>
      </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <div class="text-sm text-gray-900">{{$post->status}}</div>
      <div class="text-sm text-gray-500">{{$post->updated_at}}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
      <span class="p-2 inline-flex w-full justify-center text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
        {{ $post->count_comments}}
      </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
      <a href="#" class="text-green-600 hover:text-green-700">Edit</a>
    </td>
  </tr>